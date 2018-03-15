<?php 

	require '../config.php';
	session_start();
	$userid = $_SESSION['userid'];
	$business_id = $_REQUEST['business_id'];
	
	//Collect all branches address phone no
	$query = "SELECT DISTINCT userid,address1,address2,city,state,country,zipcode,businessphonenumber FROM businessdetail WHERE userid = ".$business_id." ORDER BY userid";
	
	$result = $mysqli->query($query);	
	$index = 1;
	$modal_text = "";
	while ($row = $result->fetch_assoc()) {
		
		$modal_text = $modal_text . '<p style="color: #000; font-size:16px">Branch '.$index.'</p>';
		$modal_text = $modal_text . '<p style="color: #000;font-size:14px"><span style="margin-right: 10px;"><i class="fa fa-map-marker" style="font-size: 17px;color: #006dcc;"></i></span>'.$row["address1"]." ".$row["address2"].",".$row["city"].",".$row["state"].",".$row["country"].",".$row["zipcode"].'</p>';
		$modal_text = $modal_text . '<p style="color: #000; font-size:14px"><span style="margin-right: 10px;"><i class="fa fa-phone" style="font-size: 17px;color: #006dcc;""></i></span>'.$row["businessphonenumber"].'</p><hr>';
		$index++;
	}

	echo $modal_text;
?>
