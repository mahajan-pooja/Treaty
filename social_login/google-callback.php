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

	$_SESSION['first_name'] = $google_user_data['givenName'];
	$_SESSION['last_name'] = $google_user_data['familyName'];
	$_SESSION['email'] = $google_user_data['email'];

	//Sign In
	 if (isset($_SESSION['google_signin_btn'])){
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
	}

	//Sign Up
	if (isset($_SESSION['google_signup_btn'])){
		//Check user exists				
		$query = "SELECT id, role FROM user where email=\"".$_SESSION['email']."\"";
					
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			 $_SESSION['signupresponse_social'] = "User with email already exists. Please sign in.";
			 header('Location: ../login.php');
			 exit();
		}
		else
		{
			$signUpPhone = '1234567890';
			$signUppassword = 'google';
			$query = "INSERT INTO user (email,role,phonenumber,encryptedpassword)
						VALUES (\"".$_SESSION['email']."\",\"".$_SESSION['signUprole_social']."\",\"".$signUpPhone."\",\"". $signUppassword."\")";
		    
		    $result = $mysqli->query($query);		    
		    
		    if ($result){
				if(strcasecmp($_SESSION['signUprole_social'], 'Business Owner') == 0){
					header('Location: ../User/business_profile.php');
					exit();
				} 
				else
				{
					header('Location: ../User/customer_profile.php');
					exit();
				}
			}
			else 
			{
			    $_SESSION['signupresponse_social'] = "Failed to signup";
			}
		}						
		
	}
?>