<?php
session_start();
include('connection.php');
// Check if the logout parameter is set in the URL
if (isset($_GET['logout'])) {
    // Unset all session variables
    unset($_SESSION['logged_in']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_name']);
    
    // Redirect to the login page
    header('location: lo.php');
    exit;
}
