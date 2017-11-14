<?php
include 'connection.php';


	$query  = "DELETE FROM uxsurvey ";
	$query .= "WHERE id = {$_GET['id']} ";
	$query .= "LIMIT 1";

    $result = mysqli_query($connection, $query);
    
    mysqli_close($connection);

    echo 'deleted';
    
    
?>

