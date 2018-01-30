<?php
    // Start the session
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Business Dashboard</title>
        <!-- For-Mobile-Apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //For-Mobile-Apps -->
        <!-- Style -->
        <link rel="stylesheet" href="css/user-dashboard.css" type="text/css" media="all" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/user-dashboard.js"></script>
        <!-- Web-Fonts -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <!-- //Web-Fonts -->
        <?php
            include 'business_nav.html';
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

			$userid = $_SESSION['userid'];
            if(!empty($fname)) {
	    		//insert the entry in userdetail table
	    		// insert into table
	    		$query = "INSERT INTO businessdetail(userid, businessname, businesssector,
	    			address1, address2, city, state, country, zipcode, modified, created)
					VALUES (\"".$_SESSION['userid']."\",\"".$fname."\",\"". $lname."\",\"". $street1."\",\"". $street2."\"
	    					,\"". $city."\",\"". $state."\",\"". $country."\",\"". $zip."\", sysdate(), sysdate())";
	    		$result = $mysqli->query($query);
	    		if ($result) {
					$_SESSION["businessname"] = $fname;
            		$_SESSION["businesssector"] = $lname;
	    			echo '<script>window.location.href = "business.php#horizontalTab3";</script>';
	    		} else {
	    			echo "Failed to update profile";
	    		}
            } else {
            	//get the businessname, businesssector
            	$query = "SELECT businessname, businesssector, address1, city
            	 		  FROM businessdetail
            			  WHERE userid=\"".$userid."\"";
            	// Sign In
            	$result = $mysqli->query($query);
            	if ($result->num_rows > 0) {
            		$row = $result->fetch_array();
            		$_SESSION["businessname"] = $row["businessname"];
            		$_SESSION["businesssector"] = $row["businesssector"];
					$businessrow = $row;
            	} else {
					unset($_SESSION["businessname"]);
            		unset($_SESSION["businesssector"]);
            	}
            }
            /* close connection */
            $mysqli->close();
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

                        function editBusiness(){
                        	window.location.assign("edit_business.php");
                        }
                        function editOffer(){
                        	window.location.assign("edit_offer.php");
                        }
                    </script>
                    <div class="tabs">
                        <div class="tab-left">
                            <ul class="resp-tabs-list" style="margin: 0px;">
                                <li class="resp-tab-item" onclick="loadScan();"><i class="fa fa-car" aria-hidden="true"></i>Add / Redeem Rewards</li>
                                <li class="resp-tab-item"><i class="fa fa-university" aria-hidden="true"></i>Offers</li>
                                <li class="resp-tab-item"><i class="fa fa-university" aria-hidden="true"></i>Business</li>
                                <li class="resp-tab-item"><i class="fa fa-university" aria-hidden="true"></i>Register Business</li>
                                <li class="resp-tab-item"><i class="fa fa-suitcase" aria-hidden="true"></i>Create Offer</li>
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
                                        <p class="b_name" style="color: white;font-size: 150%;">Customer have 100 Reward points.</p>
                                        <br>
                                        <div class="addReward">
                                            <p style="font-size: 150%;">--- Add Rewards ---</p>
                                            <br>
                                            <form action="#" method="post" class="agile_form">
                                                <input style="width: 50%;" type="text" name="amount" placeholder="Amount"><br>
                                                <div class="submitButton"><br>
                                                    <input type="submit" name="amount" value="Add Rewards" onclick="addPoints()">
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        <div class="addReward">
                                            <p style="font-size: 150%;">--- Redeem Rewards ---</p>
                                            <br>
                                            <form action="#" method="post" class="agile_form">
                                                <input style="width: 50%;" type="text" name="amount" placeholder=" Rewards"><br>
                                                <div class="submitButton"><br>
                                                    <input type="submit" name="amount" value="Redeem Rewards" onclick="redeemPoints()">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- All Offers section -->
                                <div class="tab-1 resp-tab-content">
                                    <p class="secHead">Your Business Offers</p>
                                    <div class="register agileits">
                                        <div class="offerDiv">
                                            <span class="offerDesc">1 salad free - 100 points</span>
                                            <img class="btn" width="100" src="images/setting.png" height="100" onClick="editOffer()"></img>
                                        </div>
                                    </div>
                                </div>
                                <!-- All Business section -->
                                <div class="tab-1 resp-tab-content">
                                    <p class="secHead">Your Business List</p>
                                    <div class="register agileits">
                                        <div class="offerDiv">
                                            <span class="offerDesc">Wallmart</span>
                                            <img class="btn" width="100" src="images/setting.png" height="100" onClick="editBusiness()"></img>
                                        </div>
                                    </div>
                                </div>
                                <!-- Register Business section -->
                                <div class="tab-1 resp-tab-content">
                                    <p class="secHead">Register Your Business</p>
                                    <div class="register agileits">
                                        <form action="#" method="post" class="agile_form">
											<input <?php echo !isset($_SESSION["businessname"]) ? '' : 'readonly' ?> name="fname" type="text" class="name agileits"
													placeholder="<?php echo !isset($_SESSION["businessname"]) ? 'Business name' : $_SESSION["businessname"] ?>">
                                            <input <?php echo !isset($_SESSION["businesssector"]) ? '' : 'readonly' ?> name="lname" type="text" class="name agileits"
													placeholder="<?php echo !isset($_SESSION["businesssector"]) ? 'Business sector' : $_SESSION["businesssector"] ?>">
                                            <input type="text" placeholder="Address : Street 1" name="street1" class="name agileits" required=""/>
                                            <input type="text" placeholder="Address : Street 2" name="street2" class="name agileits" required=""/>
                                            <input type="text" placeholder="City" name="city" class="name agileits" required=""/>
                                            <input type="text" placeholder="State" name="state" class="name agileits" required=""/>
                                            <input type="text" placeholder="Country" name="country" class="name agileits" required=""/>
                                            <input type="text" placeholder="Zip" name="zip" class="name agileits" required=""/>
                                            <input type="text" placeholder="Phone number" name="phone" class="name agileits" required=""/>
                                            <div class="submitBtn"><br>
                                                <input type="submit" value="Save"><br><br>
                                                <input type="submit" value="Cancel" onClick="loadData()">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Create Offer section -->
                                <div class="tab-1 resp-tab-content gallery-images">
                                    <p class="secHead">Create Offer For Your Business</p>
                                    <div class="wthree-subscribe">
                                        <form action="#" method="post" class="agile_form">
											<select class="name agileits">
												<!-- Handle  $businessrow here , iterate over $businessrow
												dropdown should display $businessrow['address1'],$businessrow['city']
												e.g 1433 cedarmeadow ct, Sanjose should be one entry --->
											</select><br>
                                            <input type="text" placeholder="Offer Name" name="oName" class="name agileits" required=""/>
                                            <input type="text" placeholder="Offer Description" name="oDesc" class="name agileits" required=""/>
                                            <input type="text" placeholder="Offer Points" name="oPoints" class="name agileits" required=""/>
                                            <input placeholder="Start Date" class="date" id="datepicker1" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
                                            <input placeholder="End Date" class="date" id="datepicker2" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required=""/>
                                            <div class="submitBtn"><br>
                                                <input type="submit" value="Save"><br><br>
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
        </div>
        <?php include 'footer.php'; ?>
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
