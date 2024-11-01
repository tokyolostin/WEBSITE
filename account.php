<?php
session_start();
include('connection.php');
// Check if the logout parameter is set in the URL
if (isset($_GET['logout'])) {
    // Unset all session variables
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    
    // Redirect to the login page
    header('location:login.php');
    exit;
}

// Redirect to the login page if the user is not logged in
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

// Check if the form for changing password has been submitted
if(isset($_POST['change_password'])){
    // Retrieve form data
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_email = $_SESSION['user_email'];
    
    // Check if passwords match
    if($password !== $confirm_password) {
        header('location: account.php?error=passwords don\'t match');
        exit;
    } elseif (strlen($password) < 6) {
        header('location: account.php?error=password must be at least 6 characters');
        exit;
    } else {
        // Assuming $conn is your database connection
        // Replace $conn with your actual database connection variable
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss', $password, $user_email);
        if($stmt->execute()) {
            header('location: account.php?message=password has been updated successfully');
            exit;
        } else {
            header('location: account.php?error=couldnt update password');
            exit;
        }
    }
}
 //orders
 if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders where user_id=?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $orders = $stmt->get_result();
}
?>



<?php include('header.php');?>

 <!-- login-->
 <section class="mt-5 pt-5">
  <div class="row container ">
 <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
 <h3 class="font-weight-bolde"> account info </h3>
 </div>
 <hr class="mx-auto">
 <div class="account-info">
    <p> Name: <span><?php if(isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; } ?></span></p>
    <p> Email: <span><?php if(isset($_SESSION['user_email'])) { echo $_SESSION['user_email']; } ?></span></p>
    <p><a href="index.php" id="order-btn">Your Orders</a></p>
</div>


 <p><a href="account.php?logout=1" name="logout" id="logout-btn">Logout</a></p>


  </div>

  </div>
   <div class="col-lg-6 col-md-12 col-sm-12">
   <form id="account-form" method="POST" action="account.php">
    <p style="color:red;"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
    <p style="color:green;"><?php if(isset($_GET['message'])) {echo $_GET['message'];} ?></p>

    <h3>Change Password</h3>
    <hr class="mx-auto">
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" id="account-password-confirm" name="confirm_password" placeholder="Confirm Password">
    </div>

    <div class="form-group">
        <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
    </div>
</form>

 
   </div>

</section>
<!--order -->
<!--order -->
<section class="orders container my-5 py-5"> 
    <div class="container mt-2"> 
        <h2 class="font-weight-bolde text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5">
        <tr>
            <th>ORDER ID</th> <!-- Include Order ID here -->
            <th>ORDER COST</th>
            <th>ORDER STATUS</th>
            <th>ORDER DATE</th>
            <th>ORDER DETAILS</th>
        </tr>
        <?php while($row = $orders->fetch_assoc()) { ?>
        <tr>
            <td><span><?php echo $row['order_id']; ?></span></td> <!-- Display Order ID here -->
            <td><span><?php echo $row['order_cost']; ?></span></td>
            <td><span><?php echo $row['order_status']; ?></span></td>
            <td><span><?php echo $row['order_date']; ?></span></td>
            <td>
                <form method="POST" action="order_details.php">
                    <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                    <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id"> 
                    <input class="btn order-details-btn" name="order_details_btn" type="submit" value="detail">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</section>






    




        <?php include('footer.php');?>