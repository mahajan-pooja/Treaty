<!DOCTYPE html>
<html class=" js cssanimations csstransitions">

<head>
<style>
.accordion {
    background-color: #A9C750;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: center;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    margin-bottom: 10px!important;
}
.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.activeClass:after {
    content: "\2212";
}

.activeClass:after {
    content: "\2212";
}

.activeClass, .accordion:hover {
    color: white;
}

.panelContainer{
	display: none;

}
.panel {
    display: none;
}
.panel p{
	color: black;
	text-align: center;
}
</style>

	<title>Frequently Asked Questions</title>

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images/favicon.ico">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link href="css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="css/user-dashboard.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/user-dashboard.js"></script>

	<!-- Web-Fonts -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->
	<?php

	include 'header.php';
	?>
	
	
</head>

<body>

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="../index.php" class="brand">
                        <img src="../images/logoIcon.png" width="240" height="80" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav">
                            <li class="active"><a href="#">FAQ</a></li>
                            <li><a href="../index.php">Home</a></li>
                           <!-- <li><a href="find_location.php">Find Location</a></li>
                            <li><a href="customer_profile.php">Profile</a></li>
                            <li><a href="../logout.php">Logout</a></li>       -->                     
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <br><br>
        
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
							<li class="resp-tab-item"><i class="fa fa-suitcase" aria-hidden="true"></i>Customer</li>
							<li class="resp-tab-item"><i class="fa fa-university" aria-hidden="true"></i>Business Owner</li>
						</ul>
					</div>

					<div class="tab-right">
						<div class="resp-tabs-container">
							<!-- QR Code -->
							<div class="tab-1 resp-tab-content gallery-images">
								<div class="wthree-subscribe">
									<p class="secHead">About Treaty</p>
									<button class="accordion">What is Belly?</button>
										<div class="panel">
										  <p>Belly is a universal loyalty program that offers unique and exceptional rewards to places you love. Simple as that.</p>
										</div>

										<button class="accordion">How do I become a Belly Member?</button>
										<div class="panel">
										  <p>Pick up a card at any of our locations. Tap the “Join Now” button then just scan the barcode on the tablet and enter in your email address. Don’t want to carry another card in your wallet? Then download the mobile app for iPhone or Android.</p>
										</div>

										<button class="accordion"> How does Belly work?</button>
										<div class="panel">
										  <p>Earn points by scanning the barcode of your BellyCard or on your Belly mobile app on the in-store tablet. Friendly reminder: points are specific to each business and can only be used for redemption at that location. Redeem rewards by tapping on any reward that you are eligible to redeem and show the confirmation to the nearest employee!</p>
										</div>
										<button class="accordion">Where can I find places to Belly at?</button>
										<div class="panel">
										  <p>You can check out Belly locations at bellycard.com/locations Belly Businesses are tagged with a blue pin. To get that business’ information, click on the blue pin. You can also view locations in our mobile app. Just click “Home” in the side bar to find businesses near you.</p>
										</div>
										<button class="accordion"> I got a new phone. Did I lose all of my Belly Points?</button>
										<div class="panel">
										  <p>All Belly acitivity is tied to your email address. As long as you are logged into your app with the same email address and password used with your old phone, the app on your new phone will have all of your points.</p>
										</div>

										<p class="secHead">Treaty Account</p>
										<button class="accordion">  I forgot my password.</button>
										<div class="panel">
										  <p>Too many passwords, we get it. Visit bellycard.com and follow the instructions below:

											Click on “Sign In” or “Sign Out”
											Click "Don’t know your password?"
											Enter in the email address linked to your Belly account
											Once submitted, you’ll receive an email - ignore the screen that you see after submitting
											Open up the email and click on the link to reset your password
											Enter in the password you’d like to use TWICE for confirmation
											Remember: It is case sensitive!</p>
										</div>
										<button class="accordion"> I want to unsubscribe from emails.</button>
										<div class="panel">
										  <p> This makes us sad. But if you really want to update your email settings, follow these steps:

											Sign into your account at bellycard.com
											In the upper right hand corner choose “My Account”, and then “Settings”.
											Choose the tab on the left that says “Email Preferences”.
											Uncheck notications that you no longer wish to receive.</p>
										</div>

										<p class="secHead">Treay Rewards</p>
										<button class="accordion"> How do I earn points?</button>
										<div class="panel">
										  <p> Points are earned by scanning the barcode of your BellyCard or on your Belly mobile app on the in-store tablet.</p>
										</div>
										<button class="accordion"> If I don’t have my card with me‚ how do I earn points for my visit?</button>
										<div class="panel">
										  <p>You can check in with the email associated with your account. For security reasons, you cannot get a reward when using your email address. Make sure you use your card or app next time!</p>
										</div>
										<button class="accordion"> I want to see all of the points I have earned at different stores. How do I do that?</button>
										<div class="panel">
										  <p>Visit bellycard.com:

											Sign into your account
											Choose Dashboard
											Scroll down and you’ll see your point activity</p>
										</div>
										<button class="accordion"> Do I need to purchase something to get my Belly Points?</button>
										<div class="panel">
										  <p>It’s up to the business to decide but most require Belly Members to make a purchase when they check in.</p>
										</div>
										<button class="accordion"> Do Belly Points expire?</button>
										<div class="panel">
										  <p>Your Belly Points will never expire and can be redeemed at your leisure for as long as the business has its loyalty program.</p>
										</div>
										<button class="accordion"> My favorite business just uninstalled Belly. What happens to my points?</button>
										<div class="panel">
										  <p>Unfortunately there’s not much we can do if a business decides to end their loyalty program. However, if you earned points at a multi-location business and one decides to no longer use Belly, you can redeem your points at one of their locations that still uses Belly.</p>
										</div>
										<button class="accordion">How do I redeem points for rewards?</button>
										<div class="panel">
										  <p>Just scan your card on the iPad like you normally would and you will see a list of rewards for that business! Choose the point value of the reward you’d like to redeem, confirm it and show the nearest employee the confirmation screen.</p>
										</div>
										<button class="accordion">Why can’t I redeem points for rewards when I check in with my email address?</button>
										<div class="panel">
										  <p>You can only get rewards by checking in with either the physical BellyCard or your mobile app. We don’t want someone who knows your email address to be able to get your rewards!</p>
										</div>
										<button class="accordion">  What happens to my point total after I redeem points for a reward?</button>
										<div class="panel">
										  <p>The point value of the reward is subtracted from your total points. For example, if you have 20 points and redeem a reward for 20 points, then you will have 0 points at that business. If you have 20 points and redeem a reward for 15 points, you will have 5 points remaining at that location. Math!</p>
										</div>
								</div>
							</div>
				 
	 


							
							<!-- Explore section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">About Treaty</p>
								<div class="agileinfo-recover">
									<button class="accordion">Do I need WiFi for Belly?</button>
										<div class="panel">
										  <p>Yes, WiFi is critical for Belly to work. Members cannot redeem points for rewards if there isn’t a WiFi connection.</p>
									</div>
									<button class="accordion">How do I send an email, offer Belly Bites, track customer activity?</button>
										<div class="panel">
										  <p>Log into the Web Command Center! Create emails and Belly Bites and connect them back to in–store customer activity.</p>
									</div>
									<button class="accordion">How does the redemption process work?</button>
										<div class="panel">
										  <p> After a customer checks in with Belly, they’ll know which rewards they are eligible to redeem if it is blue in their rewards list. Just ask them to the tap the reward on the iPad screen, verify the redemption and show you or an employee.</p>
									</div>
									<button class="accordion">Why is this Member having issues redeeming a reward?</button>
										<div class="panel">
										  <p>Make sure that your WiFi is connected! Members must have a verified BellyCard account and enough points to redeem each reward; this can be confirmed if the reward appears in blue after they check in with Belly.</p>
									</div>
									<button class="accordion">Can customers redeem points at my business that they have earned at other Belly Businesses?</button>
										<div class="panel">
										  <p>No, points are specific to the location they were earned at.</p>
									</div>
									<p class="secHead">Treaty Account</p>
									<button class="accordion">How do I change/edit my rewards?</button>
										<div class="panel">
										  <p> You can edit rewards directly from the iPad in the Command Center. Check in with your Partner Card and click “Edit Rewards.”</p>
									</div>
									<button class="accordion">How do I keep track of redemptions?</button>
										<div class="panel">
										  <p> You can view redemption data on the Web Command Center by clicking on the “Rewards” tab on the left.</p>
									</div>
									

									<p class="secHead">Add Redeem Treay Rewards</p>
									<button class="accordion">How can I add points to customer account?</button>
										<div class="panel">
										  <p>Follow the below steps : <br> Login to your Treaty account<br>Go to dashboard<br>In add/redeem rewards section scan the QR code from customer mobile phone<br>add amount the customer has spent on your business<br>Click on Add Rewards button</p>
									</div>
									<button class="accordion">How can I redeem points for customer?</button>
										<div class="panel">
										  <p><p>Follow the below steps : <br> Login to your Treaty account<br>Go to dashboard<br>In add/redeem rewards section scan the QR code from customer mobile phone<br>Select the offer customer want to redeem<br>Click on Redeem Rewards button</p></p>
									</div>
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
		
	?>
	
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("activeClass");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
</body>
</html>
