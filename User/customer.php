<?php
	// Start the session
	session_start();
	$userid = $_SESSION['userid'];
	require '../config.php';
	
	if(isset($_GET['businessid'])) { 
		$businessid= $_GET['businessid'];
		$query = "SELECT SUM(creditedpoints) as totalpoints
				  FROM businessoffer
				  WHERE businessid=".$sbusinessid;
		$result = $mysqli->query($query);
  		if ($result->num_rows > 0) {
			$totalpoints = $result->fetch_row()[0];
		}
		$query = "SELECT id as totalpoints
		 		  FROM customerbusiness
		 		  WHERE businessid=".$sbusinessid." and userid=".$userid;
		$result = $mysqli->query($query);
  		if ($result->num_rows = 0) {
			//create offer
			$query  = "INSERT INTO customerbusiness(userid, businessid, earnedpoints, isactive, modified, created)
					VALUES (\"" . $userid . "\",\"" . $businessid . "\",\"" . $totalpoints . "\",1, sysdate(), sysdate())";
			$result = $mysqli->query($query);
		}
	}	
	// Rewards Point section
	$query = "SELECT bd.userid,balance, businessname 
			  FROM customerbusiness cb, businessdetail bd  
			  WHERE cb.businessid=bd.userid AND cb.userid=".$userid." AND cb.isactive=1 group by bd.userid"; 
	$result = $mysqli->query($query);
	$rewardsset = array();
	while($row = $result->fetch_assoc()) {
		$address = $row["businessname"] . "-" . $row["balance"];
		array_push($rewardsset, $address);
		$business_owner_id = $row['userid'];
	}
?>
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
    margin-top: 2%;
}
.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.agileinfo-recover .active:after {
    content: "\2212";
}
.panelAccordion{
	background-color: #e6f7c1;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: center;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    margin-top: 1%;
}
.panelAccordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.agileinfo-recover .active:after {
    content: "\2212";
}
.active, .panelAccordion:hover {
    background-color: #A9C750; 
}
.active, .accordion:hover {
    color: white;
}
.offerData{
	display: none;
	background-color: orange;
	padding: 2%;
	text-align: center;
}
.panelContainer{
	display: none;
	text-align: center;
}
.panel {
    padding: 0 18px;
    display: block;
    background-color: white;
/*    overflow: hidden;
*/} 
#media p {
    padding: 0px!important;
    color: #636262;
	font-size:14px;
	font-weight:normal!important;
	margin-bottom: 3px!important;
	word-break: break-word;
}
#media .btn {width:auto!important}
@media screen and (max-width: 384px) {
	#media-pad {padding:3px!important;}
	.tab-right {
		float: none!important;
	}
}
</style> 

	<title>Customer Dashboard</title>

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
	

	<script type="text/javascript">
		//this logic is handled in subscribe.php file instead of refresh
		//function subscribeBusiness(businessid) {
		//	window.location.assign("customer.php#horizontalTab2?businessid="+businessid);
		//TODO REFRESH PAGE
		//}
		// Called on Explore section select dorpdown.        
        function selectedSector(selected_value){
        	var businesssector_id = '';
            businesssector_id = selected_value;  
            
            //Make a Ajax call.
            $.ajax({
                url: "explore_list.php", 
                method: "POST", 
                data: { businesssector_id:businesssector_id},
                success: function(data){
                    //alert (data)
                	$('#explore_section').html(data);
                },
                error: function() {
                x.innerHTML = "Error occured. Unable to make a Ajax call."
				//Add bootstrap to display error on page
              	} 
            });            
        }
        function selectedSectorAll(){
        	var businesssector_id = '';
            businesssector_id = "all";  
            
            //Make a Ajax call.
            $.ajax({
                url: "explore_list.php", 
                method: "POST", 
                data: { businesssector_id:businesssector_id},
                success: function(data){
                    //alert (data)
                	$('#explore_section').html(data);
                },
                error: function() {
                x.innerHTML = "Error occured. Unable to make a Ajax call."
				//Add bootstrap to display error on page
              	} 
            });
        }
        //Show Modal
        function show_modal(bid){
            //Make a Ajax call to collect data
         	$.ajax({
                url: "explore_view_details.php", 
                method: "POST", 
                data: { business_id:bid},
                success: function(data){
                    //alert (data)
                	$(".modal-body").html(data);
                	$("#myModal").modal();
                },
                error: function() {
                x.innerHTML = "Error occured. Unable to make a Ajax call."
				//Add bootstrap to display error on page
              	} 
            });  
           //$(".modal-body").html(data);
            //$("#myModal").modal();
    	}
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                            <li><a href="../index.php">Home</a></li>
                            <li class="active"><a href="customer.php">Dashboard</a></li>
                            <li><a href="find_location.php">Find Location</a></li>
                            <li><a href="customer_profile.php">Profile</a></li>
                            <li><a href="../logout.php">Logout</a></li>                           
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <span class="loginName">
        	<?php 
        		$Qry = "SELECT firstname, lastname
						  FROM userdetail
                          WHERE userid=\"" . $userid . "\" and isactive = 1";
                $result = $mysqli->query($Qry);
                if ($result->num_rows > 0) {
                	$row = $result->fetch_assoc();
                	echo "Hello, ". $row['firstname']." ".$row['lastname'];
                }
        	?>    	
        </span>
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
										include 'QRGenerator.php';
										//code to get user mobile number
							            $query = "Select phonenumber from user
							            where id = ".$userid;
							            
							            $result = $mysqli->query($query);
							            while($row = $result->fetch_assoc()){ 
							                $phone = $row['phonenumber'];
							                $_SESSION["phone"] = $phone;
							            }
										$ex1 = new QRGenerator();
										echo "<img style='max-width:100%;margin-left:25%;' src=".$ex1->generate().">";
									?>
                                    <br><br>
								</div>
							</div>
							<!-- Customer Rewards section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Your Reward Points</p>

								<div class="agileinfo-recover">
									<?php foreach($rewardsset as $value): ?>
										<button class='accordion'>
											<?php echo explode("-",$value)[0];?></button>
											<div class="panelContainer">
												Reward Points - <?php echo explode("-",$value)[1]; ?><br><br>
												<a href="unsubscribe.php?bid=<?php echo $business_owner_id; ?>" style="color: brown;border:none;">Unsubscribe</a>

											</div>
										
									<?php endforeach; ?>
									<!-- <?php //foreach($rewardsset as $value): ?>
										<div class="business_name">
											<span class="b_name"><?php //echo explode("-",$value)[0];?></span>
											<img class="downImg" id="downImg" src="images/down.png" width="100" height="100" onclick="loadPoints();"><br>
											<div class="pointsDiv" id="pointsDiv">
												Reward Points - <?php //echo explode("-",$value)[1];?><br><br>
												<a href="" style="color: brown;border:none;">View Details</a>
											</div>
										</div>
									<?php //endforeach; ?> -->
								</div>	
								</div>
							</div>
							
							<!-- Explore section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Explore Business supporting Treaty Rewards</p>
								<?php
									$query = "SELECT id , businesssectortext FROM businesssector;";
					                $result = $mysqli->query($query); 
					                $show_select = "Filter Results for &nbsp;&nbsp;&nbsp;<select name='businessCategory' onChange = 'selectedSector(this.value);'>";
					                $show_select = $show_select . "<option value='all'>All</option>";
					                    
					                while($row = mysqli_fetch_array($result)){
					                    $show_select = $show_select . "<option value='".$row['id']."'>".$row['businesssectortext']."</option>";              
					                }
					                $show_select = $show_select . "</select><br><br>";
					                echo $show_select;
					                echo '<script type="text/javascript"> selectedSectorAll();</script>';
								?>
								<!-- By default Print explore section-->

								<div id = "explore_section" style="height: 650px;overflow-y: auto;">
																		
								</div>
							</div>
							<!-- Customer Profile section -->
							<div class="tab-1 resp-tab-content">
								<p class="secHead">Your Profile</p>
								<div class="w3l-sign-in">
									<form method="post" class="agile_form">
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
										  <input type="submit" value="Submit"><br><br>
										  <input type="submit" value="Update Profile" onClick="loadData()"><br><br>
										  <input type="submit" value="Delete Profile" onClick="deleteCustomer()">
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
	<?php
		include 'footer.php';
		
	?>
	<!--start-date-piker-->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
			<script>
				$(function() {
				$( "#datepicker,#datepicker1,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7" ).datepicker();
				});
			</script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/modernizr.custom.js"></script>            
<!-- 97-rgba(0, 0, 0, 0.75)/End-date-piker -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
var pAcc = document.getElementsByClassName("panelAccordion");
var j;
for (j = 0; j < pAcc.length; j++) {
    pAcc[j].addEventListener("click", function() {
        this.classList.toggle("active");
        var panelAcc = this.nextElementSibling;
        if (panelAcc.style.display === "block") {
            panelAcc.style.display = "none";
        } else {
            panelAcc.style.display = "block";
        }
    });
}
</script>
<?php
/* close connection */
	$mysqli->close();
?>
</body>
</html>