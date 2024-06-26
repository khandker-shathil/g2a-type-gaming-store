<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn) {
    echo "Connection successful!";
} else {
    echo "Connection failed!";
}

// Check if the form was submitted
if (isset($_POST['addProductForm'])) {

    // Get the product data from the form
    $pr_name = $_POST['productName'];
    // $pr_price = $_POST['productPrice'];
    $pr_image = $_FILES['productImage']['name'];
    $temp_image = $_FILES['productImage']['tmp_name'];
    $pr_des = $_POST['productDescription'];
    $uploads = 'php/uploads';

    // Check if any of the fields are empty
    if ($pr_name == '' || $pr_image == '' ||  $pr_des == '') {
        echo "<script>alert('Full up the necessary fields')</script>";
        exit();
    }

    // Move the uploaded file to the uploads folder
    move_uploaded_file($temp_image, "$uploads/$pr_image");

    // Insert the product into the database
    $insert_product = "INSERT INTO `product_info` (product_name, product_description, product_image) VALUES ('$pr_name', '$pr_des', '$pr_image')";
    $result = mysqli_query($conn, $insert_product);

    // Check if the query was successful
    if ($result) {
        echo "<script>alert('Product added successfully!')</script>";
    } else {
        echo "<script>alert('Error adding product!')</script>";
    }
}

// Close the connection to the database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<body>
<form id="addProductForm" method="POST" enctype="multipart/form-data">
<input type="text" name="productName"  placeholder="Product Name" required><br>
<!-- <input type="text" name="productPrice" id="productPrice" placeholder="Product Price" required><br> -->
<textarea name="productDescription"  placeholder="Product Description"></textarea><br>
<input type="file" name="productImage"  accept="image/*" required><br>
<button type="submit" name="addProductForm">Add Product</button>
</form>
</body>
</html>
