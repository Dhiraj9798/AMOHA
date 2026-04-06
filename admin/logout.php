<?php
// Step 1: Session start karo, tab jaake hi pata chalega kaunsa session todhna hai
session_start();

// Step 2: Saare session variables ko mita (unset) do
$_SESSION = array();

// Step 3: Session ko puri tarah barbaad (destroy) kar do
session_destroy();

// Step 4: Logout hone ke baad user ko dobara login page par bhej do
header("Location: index.php");
exit;
?>