<?php 
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = 'SELECT * FROM posts WHERE post_id='.$_GET['id'];

// Execute query
$results = $conn->query($sql);

// Extract Post Data
extract($_POST);
?>
<?php $post = $results->fetch_assoc()?>
<h1><?php echo $post['post_title']?></h1>
<p> <?php echo $post['post_text']?></p>

<?php while($post = $results->fetch_assoc()): ?>
	<p><a title=<?php echo $post['post_title']?> href="./?p=public/post&amp;id=<?php echo $post['post_id']?>"><?php echo $post['post_title']?></a></p>

<?php endwhile;?>