<?php
include('connection.php');

// Check if the form is submitted and order_id is set
if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
    // Retrieve the order_id from the form
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];
    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();

    // Get the result of the query
    $order_details = $stmt->get_result();
    // Calculate total order price
    $total_order_price = calculateTotalOrderPrice($order_details);
} else {
    // If form is not submitted or order_id is not set, redirect to account.php
    header('location: account.php');
    exit; // Add exit to prevent further execution
}

function calculateTotalOrderPrice($order_details){
    $total = 0;
    // Loop through each order item to calculate the total
    while($row = $order_details->fetch_assoc()) {
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];
        $total += $product_price * $product_quantity;
    }
    return $total;
}
?>

<?php include('header.php');?>

<section class="orders container my-5 py-5"> 
    <div class="container mt-5"> 
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">
    </div>
    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>PRODUCT</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
        </tr>
        <?php foreach($order_details as $row) { ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/css/js/imgs/<?php echo $row['product_image']; ?>">
                        <p class="mt-3"><?php echo $row['product_name']; ?></p>
                    </div>
                </td>
                <td>
                    <span><?php echo $row['product_price']; ?></span>
                </td>
                <td>
                    <span><?php echo $row['product_quantity']; ?></span>
                </td>
                <td>
                    <form>
                        <input class="btn order-details-btn" type="submit" value="Details">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php if($order_status == "not paid") { ?>
        <div style="float: right;">
            <p>Total: <?php echo $total_order_price; ?></p>
            <form method="POST" action="payment.php">
                <input type="hidden" name="order_total_price" value="<?php echo $total_order_price; ?>">
                <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
                <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now">
            </form>
        </div>
    <?php } ?>
</section>

<?php include('footer.php');?>
