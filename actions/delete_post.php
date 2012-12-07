<?php
session_start();


// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = 'DELETE FROM posts WHERE post_id='.$_GET['id'];

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
} else {
	$_SESSION['flash'] = array(
			'message' => 'Your post was deleted!',
			'type' => 'info'
	);
	// Redirect
	header('Location:../?p=admin/list_posts');
}

// Close DB connection
$conn->close();