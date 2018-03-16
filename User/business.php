<?php
	// Start the session
	session_start();
?>
<!DOCTYPE html>
<html class=" js cssanimations csstransitions">
	<head>
		<title>Business Dashboard</title>

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

		<?php include 'header.php'; ?>

		<!-- Script for image display after selection -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript">
			function displayImage(input) {
	    		if (input.files && input.files[0]) {
	        	var reader = new FileReader();
	        	reader.onload = function (e) {
	        	$('#image').attr('src', e.target.result);
	       		}
	        reader.readAsDataURL(input.files[0]);
	       }
	    }
		</script>
		<script type="text/javascript">
			function resetImage(){
		        document.getElementById('image').src="images/default-image.png";
		    }
	    </script>
        <style>
		.agile_form textarea {
			padding: 0.5em 1em;
			color: #000;
			width: 90.1%;
			font-size: 13px;
			outline: none;
			border: 1px solid #ccc;
			border-radius: 3px;
			letter-spacing: 1px;
			-webkit-appearance: none;
			margin: 5px;
		}		
		</style>
	</head>
	<?php
		

        require '../config.php';

        if (isset($_POST['fname'])) {
            $fname = $_POST['fname'];
        }
        if (isset($_POST['lname'])) {
           $lname = $_POST['lname'];
        }
        if (isset($_POST['businessSector'])) {
           $lname = $_POST['businessSector'];
        }
        if (isset($_POST['businessphonenumber'])) {
            $businessphonenumber = $_POST['businessphonenumber'];
        }
        if (isset($_POST['address1'])) {
            $address1 = $_POST['address1'];
        }
        if (isset($_POST['address2'])) {
            $address2 = $_POST['address2'];
        }
        if (isset($_POST['city'])) {
            $city = $_POST['city'];
        }
        if (isset($_POST['state'])) {
            $state = $_POST['state'];
        }
        if (isset($_POST['country'])) {
            $country = $_POST['country'];
        }
        if (isset($_POST['zipcode'])) {
            $zipcode = $_POST['zipcode'];
        }
        if (isset($_POST['oName'])) {
            $oName = $_POST['oName'];
        }
        if (isset($_POST['oDesc'])) {
            $oDesc = $_POST['oDesc'];
        }
        if (isset($_POST['oPoints'])) {
            $oPoints = $_POST['oPoints'];
        }
        if (isset($_POST['datepicker1'])) {
            $datepicker1 = $_POST['datepicker1'];
        }
        if (isset($_POST['datepicker2'])) {
            $datepicker2 = $_POST['datepicker2'];
        }
        if (isset($_POST['taskOption'])) {
            $selectOption = $_POST['taskOption'];
        }
        if(isset($_POST['businessdescriptions'])){
        	$businessdescription = $_POST['businessdescriptions'];
        }

        $userid = $_SESSION['userid'];
        if (!empty($fname)) {
        	//create business
        	// Find Lon and Lat of address
        	$complete_business_address = $address1.",".$address2.",".$city.",".$state.",".$country.",".$zipcode;
			$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($complete_business_address).'&sensor=false');
			$geo = json_decode($geo, true);
			if (isset($geo['status']) && ($geo['status'] == 'OK')) {
			  $latitude = number_format($geo['results'][0]['geometry']['location']['lat'],6); // Latitude
			  $longitude = number_format($geo['results'][0]['geometry']['location']['lng'],6); // Longitude
			}

			// If Image is selected
			if(!empty($_FILES['image']['name'])){
            	$filename = addslashes($_FILES["image"]["name"]);
				$tmp_name = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
				$file_type = addslashes($_FILES["image"]["type"]);
				$ext_array = array('jpg','jpeg','png');
				$ext = pathinfo($filename,PATHINFO_EXTENSION);
				if(in_array($ext,$ext_array)){
					$query  = "INSERT INTO businessdetail(userid, businessname, businesssector, address1, address2, city, state, country, zipcode,businessphonenumber,latitude, longitude,businessimage,businessdescription, modified, created) VALUES (\"" . $_SESSION['userid'] . "\",\"" . $fname . "\",\"" . $lname . "\",\"" . $address1 . "\",\"" . $address2 . "\",\"" . $city . "\",\"" . $state . "\",\"" . $country . "\",\"" . $zipcode . "\",\"". $businessphonenumber ."\",\"". $latitude ."\",\"".$longitude."\",\"". $tmp_name ."\",\"".$businessdescription."\", sysdate(), sysdate())";
					$result = $mysqli->query($query);
        			if($result) {

        				//-------Added to solve email error-----
						$query = "SELECT email FROM user WHERE id=\"" . $userid . "\" and isactive=1";
						$result = $mysqli->query($query);
          				if ($result->num_rows > 0) {
          					$row = $result->fetch_array();
				    		$email = $row["email"];
				    	}
				    	//-------Added to solve email error end-----

	                	$_SESSION["businessname"]   = $fname;
	                	$_SESSION["businesssector"] = $lname;
										//send email
				        $subject = "You have registered a new business!!";
				        //$message = "Please use this password to login ".$password."<br> Please click on this link";
				        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				                       <html xmlns="http://www.w3.org/1999/xhtml">
				                       <head>
				                       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				                       </head>
				                       <body style="background-color:#ffb900;margin:0 auto;text-align: center;width: 500px;padding-top:5%;">
				                       <img src="https://i2.wp.com/beanexpert.online/wp-content/uploads/2017/06/reset-password.jpg?resize=380%2C240&ssl=1">
				                       <div>
			                               <p> You have registered your business </p>
										   <p> Business Name : '.$fname.'</p>
										   <p> Business Sector : '.$lname.'</p>
				                       </div>
				                       </body>
				                       </html>';
				        $headers = "From : treatyrewards@gmail.com";
				        $headers = 'MIME-Version: 1.0' . "\r\n";
				        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						if(mail($email, $subject, $message, $headers)){
		            		echo '<script>window.location.href = "business.php#horizontalTab3";</script><meta http-equiv="refresh" content="0">';
						}
                	} else {
                    	echo "Your Business could not be added. Please Try again.";                         	            	
                	}
				}else{
						echo 'Only JPEG and PNG Images can be uploaded';
					}
				}else{
					echo 'Please Select a Image for your Business';
				}
        } else if(!empty($oName)) {
            //create offer
            $query  = "INSERT INTO businessoffer(userid, offername, offerdescription, creditedpoints, startdate, expirationdate, isactive, modified, created)
                    	VALUES (\"" . $userid . "\",\"" . $oName . "\",\"" . $oDesc . "\",\"" . $oPoints . "\",\"" . $datepicker1 . "\",\"" . $datepicker2 . "\", 1, sysdate(), sysdate())";
            $result = $mysqli->query($query);
            if ($result) {
							//send mail to business owner
							$query = "SELECT email FROM user WHERE id=\"" . $userid . "\" and isactive=1";
							$result = $mysqli->query($query);
          					if ($result->num_rows > 0) {
          					$row = $result->fetch_array();
				    		$email = $row["email"];

								//send email
								$subject = "You have created a new offer!!";
								$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
											 <html xmlns="http://www.w3.org/1999/xhtml">
											 <head>
											 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
											 </head>
											 <body style="background-color:#ffb900;margin:0 auto;text-align: center;width: 500px;padding-top:5%;">
											 <img src="https://i2.wp.com/beanexpert.online/wp-content/uploads/2017/06/reset-password.jpg?resize=380%2C240&ssl=1">
											 <div>
												 <p> You have registered your business </p>
												 <p> Offer Name : '.$oName.'</p>
												 <p> Offer Desc : '.$oDesc.'</p>
												 <p> Offer Points : '.$oPoints.'</p>
											 </div>
											 </body>
											 </html>';
								$headers = "From : treatyrewards@gmail.com";
								$headers = 'MIME-Version: 1.0' . "\r\n";
								$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								mail($email, $subject, $message, $headers);
								//send mail to all customers subscribed to this business
								$query = "select email from user where id IN (select userid from customerbusiness where businessid = ".$userid.")";
								$result = $mysqli->query($query);
			        	if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
												$email = $row["email"];
												//send email
												$subject = "You have created a new offer!!";
												$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
															 <html xmlns="http://www.w3.org/1999/xhtml">
															 <head>
															 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
															 </head>
															 <body style="background-color:#ffb900;margin:0 auto;text-align: center;width: 500px;padding-top:5%;">
															 <img src="https://i2.wp.com/beanexpert.online/wp-content/uploads/2017/06/reset-password.jpg?resize=380%2C240&ssl=1">
															 <div>
																<p> A new offer has been created for the business you a </p>
															 </div>
															 </body>
															 </html>';
												$headers = "From : treatyrewards@gmail.com";
												$headers = 'MIME-Version: 1.0' . "\r\n";
												$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
												mail($email, $subject, $message, $headers);
										}
								}
	            	//send sms to customers subscribed to the business when offer is created.
	            	$qry = "SELECT cb.userid, u.phonenumber,bd.businessname
								FROM customerbusiness cb, user u, businessdetail bd
								WHERE cb.businessid=" . $userid . " and cb.userid = u.id and cb.businessid = bd.userid";
                $resultQry = $mysqli->query($qry);
								
                if ($resultQry->num_rows > 0) {
                    while($row = $resultQry->fetch_assoc()){
		                   	$text = "New offer at ".$row['businessname'].".\n".$oName."\n ".$oDesc."\nExpires on - ".$datepicker2."\n";
		                    $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
										        'api_key' => d0fbd93d,
										        'api_secret' => bcaca354e0887dd9,
										        'to' => $row['phonenumber'],
										        'from' => 12034089447,
										        'text' => $text
						    				]);
												$ch = curl_init($url);
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												$response = curl_exec($ch);
												curl_close($ch);
	                	}
                }
	            	//redirect to business.php page after sending sms to customers
                echo ' <script>window.location.href = "business.php#horizontalTab2";</script><meta http-equiv="refresh" content="0">';
						 }
      	}
		} else {
            //TODO : this should be called on tab change
            //load businessname and sector
            $query = "SELECT a.businessname, a.businesssector,a.businessdescription,b.businesssectortext
						FROM businessdetail as a JOIN businesssector as b ON a.businesssector = b.id
						WHERE userid=\"" . $userid . "\" LIMIT 1";

            $result = $mysqli->query($query);
            $businessresultset = array();
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                array_push($businessresultset, $row["businessname"]);
                array_push($businessresultset, $row["businesssector"]);
                array_push($businessresultset, $row["businesssectortext"]);
                array_push($businessresultset, $row["businessdescription"]);
            }

        	//get the offer business details
            $query = "SELECT id, address1, city
                      FROM businessdetail
                      WHERE userid=\"" . $userid . "\" and isactive=1";

            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                $businessrow = $result;
                $resultset   = array();
                while ($row = $businessrow->fetch_assoc()) {
                    //$addr = $row[0] . "-" . $row[1] . ", " . $row[2];
                    $addr = $row['id'] . "-" . $row['address1'] . ", " . $row['city'];
                    array_push($resultset, $addr);
                }
            } else {
                unset($_SESSION["businessname"]);
                unset($_SESSION["businesssector"]);
            }

			//get business list
			$query = "SELECT id, businessname, businesssector, address1, address2, city, state, country, zipcode
					  FROM businessdetail
                      WHERE userid=\"" . $userid . "\" and isactive = 1";

	        $result = $mysqli->query($query);
	        $businesslistresultset = array();
	        if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$address = $row["address1"] . "," . $row["city"] . ", " . $row["state"]. ", " . $row["country"]. "-" . $row["id"];
					array_push($businesslistresultset, $address);
				}
	        }

			//get offers list
			$query = "SELECT id, offername, creditedpoints, offerdescription
					  FROM businessoffer
                      WHERE userid=\"" . $userid . "\" and isactive = 1";

            $result = $mysqli->query($query);
            $offerlistresultset = array();
            if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$address = $row["offername"] . "@" . $row["creditedpoints"] . " points". "@" . $row["id"]. "@" . $row["offerdescription"];
					array_push($offerlistresultset, $address);
				}
            }
    	}
    ?>
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
							<?php
                                if(isset($_SESSION['displaydashboard'])){
                                    echo "<li class='active'><a href='business.php'>Dashboard</a></li>";
                                }
                            ?>
                            <li><a href="customer_list.php">Customers</a></li>
                            <li><a href="business_profile.php">Profile</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <span class="loginName">
        	<?php
        		$loginNameQry = "SELECT firstname, lastname
						  FROM userdetail
                          WHERE userid=\"" . $userid . "\" and isactive = 1";

                $resultName = $mysqli->query($loginNameQry);
                if ($resultName->num_rows > 0) {
                	$row = $resultName->fetch_assoc();
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
						function editBusiness(businessid){
							window.location.assign("edit_business.php?businessid="+businessid);
						}
						function editOffer(offerid){
							window.location.assign("edit_offer.php?offerid="+offerid);
						}
					</script>
					<div class="tabs">
						<div class="tab-left">
							<ul class="resp-tabs-list" style="margin: 0px;">
								<li class="resp-tab-item-business" onclick="loadScan();"><i class="fa fa-calculator" aria-hidden="true"></i>Add/Redeem Rewards</li>
								<li class="resp-tab-item-business"><i class="fa fa-star" aria-hidden="true"></i>Offers</li>
								<li class="resp-tab-item-business"><i class="fa fa-briefcase" aria-hidden="true"></i>Business</li>
								<li class="resp-tab-item-business"><i class="fa fa-map-marker" aria-hidden="true"></i>Register Business</li>
								<li class="resp-tab-item-business"><i class="fa fa-cogs" aria-hidden="true"></i>Create Offer</li>
							</ul>
						</div>
						<div class="tab-right">
							<div class="resp-tabs-container">
								<!-- Add Rewards section -->
								<div class="tab-1 resp-tab-content">
									<p class="secHead">Add & Redeem Rewards</p>
									<div class="agileinfo-recover">
										<?php
											include 'qrscanner/qrscanner.php';
											?>
												<p class="b_name" id="custPoints" style="color: white;font-size: 150%;">
											 <?php
											 $points = 0;
											//get customer points for add redeem
								            if(isset($_GET['apcm'])){

							            	$decodePhn = base64_decode($_GET['apcm']);
								            $query = "Select u.id, c.balance, ud.firstname, ud.lastname from user u, customerbusiness c, userdetail ud where u.phonenumber = \"" . $decodePhn . "\" and u.id = c.userid and u.id = ud.userid and u.isactive=1 and c.businessid = ".$userid;
								            $result = $mysqli->query($query);
								                $offerlistresultset = array();
								                if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														$points = $row["balance"];
														$uid = $row["id"];
														$uname = $row["firstname"]." ".$row["lastname"];

													}
													echo $uname. " have ";

								                }
								                if($points == ''){
													echo "<script>
								                	alert('This is not your subscribed customer. QR code invalid.');
								                	window.location.href = 'business.php';
								                	</script>";
								                ?>
								                <div id="invalidCust" class="modal" style="display: block;">
													<p class="modal-content">This is not your subscribed customer. QR code invalid.</p>
													<button onclick="window.location.href = 'business.php'" class="popButton">OK</button>
												</div>
								                <script>
								                document.getElementById('invalidCust').style.display='block';
								                </script>
								            <?php
								                }else{
								                	echo $points. " Reward points.";
								                }
								            }
											?>
										</p>
										<br>
										<div class="addReward">
											<p style="font-size: 150%;color:black;">--- Add Rewards ---</p>
											<br>
											<form action="addRewards.php?bid=<?php echo $userid;?>&cid=<?php echo $uid;?>" method="post" class="agile_form">
												<input style="width: 50%;" type="text" name="amount" id="amount" placeholder="Amount"><br>
												<div class="submitButton"><br>
													<input type="submit" value="Add Rewards">
												</div>
											</form>
										</div>
										<br>
										<div class="addReward">
											<p style="font-size: 150%;color:black;">--- Redeem Rewards ---</p>
											<br>
											<form action="redeemRewards.php?bid=<?php echo $userid;?>&cid=<?php echo $uid;?>" method="post" class="agile_form">
												<?php
												$current_date = date("Y/m/d");
												$queryOffer = "select id, offername, offerdescription, creditedpoints from businessoffer where userid=".$userid." and creditedpoints <= ".$points." and expirationdate >= '".$current_date."'";
												$resultOffer = $mysqli->query($queryOffer);
								                if ($resultOffer->num_rows > 0) { ?>
								                <select name="offerToRedeem" id="offerSelect" onchange="offerFunction(this)" style="width: 50%;">
								                	<option>--Select Offer--</option>
								                <?php
								                	while($row = $resultOffer->fetch_assoc()) {
								                    ?>
								                    <option value = "<?php echo $row['creditedpoints'];?>"><?php echo $row['offername']." - ".$row['offerdescription']." - ".$row['creditedpoints'];?></option>
								                    <?php
								                	}
								                	?></select><br>
								                	<p style="width: 100%;display: none;margin-bottom: 0px; padding-bottom: 0px;" id="offerPoint"></p><br>
								                	<input type="text" name="redeemPoints" id="redeemPoints" style="display: none;">
												<div class="submitButton"><br>
													<input type="submit" value="Redeem Rewards">
												</div>
											</form><?php
								            	}else{
								            		if(isset($_GET['apcm'])){
								            		echo "<p>No offers to redeem as customer has low reward balance.</p>";
								            		}else{
								            		echo "<p>Scan customer QR code to redeem offer.</p>";
								            		}
													echo '</form>';

								            	}

												?>
												<script>
												function offerFunction(data) {
												    var x = document.getElementById("offerSelect").value;
												    document.getElementById("offerPoint").style.display = 'block';
												    document.getElementById("offerPoint").innerHTML = x+" Points will be redeemed.";
												    document.getElementById("redeemPoints").value = data.value;
												}
												</script>

										</div>
                                        <br><br>
									</div>
								</div>
								<!-- All Offers section -->
								<div class="tab-1 resp-tab-content">
									<p class="secHead">Your Business Offers</p>
									<div class="register agileits">
										<?php foreach($offerlistresultset as $value): ?>
											<div class="offerDiv">
												<span class="offerDesc"><?php echo explode("@",$value)[0];echo "<br>";echo explode("@",$value)[3];?></span>
                                                <span><i style="color:#333;cursor: pointer;" class="fa fa-4x fa-pencil-square-o" aria-hidden="true" onClick="editOffer(<?php echo explode("@",$value)[2]; ?>)"></i></span>
												<?php /*?><img class="btn" width="100" src="images/setting.png" height="100" onClick="editOffer(<?php echo explode("@",$value)[2]; ?>)"></img><?php */?>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<!-- All Business section -->
								<div class="tab-1 resp-tab-content">
									<p class="secHead">Your Business Branch List</p>
									<div class="register agileits">
										<?php foreach($businesslistresultset as $value): ?>
											<div class="offerDiv">
												<span class="offerDesc"><?php echo explode("-",$value)[0];?></span>
                                                <span><i style="color:#333;cursor: pointer;" class="fa fa-4x fa-pencil-square-o" aria-hidden="true" onClick="editBusiness(<?php echo explode("-",$value)[1]; ?>)"></i></span>
												<?php /*?><img class="btn" width="100" src="images/setting.png" height="100" onClick="editBusiness(<?php echo explode("-",$value)[1]; ?>)"></img><?php */?>
											</div>
									    <?php endforeach; ?>
									</div>
								</div>
								<!-- Register Business section -->
								<div class="tab-1 resp-tab-content">
									<p class="secHead">Register Your Business</p>
									<div class="register agileits">

										<form method="post" class="agile_form" enctype="multipart/form-data" runat="server">
											<table style="width: 93.6%;">
                                        	<tr>
                                            	<td style="padding-left: 3%;">
	                                            	<div style="width: 100px;height: 100px;border: 1px solid #ccc;margin-bottom: 5px;">
	                                            	<img src = "images/default-image.jpg" alt = "Upload Image" id = "image" width="100px" />
	                                            	</div>
                                            	</td>

                                            	<td style="vertical-align: bottom;width: 100%;">
                                            		<input type="file" name="image" onchange= "displayImage(this)" required="" style="padding: 0.5em 0.6em;margin-bottom: 6px;"/>
                                            	</td>
                                            </tr>
                                        	</table>
                                            <input <?php echo !isset($businessresultset[0]) ? '' : 'readonly' ?> name="fname" type="text" class="name agileits" placeholder="<?php echo !isset($businessresultset[0]) ? 'Business name' : $businessresultset[0] ?>" value="<?php echo !isset($businessresultset[0]) ? '' : $businessresultset[0] ?>">

                                            <!-- Logic to populate select option from DB. -->
                                           <?php
                                           		// If first bussiness is getting added.
                                           		$query = "SELECT id , businesssectortext FROM businesssector;";
							                    $result = $mysqli->query($query);
							                    if(!isset($businessresultset[2])){

							                    	$show_select = "<select name='businessSector' class='name agileits' required>";
							                    	$show_select = $show_select . "<option value=''>Select Business Sector</option>";

							                    	while($row = mysqli_fetch_array($result)){
							                        	$show_select = $show_select . "<option value='".$row['id']."'>".$row['businesssectortext']."</option>";
							                    	}
							                    }
							                    else{
							                    	//If business already exists and another business is to be added
							                    	$show_select = "<select name='businessSector' class='name agileits' required>";
							                    	$show_select = $show_select . "<option value='' disabled>Select Business Sector</option>";

							                    	while($row = mysqli_fetch_array($result)){
							                    		if(strcasecmp($businessresultset[2], $row['businesssectortext']) == 0){
							                    			$show_select = $show_select . "<option value='".$row['id']."'>".$row['businesssectortext']."</option>";
							                    		}
							                    		else{
							                    			$show_select = $show_select . "<option value='".$row['id']."' disabled>".$row['businesssectortext']."</option>";
							                    		}

							                    	}
							                    }
							                    $show_select = $show_select . "</select>";
							                    echo $show_select;
							                ?>

                                            <!-- Instead of text box Select option given for businessSector
                                            <input <?php //echo !isset($businessresultset[1]) ? '' : 'readonly' ?> name="lname" type="text" class="name agileits" placeholder="<?php //echo !isset($businessresultset[1]) ? 'Business sector' : $businessresultset[1] ?>" value="<?php //echo !isset($businessresultset[1]) ? '' : $businessresultset[1] ?>">
                                            -->
											<input type="text" placeholder="Address : Street 1" name="address1" class="name agileits" required=""/>
											<input type="text" placeholder="Address : Street 2" name="address2" class="name agileits"/>
											<input type="text" placeholder="City" name="city" class="name agileits" required=""/>
											<input type="text" placeholder="State" name="state" class="name agileits" required=""/>
											<input type="text" placeholder="Country" name="country" class="name agileits" required=""/>
											<input type="text" placeholder="Zip" name="zipcode" class="name agileits" required=""/>
											<input type="text" placeholder="Business Phone number" name="businessphonenumber" class="name agileits" required=""/>
											<textarea placeholder="Say somthing about your business(200 Characters)..." id="businessdescription" name="businessdescriptions" rows="4" columns ="500" maxlength="200" class="name agileits" required <?php echo !isset($businessresultset[3]) ? '' : 'readonly'?>><?php echo !isset($businessresultset[3]) ? '' : $businessresultset[3] ?></textarea>
											<div class="submit" style="margin-left: 0px;"><br>
												<input type="submit" value="Save">
												<input type="reset" value="Cancel" name="RegBusiCancel" onclick="resetImage();" formnovalidate>
                                                <br><br>
											</div>
										</form>
									</div>
								</div>
								<!-- Create Offer section -->
								<div class="tab-1 resp-tab-content gallery-images">
									<p class="secHead">Create Offer For Your Business</p>
									<div class="wthree-subscribe">
										<form method="post" class="agile_form">
											<input type="text" placeholder="Offer Name" name="oName" class="name agileits" required=""/>
											<input type="text" placeholder="Offer Description" name="oDesc" class="name agileits" required=""/>
											<input type="text" placeholder="Offer Points" name="oPoints" class="name agileits" required=""/>
											<input placeholder="Start Date" class="date" name="datepicker1" id="datepicker1" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
											<input placeholder="End Date" class="date" name="datepicker2" id="datepicker2" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
											<div class="submitBtn"><br>
												<input type="submit" value="Save">
												<input type="reset" value="Cancel">
                                                <br><br>
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
		<?php include 'footer.php'; ?>
		<!--start-date-piker-->
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
			$( "#datepicker,#datepicker1,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7" ).datepicker(
				{ dateFormat: 'yy-mm-dd' }
			);
			});
		</script>
		<!-- 97-rgba(0, 0, 0, 0.75)/End-date-piker -->
		<?php
		/* close connection */
            $mysqli->close();
        ?>
        <!-- Popup box modal -->
		<!-- <div id="add" class="modal" style="display:none!important">
		  <p class="modal-content">Rewards Added successfully.</p>
		  <button onclick="window.location.href = 'business.php'" class="popButton">OK</button>
		</div>
		<div id="redeem" class="modal" style="display:none!important">
		  <p class="modal-content">Rewards Redeemed successfully.</p>
		  <button onclick="window.location.href = 'business.php'" class="popButton">OK</button>
		</div> -->
		<?php
		if(isset($_GET['flag'])){
			if($_GET['flag'] == 'add'){ ?>
			<script type="text/javascript">
				//document.getElementById('add').style.display='block';
				alert("Rewards Added successfully.")
			</script>
			<?php } else if($_GET['flag'] == 'redeem'){ ?>
			<script type="text/javascript">
				//document.getElementById('redeem').style.display='block';
				alert("Rewards Redeemed successfully.")
			</script>
			<?php }
		} ?>
	</body>
</html>
