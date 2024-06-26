
<!DOCTYPE html>
<html>
<head>
	<title>G3A</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Project/css/styles.css">
    <link rel="stylesheet" href="css/1.css">
</head>
<body>
	<nav class="navbar navbar-expand-md" style="background-color: #15110c;">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img height="55px" width="55px" src="img/G2A.com-Logo.jpg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <form class="form-inline my-2 my-lg-0 mr-auto"  method="get"  >
                    <input class="form-control me-2" name="filter_value" type="search" id="search"  aria-label="Search"placeholder="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search_btn" value="Search">Search</button>
                </form>
               
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/games.php">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/registration_form.php">Register</a>
                    </li>
                    <li>
                    <?php 
                        if(!isset($_SESSION['email'])){
                            echo "<a class='nav-link' href='/Project/php/login.php'>Login</a>";
                        } else{
                            echo "<a class='nav-link' href='/Project/php/logout.php'>Logout</a>";       
                        };
                    ?>
                    </li>
                    <li>
                    <?php 
                        if(isset($_SESSION['email'])){
                            echo "<a class='nav-link' href='/Project/php/customer_dashboard.php'>Profile</a>";
                        };
                    ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/cart.php">Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/Project/php/seller_dashboard.php">Seller Dashboard</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/about.php">About</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">


		<h1>Products</h1>
        <br>
		<div class="row">
		<?php
          
          // Connect to the database
          $servername = "localhost";
          $username = "root";
          $password = "root";
          $dbname = "project";
          
          $conn = mysqli_connect($servername, $username, $password, $dbname);
          
          // Check if the connection was successful
          if ($conn) {
          } else {
              echo "Connection failed!";
          }
          
          
            if (isset($_GET['search_btn'])) {
                $value_filter = $_GET['filter_value'];
                $query = "SELECT * FROM product_info WHERE product_name  LIKE '%$value_filter%'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) 

                echo '<div class="container">';
                echo '<div class="row">';

    {
                    while ($row_pro = mysqli_fetch_assoc($query_run)) {
                        $pr_name = $row_pro['product_name'];
                        $pr_price = $row_pro['product_price'];
                        $pr_image = $row_pro['product_image'];
                        $pr_des = $row_pro['product_description'];
                        $product_id=$row_pro['product_id'];


 
                        echo '<div class="col-md-3">';
                        echo '<div class="card mb-3" style="height:400px;">';
    
                        echo '<img src="Project/php/uploads/' . $pr_image . '" class="card-img-top" alt="' . $pr_name . '">';

                        echo '<div class="card-body">';
                        echo '<h5 class="card-title"style="margin-top:150px;">' . $pr_name . '</h5>';
                        // Truncate long description and add ellipsis
                        $max_length = 15; // Maximum characters to display
                        if (strlen($pr_des) > $max_length) {
                            $pr_des = substr($pr_des, 0, $max_length) . '...';
                        }
                        
                        echo '<p class="card-text"style="margin-top:30px;">' . $pr_des . '</p>';
                        echo '<small class="text-muted">'.$pr_price.'</small>';
                        echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="btn-group">';
                        echo '<button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>';
                        echo '<a href="Project/php/product_view.php?product_id=' . $product_id . '" class="btn btn-sm btn-outline-secondary"> View Details </a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
            
                    }
            
                    echo '</div>';
                    echo '</div>';
                }
                }
        ?>
        </div>
    </div>
   
    <?php include "footer.php";?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
