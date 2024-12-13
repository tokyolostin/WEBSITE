<?php

session_start();
include('connection.php');

if (isset($_POST['place_order'])) {
    // Assuming you retrieve user information such as name, email, phone, city, and address from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "not paid";
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y-m-d H:i:s'); // Corrected format ('Y' for 4-digit year, 'H' for 24-hour format)

    // Prepare the statement for inserting into orders table
    $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param('dsiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

    // Execute the statement for inserting into orders table
    $stmt->execute();

    // Get the order ID
    $order_id = $stmt->insert_id; 

    // Prepare the statement for inserting into order_items table
    $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    foreach($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];
        
        // Bind parameters
        $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);
        
        // Execute the statement for inserting into order_items table
        $stmt1->execute();
    }
    
    // Redirect after successful order placement
 
}

?>
