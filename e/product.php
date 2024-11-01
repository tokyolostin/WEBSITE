<?php
session_start();
include('connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: lo.php');
}
 ?>
 <?php
if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$stmt1 = $conn->prepare("SELECT count(*) As total_records FROM products");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();

$total_records_per_page = 10;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacent = "2";
$total_no_of_pages = ceil($total_records / $total_records_per_page);
$stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page ");
$stmt2->execute();
$products = $stmt2->get_result();
?>



 
<!doctype >
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

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
     <a class="nav-link" href="lo.php?logout==1" id="logout-btn">Logout</a>
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
                <a class="nav-link" href="dashboard.php">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                  <span data-feather="bar-chart-2"></span>
                Account
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_new_product.php">
                  <span data-feather="users"></span>
                Add new product 
                </a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                  <span data-feather="layers"></span>
               Help
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="main-content">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <h2>products</h2>
          <?php if(isset($_GET['edit_success_message'])){?>
           <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['edit_failure_message'])){?>
            <p class="text-center" style="color: red;"<?php echo $_GET['edit_failure_message'];?></p>
            <?php } ?>

            <?php if(isset($_GET['deleted_failure'])){?>
           <p class="text-center" style="color: red;"><?php echo $_GET['delete_failure']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['deleted_successfully'])){?>
           <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['product_created'])){?>
           <p class="text-center" style="color: green;"><?php echo $_GET['product_created']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['product_failed'])){?>
           <p class="text-center" style="color: red;"><?php echo $_GET['product_failed']; ?></p>
            <?php } ?>


                      <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                
                  <th scope="col">product id </th>
                  <th scope="col"> product image </th>
                  <th scope="col">product status </th>
                  <th scope="col"> product price </th>
                  <th scope="col"> product offer </th>
                  <th scope="col"> product  category </th>
                  <th scope="col">product color </th>
                  <th scope="col">edit  </th>
                  <th scope="col">delete </th>
                </tr>
              </thead>
              <tbody>
             
                <tbody>
                <?php foreach ($products as $product) { ?>
        <tr>
            <td><?php echo $product['product_id']; ?></td>
            <td>
    <img src="assets/css/js/imgs/<?php echo $product['product_image']; ?>" style="width: 70px; height: 70px;" alt="Product Image">
</td>
            <td><?php echo $product['product_name']; ?></td>
            <td><?php echo "$". $product['product_price']; ?></td>
            <td><?php echo $product['product_special_offer']."%"; ?></td>
            <td><?php echo $product['product_category']; ?></td>
            <td><?php echo $product['product_color']; ?></td>
            <td><a class="btn btn-primary" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>">Edit</a>
            <td><a class="btn btn-primary" href="delete_product.php?product_id=<?php echo $product['product_id']; ?>">delete</a></td>
        </tr>
    <?php } ?>

          </tbody>
        </table>

       
        <nav aria-label="Page navigation example" class="mx-auto">
        <ul class="pagination mt-5 mx-auto">
            <li class="page-item <?php if ($page_no <= 1) {echo 'disabled';} ?>">
                <a class="page-link" href="<?php if ($page_no <= 1) {echo '#';} else {echo "?page_no=".$page_no-1;} ?>">Previous</a>
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
    </main>
  </div>
</div>

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
