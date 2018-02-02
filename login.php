<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<!-- Meta tag Keywords -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Classic Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		<!-- Meta tag Keywords -->
		<!-- css files -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="css/login-style.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" href="css/font-awesome.css">
		<!-- Font-Awesome-Icons-CSS -->
		<!-- //css files -->
		<!-- Web-Fonts -->
		<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
		<!-- //Web-Fonts -->

		<?php 
			include 'header.php';			
			require 'config.php';
			require_once "social_login/fb_config.php";
			require_once "social_login/google_config.php";

			if(isset($_POST['signInemail'])){
				$signInemail = $_POST['signInemail'];
			}

			if(isset($_POST['signInpassword'])){
				$signInpassword = $_POST['signInpassword'];
			}

			if(isset($_POST['signUpemail'])){
				$signUpemail = $_POST['signUpemail'];
			}

			if(isset($_POST['signUppassword'])){
				$signUppassword= $_POST['signUppassword'];
			}

			if(isset($_POST['signUpcpassword'])){
				$signUpcpassword = $_POST['signUpcpassword'];
			}

			if(isset($_POST['user'])){
				$signUprole = $_POST['user'];
			}

			if(isset($_POST['signUpPhone'])){
				$signUpPhone = $_POST['signUpPhone'];
			}

			// database connection
			if(!empty($signInemail)) {
			    $query = "SELECT id, role FROM user where email=\"".$signInemail."\" and encryptedpassword=\"". $signInpassword."\"";
			    // Sign In
			    $result = $mysqli->query($query);
			    if ($result->num_rows > 0) {

					$row = $result->fetch_array();
					//Store userid in Session
			        $_SESSION['userid'] = $row['id'];
			        //Use $_SESSION['userid'] wherever u want to access the userid

					if(strcasecmp($row['role'], 'Business Owner') == 0) {
						echo '<script>window.location.href = "User/business.php";</script>';
					} else {
						echo '<script>window.location.href = "User/customer.php#horizontalTab3";</script>';
					}
			    } else {
			        $response="Invalid username/password";
			    }
			} else if(!empty($signUpemail)) {
			    //check if both the passwords are same
			    if(strcmp($signUppassword, $signUpcpassword) != 0) {
			        $signupresponse="Passwords dont match";
			    } else {
			        //check if user already exist
			        $query = "SELECT role FROM user where email=\"".$signUpemail."\" and encryptedpassword=\"". $signUppassword."\"";
			        $result = $mysqli->query($query);
			        if ($result->num_rows > 0) {
			            $signupresponse="User with email already exists. Please sign in.";
			        } else {
			            // insert into table
			            $query = "INSERT INTO user (email,role,phonenumber,encryptedpassword)
			                        VALUES (\"".$signUpemail."\",\"".$signUprole."\",\"".$signUpPhone."\",\"". $signUppassword."\")";
			            $result = $mysqli->query($query);
			            if ($result) {
							if(strcasecmp($signUprole, 'Business Owner') == 0) {
								echo '<script>window.location.href = "User/business_profile.php";</script>';
							} else {
								echo '<script>window.location.href = "User/customer_profile.php";</script>';
							}
			            } else {
			                $signupresponse="Failed to signup";
			            }
			        }
			    }
			}

			//Social Login
			//Facebook Sign In
			if (isset($_SESSION['fb_access_token'])) {
				//Check user role				
				$query = "SELECT id, role FROM user where email=\"".$_SESSION['email']."\"";
			    // Sign In
			    $result = $mysqli->query($query);
			    if ($result->num_rows > 0) {

					$row = $result->fetch_array();
					$_SESSION['userid'] = $row['id']; 
			        
					if(strcasecmp($row['role'], 'Business Owner') == 0) {
						header('Location: User/business_profile.php');
						exit();
					} else {
						header('Location: User/customer_profile.php');
						exit();
					}
				}
			}
			$redirectURL = "http://localhost/Treaty/social_login/fb-callback.php";
			$permissions = ['email'];
			$fb_loginURL = $helper->getLoginUrl($redirectURL, $permissions);
			

			//Google Sign In
			if(isset($_SESSION['google_access_token'])){

				$query = "SELECT id, role FROM user where email=\"".$_SESSION['email']."\"";
			    // Sign In
			    $result = $mysqli->query($query);
			    if ($result->num_rows > 0) {

					$row = $result->fetch_array();
					$_SESSION['userid'] = $row['id']; 
			        
					if(strcasecmp($row['role'], 'Business Owner') == 0) {
						header('Location: User/business_profile.php');
						exit();
					} else {
						header('Location: User/customer_profile.php');
						exit();
					}
				}
			}
			$google_loginURL = $gClient->createAuthUrl();


			/* close connection */
			$mysqli->close();
			?>
	</head>
	<body>
		<div class="navbar" style="position: fixed;width: 100%;">
			<div class="navbar-inner">
				<div class="container">
					<a href="#" class="brand">
						<img src="images/logoIcon.png" width="240" height="80" alt="Logo" />
						<!-- This is website logo -->
					</a>
					<!-- Navigation button, visible on small resolution -->
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<i class="icon-menu"></i>
					</button>
					<!-- Main navigation -->
					<div class="nav-collapse collapse pull-right">
						<ul class="nav" id="top-navigation">
							<li><a href="index.php">Home</a></li>
							<li><a href="">Find Locations</a></li>
							<li><a href="index.php#service">Services</a></li>
							<li><a href="index.php#portfolio">Portfolio</a></li>
							<li><a href="index.php#about">About</a></li>
							<li><a href="index.php#clients">Clients</a></li>
							<li><a href="index.php#price">Price</a></li>
							<li><a href="index.php#contact">Contact</a></li>
							<li class="active"><a href="login.php">Login</a></li>
						</ul>
					</div>
					<!-- End main navigation -->
				</div>
			</div>
		</div>
		<br><br><br><br><br>
		<h2>Welcome to Treaty</h2>

		<div class="main" style="margin-bottom: 2%;">
			<div id="horizontalTab" style="display: block; width: 100%; ">
				<div class="img-w3l-agile">
<!-- 					<img src="images/1.jpg" alt=" ">
 -->					<form style="color: black!important;"></form>
				</div>
				<ul class="resp-tabs-list" style="margin-left: 0px;">
					<li class="resp-tab-item">
						<h4><span>Sign In</span></h4>
					</li>
					<li class="resp-tab-item">
						<h4><span>Sign Up</span></h4>
					</li>
				</ul>
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content">
						<div class="login-top">
							<form method="post">
								<input type="email" name="signInemail" class="email" placeholder="Email" required/>
								<input type="password" name="signInpassword" class="password" placeholder="Password" required/>
								<label style="color:red;">
								<?php
									if(isset($response)){
										echo $response;
									}
								?>
								</label>
								<div class="login-bottom">
									<ul>
										<li>
											<input type="checkbox" id="brand" value="">
											<label for="brand"><span></span> Remember me?</label>
										</li>
										<li>
											<a href="forgot_password.php">Forgot password?</a>
										</li>
									</ul>
									<div class="clear"></div>
								</div>
								<input class="button" type="submit" value="Sign In" style="margin-bottom:10px">
                                
                                <div id="social" class="row" style="margin-left: -15px; margin-bottom:10px">
                                    <div class="col-md-12">									
                                        <img src="images/fb.png" width="25px" height="25px" class="fb-img" alt="">
                                        <input class="form-control btn btn-fb fb-btn-bg" type="submit" value="Sign in with Facebook" onclick="window.location = '<?php echo $fb_loginURL ?>';">
                                    </div>
                                </div>
                                
                                <div id="social" class="row" style="margin-left: -15px; margin-bottom:10px">
                                    <div class="col-md-12">									
                                        <img src="images/google.jpg" width="25px" height="25px" class="google-img" alt="">
                                        <input class="form-control btn btn-google google-btn-bg" type="submit" value="Sign in with Google" onclick="window.location = '<?php echo $google_loginURL ?>';">
                                    </div>
                                </div>

							</form>

						</div>
					</div>
					<div class="tab-1 resp-tab-content">
						<div class="login-top sign-top">
							<form method="post" style="color: black!important;">
								<input type="radio" name="user" style="margin: 0px;" value="Customer" required> <span>Customer</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								<input type="radio" name="user" style="margin: 0px;" value="Business Owner"> <span>Business Owner</span><br><br>
								<input type="email" name="signUpemail" class="email" placeholder="Email" required/>
								<input type="text" name="signUpPhone" class="" placeholder="Phone" required/>
								<input type="password" name="signUppassword" class="password" placeholder="Password" required/>
								<input type="password" name="signUpcpassword" class="password" placeholder="Confirm Password" onkeyup="comparePasswords();" required/>
								<label style="color:red;">
								<?php
									if(isset($signupresponse)){
										echo $signupresponse;
									}
								?>
								</label>
								<div class="login-bottom">
									<ul>
										<li>
											<input type="checkbox" id="brand1" value="">
											<label for="brand1"><span></span> Remember me?</label>
										</li>
										<li>
											<a href="forgot_password.php">Forgot password?</a>
										</li>
									</ul>
									<div class="clear"></div>
								</div>
                                
								<input class="button" type="submit" value="Sign Up" style="margin-bottom:10px">
                                
                                <div id="social" class="row" style="margin-left: -15px; margin-bottom:10px">
                                    <div class="col-md-12">									
                                        <img src="images/fb.png" width="25px" height="25px" class="fb-img" alt="">
                                        <input class="form-control btn btn-fb fb-btn-bg" type="submit" value="Sign up with Facebook">
                                    </div>
                                </div>
                                
                                <div id="social" class="row" style="margin-left: -15px; margin-bottom:10px">
                                    <div class="col-md-12">									
                                        <img src="images/google.jpg" width="25px" height="25px" class="google-img" alt="">
                                        <input class="form-control btn btn-google google-btn-bg" type="submit" value="Sign up with Google">
                                    </div>
                                </div>                                
							</form>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
		<?php include 'footer.php'; ?>
		<!-- js-scripts -->
		<!-- js -->
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<!-- //js -->
		<!-- tabs -->
		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
		</script>
		<!-- //tabs -->
		<!-- //js-scripts -->
	</body>
</html>
