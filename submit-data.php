<?php
include 'connection.php';

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

$query  = "INSERT INTO uxsurvey";
$query .= " ( email, software, helpful, recommendation, first_name, last_name";
$query .= ") VALUES (";
$query .= "  '{$email}', '{$software}', '{$helpful}', '$recommendation', '$fname', '$lname'";
$query .= ")";

$result = mysqli_query($connection, $query);


mysqli_close($connection);


?>
