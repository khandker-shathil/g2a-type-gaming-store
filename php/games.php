<?php require_once "config.php"?>
<?php require_once "functions.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Game Store - Products</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <style>
		/* Custom CSS styles */
	</style> -->
    <!-- <link rel="stylesheet" href="Project/css/styles.css">
	<script>
	function addToCart(productId) {
    // Retrieve the user_id from the session (replace 'user_id' with the actual session variable name)
    var userId = '<?php echo $_SESSION['user_id']; ?>';

    // Create an XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Prepare the request URL
    var url = '/Project/php/add_to_cart.php';

    // Prepare the request parameters
    var params = 'product_id=' + productId + '&user_id=' + userId;

    // Set up the request
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Handle the response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Request completed successfully
            // You can perform additional actions here if needed
            alert('Product with ID ' + productId + ' added to the cart!');
        } else if (xhr.readyState === XMLHttpRequest.DONE) {
            // Request completed with an error
            // You can handle the error case here
            alert('An error occurred while adding the product to the cart.');
        }
    };

    // Send the request
    xhr.send(params);
}

</script> -->
</head>
<body>
    <?php include "header.php"?>
    <div class="container">
		<h1>Products</h1>
		<div class="row">
		 <!-- Fetching Datas --->
			<?php 
            getProduct();
            addingtoCart();?>
		</div>
	</div>
	<?php include "footer.php";?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



