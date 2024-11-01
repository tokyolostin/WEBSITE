

<?php
session_start();
include('connection.php');

if (isset($_POST['login_btn'])) {
    $_email = $_POST['email'];
    $_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? LIMIT 1");
    $stmt->bind_param('s', $_email); // Changed to $_email
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($_password == $row['admin_password']) { // Check if passwords match
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['admin_name'];
            $_SESSION['admin_email'] = $row['admin_email'];
            $_SESSION['logged_in'] = true;
            header('location:dashboard.php?message=logged in successfully');
            exit();
        } else {
            header('location: lo.php?error=incorrect password');
            exit();
        }
    } else {
        header('location: lo.php?error=couldn\'t verify your account');
        exit();
    }
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylee.css"> <!-- Assuming you have a separate CSS file -->
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <form id="login-form" method="POST" action="lo.php">
    <div class="form-group">
    <p style="color:red <?php if(isset($_GET['error'])) {echo $_GET['error'];} ?>;"></p>
     
        <label>Email</label>
        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required> 
    </div> 

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required> 
    </div> 

    <div class="form-group">
        <input type="submit"  class="btn" id="login-btn" name="login_btn" value="Login"> 
    </div> 
 
</form>
    </div>
</body>
</html>
