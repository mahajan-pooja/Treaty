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
		    $query = "Select phonenumber,businessname,email from user u,businessdetail b
			 		where u.id = ".$cid." and b.id= ". $bid;
			$result = $mysqli->query($query);
			while($row = $result->fetch_assoc()){ 
				
					$phone = $row['phonenumber'];
					$businessname = $row['businessname'];
			    $businessname = $row['email'];
					
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
					
					//send email
					$subject = "You have subscribed to a new business!!";
					$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
												 <html xmlns="http://www.w3.org/1999/xhtml">
												 <head>
												 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
												 </head>
												 <body style="background-color:#ffb900;margin:0 auto;text-align: center;width: 500px;padding-top:5%;">
												 <img src="https://i2.wp.com/beanexpert.online/wp-content/uploads/2017/06/reset-password.jpg?resize=380%2C240&ssl=1">
												 <div>
														 <p> You have subscribed to a new business </p>
												 </div>
												 </body>
												 </html>';
					$headers = "From : poonam.6788@gmail.com";
					$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					mail($email, $subject, $message, $headers);
					
					echo "<script>alert('Subscribed Successfully.');</script>";
    			echo '<script>window.location.href = "customer.php#horzontalTab3";</script>';
				
			}
    	
    } else {
        echo "Failed to subscribe rewards.";
    }

?>