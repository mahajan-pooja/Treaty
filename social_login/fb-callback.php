<?php
	session_start();
	include '../config.php';
	require_once "fb_config.php";


	try {
		$fb_access_token = $helper->getAccessToken();
	} catch (\Facebook\Exceptions\FacebookResponseException $e) {
		echo "Response Exception: " . $e->getMessage();
		exit();
	} catch (\Facebook\Exceptions\FacebookSDKException $e) {
		echo "SDK Exception: " . $e->getMessage();
		exit();
	}

	if (!$fb_access_token) {
		header('Location: ../login.php');
		exit();
	}

	$oAuth2Client = $FB->getOAuth2Client();
	if (!$fb_access_token->isLongLived())
		$fb_access_token = $oAuth2Client->getLongLivedAccessToken($fb_access_token);

	$response = $FB->get("/me?fields=id, first_name, last_name, email", $fb_access_token);
	$fb_user_data = $response->getGraphNode()->asArray();
	//Set session Variables
	$_SESSION['email'] = $fb_user_data['email'];
	$_SESSION['first_name'] = $fb_user_data['first_name'];
	$_SESSION['last_name'] = $fb_user_data['last_name'];	
	$_SESSION['fb_access_token'] = (string) $fb_access_token;
	

	// Sign In
	 if (isset($_SESSION['fb_signin_btn'])){

		$query = "SELECT id, role FROM user where email=\"".$_SESSION['email']."\"";
			
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$_SESSION['userid'] = $row['id']; 
	    	if(strcasecmp($row['role'], 'Business Owner') == 0) {
				header('Location: ../User/business_profile.php');
				exit();
			} 
			else 
			{
				header('Location: ../User/customer_profile.php');
				exit();
			}
		}
		
	}	

	//Facebook Sign Up
	if (isset($_SESSION['fb_signup_btn'])){
		//Check user exists				
		$query = "SELECT id, role FROM user where email=\"".$_SESSION['email']."\"";
					
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			 $_SESSION['signupresponse'] = "User with email already exists. Please sign in.";
		}
		else
		{
			$signUpPhone = '1234567890';
			$signUppassword = 'facebook';
			$query = "INSERT INTO user (email,role,phonenumber,encryptedpassword)
						VALUES (\"".$_SESSION['email']."\",\"".$_SESSION['signUprole']."\",\"".$signUpPhone."\",\"". $signUppassword."\")";
		    
		    $result = $mysqli->query($query);		    
		    
		    if ($result){
		    	$signUprole = $_SESSION['signUprole'];
				if(strcasecmp($signUprole, 'Business Owner') == 0){
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
			    $_SESSION['signupresponse'] = "Failed to signup";
			}
		}						
		
	}
			
?>