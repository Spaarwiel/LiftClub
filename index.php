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

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	  <link rel="stylesheet" href="style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <title>LiftClub</title>
<!-- Did not include header here because I don't want the nav here on this page -->
	</head>
    <body>
		<div class="bg">
			<div class="container">
				<div class="header">	
					<h1>LiftClub.co.za</h1>
				</div><!--header-->
				<div class="linksDiv">
					<a class="links" href="<?php echo ROOT_URL; ?>landing.php?">Need a lift?</a>
					<a class="links" href="<?php echo ROOT_URL; ?>addpost.php?">Got space?</a>
				</div><!--links-->
			</div><!--container-->
		</div><!--bg-->
<!-- Include footer -->
<?php include('inc/footer.php'); ?>