<?php
session_start();
include_once "config.php";
include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <style>
    /* CSS styles here */
    </style>
</head>
<body>
<?php include "header.php";?>

<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                  </div>
                  <!-- PHP start -->
                  <?php
                  global $conn;
                  $total = 0;
                  $get_ip = getIP();
                  $query = "SELECT * FROM orders WHERE user_ip='$get_ip'";
                  $result = mysqli_query($conn, $query);
                  $row_result =mysqli_num_rows($result);
                  if($row_result>0){
                  while ($row = mysqli_fetch_array($result)) {
                    $pr_id = $row['product_id'];
                    $pr_price = "SELECT * FROM product_info WHERE product_id='$pr_id'";
                    $results_product = mysqli_query($conn, $pr_price);
                    while ($row_pr_price = mysqli_fetch_array($results_product)) {
                      $price_array = array($row_pr_price['product_price']);
                      $pr_title = $row_pr_price['product_name'];
                      $pr_img = $row_pr_price['product_image'];
                      $pr_prc = $row_pr_price['product_price'];
                      $product_values = array_sum($price_array);//Total Price Calculate
                      $total += $product_values; //
                      ?>
                      <hr class="my-4">
                      <form method="post" action="">
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img src="/Project/php/uploads/<?php echo $pr_img ?>"class="img-fluid rounded-3" alt="">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <h6 class="text-black mb-0"><?php echo $pr_title ?></h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h6 class="mb-0">$ <?php echo $pr_prc ?></h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="removeitem[]" value="<?php echo $pr_id ?>">
                            <label class="form-check-label text-danger">Remove</label>
                            </div>
                        </div>
                      </div>
                  <?php
                      }
                    }
                  } else {echo"<h2 class='text-center'>Zero Orders</h2>";}
                  ?>
                  <?php 
                   $total = 0;
                   $get_ip = getIP();
                   $query = "SELECT * FROM orders WHERE user_ip='$get_ip'";
                   $result = mysqli_query($conn, $query);
                   $row_result =mysqli_num_rows($result);
                   if($row_result>0){
                   echo' <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <input type="submit"  class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart"><br>
                    </div>
                    </form>';
                  }
                  ?>
                  <?php remove_product(); ?>
                  <div class="pt-5">
                    <h5 class="mb-0"><a href="/Project/index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Total Items in Cart: <?php cartDetails()?></h5>
                  </div>
                  <hr class="my-4">
                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>$ <?php totalPrice(); ?></h5>
                  </div>
                  <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark"><a class="text-decoration-none" href="/Project/php/checkout.php">checkout</a></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include "footer.php";?>
</body>
</html>
