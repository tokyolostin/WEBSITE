<?php
session_start();
include('connection.php');

if (isset($_GET['order_id']))  {
    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $orders = $stmt->get_result();
} else if(isset($_POST['edit_order'])){
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
   
    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    $stmt->bind_param('si', $status, $order_id);
    if ($stmt->execute()) {
        header('location:dashboard.php?order_update=Order has been updated successfully');
        exit();
    } else {
        header('location:orders.php?order_failed=Error occurred, try again');
        exit();
    }
} else {
    header('Location: dashboard.php');
    exit(); // Stop further execution
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Edit Product - Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <style>
        /* Custom styles for the dashboard */
        /* Navbar */
        .navbar-brand {
            padding: 0.5rem 1rem;
            font-size: 1.25rem;
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.1);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link:hover {
            color: #007bff;
        }

        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        /* Main content */
        .main-content {
            margin-left: 240px; /* Adjust this value according to your sidebar width */
        }

        /* Table */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }
    </style>
</head>
<body>
<header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="dashboard.php?logout=1" id="logout-btn">Logout</a>
            <?php if(isset($_SESSION['logged_in'])) {?>
                <a class="nav-link" href="logout.php" id="logout-btn">Logout</a>
            <?php } ?>
        </li>
    </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">
                            <span data-feather=""></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit_order.php">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit_product.php">
                            <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminacc.php">
                            <span data-feather="bar-chart-2"></span>
                            Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add_new_product.php">
                            <span data-feather="users"></span>
                            Add New Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="help.htmls">
                            <span data-feather="layers"></span>
                            Help
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="main-content">
            <div class="container-fluid">
                <h1 class="h2">Edit orders</h1>
                <div class="table-responsive">
                <form id="edit-form"  method="POST" action="edit_order.php"> 
        <p style="color: red;"><?php if(isset($_GET['error'])) { echo $_GET['error']; }?></p>
        <?php foreach($orders as $order ){ ?>
            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
       
       
       
            <div class="form-group mt-2">
            <label>order id/label>
            <input type="text" class="form-control" id="order_id" name="order_id" placeholder="order id" value="<?php echo $order['order_id']; ?>">
        </div>
        <div class="form-group mt-2">
            <label>order price</label>
            <input type="text" class="form-control" id="order_price" name="price" placeholder="order price"  value="<?php echo $order['order_cost']; ?>">
        </div>
        <div class="form-group mt-2">
            <label>order date</label>
            <input  value="<?php  echo $order['order_date'];?>">
        </div>
        <div class="form-group mt-2">
            <label>order status </label>
            <select class="form-select" required name="status">
                <option value="not paid" <?php if($order['order_status']=='not paid'){ echo"selected"; } ?>>not paid</option>
                <option value="paid"<?php if($order['order_status']==' paid'){ echo"selected"; } ?>>paid</option>
                <option value="shipped"<?php if($order['order_status']=='shipped'){ echo"selected"; } ?>>shipped</option>
                <option value="delivered"<?php if($order['order_status']=='delivered'){ echo"selected"; } ?>>delivered</option>
            </select>
        </div>
      
        <div class="form-group mt-2">
            <input type="submit" class="btn btn-primary"  name="edit_order"   value="edit">
        </div>
        <?php } ?>
    </form>
     

                </div>
            </div>
        </main>
    </div>
</div>

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
