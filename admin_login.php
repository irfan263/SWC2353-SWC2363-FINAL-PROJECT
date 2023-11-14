<?php
session_start();

// Admin credentials
$admin_username = "admin7";
$admin_password = "admin123";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php"); 
    } else {
        echo "Incorrect admin credentials.";
    }
}
?>
