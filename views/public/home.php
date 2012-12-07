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

<?php $post = $results->fetch_assoc()?>
	
	<div class="post">
	<h2 class= ""><a title=<?php echo $post['post_title']?> href="./?p=public/post&amp;id=<?php echo $post['post_id']?>"><?php echo $post['post_title']?></a></h2>
	<p class= ""><?php echo $post['post_text']?></p>
	</div>
	
<?php while($post = $results->fetch_assoc()): ?>
	<?php // make a timestamp
	$time = strtotime($post['post_datepublished']);
	$date = date('m / j / Y',$time);
	?>
	
	<div class="remaining">
	<h4><a title=<?php echo $post['post_title']?> href="./?p=public/post&amp;id=<?php echo $post['post_id']?>"><?php echo $post['post_title']?></a> <?php echo $date ?></h4>
	</div>
	
<?php endwhile;?>