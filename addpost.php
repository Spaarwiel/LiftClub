<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$pickup = mysqli_real_escape_string($conn, $_POST['pickup']);
		$dest = mysqli_real_escape_string($conn, $_POST['dest']);
		$author = mysqli_real_escape_string($conn,$_POST['author']);
		$price = mysqli_real_escape_string($conn,$_POST['price']);
		$body = mysqli_real_escape_string($conn,$_POST['body']);

		$query = "INSERT INTO posts(pickup, dest, author, price, body) VALUES('$pickup', '$dest', '$author', '$price', '$body')";

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>

<?php include('inc/header.php'); ?>

	<div class="container">
		
		<h2>
			Offer Lift
		</h2>
		<div class="row">

			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      	<div class="row">

        	<div class="input-field col s6">
          	<input type="text" name="pickup"  class="validate" required="">
          	<label for="pickup">From:</label>
					</div><!--input-field col s6-->
					
        	<div class="input-field col s6">
          	<input type="text" name="dest" class="validate" required="">
          	<label for="dest">To:</label>
					</div><!--input-field col s6-->
					
				</div><!--row-->
				
      	<div class="row">

        	<div class="input-field col s6">
          	<input type="text" name="author" class="validate" required="">
          	<label for="author">Name:</label>
					</div><!--input-field col s6-->

					<div class="input-field col s6">
          	<input type="number" name="price" class="validate" required="">
          	<label for="price">Price(ZAR/Week)</label>
					</div><!--input-field col s6-->
					
				</div><!--row-->

		<div class="row">

			<div class="input-field col s12">
  				<input type="text" name="body" class="validate" required="">
  				<label for="body">Message</label>
			</div><!--input-field col s6-->
		
	</div><!--row-->
				
			<input type="submit" name="submit" value="Submit" class="btn btn-default light-green">
			
			</form>
			
		</div><!--row-->
		
	</div><!--container-->

<?php include('inc/footer.php'); ?>