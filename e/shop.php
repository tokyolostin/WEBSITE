<?php
include('connection.php');

if (isset($_POST['search'])) {
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=?");
    $stmt->bind_param("si", $category, $price);
    $stmt->execute();
    $products = $stmt->get_result();
} elseif (isset($_GET['page_no']) && $_GET['page_no']!= "") {
    $page_no = $_GET['page_no'];
    $stmt1 = $conn->prepare("SELECT count(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 1;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacent = "2";
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page  ");
    $stmt2->execute();
    $products = $stmt2->get_result();
} else {
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $products = $stmt->get_result();
}
?>


 



 
 <?php include ('header.php'); ?>
 
 
 <section id="featured" class="my-5 pb-5">
     <div class=" container text-center mt-5 py-5">
            <h3>Our products</h3>
            <hr> 
            <p>Here you can check out our products</p>
        </div> 
        <div class="row mx-auto container-fluid"> 
            <?php
            while($row = $products->fetch_assoc()) {
            ?>
            <div onclick="window.location.href='single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/css/js/imgs/<?php echo $row['product_image'];?>">
                <div class="star"> 
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name'];?></h5>
                <h4 class="p-price"><?php echo $row['product_price'];?></h5>
                <button class="buy-btn">
                <a class="buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id'];?>">Buy now</a>
                </button>
            </div>
            <?php } ?>
   
   

                                 
                                     
              
            <nav aria-label="Page navigation example" class="mx-auto">
    <ul class="pagination mt-5 mx-auto">
        <li class="page-item <?php if ($page_no <= 1) {echo 'disabled';} ?>">
            <a class="page-link" href="<?php if ($page_no <= 1) {echo '#';} else {echo "?page_no=".($page_no-1);} ?>">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
        <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
        <?php if ($page_no >= 3) { ?>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>
        <?php } ?>
        <li class="page-item <?php if ($page_no >= $total_no_of_pages) {echo 'disabled';} ?>">
            <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {echo '#';} else {echo "?page_no=".($page_no+1);} ?>">Next</a>
        </li>
    </ul>
</nav>


         </div> 
       </section>



  
       <section id="featured" class="my-5 pb-5">
     <div class=" container text-center mt-5 py-5">
          <h3> search product</h3>
          <hr> 
        </div> 
         <div class="row mx-auto container"> 
          <div class=" col-lg-12 col-md-12 col-sm-12">
 
         </div> 
         <form action="shop.php" method="POST">
    <div class="row mx-auto container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <p>Category</p>
            <div class="form-check">
                <input class="form-check-input" value="shoes" type="radio" name="category" id="category-one" <?php if(isset($category) && $category == 'shoes'){echo 'checked';}?>>
                <label class="form-check-label" for="category-one">Shoes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="coats" type="radio" name="category" id="category-two" <?php if(isset($category) && $category == 'coats'){echo 'checked';}?>>
                <label class="form-check-label" for="category-two">Coats</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="watches" type="radio" name="category" id="category-three" <?php if(isset($category) && $category == 'watches'){echo 'checked';}?>>
                <label class="form-check-label" for="category-three">Watches</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" value="bags" type="radio" name="category" id="category-four" <?php if(isset($category) && $category == 'bags'){echo 'checked';}?>>
                <label class="form-check-label" for="category-four">Bags</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>Price</p>
            <input type="range" class="form-range w-50" name="price" min="1" max="1000" id="customRange2">
            <div class="w-50">
                <span style="float: left;">1 </span>
                <span style="float: right;">1000 </span>
            </div>
        </div>
    </div>
    <div class="form-group my-3 mx-3"id="search">
        <input type="submit" class="btn btn-primary" value="Search" name="search">
    </div>
</form>

          
        </section>
 <?php  include("footer.php");?>  