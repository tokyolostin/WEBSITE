<?php
session_start();
include('connection.php');

// Retrieve the total order price from the form if payment button is clicked
if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $total_order_price = $_POST['order_total_price']; // Corrected variable name
}
?>

<?php include('header.php');?>

<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5 "> 
        <h2 class="form-weight-bold">Payment</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container text-center">
        <?php if(isset($total_order_price) && $total_order_price != 0){ ?>
            <p>Total payment: <?php echo $total_order_price; ?>DA</p> <!-- Use $total_order_price variable -->
            <input class="btn btn-primary" type="submit" value="Pay Now"/>
        <?php } elseif (isset($order_status) && $order_status == "not paid") { ?> 
            <p>Total payment: $<?php echo $total_order_price; ?>DA</p> <!-- Use $total_order_price variable -->
            <input class="btn btn-primary" type="submit" value="Pay Now"/>
        <?php } else { ?>
            <p>You don't have an order</p>
        <?php } ?>
    </div>
</section>

<?php include('footer.php');?>
