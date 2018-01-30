<!DOCTYPE html>
<html class=" js cssanimations csstransitions">
<head>

	<title>Business Owner Profile</title>

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link rel="stylesheet" href="css/user-dashboard.css" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/user-dashboard.js"></script>

	<!-- Web-Fonts -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->
	<?php 
		session_start();
		include 'business_profile_nav.html';
		
		$first_name = $_SESSION['fb_user_data']['first_name'];
		$last_name = $_SESSION['fb_user_data']['last_name'];
		$email_id = $_SESSION['fb_user_data']['email'];
	?>
</head>

<body>

	<h1></h1> 
	<div class="container">
		<div class="tab">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true,   // 100% fit in a container
							closed: 'accordion', // Start closed if in accordion view
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#tabInfo');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});

						$('#verticalTab').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true
						});
					});
				</script>

				<div class="tabs">

					<div class="tab-left">
						<ul class="resp-tabs-list">
							<li class="resp-tab-item"><i class="fa fa-plane" aria-hidden="true"></i>Create Account</li>
							<li class="resp-tab-item"><i class="fa fa-plane" aria-hidden="true"></i>Update Account</li>
							<li class="resp-tab-item"><i class="fa fa-ship" aria-hidden="true"></i>Change Password</li>
							<li class="resp-tab-item"><i class="fa fa-plane" aria-hidden="true"></i>Deactivate Account</li>
						</ul>
					</div>

					<div class="tab-right">
						<div class="resp-tabs-container">
							<!-- Customer Profile section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Create Account</p>
								
								<div class="w3l-sign-in">
									<form action="#" method="post" class="agile_form">
										<input type="text" placeholder="First Name" name="fname" class="name agileits" required=""/>
										<input type="text" placeholder="Last Name" name="lname" class="name agileits" required=""/>
										<input type="text" placeholder="Phone Number" name="phone" class="name agileits" required=""/>
										<input type="text" placeholder="Address : Street 1" name="street1" class="name agileits" required=""/>
										<input type="text" placeholder="Address : Street 2" name="street2" class="name agileits" required=""/>
										<input type="text" placeholder="City" name="city" class="name agileits" required=""/>
										<input type="text" placeholder="State" name="state" class="name agileits" required=""/>
										<input type="text" placeholder="Country" name="country" class="name agileits" required=""/>
										<input type="text" placeholder="Zip" name="zip" class="name agileits" required=""/>
										<p class="notPara"><br>Do you want offer notifications?&nbsp&nbsp&nbsp<input type="checkbox" name="notifyCheck" checked></p>
										
										<div class="submit"><br>
										  <input type="submit" value="Save"><br><br>
										  <input type="submit" value="Cancel">
										</div>   
									</form>	
								</div>
							</div>
							<!-- Update Account section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Update Account Details</p>
								
								<div class="w3l-sign-in">
									<form action="#" method="post" class="agile_form">
										<input type="text" placeholder="First Name" name="fname" class="name agileits" required=""/>
										<input type="text" placeholder="Last Name" name="lname" class="name agileits" required=""/>
										<input type="text" placeholder="Phone Number" name="phone" class="name agileits" required=""/>
										<input type="text" placeholder="Address : Street 1" name="street1" class="name agileits" required=""/>
										<input type="text" placeholder="Address : Street 2" name="street2" class="name agileits" required=""/>
										<input type="text" placeholder="City" name="city" class="name agileits" required=""/>
										<input type="text" placeholder="State" name="state" class="name agileits" required=""/>
										<input type="text" placeholder="Country" name="country" class="name agileits" required=""/>
										<input type="text" placeholder="Zip" name="zip" class="name agileits" required=""/>
										<p class="notPara"><br>Do you want offer notifications?&nbsp&nbsp&nbsp<input type="checkbox" name="notifyCheck" checked></p>
										
										<div class="submit"><br>
										  <input type="submit" value="Update"><br><br>
										  <input type="submit" value="Cancel"><br><br>
									
										</div>   
									</form>	
								</div>
							</div>
							
							
							
							<!--Change Password-->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Change Password</p>
								<div class="agile-send-mail">
									<form action="#" method="post" class="agile_form">
										<input type="text" placeholder="Old Password" name="old-pwd" class="name agileits" required=""/>
										<input type="text" placeholder="New Password" name="new-pwd" class="name agileits" required=""/>
										<input type="text" placeholder="Confirm New Password" name="conf-new-pwd" class="name agileits" required=""/>	
										<div class="submit"><br>
										  <input type="submit" value="Save"><br><br>
										  <input type="submit" value="Cancel">
										</div>  
									</form>
								</div>
							</div>


							<!-- Deactivate customer account -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Deactivate Account</p><br>
								<img class="settingImg" src="images/deactive.png" width="100" height="100">
								<div class="agile-send-mail">
									<form action="#" method="post" class="agile_form">
										<p class="b_name" style="color: white;text-align: center;">Click on below button to Deactivate your account.</p><br>	
										<div class="submit"><br>
										  <input type="submit" value="Deactivate"><br><br>
										  <input type="submit" value="Cancel">
										</div>  
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include 'footer.php';
	require '../config.php';
	
	if(isset($_POST['fname'])){
		$fname = $_POST['fname'];
	}
	if(isset($_POST['lname'])){
		$lname = $_POST['lname'];
	}
	if(isset($_POST['phone'])){
		$phone = $_POST['phone'];
	}
	if(isset($_POST['street1'])){
		$street1= $_POST['street1'];
	}
	if(isset($_POST['street2'])){
		$street2 = $_POST['street2'];
	}
	if(isset($_POST['city'])){
		$city = $_POST['city'];
	}
	if(isset($_POST['state'])){
		$state = $_POST['state'];
	}	
	if(isset($_POST['country'])){
		$country = $_POST['country'];
	}
	if(isset($_POST['zip'])){
		$zip = $_POST['zip'];
	}	
	
	
	if(!empty($fname)) {
		//get the userid from user table
		$query = "SELECT id FROM user where phonenumber=\"".$phone."\"";
		// Sign In
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$userid = $row["id"];
			//insert the entry in userdetail table
			// insert into table
			$query = "INSERT INTO userdetail(userid, firstname, lastname, phonenumber,
				address1, address2, city, state, country, zipcode, modified, created) VALUES (\"".$userid."\",\"".$fname."\",\"". $lname."\",\"". $phone."\",\"". $street1."\",\"". $street2."\"
						,\"". $city."\",\"". $state."\",\"". $country."\",\"". $zip."\", sysdate(), sysdate())";
			echo $query;
			$result = $mysqli->query($query);
			if ($result) {
				echo '<script>window.location.href = "/Treaty/index.php";</script>';
			} else {
				echo "Failed to update profile";
			}
		} else {
			echo "Invalid username/password";
		}
	}
	/* close connection */
	$mysqli->close();
	?>
	<!--start-date-piker-->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
			<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7" ).datepicker();
				});
			</script>
<!-- 97-rgba(0, 0, 0, 0.75)/End-date-piker -->	
</body>
</html>