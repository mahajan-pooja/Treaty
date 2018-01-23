<!DOCTYPE html>
<html>
<head>

	<title>Customer Dashboard</title>

	<!-- For-Mobile-Apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Travel Packages Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps -->

	<!-- Style -->
	<link rel="stylesheet" href="css/user-dashboard.css" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- Default-JavaScript-File --> <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/user-dashboard.js"></script>

	<!-- Web-Fonts -->
		<link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<!-- //Web-Fonts -->

</head>
<body>

	<h1>Customer Dashboard</h1>

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
							<li class="resp-tab-item"><i class="fa fa-plane" aria-hidden="true"></i>Profile</li>
							<li class="resp-tab-item"><i class="fa fa-university" aria-hidden="true"></i>Rewards</li>
							<li class="resp-tab-item"><i class="fa fa-suitcase" aria-hidden="true"></i>QR Code</li>
							<li class="resp-tab-item"><i class="fa fa-car" aria-hidden="true"></i>Explore</li>
							<li class="resp-tab-item"><i class="fa fa-ship" aria-hidden="true"></i>Change Password</li>
						</ul>
					</div>

					<div class="tab-right">
						<div class="resp-tabs-container">
							<!-- Customer Profile section -->
							<div class="tab-1 resp-tab-content">
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
										<p class="notPara"><br>Do you want offer notifications?  <input type="checkbox" name="notifyCheck" checked></p>
										
										<!-- <input placeholder="Date" class="date" id="datepicker" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/> -->
										<!-- <div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											  <select>
												<option value="0">Destination City</option>
												<option value="1">city1</option>
												<option value="2">city2</option>
												<option value="3">city3</option>
												<option value="4">city4</option>
											  </select>
											</div>
											<div class="section_class_agileits sec-right">
											  <select>
												<option value="0">select class</option>
												<option value="1">Any</option>
												<option value="3">Economy Class</option>
												<option value="2"> Business Class</option>
												<option value="1">First Class</option>
											  </select>
											</div>	
											<div class="clear"></div>
										</div> -->	
										<!-- <div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											 <select>
												<option value="0">Adults</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>	
											<div class="section_class_agileits sec-right">
											  <select>
												<option value="0">Children</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>
											<div class="clear"></div>
										</div>	 -->			
										<div class="submit"><br>
										  <input type="submit" value="Submit"><br><br>
										  <input type="submit" value="Update Profile" onClick="loadData()"><br><br>
										  <input type="submit" value="Delete Profile" onClick="deleteCustomer()">
										</div>   
									</form>	
								</div>
							</div>
							<!-- Customer Rewards section -->
							<div class="tab-1 resp-tab-content">
								<div class="register agileits">
									<div class="business_name">
										<span>Walmart</span>
										<img class="downImg" id="downImg" src="images/down.png" width="100" height="100" onclick="loadPoints();"><br>
										<div class="pointsDiv" id="pointsDiv">
										Reward Points - 20<br>
										Expires On - 01/22/2018 
										</div>
									</div>

								<!-- <form action="#" method="post" class="agile_form">
										<input type="text" placeholder="Your Name" name="name" class="name agileits" required=""/>
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											  <select>
												<option value="0">Destination City</option>
												<option value="1">city1</option>
												<option value="2">city2</option>
												<option value="3">city3</option>
												<option value="4">city4</option>
											  </select>
											</div>
											
											<div class="clear"></div>
										</div>
										<input placeholder="Check in date" class="date" id="datepicker3" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<input placeholder="Check out date" class="date" id="datepicker4" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>										
										<div class="section_class_agileits sec-right">
											  <select>
												<option value="0">Rooms</option>
												<option value="1">Single Room</option>
												<option value="3">Double Room</option>
												<option value="2">Suit Room</option>
				
											  </select>
											</div>
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											 <select>
												<option value="0">Adults</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>	
											<div class="section_class_agileits sec-right">
											  <select>
												<option value="0">Children</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>
											<div class="clear"></div>
										</div>				
										<div class="submit">
										  <input type="submit" value="search">
										</div>   
									</form> -->	
								</div>
							</div>
							<!-- QR Code -->
							<div class="tab-1 resp-tab-content gallery-images">
								<div class="wthree-subscribe">	
									<p style="color: white;text-align: center;">Your QR code - </p><br>
									<?php 
										include 'GenerateQR/QRGenerator.php';
									?>


									<!-- <form action="#" method="post" class="agile_form">
										<input type="text" placeholder="Your Name" name="name" class="name agileits" required=""/>
										<input type="text" placeholder="Going to landmark" name="name" class="name agileits" required=""/>
										
										<input placeholder="Check in date" class="date" id="datepicker1" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<input placeholder="Check out date" class="date" id="datepicker2" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>										
										
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											 <select>
												<option value="0">Guests</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>	
											
										</div>				
										<div class="submit">
										  <input type="submit" value="search">
										</div> 
									</form> -->
								</div>
							</div>
							<!-- Explore section -->
							<div class="tab-1 resp-tab-content">
								<div class="agileinfo-recover">
									<div class="business_cat_name">
										<span>Restaurant</span>
										<img class="downImg" id="business_title_downImg" src="images/down.png" width="100" height="100" onclick="loadSubCat();"><br>
										<div class="business_title" id="business_title">
											<span>Subway</span>
											<img class="downImg" id="offer_downImg" src="images/down.png" width="100" height="100" onclick="loadOffer();"><br>
											<button style="padding: 1%;color: red;" value="Subscribe" name="subscribe">Subscribe</button>
											<div class="offer" id="offer">1 Sandwich free salad for 100 points</div>
										</div>
									</div>
								<!-- <form action="#" method="post" class="agile_form">
										<input type="text" placeholder="Your Name" name="name" class="name agileits" required=""/>
										<input type="text" placeholder="Picking up" name="name" class="name agileits" required=""/>
										<input type="text" placeholder="Dropping off" name="name" class="name agileits" required=""/>
										<input placeholder="Pick-up date" class="date" id="datepicker5" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<input placeholder="Drop-off date" class="date" id="datepicker6" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>										
										
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											 <select>
												<option value="0">Guests</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>	
											
										</div>				
										<div class="submit">
										  <input type="submit" value="search">
										</div>  
									</form> -->
								</div>
							</div>
							<!--Change Password-->
							<div class="tab-1 resp-tab-content">
								<div class="agile-send-mail">
								<form action="#" method="post" class="agile_form">
										<input type="text" placeholder="Old Password" name="old-pwd" class="name agileits" required=""/>
										<input type="text" placeholder="New Password" name="new-pwd" class="name agileits" required=""/>
										<input type="text" placeholder="Confirm New Password" name="conf-new-pwd" class="name agileits" required=""/>
										<!-- <input placeholder="Select date" class="date" id="datepicker7" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
										<div class="list_agileits_w3layouts">
											<div class="section_class_agileits sec-left">
											 <select>
												<option value="0">Guests</option>
												<option value="1">0</option>
												<option value="2">1</option>
												<option value="3"> 2</option>
												<option value="4">3 or 3+</option>
											 </select>
											</div>	
											
										</div>	 -->			
										<div class="submit"><br>
										  <input type="submit" value="Submit">
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
	<div class="footer" style="padding: 0.5em 0;">
	<p style="color: #fece1a;">Treaty.com © copyright 2018</p>
</div>
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