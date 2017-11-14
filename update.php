<?php


	include 'connection.php';


   $id = $_POST['id'];
    $fname = Trim(stripslashes($_POST["fname"]));
    $lname = Trim(stripslashes($_POST["lname"]));
    $email = Trim(stripslashes($_POST["email"]));
    
    
    if (isset($_POST["software"])) {
      $software = $_POST["software"];
    } else {
      $software = '';
    }
    
    if (isset($_POST["helpful"])) {
      $helpful = $_POST["helpful"];
      } else {
        $helpful = '';
      }
    
    $recommendation = Trim(stripslashes($_POST["recs"]));
    
    
    $fname = mysqli_real_escape_string($connection, $fname);
    $lname = mysqli_real_escape_string($connection, $lname);
    $recommendation = mysqli_real_escape_string($connection, $recommendation);
    

	$query  = "UPDATE uxsurvey SET ";
	$query .= "email = '$email', ";
    $query .= "software = '$software', ";
    $query .= "helpful = '$helpful', ";
    $query .= "recommendation = '$recommendation', ";
    $query .= "first_name = '$fname', ";
    $query .= "last_name = '$lname' ";
    $query .= "WHERE id = '$id'";

    echo $query;


    $result = mysqli_query($connection, $query);
    
    echo mysqli_affected_rows($connection);
   
	mysqli_close($connection);
?>