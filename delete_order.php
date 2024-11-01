<?php
session_start();
include('connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: lo.php');
}

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id=?");
    $stmt->bind_param("i", $order_id);

    if($stmt->execute()) {
        header('location:dashboard.php?deleted_successfully=Product has been deleted successfully');
        exit(); // Exit to prevent further execution
    } else {
        header('location:dashboard.php?deleted_failure=Could not delete product');
        exit(); // Exit to prevent further execution
    }
} else {
    // Redirect to a relevant page if order_id is not set
    header('location:dashboard.php');
    exit(); // Exit to prevent further execution
}
?>
