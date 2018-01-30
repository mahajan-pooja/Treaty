<?php

	include 'config.php';

//Function to determine user role
function determine_user_role($signInemail){
	

	$signInpassword = 'test1234';

	$query = "SELECT id, role FROM user where email=\"".$signInemail."\" and encryptedpassword=\"". $signInpassword."\"";
	$result = $mysqli->query($query);
    if ($result->num_rows > 0) {
		$row = $result->fetch_array();					
        $_SESSION['userid'] = $row['id'];    
		if(strcasecmp($row['role'], 'Owner') == 0) {
			return(1); // Business Owner
		} 
		else{
			return(0); // Customer
		}
	}
}




?>