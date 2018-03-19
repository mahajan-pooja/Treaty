<?php
	require '../config.php';
	session_start();
	$userid = $_SESSION['userid'];
	$bid = $_GET['bid'];
	
	//old query that sets isactie flag to 0 without deleting record
	// $query = "UPDATE customerbusiness SET isactive=0 , modified = sysdate() WHERE userid=".$userid." and businessid=".$bid;

	//new query that deletes entire record from table
	$query = "DELETE from customerbusiness where userid=".$userid." and businessid=".$bid;

	$result = $mysqli->query($query);
    if ($result) { 
    	//query to send sms after unsubscribe
    	$query = "Select phonenumber,businessname,email from user u,businessdetail b
		 	 		where u.id = ".$userid." and b.userid= ". $bid. " LIMIT 1";		
		$result = $mysqli->query($query);
		while($row = $result->fetch_assoc()){
			$phone = $row['phonenumber'];
			$businessname = $row['businessname'];
		    //$businessname = $row['email'];
			$email = $row['email'];
		    $text = "You are Successfully unsubscribed for ".$businessname."\n\n\n"; 

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
			
			//send email
			$subject = "You have successfully unsubscribed to " . $businessname . "!!";
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						 <html xmlns="http://www.w3.org/1999/xhtml">
						 <head>
						 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						 </head>
						 <img src="http://img.eliteemail.com/subcenter/unsubscribe.jpg">
						 <div>
							 <p> You have successfully unsubscribed to ' . $businessname . '!!</p>
						 </div>
						 </body>
						 </html>';
			$headers = "From : treatyrewards@gmail.com";
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($email, $subject, $message, $headers);
			
			echo "<script>alert('Unsubscribed Successfully.');</script>";
			echo '<script>window.location.href = "customer.php#horizontalTab2";</script>'; 
	   }
	}
?>