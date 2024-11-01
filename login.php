<?php
 session_start();
 include('connection.php');

 if (isset($_POST['login_btn'])) {
    $_email = $_POST['email'];
    $_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? LIMIT 1");
    $stmt->bind_param('s', $_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($_password == $row['user_password']) { // Check if passwords match
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['logged_in'] = true;
            header('location: account.php?message=logged in successfully');
            exit();
        } else {
            header('location: login.php?error=incorrect password');
            exit();
        }
    } else {
        header('location: login.php?error=couldn\'t verify your account');
        exit();
    }
} 
?>



<?php include('header.php');?>
 <!-- login-->
 <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5 "> 
<h2> login  </h2>
<hr >
</div>
 <div class="mx-auto container"> 

 <form id="login-form" method="POST" action="login.php">
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
   
    <div class="form-group">
        <a id="register-url" href="register.php" class="btn">Don't have an account? Register now</a>
    </div> 
</form>

 </div>

</section>
