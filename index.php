<?php
// Initialize the session
session_start();


// Load DB constants
require('config/db.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Domine' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="styles.css" />
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
		<title>The "AA" Blog</title>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<?php include('layout/header.php')?>
			</header>
			<nav>
				<?php include('layout/nav.php')?>
			</nav>
			<div>
				<?php include('layout/message.php')?>
			</div>
			<div id="content">
				<?php include('layout/content.php')?>
			</div>
			
			<footer>
				<?php include('layout/footer.php')?>
			</footer>
		</div>
	</body>
</html>
