<?php echo"payment";?>
<?php
include "api.php";
include "functions.php";
?>
<form action="submit.php" method="post">
<script 
src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="<?php echo"pk_test_51N9uIBFHo9sbzk9qiG2nfO64NezTDXlgCXKq982IEdONj7VSOKRmGRYZkEChcMyyh1qWy7dCG7a8LoxW9N6HGmXq00yJwGfOtI"?>"
data-amount= "$sql3"
data-currency="usd"
data-locale="auto">
</script>
</form>