<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['delete'])){
		// Get form data
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM posts WHERE id = {$delete_id}";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}

	// get ID
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM posts WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>

<div class="container">

	<a class="btn btn-small light-green" href="<?php echo ROOT_URL; ?>landing.php?id=<?php echo $post['id']; ?>">back</a>

	<h4>
		<?php echo $post['pickup']; ?>
		to
		<?php echo $post['dest']; ?>
	</h4>
	
	<p>
		<?php echo $post['body']; ?>
	</p>

	<p>
		R
		<?php echo $post['price']; ?>
		/Week
	</p>
	
	<small>
		by 
		<?php echo $post['author']; ?>
	</small>

	<br>

	<h5>Comments</h5>

	<p>
		<?php echo $post['replybody']; ?>
	</p>

	<p>
		from: 
		<?php echo $post['replyname']; ?>
	</p>

	<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id']; ?>" class="btn btn-small light-green">
		Reply
	</a>

</div><!--container-->

<?php include('inc/footer.php'); ?>