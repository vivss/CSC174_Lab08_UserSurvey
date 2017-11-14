<?php
	session_start();
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
	<table border id="data-table">

    <div id="tip-q1" class="tip">
      Design software used
    </div>

    <div id="tip-q2" class="tip">
      Page helpfulness
    </div>

    <div id="tip-q3" class="tip">
      Recommendations for site
    </div>
    <!--Table head-->
    <tr id="admin-head">
      <td>ID</td>
      <td>fname</td>
      <td>lname</td>
      <td>email</td>
      <td id="table-q1">Q1</td>
      <td id="table-q2">Q2</td>
      <td id="table-q3">Q3</td>
    </tr>
<?php
	// 3. Use returned data (if any)
	while($uxsurvey = mysqli_fetch_assoc($result)) {
		// output data from each row
?>

		<tr id="<?php echo $uxsurvey["ID"]; ?>">
			<td><?php echo $uxsurvey["ID"]; ?></td>
			<td><?php echo $uxsurvey["first_name"]; ?></td>
			<td><?php echo $uxsurvey["last_name"]; ?></td>
			<td><?php echo $uxsurvey["email"]; ?></td>
			<td><?php echo $uxsurvey["software"]; ?></td>
			<td><?php echo $uxsurvey["helpful"]; ?></td>
			<td><?php echo $uxsurvey["recommendation"]; ?></td>
			<td><a class="update" data-id="<?php echo $uxsurvey["ID"] ?>" data-fname="<?php echo $uxsurvey["first_name"] ?>" 
				data-lname="<?php echo $uxsurvey["last_name"] ?>" data-email="<?php echo $uxsurvey["email"] ?>" 
				data-recs="<?php echo $uxsurvey["recommendation"] ?>" data-helpful="<?php echo $uxsurvey["helpful"] ?>" 
				data-software="<?php echo $uxsurvey["software"] ?>" href="#">Edit</a></td>
			<td><a class="delete" data-container="<?php echo $uxsurvey["ID"] ?>" href="#">Delete</a></td>
			<!-- confirm code from https://stackoverflow.com/questions/9139075/how-to-show-a-confirm-message-before-delete -->
		</tr>

<?php } ?>

	</table>
	<!-- delete success message -->
	<div id="delete-msg"></div>
	
	 <!-- Thank you message for the update form-->
	 <section id="thank-message-container" class="hide">
      <div class="container">
        <h2 id="thank-message"></h2>
      </div>
	</section>
	
	 <!-- Error messages-->
	 <section id="error-msg-fname" class="hide">
      <div class="container">
        <h2>Your first name is required!</h2>
      </div>
	</section>
	<section id="error-msg-lname" class="hide">
      <div class="container">
        <h2>Your last name is required!</h2>
      </div>
	</section>
	<section id="error-msg-email" class="hide">
      <div class="container">
        <h2>Your email is required!</h2>
      </div>
	</section>
	<!-- update form -->
		
	 <section id="survey" class="hide">
      <div class="container">
  			<h2 id="title-edit"></h2>
  			<form method="post" action="update.php">
          <div class="row">
            <div class="col-sm-4 mx-auto">
      				<label for="fname">First Name: </label>
      				<input type="text" name="fname" id="fname" required><br>
            </div>
            <div class="col-sm-4 mx-auto">
              <label for="lname">Last Name: </label>
              <input type="text" name="lname" id="lname"><br>
            </div>
            <div class="col-sm-4 mx-auto">
    				      <label for="email">Email: </label>
    				      <input type="email" name="email" id="email" required><br><br>
            </div>
          </div>
  				<!--Checkboxes-->
          <div class="row">
            <div class="col-md-4 mx-auto">
              What design software do you use? <br>
            </div>
            <div class="col-md-4 mx-auto">
              <input type="checkbox" class="software" name="software[]" value="balsamiq" id="balsamiq">
              <label for="balsamiq">Balsamiq</label><br>

              <input type="checkbox" class="software" name="software[]"value="sketch" id="sketch">
              <label for="sketch">Sketch</label><br>

              <input type="checkbox" class="software" name="software[]"value="illustrator" id="illustrator">
              <label for="illustrator">Adobe Illustrator</label><br>

              <input type="checkbox" class="software" name="software[]" value="invision" id="invision">
              <label for="invision">Invision</label><br>

              <input type="checkbox" class="software" name="software[]"value="another" id="another">
              <label for="another">Another app</label><br>

              <input type="checkbox" class="software" name="software[]" value="none" id="none">
              <label for="none">I don't use any design software</label><br><br>
            </div>
            <div class="col-md-4 mx-auto">
            </div>
          </div>

          <div class="row">
    				<!--Radio Buttons-->
    				<div class="col-md-4 mx-auto">
    				      The information on this page was helpful: <br>
            </div>
            <div class="col-md-4 mx-auto">
    				<input type="radio" class="helpful" name="helpful" value="1" id="radio1">
    				<label for="radio1">1-Strongly Disagree</label><br>

    				<input type="radio" class="helpful" name="helpful" value="2"  id="radio2">
    				<label for="radio2">2-Disagree</label><br>

    				<input type="radio" class="helpful" name="helpful" value="3"  id="radio3">
    				<label for="radio3">3-Neutral</label><br>

    				<input type="radio" class="helpful" name="helpful" value="4"  id="radio4">
    				<label for="radio4">4-Agree</label><br>
 
    				<input type="radio" class="helpful" name="helpful" value="5"  id="radio5">
    				<label for="radio5">5-Strongly Agree</label><br><br>
          </div>
          <div class="col-md-4">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
  				<label for="recs">Do you have any recommendations for our site? </label><br>
  				<textarea name="recs" id="recs" rows="8" cols="80"></textarea><br><br>
        </div>
        </div>
  				<input data-forupdate='whatever' class="btn-lg text-white" type="submit" value="Submit" id="submit-no-reload">
  			</form>
      </div>
	</section><!--survey-->
	
	<br>
	<a href="index.php" class="btn-lg text-white">Back to the previous form</a>
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
	<!-- Delete action -->
	<script src="js/delete.js"></script>
	<!-- Update action -->
	<script src="js/click-handling.js"></script>
	<script src="js/update-form.js"></script> 
  <script src="js/hover-tip.js"></script> 
</body>
</html>

<?php
	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>
