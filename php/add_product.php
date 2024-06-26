<?php 
@session_start();
include_once "config.php";

// Check if the form was submitted
if (isset($_POST['addProductForm'])) {
    // Get the product data from the form
    $pr_name = $_POST['productName'];
    $pr_price = $_POST['productPrice'];
    $pr_image = $_FILES['productImage']['name'];
    $temp_image = $_FILES['productImage']['tmp_name'];
    $pr_des = $_POST['productDescription'];

    // Check if any of the fields are empty
    if ($pr_name == '' || $pr_image == '' || $pr_des == '') {
        echo "<script>alert('Fill up the necessary fields')</script>";
        exit();
    }

    // Move the uploaded file to the uploads folder
    move_uploaded_file($temp_image, "./uploads/$pr_image");

    // Insert the product into the database
    $insert_product = "INSERT INTO product_info (product_name, product_description, product_image, product_price) VALUES ('$pr_name', '$pr_des', '$pr_image', '$pr_price')";
    $result = mysqli_query($conn, $insert_product);

    // Check if the query was successful
    if ($result) {
        echo "<script>alert('Product added successfully!')</script>";
    } else {
        echo "<script>alert('Error adding product!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/1.css">
</head>
<body>
    <?php include "header.php"; ?>
    <!-- Main content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <a href="seller_dashboard.php" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="" class="list-group-item list-group-item-action" id="add-product">Add Products</a>
                <a href="#" class="list-group-item list-group-item-action">Orders</a>
            </div>
            
            <div class="col-md-9">
                <!-- Main content area -->
                <h2>Welcome to your dashboard</h2>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h2>Add Product</h2>
                                    <form id="addProductForm" method="POST" enctype="multipart/form-data">
                                        <input type="text" name="productName" id="productName" placeholder="Product Name" class="form-control" required><br>
                                        <input type="text" name="productPrice" id="productPrice" placeholder="Product Price" class="form-control" required><br>
                                        <textarea name="productDescription" id="productDescription" placeholder="Product Description" class="form-control" rows="6"></textarea><br>
                                        <input type="file" name="productImage" id="productImage" accept="image/*" required><br><br>
                                        <button type="submit" name="addProductForm">Add Product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script>
        function redirect()
        {
            // Redirect to another page
            window.location.href= "http://localhost/Project/index.php";
        }
    </script>
</body>
</html>
