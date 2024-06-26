<?php
require_once "stripe-php-master/init.php";

$stripedetails=array(
$publishableKey=>"pk_test_51N9uIBFHo9sbzk9qiG2nfO64NezTDXlgCXKq982IEdONj7VSOKRmGRYZkEChcMyyh1qWy7dCG7a8LoxW9N6HGmXq00yJwGfOtI",
$secretKey=>"sk_test_51N9uIBFHo9sbzk9qGiWCkRaz5psvcMaaHfC6cMTmNpWvvRpa8gg1xxZ0kzT7g0qS3rxHc1DAFFh3eRXvYvUbZlNX00WwHACFmh",
\Stripe\Stripe::setApiKey($secretKey));

?>