<pre><?php //print_r($_POST);?></pre> 
<?php
// Load DB constants
require('../config/db.php');

// Extract POST data
extract($_POST);  


// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// insert /' (backslash-single quote)
$post_text = addslashes($post_text);
$post_title = addslashes($post_title);


//Construct Query
$sql = "UPDATE posts SET post_title='$post_title', post_text='$post_text' WHERE post_id='$post_id'";

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	// Redirect
	header('Location:../?p=admin/list_posts');
} 
// Close DB connection
$conn->close();