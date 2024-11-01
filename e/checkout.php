<?php
 session_start();
 
 if(!empty($_SESSION['cart']) ){

 }else{
  header('location:index.php');
 }
?>




<?php include('header.php');?>
       <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5 "> 
    <h2 class="form-weight-bold"> check out  </h2>
    <hr class="mx-auto">
    </div>
     <div class="mx-auto container"> 
    
 <form id="checkout-form"  method="POST" action="place_order.php" >
      
    
    
    
    
    
    <div class="form-group checkout-small-element">
         <label> name</label>
             <input type="text " class="form-control" id="checkout-name" name="name" placeholder=" name" required> 
         
           </div> 
       <div class="form-group  checkout-small-element">
        <label> email</label>
         <input type="text " class="form-control" id="checkout-email" name="email" placeholder=" email" required> 
     
       </div> 
    
       <div class="form-group checkout-small-element">
        <label>phone</label>
         <input type="tel " class="form-control" id="checkout-phone" name="phone" placeholder="phone" required> 
     
       </div> 
       <div class="form-group  checkout-small-element">
        <label>  city</label>
         <input type="text " class="form-control" id="checkout-city" name="city" placeholder="city" required> 
     
       </div> 
       <div class="form-group  checkout-large-element" >
        <label>  address</label>
         <input type="text " class="form-control" id="checkout-address" name="address" placeholder="adress" required> 
     
       </div> 
    
    
       <div class="form-group  checkout-btn-element"  >
         <p> total amount:<?php echo $_SESSION['total']; ?> <span> DA</span></p>
         <input type="submit" class="btn"   id="checkout-btn"     name="place_order" value="place order"> 
     
       </div> 
       
     
        
    </form>
     </div>
    
     <?php include('footer.php');?>