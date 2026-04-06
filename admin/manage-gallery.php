<?php
// Step 1: Checking Admin session
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

// Step 2: Database Connection include
require_once 'includes/db_connect.php';

$message = "";

// Step 3: Jab admin "Upload Image" wala form submit (POST) karta hai
if(isset($_POST['upload'])) {
    
    // Folder ka raasta jahan images save karni hain (admin folder ke bahar, uploads/gallery/ mein)
    $target_dir = "../uploads/gallery/";
    
    // Original file name me date/time tag lagate hain, taaki same naam ki 2 files clash na karein
    $file_name = time() . "_" . basename($_FILES["imageToUpload"]["name"]);
    
    // Pura raasta jahan file move hogi
    $target_file = $target_dir . $file_name;
    
    // Check karna ki konsa format hai (jpg, png, etc.)
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // File sach mein ek image hai ya kisi ne PDF/virus upload kar diya?
    $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
    
    if($check !== false) {
        // Image format check (kewal jpg, jpeg, png, gif allow karna hai)
        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
            
            // Ab PHP ko bolte hain ki file ko temporary memory se uthakar humare folder me 'move' kar do
            if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
                
                // Folder mein aagayi, ab MySQL Database me image ka naam save kar do
                $sql = "INSERT INTO gallery (image_name) VALUES ('$file_name')";
                if(mysqli_query($conn, $sql)) {
                    $message = "<div class='success-msg'>Image permanently upload ho gayi aur Database me save ho gayi!</div>";
                } else {
                    $message = "<div class='error-msg'>Image folder me aagayi par Database me save nahi ho paayi! Error: " . mysqli_error($conn) . "</div>";
                }
            } else {
                $message = "<div class='error-msg'>Sorry, file ko folder me move karne mein error aayi.</div>";
            }
        } else {
            $message = "<div class='error-msg'>Sorry, sirf JPG, JPEG, PNG ya GIF files allow hain.</div>";
        }
    } else {
        $message = "<div class='error-msg'>Ye file koi image nahi hai!</div>";
    }
}

