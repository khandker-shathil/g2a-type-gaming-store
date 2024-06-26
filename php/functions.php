<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<?php

    require_once 'config.php';
    function display_data(){
        global $conn;
        $sql ="SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    function deletePro($id){
        global $conn;
        $sql = "DELETE FROM orders WHERE product_id='$id'";
        $result = mysqli_query($conn,$sql);
    }
    function display_product(){
        global $conn;
        $sql ="SELECT * FROM product_info;";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
    function getProduct(){
        global $conn;
    $select_query = "SELECT * FROM `product_info`";
    $result_query = mysqli_query($conn, $select_query);
    // Get the user email from the session
    $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : 'guest';

    if (mysqli_num_rows($result_query) > 0) {
        echo '<div class="container">';
        echo '<div class="row">';

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_des = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];


            echo '<div class="col-md-3">';
            echo '<div class="card mb-3">';
            echo '<img src="/Project/php/uploads/' . $product_image . '" class="card-img-top" alt="' . $product_name . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $product_name . '</h5>';
            // Truncate long description and add ellipsis
            $max_length = 15; // Maximum characters to display
            if (strlen($product_des) > $max_length) {
                $product_des = substr($product_des, 0, $max_length) . '...';
            }
            
            echo '<p class="card-text">' . $product_des . '</p>';
            // echo '<small class="text-muted">'.$product_price.'</small>';
            echo '<small class="text-muted"><a class="dollar-link" style="font-weight: bold; color: green;">$' . $product_price . '</a></small>';
            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<div class="btn-group">';
            // add cart
            echo '<a href="/Project/php/games.php?add_to_cart=' . $product_id . '" class="btn btn-primary"> Add to Cart </a>';
            echo '<a href="/Project/php/product_view.php?product_id=' . $product_id . '" class="btn btn-secondary"> View Details </a>';
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

function car_image() {
    global $conn;

    $select_query = "SELECT product_image FROM product_info";
    $result_query = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result_query) > 0) {
        echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
        echo '<ol class="carousel-indicators">';

        $firstImage = true;
        $indicatorIndex = 0;

        while ($row = mysqli_fetch_assoc($result_query)) {
            $productImage = $row['product_image'];
            $activeClass = $firstImage ? 'active' : '';
            echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $indicatorIndex . '" class="' . $activeClass . '"></li>';

            $firstImage = false;
            $indicatorIndex++;
        }

        echo '</ol>';
        echo '<div class="carousel-inner">';

        mysqli_data_seek($result_query, 0); // Reset the result set pointer

        $firstImage = true;

        while ($row = mysqli_fetch_assoc($result_query)) {
            $productImage = '/Project/php/uploads/' . $row['product_image'];
            $activeClass = $firstImage ? 'active' : '';

            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '<img class="d-block w-100" src="'.$productImage . '" alt="Product Image"style="width: 500px; height: 500px;">';
            echo '</div>';

            $firstImage = false;
        }

        echo '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">';
        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">';
        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }
}

