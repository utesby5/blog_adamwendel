<?php 
	if(isset($_SESSION['flash'])){
		echo '<p class="alert alert-'.$_SESSION['flash']['type'].'">';
		echo $_SESSION['flash']['message'];
		unset($_SESSION['flash']);
		echo '</p>';
	}
	
?>
