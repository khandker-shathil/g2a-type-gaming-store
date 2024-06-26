<?php
// Handle the search request and return the search results
// Connect to the database and perform the search query
include_once "config.php";
$searchValue = $_POST['search'];
global $conn;
$query = "SELECT * FROM product_info WHERE product_name LIKE '%$searchValue%' OR product_description LIKE '%$searchValue%'";
$result = mysqli_query($conn, $query);

// Build the search results HTML
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    // Generate the search results HTML
    echo "<div class='search-result'>";
    echo "<h3>" . $row['product_name'] . "</h3>";
    echo "<p>" . $row['product_description'] . "</p>";
    echo "</div>";
  }
} else {
  echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>