// Step 4: Jab admin Delete link par click karein
if(isset($_GET['delete'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete']);
    
    // Pehle database se image ka naam nikalte hain taaki folder se file hata sakein
    $get_img_query = "SELECT image_name FROM gallery WHERE id = '$delete_id'";
    $img_result = mysqli_query($conn, $get_img_query);
    
    if(mysqli_num_rows($img_result) > 0) {
        $img_row = mysqli_fetch_assoc($img_result);
        $file_path = "../uploads/gallery/" . $img_row['image_name'];
        
        // 1. Folder se file delete karna (agar exist karti hai)
        if(file_exists($file_path)) {
            unlink($file_path);
        }
        
        // 2. Database se us id ka record delete karna
        $delete_query = "DELETE FROM gallery WHERE id = '$delete_id'";
        if(mysqli_query($conn, $delete_query)) {
            $message = "<div class='success-msg'><i class='fa-solid fa-check-circle'></i> Image successfully delete ho gayi!</div>";
        } else {
            $message = "<div class='error-msg'><i class='fa-solid fa-triangle-exclamation'></i> Database se delete nahi ho paayi!</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - Admin Panel</title>
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

        /* Cards Style */
        .card { 
            background: white; padding: 25px; border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.03); margin-bottom: 25px; 
        }
        .card h3 { margin-top: 0; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; color: #1e293b; font-size: 18px; }
        
        /* Upload Form Style */
        .upload-form { display: flex; gap: 15px; align-items: center; margin-top: 20px; flex-wrap: wrap; }
        .upload-form input[type="file"] { 
            padding: 10px; border: 1px dashed #cbd5e1; border-radius: 6px; flex-grow: 1; min-width: 200px;
        }
        .upload-btn { 
            background-color: #3b82f6; color: white; border: none; padding: 12px 25px; font-size: 15px;
            cursor: pointer; border-radius: 6px; font-weight: 500; transition: background 0.3s;
            display: flex; align-items: center; gap: 8px;
        }
        .upload-btn:hover { background-color: #2563eb; }
        
        /* Image Grid Style */
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; margin-top: 20px; }
        .gallery-item { 
            position: relative; /* Delete button ke liye zaroori hai */
            border: none; padding: 0; border-radius: 10px; text-align: center; 
            background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden;
            transition: transform 0.3s;
        }
        .gallery-item:hover { transform: translateY(-5px); }
        .gallery-item img { width: 100%; height: 180px; object-fit: cover; display: block; }
        
        /* Delete Button */
        .delete-btn {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #ef4444;
            color: white;
            padding: 8px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            opacity: 0;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-weight: 500;
        }
        .gallery-item:hover .delete-btn {
            opacity: 1; /* Hover karne par button dikhega */
            bottom: 20px; /* Thoda upar aayega effects ke liye */
        }
        .delete-btn:hover { background-color: #dc2626; box-shadow: 0 4px 10px rgba(239, 68, 68, 0.4); }

        /* Messages */
        .success-msg { color: #047857; background-color: #d1fae5; padding: 12px 15px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #10b981; font-size: 14px; }
        .error-msg { color: #b91c1c; background-color: #fee2e2; padding: 12px 15px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #ef4444; font-size: 14px; }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar { 
                width: 100%; height: auto; position: relative; display: flex; flex-direction: column; z-index: 10;
            }
            .sidebar h2 { padding: 15px 0; font-size: 20px; }
            .sidebar ul { display: flex; justify-content: center; margin: 0; padding: 10px 0; background: rgba(0,0,0,0.1); }
            .sidebar ul li a { padding: 10px 15px; font-size: 14px; border-left: none; border-bottom: 3px solid transparent; }
            .sidebar ul li a:hover, .sidebar ul li a.active { border-left: none; border-bottom: 3px solid #3b82f6; }
            
            .main-content { margin-left: 0; }
            .top-bar { flex-direction: column; gap: 15px; padding: 15px; text-align: center; }
            .user-block { flex-direction: column; gap: 10px; }
            
            .content-wrapper { padding: 15px; }
            .upload-form { flex-direction: column; align-items: stretch; }
            .upload-btn { width: 100%; justify-content: center; }
            .gallery-grid { grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); }
        }
    </style>
</head>
<body>

    <!-- Sidebar (Left Menu) -->
    <div class="sidebar">
        <h2><i class="fa-solid fa-truck-fast"></i> Admin Panel</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
            <li><a href="manage-gallery.php" class="active"><i class="fa-solid fa-images"></i> Manage Gallery</a></li> 
        </ul>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="top-bar">
            <h2 class="top-bar-title">Gallery Manager</h2>
            <div class="user-block">
                <span><i class="fa-regular fa-user-circle"></i> Welcome, <strong><?php echo $_SESSION['admin_username']; ?></strong>!</span>
                <a href="logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>

        <div class="content-wrapper">
            <!-- Section 1: Image Upload Form -->
            <div class="card">
                <h3><i class="fa-solid fa-cloud-arrow-up"></i> Upload New Gallery Image</h3>
                
                <!-- Message dikhane ke liye -->
                <?php echo $message; ?>

                <!-- enctype="multipart/form-data" bahut zaroori hai photo upload karne ke liye -->
                <form class="upload-form" action="manage-gallery.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="imageToUpload" id="imageToUpload" required>
                    <button type="submit" name="upload" class="upload-btn"><i class="fa-solid fa-upload"></i> Upload Image</button>
                </form>
            </div>

            <!-- Section 2: Uploaded Images View -->
            <div class="card">
                <h3><i class="fa-solid fa-photo-film"></i> Currently Uploaded Images</h3>
                <div class="gallery-grid">
                <?php
                // Ye Database se reverse order (jo last mein daali, wo pehle dikhe) mein images nikalne ka syntax hai
                $query = "SELECT * FROM gallery ORDER BY id DESC";
                $result = mysqli_query($conn, $query);

                // Agar Database mein images hain toh loop chalega
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        // Image ka rasta jo hum HTML <img> me show karenge
                        $image_path = "../uploads/gallery/" . $row['image_name'];
                        $img_id = $row['id'];
                        
                        echo "<div class='gallery-item'>";
                        echo "<img src='$image_path' alt='Gallery Image'>";
                        // Delete ka button
                        echo "<a href='manage-gallery.php?delete=$img_id' class='delete-btn' onclick='return confirm(\"Are you sure you want to completely delete this image? This action cannot be undone.\");'><i class='fa-solid fa-trash-can'></i> Delete</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p style='color: #64748b; grid-column: span 100%;'>Abhi tak panel se koi image upload nahi hui hai.</p>";
                }
                ?>
            </div>
        </div>

    </div>

</body>
</html>