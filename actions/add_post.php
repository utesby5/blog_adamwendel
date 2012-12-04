<pre><?php //print_r($_POST);?></pre> 
<?php

// Initialize the sesseion
session_start();

// Extract POST data
extract($_POST);

// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";

// Execute query
$conn->query($sql);

header('Location:../?p=public/home');

// Close Connection
$conn->close();