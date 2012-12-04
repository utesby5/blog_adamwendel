<?php 
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = "SELECT * FROM posts ORDER BY post_datepublished DESC";

// Execute query
$results = $conn->query($sql);

// Extract Post Data
extract($_POST);
?>

<?php while($blog = $results->fetch_assoc()):?>
<h1><?php echo $blog ['post_title']?></h1>
<p><?php echo $blog ['post_text']?></p>
<?php endwhile; ?>