


<?php
session_start();
include('connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: lo.php');
}
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

   

  




  

        

        .navbar-toggler {
            border-color: #fff; /* White color for the toggle button */
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 1.3rem;
            font-size:1.5rem;
            color: #333; /* White text */
        }

        .navbar-nav .nav-link:hover {
            color: violet; /* Light grey hover color */
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
            background-color: grey; /* Light grey background */
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
            color: violet;
        }

        .sidebar-heading {
            font-size: 0.75rem;
            text-transform: uppercase;
        }

        /* Main content */
        .main-content {
            margin-left: 240px; /* Adjust this value according to your sidebar width */
            background-color: #f8f9fa; /* Light grey background */
        }

        /* Table */
        .table {
            margin-top: 20px; /* Add some space above the table */
        }

        .table th,
        .table td {
            border-top: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Pagination */
        .pagination {
            justify-content: center; /* Center-align pagination links */
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column; /* Stack nav items vertically */
            }

            .navbar-toggler {
                order: -1; /* Place the toggle button at the beginning */
            }

            .sidebar,
            .main-content {
                width: 100%; /* Full width on small screens */
                padding-left: 0;
                padding-right: 0;
            }

            .main-content {
                margin-left: 0; /* Remove margin on small screens */
            }
        }
    
    </style>

  </head>
  <body>
  <header class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">

 
         <h2 class="brand"> BUY ME </h2>
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
                  <span data-feather="users" href="add_new_product.php"></span>
                Add new product 
                </a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="help.html">
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
        <div class="container">
            <p> id:<?php echo $_SESSION['admin_id'];?></p>
            <p> name:<?php echo $_SESSION['admin_name'];?></p>
            <p> email:<?php echo $_SESSION['admin_email'];?></p>


        

    














      </div>
    </main>
  </div>
</div>

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
