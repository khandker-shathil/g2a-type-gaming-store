<?php
include_once "config.php";

// Check if the necessary parameters are provided
if (isset($_POST['product_id']) && isset($_POST['user_id'])) {
    $productId = $_POST['product_id'];
    $userId = $_POST['user_id'];
    $orderId = $_POST['order_id'];
    $orderStatus = $_POST['order_status'];
    $orderTotal = $_POST['order_total'];

    // You can perform additional validation and security checks here if needed

    // Perform the database query to add the product to the cart
    $query = "INSERT INTO orders (product_id, user_id,) VALUES ('$productId', '$userId',)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Product added to the cart successfully
        // You can perform additional actions here if needed
        echo "Product added to the cart!";
    } else {
        // Error occurred while adding the product to the cart
        // You can handle the error case here
        echo "An error occurred while adding the product to the cart.";
    }
} else {
    // Required parameters are missing
    echo "Required parameters are missing.";
}

// Close the database connection
mysqli_close($conn);
?>
