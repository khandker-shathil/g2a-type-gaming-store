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
    <title>Customer Dashboard</title>
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
                        };
                    ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
		<div class="row">
			<div class="col-md-3">
       			<a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
        		<a href="orders.php" class="list-group-item list-group-item-action">Orders</a>
			</div>
			<div class="col-md-9">
			<!-- Main content area -->
			<h2>Welcome to your dashboard</h2>
			<div class="container">
			<div class="row">
			<div class="col">
			<div class="card">
			<div class="card-body">
			<table class="table table-bordered text-center">
            <?php
             $email = $_SESSION["email"];
             $sql = "SELECT * FROM users WHERE email = '$email'";
             $result = $conn->query($sql);
             // Step 5: Check if there is one row returned
             if ($result->num_rows == 1) {
             // Step 6: Get the value of the column and display it
             $row = $result->fetch_array();
             if ( isset($_GET['user_name']) ) {
             $newAddress = $_GET['user_name'];
             $updateSql = "UPDATE users SET address = '$newAddress' WHERE email = '$email'";
             if ($conn->query($updateSql) === TRUE) {
             // Update successful, update the value in $row as well
             $row['user_name'] = $newAddress;
             }}
             }
            ?>
            <form action="edit_user.php" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control"><br>

            <label for="lname">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control"><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"  readonly><br>

            <label for="user_name">User Name:</label>
            <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" class="form-control"><br>
            <button  class="btn btn-sm btn-outline-secondary" type="submit">Update</button>
            </form>
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