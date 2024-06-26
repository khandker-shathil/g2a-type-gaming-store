<?php session_start();?>
<?php require_once('config.php');
		include "function";
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Navigation bar -->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="#">Admin Dashboard</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="/Project/index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Main content -->
	<div class="container my-5">
		<div class="row">
			<div class="col-md-3">
       			<a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
        		<a href="add_product.php" class="list-group-item list-group-item-action" id="add-product">Add Products</a>
        		<a href="#" class="list-group-item list-group-item-action">Orders</a>
			</div>
			<?php 
			$e = $_SESSION['email'];
			$n = "SELECT * FROM users WHERE email=$e";
			$u_n=mysqli_query($conn,$n);
			$r_n=mysqli_fetch_array($u_n);
			$name = $r_n['email'];
			?>
			<div class="col-md-9">
				<!-- Main content area -->
				<h2>Welcome to your dashboard</h2>
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="card">
								<div class="card-body">
									<table class="table table-bordered text-center">
										<tr class="bg-light">Name:</tr><br>
										<tr class="bg-light">Email:</tr><br>
										<tr class="bg-lgiht">First Name:</tr><br>
										<tr class="bg-light">Last Name:</tr><br>
										<tr class="bg-light"><?php echo "$name";?></tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
<!-- Bootstrap JavaScript -->
<!-- <script>
	$(document).ready(function() {
		// Add click event listener to the "Add Products" button in the sidebar
		$('#add-product').click(function(e) {
			e.preventDefault(); // Prevent default link behavior

			// Clear any existing content in the main content area
			$('.card-body').empty();

			// Append the HTML for the "Add Product" form to the main content area
			var addProductForm = `
				<div class="sidebar-widget">
					<h2>Add Product</h2>
					<form id="add-product-form" enctype="multipart/form-data">
						<input type="text" name="product_name" placeholder="Product Name"><br>
						<textarea name="product_description" placeholder="Product Description"></textarea><br>
						<input type="file" name="product_image"><br>
						<input type="submit" value="Submit">
					</form>
				</div>
			`;
			$('.card-body').append(addProductForm);

			// Submit form using AJAX when the "Submit" button is clicked
			$('#add-product-form').submit(function(e) {
				e.preventDefault(); // Prevent default form submission

				// Perform AJAX request to add the product
				$.ajax({
					url: 'add_product.php',
					type: 'POST',
					data: new FormData(this),
					processData: false,
					contentType: false,
					success: function(response) {
						// Handle success response (e.g., display success message)
						console.log('Product added successfully!');
					},
					error: function(xhr, status, error) {
						// Handle error response (e.g., display error message)
						console.error('Error adding product:', error);
					}
				});
			});
		});
	});
</script> -->
</body>
</html>
