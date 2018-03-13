<?php
	require '../config.php';

	$bid = $_GET['bid'];
	$cid = $_GET['cid'];


//subscribe for business
	$qry  = "INSERT INTO customerbusiness(userid, businessid,
	         earnedpoints, redeemedpoints, balance, isactive, modified, created)
	         VALUES (\"" . $cid . "\",\"" . $bid . "\", 20, 0, 20, 1, sysdate(), sysdate())";
	$res = $mysqli->query($qry);
    if ($res) {
    		//send text message to customer
		    $query = "Select phonenumber,businessname from user u,businessdetail b
			 		where u.id = ".$cid." and b.id= ". $bid;
			$result = $mysqli->query($query);
			while($row = $result->fetch_assoc()){ 
				
					$phone = $row['phonenumber'];
					$businessname = $row['businessname'];
			    
			    	$text = "You are Successfully subscribed for ".$businessname.". 20 rewards added to your Treaty account. \nYour current Treaty Rewards - 20.\n\n\n"; 

			    //actual code to send text msg
			    $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
			        'api_key' => d0fbd93d,
			        'api_secret' => bcaca354e0887dd9,
			        'to' => $phone,
			        'from' => 12034089447,
			        'text' => $text
			    ]);
			    $ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($ch);
				//Code end 

				echo "<script>alert('Subscribed Successfully.');</script>";
    	echo '<script>window.location.href = "customer.php#horizontalTab3";</script>';
				
			}
    	
    } else {
        echo "Failed to subscribe rewards.";
    }

?>