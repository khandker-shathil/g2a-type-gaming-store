<?php  
include_once "config.php";
include "functions.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="/Project/css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="/Project/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-md sticky" style="background-color: #15110c;">
        <div class="container">
            <a class="navbar-brand" href="/Project/index.php"><img height="55px" width="55px" src="/Project/img/G2A.com-Logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/games.php">Games</a>
                    </li>
                    <li>
                    <?php 
                        if(!isset($_SESSION['email'])){
                            echo "<a class='nav-link' href='/Project/php/login.php'>Login</a>";
                        } else{
                            echo "<a class='nav-link' href='/Project/php/logout.php'>Logout</a>";       
                        }
                    ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/cart.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <a href="customer_dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action active">Orders</a>
            </div>
            <div class="col-md-9">
                <!-- Main content area -->
                <h2>Your Orders:</h2>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered text-center">
                                    <?php
                                    global $conn;
                                    $useremail = $_SESSION['email'];

                                    $get_details = "SELECT * FROM users WHERE email = '$useremail'";
                                    $query = mysqli_query($conn, $get_details);

                                    // Check if the query was successful
                                    if ($query === false) {
                                        die("Error: Could not execute the query. " . mysqli_error($conn));
                                    }

                                    while ($row = mysqli_fetch_array($query)) {
                                        $user_id = $row['user_ip'];
                                        $orders_query = "SELECT * FROM orders WHERE user_ip = '$user_id'";
                                        $row_query = mysqli_query($conn, $orders_query);

                                        // Check if the query was successful
                                        if ($row_query === false) {
                                            die("Error: Could not execute the orders query. " . mysqli_error($conn));
                                        }

                                        $count_row = mysqli_num_rows($row_query);
                                        if ($count_row > 0) {
                                            while ($row = mysqli_fetch_array($row_query)){
                                                $pr_id = $row['product_id'];
                                                $pr_price = "SELECT * FROM product_info WHERE product_id='$pr_id'";
                                                $results_product = mysqli_query($conn, $pr_price);
                                                while ($row_pr_price = mysqli_fetch_array($results_product)) {
                                                    $price_array = array($row_pr_price['product_price']);
                                                    $pr_title = $row_pr_price['product_name'];
                                                    $pr_img = $row_pr_price['product_image'];
                                                    $pr_prc = $row_pr_price['product_price'];
                                                    $product_values = array_sum($price_array);  
                                                    ?>
                                                    <hr class="my-4">
                                                    <form method="post" action="">
                                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="/Project/php/uploads/<?php echo $pr_img ?>"class="img-fluid rounded-3" alt="">
                                                        </div>
                                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-black mb-0"><?php echo $pr_title ?></h6>
                                                        </div>
                                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">$ <?php echo $pr_prc ?></h6>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        } else {
                                            echo "<h2 class='text-center'>Zero Orders</h2>";
                                        }
                                    }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"?>
    <script>
        function redirect()
        {
        // Redirect to another page
        window.location.href= "http://localhost/Project/index.php";
        }
    </script>
</body>
</html>
