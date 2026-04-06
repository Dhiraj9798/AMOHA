<?php
// Step 1: Session Start karna (Ye bahut zaroori hai login yaad rakhne ke liye)
session_start(); 

// Step 2: Agar admin pehle se login hai, toh usko seedha dashboard par bhej do (baat-baar login na puche)
if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

// Step 3: Humari banayi hui database connection file ko yahan jodte (include) hain
require_once 'includes/db_connect.php';

$error = "";

// Step 4: Jab Form ka "Login" button dabega, tab ye POST request chalegi
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // User ne form me jo username aur password dala hai usko variables me save kar rahe hain
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Database me query bhej rahe hain: "Bhai, is table me dhundho kya ye username hai?"
    $query = "SELECT * FROM admin_users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Agar database me us naam ka ek (row) mila
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Ab check karte hain kya database ka password aur user ka dala hua password match karta hai?
        // (Note: Real projects me password encrypt karke rakhte hain, abhi sikhne ke liye direct match kar rahe hain)
        if($password === $row['password']) {
            
            // Success! Session me stamp (mohar) laga do ki ye banda "Admin" hai
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            
            // Ab usko Dashboard page par bhej do
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password galat hai!";
        }
    } else {
        $error = "Username nahi mila!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Logistic</title>
    <!-- Google Fonts for modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            padding: 20px;
            box-sizing: border-box;
        }
        .login-box { 
            background: white; 
            padding: 40px 30px; 
            border-radius: 12px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.2); 
            width: 100%; 
            max-width: 400px;
        }
        .login-box h2 { 
            text-align: center; 
            margin-top: 0;
            margin-bottom: 25px; 
            color: #1e293b;
            font-size: 28px;
            font-weight: 600;
        }
        .input-group { margin-bottom: 20px; }
        .input-group label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 500; 
            color: #475569;
            font-size: 15px;
        }
        .input-group input { 
            width: 100%; 
            padding: 12px 15px; 
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box; 
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s;
        }
        .input-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .btn { 
            width: 100%; 
            padding: 12px; 
            background-color: #3b82f6; 
            color: white; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            font-size: 16px; 
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            transition: background-color 0.3s, transform 0.1s; 
        }
        .btn:hover { background-color: #2563eb; }
        .btn:active { transform: scale(0.98); }
        .error { 
            color: #b91c1c; 
            background-color: #fee2e2;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ef4444;
            text-align: center; 
            margin-bottom: 20px; 
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <!-- Agar login me koi error aaye (galat pass/user) toh yahan laal rang me dikhegi -->
        <?php if($error != "") { echo "<p class='error'>$error</p>"; } ?>
        
        <!-- Form jo POST method se data bhejega -->
        <form method="POST" action="">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Enter your username">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" class="btn">Login Securely</button>
        </form>
    </div>
</body>
</html>