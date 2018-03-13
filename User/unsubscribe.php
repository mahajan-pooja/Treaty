<?php
	require '../config.php';
	session_start();
	$userid = $_SESSION['userid'];
	$bid = $_GET['bid'];
	
	$query = "UPDATE customerbusiness SET isactive=0 , modified = sysdate() WHERE userid=".$userid." and businessid=".$bid;

	$result = $mysqli->query($query);
    if ($result) {
    	echo '<script>window.location.href = "customer.php#horizontalTab2";</script>'; 
    }
    

?>