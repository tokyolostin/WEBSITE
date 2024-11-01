
 <?php include('header.php');?>


<section id="home">
  <div class="container">
    <h5> NEW ARRIVALS </h5>
    <h1> <span>best prices </span>  this season </h1>
    <p> eshop offers the best product for the most affordable prices </p>
   <a href="shop.php"><button> shop now </button></a>
  </div>
</section>
  <section id="brand" class="container">
     <div class="row ">
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/jordan.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/nike.png"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/adidas.png"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/converse.png"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/fendi.svg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/luis.png"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/cd.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/gucci.png"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/casio.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/omega.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/rolex.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/hub.webp">
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/ckk.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/hermes.png"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/under.jpeg"> 
      <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/css/js/imgs/ver.png">  

    
    
    
    </div> 





  </section>
  <section id="new" class="w-100">
    <div class="row p-0 m-0">
      <div class=" one col-lg-4 col-sm-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/css/js/imgs/nikk.webp">
         <div class="details">
           <h2>  awesome shoes</h2> 
           <a href="shop.php">  <button class=" text-uppercase"> shop now  </button></a>
          
          
          </div> 


      </div>

      <div class=" one col-lg-4 col-sm-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/css/js/imgs/jacket.jpeg">
         <div class="details">
           <h2> awesome  jacket </h2> 
           <a href="shop.php"> <button class=" text-uppercase"> shop now  </button></a>
          
          
          </div> 

      </div>
      <div class=" one col-lg-4 col-sm-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/css/js/imgs/hermessc.jpeg">
         <div class="details">
           <h2> awesome  sandale </h2> 
           <a href="shop.php"> <button class=" text-uppercase"> shop now  </button></a>
          
          
          </div> 

      </div> 
</div>

</section>
<section id="new" class="w-100">
<div class="row p-0 m-0">
      <div class=" two col-lg-4 col-sm-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/css/js/imgs/tshirt.webp">
         <div class="detail">
           <h2> awesome  tchirt  </h2> 
           <a href="shop.php"> <button class=" text-uppercase"> shop now  </button></a>
          
          
          </div> 

      </div>
      <div class=" two col-lg-4 col-sm-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/css/js/imgs/bag.webp">
         <div class="detail">
           <h2> awesome  bag </h2> 
           <a href="shop.php">   <button class=" text-uppercase"> shop now  </button></a>
          
          
          </div> 

      </div>

      <div class=" two col-lg-4 col-sm-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/css/js/imgs/ckw.jpeg">
         <div class="detail">
           <h2> 50% off watches </h2> 
           <a href="shop.php"> <button class=" text-uppercase"> shop now  </button></a>
          
          
          </div> 

      </div>



      
    </div> 
  </section>

     <!--banner-->
      <section id="banner" class="my-5 py-5" > 
      <div class=" container">
        <h4> MID SEASON'S SALE  </h4>
         <h1> SUMMER COLLECTION<br> UP TP  30%OFF  </h1>
         <a href="shop.php">  <button class="text-uppercase">shop now  </button></a>
      
      </div>
      </section>
<section id="featured" class="my-5 pb-5">
     <div class=" container text-center mt-5 py-5">
      <h3> our featured</h3>
      <hr> 
      <p> here you can check out our featured products </p>
     </div> 


     <div class="row mx-auto container-fluid"> 
      <?php include('get_featured_product.php');?>
       <?php
       while($row=$featured_product->fetch_assoc()){

       ?>



        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
       <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row ['product_image'];?>">
       <div class="star"> 
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>

      </div>
       <h5 class="p-name"><?php echo $row ['product_name'];?> </h5>
       <h4 class="p-price"><?php echo $row ['product_price'];?>DA</h5>
       <a href="<?php echo "single_product.php?product_id=". $row ['product_id'];?>" ><button class="buy-btn">buy now  </button><a>
       </div> 

     
       <?php }
        ?>
      
      </div> 
</section>
 <!--clothes --> 
 <section id="clothes" class="my-5 ">
  <div class=" container text-center mt-5 py-5">
    <h3> dresses & tshirts </h3>
    <hr> 
    <p> here you can check out our amazing  dresses and  clothes </p>
  </div> 
   <div class="row mx-auto container-fluid"> 
   <?php include('get_coats.php');?>
       <?php
       while($row=$coats_product->fetch_assoc()){

       ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row ['product_image'];?>">
     <div class="star"> 
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>

    </div>
     <h5 class="p-name"><?php echo $row ['product_name'];?> </h5>
     <h4 class="p-price"> <?php echo $row ['product_price'];?> DA</h5>
     <a href=" <?php echo "single_product.php?product_id=". $row ['product_id'];?>" ><button class="buy-btn">buy now  </button><a>
    </div> 

     <?php } ?>
      
   
    
   </div> 
</section>
 <!--watches -->
 <section id="watches" class="my-5 ">
 <div class=" container text-center mt-5 py-5">
   <h3>  our watches </h3>
    <hr> 
    <p> here you can check out our  collection of watches  </p>
  </div> 
   <div class="row mx-auto container-fluid"> 
   <?php include('get_watches.php');?>
       <?php
       while($row=$watches->fetch_assoc()){

       ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
    <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row ['product_image'];?>">
     <div class="star"> 
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>
      <i class="fas fa-star"> </i>

    </div>
     <h5 class="p-name"><?php echo $row ['product_name'];?> </h5>
     <h4 class="p-price"> <?php echo $row ['product_price'];?>DA</h5>
     <a href=" <?php echo "single_product.php?product_id=". $row ['product_id'];?>" ><button class="buy-btn">buy now  </button><a>
    </div> 

     <?php } ?>
       </div>
 </section>

   
 <!--shoes-->
 <section id="shoes" class="my-5 ">
  <div class=" container text-center mt-5 py-5">
    <h3>  our shoes </h3>
    <hr> 
     <p> here you can check out our amazing shoes </p>
     </div> 
   <div class="row mx-auto container-fluid"> 
    
   <?php include('get_shoes.php');?>
       <?php
       while($row=$shoes->fetch_assoc()){

       ?>



        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
       <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row ['product_image'];?>"> 
       <div class="star"> 
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>

      </div>
       <h5 class="p-name"><?php echo $row ['product_name'];?> </h5>
       <h4 class="p-price"><?php echo $row ['product_price'];?>DA</h5>
       <a href="<?php echo "single_product.php?product_id=". $row ['product_id'];?>" ><button class="buy-btn">buy now  </button><a>
       </div> 

     
       <?php }
        ?>
    
   </div> 
 </section>


 <section id="bags" class="my-5 pb-5">
     <div class=" container text-center mt-5 py-5">
      <h3> our bags</h3>
      <hr> 
      <p> here you can check out  our trendy bags </p>
     </div> 


     <div class="row mx-auto container-fluid"> 
      <?php include('get_bags.php');?>
       <?php
       while($row=$bags->fetch_assoc()){

       ?>



        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
       <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row ['product_image'];?>">
       <div class="star"> 
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>
        <i class="fas fa-star"> </i>

      </div>
       <h5 class="p-name"><?php echo $row ['product_name'];?> </h5>
       <h4 class="p-price"><?php echo $row ['product_price'];?>DA</h5>
       <a href="<?php echo "single_product.php?product_id=". $row ['product_id'];?>" ><button class="buy-btn">buy now  </button><a>
       </div> 

     
       <?php }
        ?>
      
      </div> 
</section>

  <?php include('footer.php');?>
