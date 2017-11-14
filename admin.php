<?php
	include 'connection.php';


	// 2. Perform database query
	$query  = "SELECT * ";
	$query .= "FROM uxsurvey ";
	$query .= "ORDER BY created_at DESC";


	$result = mysqli_query($connection, $query);

?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <title>User Survey Data</title>
  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">
  <link href = "css/override.css" rel="stylesheet">
</head>
<body  id="page-top">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">UX Design Process</a>
    </div>
  </nav>
	<header class="bg-primary text-left">
		<div class="headersection">
			<h1>User Survey Data</h1>
		</div>
	</header>
	<section id="tablebody">
		<div class="container">
	<table border>

<?php
	// 3. Use returned data (if any)
	while($uxsurvey = mysqli_fetch_assoc($result)) {
		// output data from each row
?>

		<tr>
			<td><?php echo $uxsurvey["ID"]; ?></td>
			<td><?php echo $uxsurvey["first_name"]; ?></td>
			<td><?php echo $uxsurvey["last_name"]; ?></td>
			<td><?php echo $uxsurvey["email"]; ?></td>
			<td><?php echo $uxsurvey["software"]; ?></td>
			<td><?php echo $uxsurvey["helpful"]; ?></td>
			<td><?php echo $uxsurvey["recommendation"]; ?></td>
		</tr>

<?php } ?>

	</table>

	<br>
	<a href="index.html" class="btn-lg text-white">Back to the previous form</a>
	</div>
	</section>
	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Team Bangkok, 2017</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

</body>
</html>

<?php
	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>
