<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/login-style.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- Web-Fonts -->
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<!-- //Web-Fonts -->
<?php 
        include 'header.php';
        ?>
</head>
<body>
	<div class="navbar" style="position: fixed;width: 100%;">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/logo.png" width="120" height="40" alt="Logo" />
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
        </div><br>
<h1 style="margin-top: 5%;">Welcome to Login Portal.</h1><br>
<div class="main" style="margin-bottom: 2%;">
	<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		<div class="img-w3l-agile">
		<img src="images/1.jpg" alt=" "><form style="color: black!important;"></form>
		</div>
		<ul class="resp-tabs-list" style="margin-left: 0px;">
			<li class="resp-tab-item"><h3><span>Sign In</span></h3></li>
			<li class="resp-tab-item"><h3><span>Sign Up</span></h3></li>
		</ul>			
		<div class="resp-tabs-container">
			<div class="tab-1 resp-tab-content">
				<div class="login-top">
					<form action="#" method="post">
						<input type="email" name="email" class="email" placeholder="Email" required=""/>
						<input type="password" name="password" class="password" placeholder="Password" required=""/>	
					
						<div class="login-bottom">
							<ul>
								<li>
									<input type="checkbox" id="brand" value="">
									<label for="brand"><span></span> Remember me?</label>
								</li>
								<li>
									<a href="#">Forgot password?</a>
								</li>
							</ul>
							<div class="clear"></div>
						</div>	
						<input type="submit" value="Sign In">
					</form>
					<img src="images/google-login.png" width="200" height="50" style="width: 60%; height: 40%; padding-top: 2%;"><br>
					<img src="images/facebook.png" width="200" height="50" style="width: 62%; height: 40%;">
				</div>
			</div>
			<div class="tab-1 resp-tab-content">
				<div class="login-top sign-top">
					<form action="#" method="post" style="color: black!important;">
						<input type="radio" name="user" style="margin: 0px;"> <span>Customer</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="radio" name="user" style="margin: 0px;"> <span>Business Owner</span><br><br>
						<input type="text" name="name" class="name" placeholder="Name" required=""/>
						<input type="email" name="email" class="email" placeholder="Email" required=""/>
						<input type="text" name="phone" class="phone" placeholder="Phone" required=""/>
						<input type="password" name="password" class="password" placeholder="Password" required=""/>
						
					
						<div class="login-bottom">
							<ul>
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span> Remember me?</label>
								</li>
								<li>
									<a href="#">Forgot password?</a>
								</li>
							</ul>
							<div class="clear"></div>
						</div>
						<input type="submit" value="Sign Up">							
					</form>
				</div>
			</div>
		</div>	
	</div>
	<div class="clear"> </div>
</div>
<div class="footer" style="padding: 0.5em 0;">
	<p style="color: #fece1a;">Treaty.com © copyright 2018</p>
</div>

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
