<?php
 session_start();
 include('connection.php');

 if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password !== $confirmpassword) {
        header('Location: register.php?error=passwords do not match');
        exit();
    } else if (strlen($password) < 6) {
        header('Location: register.php?error=password must be at least 6 characters');
        exit();
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE user_email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            header('Location: register.php?error=user with this email already exists');
            exit();
        } else {
            // Insert the user into the database without hashing the password
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $name, $email, $password);
            if ($stmt->execute()) {
              $user_id=$stmt->insert_id;
              $_SESSION['user_id'] = $user_id;

                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header("location: account.php?message=you registered successfully");
                exit();
            } else {
                header('Location: register.php?error=cannot create an account at this moment');
                exit();
            }
        }
    }
}
?>






<?php include('header.php');?>
 <!-- registre -->
 <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5 "> 
<h2 class="form-weight-bold"> register   </h2>
<hr class="mx-auto">
</div>
  <div class="mx-auto container"> 

  <form id="register-form" method="POST" action="register.php">
    <p style="color:red; <?php if(isset($_GET['error'])) {echo $_GET['error'];} ?>"></p>
    <div class="form-group">
        <label>name</label>
        <input type="text" class="form-control" id="register-name" name="name" placeholder="name" required>
    </div> 
    <div class="form-group">
        <label>email</label>
        <input type="text" class="form-control" id="register-email" name="email" placeholder="email" required>
    </div> 
    <div class="form-group">
        <label>password</label>
        <input type="password" class="form-control" id="register-password" name="password" placeholder="password" required>
    </div> 
    <div class="form-group">
        <label>confirm password</label>
        <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword" placeholder="password" required>
    </div> 
    <div class="form-group">
        <input type="submit" class="btn" id="register-btn" name="register" value="register">
    </div> 
    <div class="form-group">
        <a id="register-url" href="login.php" class="btn">Do you have an account? Login</a>
    </div> 
</form>

 </div>

</section>

<?php include('footer.php');?>