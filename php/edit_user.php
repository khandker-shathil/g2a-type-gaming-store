<?php
include_once "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $user_name = $_POST["user_name"];
    $email = $_SESSION["email"];

    // Update the user information in the database
    $updateSql = "UPDATE users SET fname = '$fname', lname = '$lname', user_name = '$user_name' WHERE email = '$email'";
    if ($conn->query($updateSql) === TRUE) {
        // Update successful
        echo "User information updated successfully.";
    } else {
        // Update failed
        echo "Error updating user information: ";
        header("user_profile.php");
    }
}
?>
