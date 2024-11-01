<?php
session_start();
include('connection.php');

if (isset($_POST['create_product'])) {
    $product_name = $_POST['title'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_special_offer = $_POST['offer'];
    $product_category = $_POST['category'];
    $product_color = $_POST['color'];

    // File upload handling
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];

    $file_name1 = $_FILES['image1']['name'];
    $file_name2 = $_FILES['image2']['name'];
    $file_name3 = $_FILES['image3']['name'];
    $file_name4 = $_FILES['image4']['name'];

    // Destination directory
    $upload_dir = "../assets/imgs/";

    // Move uploaded files to destination directory
    $image_name1 = $product_name . "1.jpeg";
    $image_name2 = $product_name . "2.jpeg";
    $image_name3 = $product_name . "3.jpeg";
    $image_name4 = $product_name . "4.jpeg";

    move_uploaded_file($image1, $upload_dir . $image_name1);
    move_uploaded_file($image2, $upload_dir . $image_name2);
    move_uploaded_file($image3, $upload_dir . $image_name3);
    move_uploaded_file($image4, $upload_dir . $image_name4);

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_description, product_price, product_special_offer, product_image, product_image2, product_image3, product_image4, product_category, product_color) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param('ssssssssss', $product_name, $product_description, $product_price, $product_special_offer, $image_name1, $image_name2, $image_name3, $image_name4, $product_category, $product_color);

    // Execute query
    if ($stmt->execute()) {
        header('location: product.php?product_created=Product has been created successfully');
    } else {
        header('location: product.php?product_failed=Error occurred, try again');
    }
}
?>
