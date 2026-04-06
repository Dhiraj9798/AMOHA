<?php
// Step 1: Database ki details set karna
$servername = "localhost"; // Local PC par XAMPP hai isliye localhost
$username = "root";       // XAMPP me default username 'root' hota hai
$password = "";           // XAMPP me default password khali (blank) hota hai
$dbname = "logistic_db";  // Ye humare database ka naam hai jo aapne banaya tha

// Step 2: Database se connection banana
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Step 3: Check karna ki connection successfully hua ya koi error aayi
if (!$conn) {
    // Agar connection fail hota hai toh website yahin ruk jayegi aur error dikhayegi
    die("Connection failed: " . mysqli_connect_error());
}

// Agar connection success ho gaya toh hume webpage par kuch print nahi karna hai, chupchap agle kaam pe badh jana hai
?>