<?php @session_start();?>
<?php
include_once "config.php";
include "functions.php";
global $conn;
if (isset($_POST['user_submit'])) {
    $ip = getIP();
    $email = $_POST['email'];
    $passwords = $_POST['password'];
    $passwords_utf8 = mb_convert_encoding($passwords, "UTF-8");
    $pass = password_hash($passwords_utf8, PASSWORD_BCRYPT);
    
    $email_search = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);
    $row_data=mysqli_fetch_assoc($query);

    $cart_search="SELECT * FROM orders WHERE user_ip='$ip'";
    $selec_order=mysqli_query($conn,$cart_search);
    $row_count=mysqli_num_rows($selec_order);
    
    if ($email_count>0) {
        $_SESSION['email']=$email;
        if (password_verify($passwords_utf8, $row_data['user_password'])) {
            // header("location:/Project/index.php");
            echo "<script>alert('Login Success')</script>";
            echo "<script>window.open('/Project/index.php','_self')</script>";
        } else {
            $_SESSION['email']=$email;
            echo "<script>alert('Login Success')</script>";
            //echo "<script>alert('Add a Payment Option')</script>";
        }
    } else {
        echo "<script>alert('Wrong Credentials.'); window.location.href = '/Project/php/login.php';</script>";
        // echo "<script>alert('Wrong Credentials.'); window.location.href = '".$_SERVER['PHP_SELF']."';</script>";
        // echo "<script>alert('Wrong Credentials.'); window.location.href = '_self';</script>";
        // echo "<script>window.open('/Project/php/login.php','_self')</script>";
    }
}
?>
