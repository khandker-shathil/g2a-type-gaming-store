<?php session_start();
require_once "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>G3A</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="/Project/css/1.css">
</head>
<body>
<?php 
if (!isset($_SESSION['email'])) {
    // Redirect to login.php
    // echo "<script>window.open('/Project/php/login.php','_self')</script>";
    include('login.php');
} else {
    // Include payment.php
    include('payment.php');
    // Redirect to checkout.php
    // echo "<script>window.open('checkout.php','_self')</script>";
}
?>
<?php echo"payment";?>
<?php
include "api.php";
include "functions.php";
?>
<form action="submit.php" method="post">
<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="<?php echo"pk_test_51N9uIBFHo9sbzk9qiG2nfO64NezTDXlgCXKq982IEdONj7VSOKRmGRYZkEChcMyyh1qWy7dCG7a8LoxW9N6HGmXq00yJwGfOtI"?>"
data-amount= "$sql3"
data-currency="usd"
data-locale="auto">
</script>
</form>
<!-- <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="<?php echo"pk_test_51N9uIBFHo9sbzk9qiG2nfO64NezTDXlgCXKq982IEdONj7VSOKRmGRYZkEChcMyyh1qWy7dCG7a8LoxW9N6HGmXq00yJwGfOtI"?>"
data-amount= "$sql3"
data-currency="usd"
data-locale="auto">
</script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>
