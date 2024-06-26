<?php 
@session_start();
include_once "config.php";
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/Project/css/1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to perform AJAX search
            function performSearch(query) {
                $.ajax({
                    url: 'search.php',
                    method: 'POST',
                    data: { search: query },
                    success: function(response) {
                        // Handle the response from the server
                        $('#search-results').html(response);
                        $('#search-results').show(); // Show the dropdown
                    }
                });
            }

            // Event listener for search input
            $('#search-input').on('input', function() {
                var query = $(this).val();
                if (query.length > 2) {
                    performSearch(query);
                } else {
                    $('#search-results').empty();
                    $('#search-results').hide(); // Hide the dropdown
                }
            });

            // Event listener for document click to close the dropdown
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#search-results').length && !$(event.target).closest('#search-input').length) {
                    $('#search-results').empty();
                    $('#search-results').hide(); // Hide the dropdown
                }
            });
        });
    </script>
</head>
<body>
	<nav class="navbar navbar-expand-md" style="background-color: #15110c;">
        <div class="container">
            <a class="navbar-brand" href="/Project/index.php"><img height="55px" width="55px" src="/Project/img/G2A.com-Logo.jpg" alt=""></a>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="position-relative">
                <input type="text" id="search-input" placeholder="Search">
                <div id="search-results" class="position-absolute"></div>
            </div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/games.php">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/html/about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Project/php/registration_form.php">Register</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/Project/php/seller_dashboard.php">Seller Dashboard</a>
                        </div>
                      </li>
                </ul>
            </div>
        </div>
    </nav>