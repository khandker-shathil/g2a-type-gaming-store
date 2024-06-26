<?php 
@session_start();
include_once "config.php";
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project/css/1.css">
    <!-- Commented out scripts -->
</head>
<body>
    <nav class="navbar navbar-expand-md" style="background-color: #15110c;">
        <div class="container">
            <a class="navbar-brand" href="/Project/index.php"><img height="55px" width="55px" src="/Project/img/G2A.com-Logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <form class="form-inline my-2 my-lg-0 mr-auto action" action="" method="get">
                    <input class="form-control me-2" name="filter_value" type="search" aria-label="Search" placeholder="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="search_btn" value="Search">Search</button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/games.php">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/registration_form.php">Register</a>
                    </li>
                    <li>
                    <?php 
                        if (!isset($_SESSION['email'])) {
                            echo "<a class='nav-link' href='/Project/php/login.php'>Login</a>";
                        } else {
                            echo "<a class='nav-link' href='/Project/php/logout.php'>Logout</a>";       
                        }
                    ?>
                    </li>
                    <li>
                    <?php 
                        if (isset($_SESSION['email'])) {
                            echo "<a class='nav-link' href='/Project/php/customer_dashboard.php'>Profile</a>";
                        }
                    ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/cart.php">Cart</a>
                    </li>
                    <li class="nav-item"><?php if ($_SERVER['PHP_SELF'] === '/Project/php/cart.php') { cartDetails(); } ?></li>
                    <li class="nav-item"><?php if ($_SERVER['PHP_SELF'] === '/Project/php/cart.php') { totalPrice(); } ?></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/Project/php/seller_dashboard.php">Seller Dashboard</a>
                          <a class="dropdown-item" href="/Project/html/bestsellers.html">BestSellers</a>
                          <a class="dropdown-item" href="/Project/html/trendingproducts.html">Trending</a>
                        </div>
                    </li>
                    <?php if ($_SERVER['PHP_SELF'] === '/Project/index.php') {
                        echo "<li class='nav-item'><a class='nav-link' href='/Project/php/about.php'>About</a></li>";
                    } ?>
                    <li>
                        <span style="color: red;">
                            <?php 
                                global $conn; // Establish your database connection
                                if (isset($_SESSION['email'])) {
                                    $name = $_SESSION['email'];
                                    $q = "SELECT fname FROM users WHERE email='$name'";
                                    $fetch = mysqli_query($conn, $q);
                                    $res = mysqli_fetch_assoc($fetch);
                                    if ($res) {
                                        $q1 = $res['fname'];
                                        echo "Welcome " . $q1;
                                    }
                                } else {
                                    echo "Welcome Guest";
                                }
                            ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
