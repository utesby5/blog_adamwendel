<?php 
$post_title = '';
$post_text = '';
extract($_SESSION);

// Remove post info from session data
unset($_SESSION['post_title']);
unset($_SESSION['post_text']);

?>



<h2>Add a Post</h2>
<form action="actions/add_post.php" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input class="span10" type="text" name="post_title" placeholder="required" value="<?php  echo $post_title?>"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_text">Post Text</label>
		<div class="controls">
			<textarea class="span10" rows="10" name = "post_text" ><?php echo $post_text ?></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Add</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
	
</form>





