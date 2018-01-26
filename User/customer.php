<!DOCTYPE html>
<html class=" js cssanimations csstransitions">
<head>

	<title>Customer Dashboard</title>

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
		include 'customer_nav.html';
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
							<li class="resp-tab-item"><i class="fa fa-suitcase" aria-hidden="true"></i>QR Code</li>
							<li class="resp-tab-item"><i class="fa fa-university" aria-hidden="true"></i>Rewards</li>
							<li class="resp-tab-item"><i class="fa fa-car" aria-hidden="true"></i>Explore</li>
						</ul>
					</div>

					<div class="tab-right">
						<div class="resp-tabs-container">
							<!-- QR Code -->
							<div class="tab-1 resp-tab-content gallery-images">
								<div class="wthree-subscribe">	
									<p class="secHead">Your QR Code</p><br>
									<?php 
										include 'GenerateQR/QRGenerator.php';
										$ex1 = new QRGenerator(); 
										echo "<img style='width:65%;margin-left:15%;' src=".$ex1->generate().">";
									?>
								</div>
							</div>
							<!-- Customer Rewards section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Your Reward Points</p>
								<div class="register agileits">
									<div class="business_name">
										<span class="b_name">Walmart</span>
										<img class="downImg" id="downImg" src="images/down.png" width="100" height="100" onclick="loadPoints();"><br>
										<div class="pointsDiv" id="pointsDiv">
										Reward Points - 20<br><br>
										<a href="" style="color: orange;">View Details</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Explore section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Explore Business supporting Treaty Rewards</p>
								<div class="agileinfo-recover">
									<div class="business_cat_name">
										<span class="b_name">Restaurant</span>
										<img class="downImg" id="business_title_downImg" src="images/down.png" width="100" height="100" onclick="loadSubCat();"><br>
										<div class="business_title" id="business_title">
											<div>
												<span class="bus_name">Subway</span> 
												<a href="" style="color: orange;margin-left: 5%;">View Details</a>
												<button style="padding: 1%;color: red;margin-top: 1%;margin:0% 5% 0% 5%;" value="Subscribe" name="subscribe">Subscribe</button>
												<img class="downImg" id="offer_downImg" src="images/down.png" width="100" height="100" onclick="loadOffer();">
											</div>
											
											
											<div class="offer" id="offer">1 Sandwich free salad for 100 points</div>
										</div>
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
	<?php include 'footer.php' ?>
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