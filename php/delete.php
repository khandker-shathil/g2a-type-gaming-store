<?php
    require_once 'config.php';

    // Get the ID of the user to be deleted
    $id = $_GET['id'];

    // Construct the DELETE SQL query
    $sql = "DELETE FROM user_info WHERE ID = $id";

    // Execute the query
    if(mysqli_query($conn, $sql)){
        header("Location: seller_dashboard.php"); // Redirect back to the dashboard page
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
?>