function getProductRan() {
    global $conn;
    $select_query = "SELECT * FROM `product_info` ORDER BY RAND() LIMIT 0,9";
    $result_query = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result_query) > 0) {
        echo '<div class="container">';
        echo '<div class="row">';

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_des = $row['product_description'];
            $product_image = $row['product_image'];
            $product_price = $row['product_price'];

            echo '<div class="col-md-3">';
            echo '<div class="card mb-3">';
            echo '<img src="/Project/php/uploads/' . $product_image . '" class="card-img-top" alt="' . $product_name . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $product_name . '</h5>';
            // Truncate long description and add ellipsis
            $max_length = 15; // Maximum characters to display
            if (strlen($product_des) > $max_length) {
                $product_des = substr($product_des, 0, $max_length) . '...';
            }
            
            echo '<p class="card-text">' . $product_des . '</p>';
            echo '<small class="text-muted"><a class="dollar-link" style="font-weight: bold; color: green;">$' . $product_price . '</a></small>';
            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<div class="btn-group">';
            // add cart
            echo '<a href="/Project/index.php?add_to_cart=' . $product_id . '" class="btn btn-sm btn-outline-secondary"> Add to Cart </a>';
            echo '<a href="/Project/php/product_view.php?product_id=' . $product_id . '" class="btn btn-sm btn-outline-secondary"> View Details </a>';
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

    function details(){
        global $conn;
        if (isset($_GET['product_id'])){
            $product_id=$_GET['product_id'];
            $select_query="SELECT * FROM `product_info` WHERE product_id=$product_id";
                    $result_query=mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_name=$row['product_name'];
                        $product_des=$row['product_description'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];
                       
                        echo "
                        <div class='card mb-3 '>
                            <img src='/Project/php/uploads/$product_image' class='card-img-top img-fluid' alt='$product_name'>
                        <div class='card-body' style='height: 200px;'>
                            <h5 class='card-title'>$product_name</h5>
                            <p class='card-text' style='max-height: 150px; overflow: auto;'>$product_des</p>
                        </div>
                        <div class='btn-group'>
                            <a href='/Project/php/product_view.php?add_to_cart=$product_id' class='btn btn-sm btn-outline-secondary'> Add to Cart</a>
                            </div><br>
                            <small class='text-muted'><a class='dollar-link' style='font-weight: bold; color: green;'>$". $product_price ."</a></small>
                        </div>
                        </div>
                        ";
                                
                    }
        }

    }
    function getIP(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
function srch(){
    global $conn;
    if (isset($_GET['search_btn'])) {
        $value_filter = $_GET['filter_value'];
        // $query = "SELECT * FROM product_info WHERE product_name LIKE '%$value_filter%'";
        $query = "SELECT * FROM product_info WHERE product_name LIKE '%$value_filter%' OR product_description LIKE '%$value_filter%'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            while ($row_pro = mysqli_fetch_array($query_run)) {
                $pr_id = $row_pro['product_id'];
                $pr_name = $row_pro['product_name'];
                $pr_image = $row_pro['product_image'];
                // $pr_des = $row_pro['product_description'];
                $pr_price = $row_pro['product_price'];

                echo '
                <div class="col-md-4">
                <div class="card mb-4">
                <img class="card-img-top" height="200px" width="350px" src="/Project/php/uploads/'.$pr_image.'" alt="'.$pr_name.'">
                <div class="card-body">
                <h5 class="card-title">'.$pr_name.'</h5>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <a href="/Project/index.php?add_to_cart=' .$pr_id.'"class="btn btn-sm btn-outline-secondary"> Add to Cart </a>
                <a href="/Project/index.php" class="btn btn-sm btn-outline-secondary">Clear</a>
                </div>
                <small class="text-muted">'.$pr_price.'</small>
                </div>
                </div>
                </div>
                </div>';
            }
        } else {
            echo "<p>No results found.</p>";
        }
    }
}
function registerFunction(){
global $conn;
if (isset($_POST['submit'])) {
  $ip = getIP();
  $username = $_POST['uname'];
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $passwords = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $pass = password_hash($passwords, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  // Prepare statement
  $stmt = $conn->prepare("INSERT INTO users (user_name, email, user_password, user_ip, fname, lname) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $username, $email, $pass, $ip, $firstname, $lastname);

  if ($stmt->execute()) {
    //echo "New record created successfully";
    header("location:login.php");
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
  $conn->close();
}
}

function addingtoCart() {
    if(isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_add = getIP();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM orders WHERE user_ip='$get_ip_add' AND product_id='$get_product_id'";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in the cart')</script>";
            echo "<script>window.open('', '_self')</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO orders (product_id, user_ip) VALUES (?, ?)");
            $stmt->bind_param("ss", $get_product_id, $get_ip_add);
            
            if ($stmt->execute()) {
                echo "<script>alert('Item is added to the cart')</script>";
                echo "<script>window.open('', '_self')</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            $stmt->close();
            $conn->close();
        }
    }
}
function cartDetails() {
    global $conn;
    $get_ip_add = getIP();
    
    // Check if add_to_cart is set in the URL
    if(isset($_GET['add_to_cart'])) {
        $get_product_id = $_GET['add_to_cart'];
    } else {
        // If add_to_cart is not set, just fetch the cart details for the user IP
        $get_product_id = null;
    }

    $select_query = "SELECT * FROM orders WHERE user_ip='$get_ip_add'";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);

    echo $num_of_rows;
}

function totalPrice(){
    global $conn;
    $total=0;
    $get_ip=getIP();
    $query="SELECT * FROM orders WHERE user_ip='$get_ip'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){
        $pr_id=$row['product_id'];
        $pr_price="SELECT * FROM product_info WHERE product_id='$pr_id'";
        $results_product=mysqli_query($conn,$pr_price);
        while($row_pr_price=mysqli_fetch_array($results_product)){
            $price_array=array($row_pr_price['product_price']);
            $product_values=array_sum($price_array);
            $total+= $product_values;
        }
    }    
    echo  $total;
}
function remove_product()
{
  global $conn;
  if (isset($_POST['remove_cart'])) {
    foreach($_POST['removeitem'] as $remove_id) {
      echo $remove_id;
      $delete_query = "DELETE FROM orders WHERE product_id='$remove_id'";
      $run_query = mysqli_query($conn, $delete_query);
      if ($run_query) {
        echo "<script>window.open('/Project/php/cart.php','_self')</script>";
      }
    }
  }
}
?>