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

        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

        // Execute the statement
        $stmt_status = $stmt->execute();

 
            header('location:login.php');
      

        



       
  }
  
?>
