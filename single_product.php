 <?php
  include('connection.php');
 if(isset($_GET['product_id'])){
   $product_id=$_GET['product_id'];

   $stmt=$conn->prepare("SELECT * FROM products  WHERE product_id=?");
    $stmt->bind_param("i",$product_id);
   
   $stmt->execute();
    $product= $stmt->get_result();//[1]
 



  //no product id was given
 }else{
  header("loaction:index.php");
 }
 
 ?>

<?php include('header.php');?>

        <!-- single product -->
 
 
   <section class="container single-product my-5 pt-5">
         <div class="row mt-5">
        <?php  while($row = $product->fetch_assoc()) { ?>
         <form method="POST" action="cart.php" >
          
         <input type="hidden" name="product_image"   value="<?php echo $row['product_image'];?>">
         <input type="hidden" name="product_name"   value="<?php echo $row['product_name'];?>">
         <input type="hidden" name="product_price"   value="<?php echo $row['product_name'];?>">


         <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" src="assets/css/js/imgs/<?php echo $row['product_image'];?>" id="mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/css/js/imgs/<?php echo $row['product_image'];?>" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/css/js/imgs/<?php echo $row['product_image2'];?>" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/css/js/imgs/<?php echo $row['product_image3'];?>" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="assets/css/js/imgs/<?php echo $row['product_image4'];?>" width="100%" class="small-img">
                </div>
        </div>
    
    

        <div class="col-lg-6 col-md-12 col-12">
         
            <h3 class="py-4"><?php echo $row['product_name'];?></h3>
            <h2><?php echo $row['product_price'];?></h2>


            <form method="POST" action="cart.php" >
              <input type="hidden" name="product_id"   value="<?php echo $row['product_id'];?>">

             <input type="hidden" name="product_image"   value="<?php echo $row['product_image'];?>">
             <input type="hidden" name="product_name"   value="<?php echo $row['product_name'];?>">
             <input type="hidden" name="product_price"   value="<?php echo $row['product_price'];?>">
 
              <input type="number"  name=" product_quantity" value="1">
              <button class="buy-btn" type="submit" name="add_to_cart">add to cart</button>

            </form>
            <h4 class="mt-5 m5">product details</h4>
            <span><?php echo $row['product_description'];?></span>
        </div>
        <?php } ?>
    </div>
</section>

<section id="related-product" class="my-5 pb-5">
  <div class=" container text-center mt-5 py-5">
    <h3>related-product</h3>
    <hr> 
  </div> 
   <div class="row mx-auto container-fluid"> 
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img class="img-fluid mb-3" src="assets/css/js/imgs/jacket.jpeg">
     <div class="star"> 
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>

    </div>
<h5 class="p-name">jacket </h5>
<h4 class="p-price">250 DA  </h5>
<a href="shop.php"> <button class="buy-btn">buy now  </button></a>
    </div> 

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/css/js/imgs/hermessc.jpeg">
       <div class="star"> 
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>

      </div>
 <h5 class="p-name">hermes sandale  </h5>
 <h4 class="p-price">  240 DA </h5>
 <a href="shop.php"> <button class="buy-btn">buy now  </button></a>
      </div> 
 
      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/css/js/imgs/bag.webp">
         <div class="star"> 
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
  
        </div>
   <h5 class="p-name"> christian dior bag  </h5>
   <h4 class="p-price"> 600 DA  </h5>
   <a href="shop.php"> <button class="buy-btn">buy now  </button></a>
        </div> 
   
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/css/js/imgs/pants1.webp">
           <div class="star"> 
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
            <i class="fas fa-star"> </i>
    
          </div>
     <h5 class="p-name"> pants  </h5>
     <h4 class="p-price"> 550 DA </h5>
     <a href="shop.php"> <button class="buy-btn">buy now  </button></a>
          </div> 
    
   </div> 
 </section>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 <script>
var mainImg = document.getElementById("mainImg");
var smallImg = document.getElementsByClassName("small-img");
for(let i=0; i<4; i++){
smallImg[i].onclick = function(){
mainImg.src = smallImg [i].src;


}
} 
</script>
<?php  include("footer.php");?>