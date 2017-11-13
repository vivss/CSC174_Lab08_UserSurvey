<?php
include 'connection.php';

$robot_name = Trim(stripslashes($_POST["fname"]));
$robot_name = Trim(stripslashes($_POST["lname"]));
$email = Trim(stripslashes($_POST["email"]));



$robot_name = mysqli_real_escape_string($connection, $robot_name);
$email = mysqli_real_escape_string($connection, $email);


$query  = "INSERT INTO robots";
$query .= " ( Name, Email";
$query .= ") VALUES (";
$query .= "  '{$robot_name}', '{$email}'";
$query .= ")";

$result = mysqli_query($connection, $query);


?>