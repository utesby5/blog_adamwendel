<?php 

// Extract POST data
extract($_POST);

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']} LIMIT 1";

// Execute query
$results = $conn->query($sql);

// Get the posts
$posts = $results->fetch_assoc();

// Close the connection
$conn->close();


?>
<h2>Edit Post</h2>

<form action="actions/edit_post.php" method="post" class="form-horizontal">
	
	<input type="hidden" name="post_id" value="<?php echo $posts['post_id'] ?>" />

	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input class="span10" type="text" name="post_title" placeholder="required" value="<?php echo $posts['post_title']?>"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_text">Post Text</label>
		<div class="controls">
			<textarea class="span10" rows="10" name = "post_text" ><?php echo $posts['post_text']?></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Add</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
	
</form>
