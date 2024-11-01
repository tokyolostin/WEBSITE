<?php
session_start();
include('connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: lo.php');
}
 if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $stmt = $conn->prepare(" DELETE FROM products WHERE product_id=?");
    $stmt->bind_param("i",$product_id);

    if($stmt->execute()) {
        header('location:product.php?deleted_successfully=product has been deleted successfully');
       }
       else{
        header('location:product.php?deleted_failure=couldnt  delete ');
    
       }
  
 }
 ?>