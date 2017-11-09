<?php
	// 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "";
	$dbpass = "";
	$dbname = "";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


	// 2. Perform database query
	$query  = "SELECT * ";
	$query .= "FROM uxsurvey ";
	

	$result = mysqli_query($connection, $query);
	
?>

<!doctype html>
<html>
<head>
	<title>User Survey Data</title>
</head>
<body>

	<h1>User Survey Data</h1>

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
			<td><?php echo $uxsurvey["career"]; ?></td>
			<td><?php echo $uxsurvey["helpful"]; ?></td>
			<td><?php echo $uxsurvey["recommendation"]; ?></td>
		</tr>

<?php } ?>

	</table>

	<br>
	<a href="#">Back to the previous form</a>

</body>
</html>

<?php
	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>