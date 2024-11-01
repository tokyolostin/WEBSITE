
<?php
session_start();
if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){
        $product_array_ids = array_column($_SESSION['cart'],"product_id");
        if(!in_array($_POST['product_id'],$product_array_ids)){
            $product_id= $_POST['product_id'];
          $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
                
            );
            $_SESSION['cart'][$_POST['product_id']] = $product_array;
        } else {
            echo '<script>alert("Product was already added to cart.");</script>';
        }
    } else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );
        $_SESSION['cart'][$product_id] = $product_array;
    }
 
     calculatetotalcart();

     }else if(isset($_POST['remove_product'])){
     $product_id=$_POST['product_id'];
     unset($_SESSION['cart'][$product_id]);
      calculatetotalcart();
}

else if(isset($_POST['edit_quantity'])){
    
  $product_id= $_POST['product_id'];
  $product_quantity= $_POST['product_quantity'];
  $product_array=$_SESSION['cart'][$product_id];
  $product_array['product_quantity']=$product_quantity;
  $_SESSION['cart'][$product_id]=$product_array;
 calculatetotalcart();
}


    

else {
   // header('location:index.php');
   
}
   function calculatetotalcart(){
   $total=0;
    $total_quantity=0;
   foreach($_SESSION['cart']as $key =>$value){
   $product =$_SESSION['cart'][$key];
   $price=$product['product_price'];
   $quantity =$product['product_quantity'];
   $total=$total +($price * $quantity);
   $total_quantity=$total_quantity + $quantity;
 }
  $_SESSION['total']=$total;
  $_SESSION['quantity']=$total_quantity;
}
 
?>
   



   <?php include('header.php');?>
  
  

  <section class="cart container my-5 pb-5"> 
   <div class="container text-center mt-5 py-5"> 
   <h2 class=" font-weight-bolde"> your cart  </h2>
    <hr>
   </div>
   <table class="mt-5 pt-5">
     <tr>
      <th>product</th>
      <th>quantity</th>
      <th>subtotal</th>

     </tr>
     <?php  foreach($_SESSION['cart'] as $key =>$value){?>
      <tr>
       <td>
        <div class="product-info">
          <img src="assets/css/js/imgs/<?php echo $value['product_image'];?>">
          <div> 
            <p> <?php echo $value['product_name'];?></p>
              <small> <?php echo $value['product_price'];?><span> DA</span> </small>
             <br> 
                <form method="POST" action="cart.php">
                   <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                   <input type="submit" name="remove_product"  class="remove-btn"value="remove">
          </div>  
        </div>
       </td> 
       <td>
    <form method="POST" action="cart.php">
      <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
      <input type="number"  name="product_quantity" value="<?php echo $value['product_quantity'];?>">

      <input type="submit" name="edit_quantity"  class="edit-btn"value="edit">

 
       
     </form> 
   
  </td>



 <td> 

 <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'];?> </span> <span> DA</span>



 </td>


      </tr>

     
       

       
      



          <?php  }?>
        </table>
       <div class="cart-total">
  <table>
  
       
   <tr>
    <td> total</td>
     <td>  <?php echo $_SESSION['total'];?> <span>DA </span></td>  
   </tr>
  </table> 

 </div>
  <div class="checkout-container "> 
  
    <form method="POST" action="checkout.php">
      <input type="submit"  class="btn checkout-btn" name="checkout"  value="checkout">

 
       
     </form> 

 </div>



</section>
<?php include('footer.php');?>