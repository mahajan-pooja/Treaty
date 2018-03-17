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
			 		where u.id = ".$userid." and b.userid= ". $bid;		
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


    	echo '<script>window.location.href = "customer.php#horizontalTab2";</script>'; 
    }

}
    

?>