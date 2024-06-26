<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn) {
} else {
    echo "Connection failed!";
}
?>
