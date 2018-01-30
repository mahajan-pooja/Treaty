<?php
	
	include '../config.php';
	require_once "google_config.php";
	
	if(isset($_SESSION['google_access_token']))
		$gClient->setAccessToken($_SESSION['google_access_token']);
	else if(isset($_GET['code'])){
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['google_access_token'] = $token;		
	}else{
		header('Location: ../login.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$google_user_data = $oAuth->userinfo_v2_me->get();

	$_SESSION['givenName'] = $google_user_data['givenName'];
	$_SESSION['familyName'] = $google_user_data['familyName'];
	$_SESSION['email'] = $google_user_data['email'];

	$query = "SELECT id, role FROM user where email=\"".$_SESSION['email']."\"";
	$result = $mysqli->query($query);
	if ($result->num_rows > 0) {
		$row = $result->fetch_array();
		$_SESSION['userid'] = $row['id']; 
		if(strcasecmp($row['role'], 'Business Owner') == 0) {
			header('Location: ../User/business_profile.php');
			exit();
		} else {
			header('Location: ../User/customer_profile.php');
			exit();
		}
	}	
?>