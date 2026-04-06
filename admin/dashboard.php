<?php
// Step 1: Session start karo, taaki hum check kar sakein ki user login hai ya nahi
session_start();

// Step 2: Check karo ki kya 'admin_logged_in' ka stamp (session) mila hua hai?
// Agar nahi mila, toh iska matlab koi direct is page ko kholne ki koshish kar raha hai bina login kiye
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Usko wapas dhakke maar ke login page (index.php) par bhej do
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Logistic</title>
    <!-- Google Fonts for modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base Styles */
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f0f2f5; 
            margin: 0; 
            padding: 0; 
            color: #333;
        }

        /* Sidebar Styling */
        .sidebar { 
            width: 260px; 
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: white; 
            height: 100vh; 
            position: fixed; 
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar h2 { 
            text-align: center; 
            padding: 25px 0; 
            border-bottom: 1px solid rgba(255,255,255,0.1); 
            margin: 0; 
            font-weight: 600;
            color: #f8f9fa;
            letter-spacing: 1px;
        }
        .sidebar h2 i { color: #3b82f6; margin-right: 8px; }
        .sidebar ul { list-style: none; padding: 0; margin: 15px 0 0 0; }
        .sidebar ul li a { 
            display: flex; 
            align-items: center;
            padding: 15px 25px; 
            color: #cbd5e1; 
            text-decoration: none; 
            transition: all 0.3s ease;
            font-size: 15px;
        }
        .sidebar ul li a i { width: 25px; font-size: 18px; }
        .sidebar ul li a:hover, .sidebar ul li a.active { 
            background-color: rgba(255,255,255,0.05); 
            color: #fff;
            border-left: 4px solid #3b82f6;
        }

        /* Main Content Structure */
        .main-content { margin-left: 260px; padding: 0; }
        
        /* Top Navigation Bar */
        .top-bar { 
            background-color: white; 
            padding: 15px 30px; 
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .top-bar-title { margin: 0; font-size: 20px; font-weight: 600; color: #1e293b; }
        .user-block { display: flex; align-items: center; gap: 20px; font-weight: 500; color: #475569; }
        .logout-btn { 
            background-color: #ef4444; color: white; padding: 8px 18px; 
            text-decoration: none; border-radius: 6px; font-weight: 500; font-size: 14px;
            transition: all 0.3s; display: flex; align-items: center; gap: 8px;
        }
        .logout-btn:hover { background-color: #dc2626; box-shadow: 0 4px 10px rgba(239, 68, 68, 0.2); }

        /* Dashboard Content Wrapper */
        .content-wrapper { padding: 30px; }
        
        /* Welcome Card */
        .welcome-card { 
            background: white; padding: 30px; border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03); border-left: 5px solid #3b82f6; margin-bottom: 30px;
        }
        .welcome-card h1 { margin-top: 0; color: #1e293b; font-size: 26px; }
        .welcome-card p { color: #64748b; font-size: 16px; line-height: 1.6; margin-bottom: 10px;}
        
        /* Quick Action Cards */
        .dashboard-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; }
        .dash-card {
            background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            display: flex; align-items: center; gap: 20px; transition: all 0.3s ease; text-decoration: none; color: inherit;
        }
        .dash-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
        .dash-card .icon {
            width: 60px; height: 60px; background: #eff6ff; color: #3b82f6;
            border-radius: 15px; display: flex; justify-content: center; align-items: center; font-size: 26px;
        }
        .dash-card .bg-green { background: #f0fdf4; color: #10b981; }
        .dash-card .info h3 { margin: 0 0 5px 0; font-size: 18px; color: #1e293b; }
        .dash-card .info p { margin: 0; color: #64748b; font-size: 14px; }
        
        /* Steps List */
        .steps-list { background: #f8fafc; padding: 20px; border-radius: 8px; margin-top: 20px; }
        .steps-list p { margin: 8px 0; font-size: 15px; color: #475569; }
        .steps-list i { color: #3b82f6; margin-right: 8px; font-size: 12px; }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar { 
                width: 100%; 
                height: auto; 
                position: relative; 
                display: flex; 
                flex-direction: column;
                z-index: 10;
            }
            .sidebar h2 { padding: 15px 0; font-size: 20px; }
            .sidebar ul { display: flex; justify-content: center; margin: 0; padding: 10px 0; background: rgba(0,0,0,0.1); }
            .sidebar ul li a { padding: 10px 15px; font-size: 14px; border-left: none; border-bottom: 3px solid transparent; }
            .sidebar ul li a:hover, .sidebar ul li a.active { border-left: none; border-bottom: 3px solid #3b82f6; }
            
            .main-content { margin-left: 0; }
            .top-bar { flex-direction: column; gap: 15px; padding: 15px; text-align: center; }
            .user-block { flex-direction: column; gap: 10px; }
            
            .content-wrapper { padding: 15px; }
            .welcome-card { padding: 20px; }
            .welcome-card h1 { font-size: 22px; }
            .dashboard-cards { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2><i class="fa-solid fa-truck-fast"></i> Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php" class="active"><i class="fa-solid fa-house"></i> Dashboard</a></li>
            <li><a href="manage-gallery.php"><i class="fa-solid fa-images"></i> Manage Gallery</a></li> 
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <h2 class="top-bar-title">Dashboard Overview</h2>
            <div class="user-block">
                <span><i class="fa-regular fa-user-circle"></i> Welcome, <strong><?php echo $_SESSION['admin_username']; ?></strong>!</span>
                <a href="logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>

        <div class="content-wrapper">
            <!-- Welcome Info -->
            <div class="welcome-card">
                <h1>Welcome to Admin Dashboard 👋</h1>
                <p>Hello Sir/Ma’am! You have successfully logged in. From here, you can seamlessly manage your website content without touching any code.</p>
                
                <div class="steps-list">
                    <strong>Guide to upload images:</strong>
                    <p><i class="fa-solid fa-circle-chevron-right"></i> 1. Click on <strong>Manage Gallery</strong> in the left menu.</p>
                    <p><i class="fa-solid fa-circle-chevron-right"></i> 2. Click the <strong>Upload Image</strong> button.</p>
                    <p><i class="fa-solid fa-circle-chevron-right"></i> 3. Select the image from your computer.</p>
                    <p><i class="fa-solid fa-circle-chevron-right"></i> 4. Hit Upload to instantly publish the image on your live gallery.</p>
                </div>
            </div>

            <!-- Dashboard Shortcuts -->
            <div class="dashboard-cards">
                <a href="manage-gallery.php" class="dash-card">
                    <div class="icon"><i class="fa-solid fa-image"></i></div>
                    <div class="info">
                        <h3>Gallery Manager</h3>
                        <p>Upload & view images</p>
                    </div>
                </a>
                
                <div class="dash-card" style="cursor: default;">
                    <div class="icon bg-green"><i class="fa-solid fa-chart-line"></i></div>
                    <div class="info">
                        <h3>Site Analytics</h3>
                        <p>Coming Soon</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>