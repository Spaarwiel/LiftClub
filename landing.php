<?php
	require('config/config.php');
	require('config/db.php');

	// Create Query
	$query = 'SELECT * FROM posts ORDER BY created_at DESC';

	// Get Result
	$result = mysqli_query($conn, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
        
<div class="container">

	<h2>Lifts Offered</h2>

		<div class="col s12 m7">

<?php foreach($posts as $post) : ?>

    	<div class="card horizontal">
      	<div class="card-stacked">

        	<div class="card-content">
						<h4 class="header">
							<?php echo $post['pickup']; ?>
							to
							<?php echo $post['dest']; ?>
						</h4>
							<div class="divider"></div>
								<p><small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small></p>
									<div class="divider"></div>
					</div><!--card-content-->
					
        			<div class="card-action">
								<a class="btn btn-small light-green" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">
									Read More
								</a>

        			</div><!--card-action-->
      </div><!--card-stacked-->
	</div><!--card horizontal-->
<?php endforeach; ?>
  </div><!--col s12 m7-->
	</div><!--container-->
<?php include('inc/footer.php'); ?>