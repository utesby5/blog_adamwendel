<pre><?php //print_r($_POST);?></pre> 
<?php

// Initialize the sesseion
session_start();

// Extract POST data
extract($_POST);

if($post_title == '' || $post_text == ''){
	$_SESSION['flash'] = array(
			'message' => 'Please Enter both the post title and text.',
			'type' => 'danger'
			);
	
	// Store the form data into session data
	$_SESSION['post_title'] = $post_title;
	$_SESSION['post_text'] = $post_text;
	
	// Redirect back to the form
	header('Location:../?p=admin/form_add_post');
	
	// Stop executing the current request and return whatever is in the output buffer to the browser
	die();
}

// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// insert /' (backslash-single quote)
$post_text = addslashes($post_text);
$post_title = addslashes($post_title);

// Construct query
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";

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
	$_SESSION['flash'] = array(
			'message' =>	'<strong>'. $post_title . '</strong> was added successfully!',
			'type' => 'success'
	);

	// Redirect
	header('Location:../?p=admin/list_posts');
}
// Close Connection
$conn->close();