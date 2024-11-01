<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

     <link  rel="stylesheet" href="assets/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light  py-3 fixed-top">
        <div class="container "> 
         <img class="logo" src="assets/css/js/imgs/ll.png">
         <h2 class="brand"> BUY ME </h2>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
       
         <div class="collapse navbar-collapse " id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
             <li class="nav-item">
               <a class="nav-link" href="index.php">Home</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="shop.php">Shop</a>
               </li>
 
               <li class="nav-item">
                 <a class="nav-link" href="#">Blog</a>
               </li>
 
               <li class="nav-item">
                 <a class="nav-link" href="contact.php">Contact us </a>
               </li>
               <li class="nav-item">
             <a href="register.php"> <i class="fas fa-user-circle" ></i></a>
                     <a href="cart.php">  <i class="fas fa-shopping-cart">  
                 <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) {?> 
                 <span class="cart-quantity"> <?php echo $_SESSION['quantity']; ?></span>
                  <?php } ?>
                 </i> </a>
                 
              
 
               </li>
               
  
               
 
               
 
   
             </ul>
 
           </div>
         </div>
 </nav>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 