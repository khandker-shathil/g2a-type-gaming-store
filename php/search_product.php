<?php include_once "config.php"; ?>
<?php include "functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Game Store - Products</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Project/css/1.css">
</head>
<body>
<?php include "header.php" ?>
    <div class="container">
		<h1>Products</h1>
		<div class="row">
        <?php srch(); ?>
        </div>
    </div>
    <?php include "footer.php"; ?>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
