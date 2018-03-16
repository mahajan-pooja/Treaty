<?php	
	require '../config.php';
	$amount = $_POST['amount']; 
	$bid = $_GET['bid'];
	$cid = $_GET['cid'];
//get current balance rewards of customer
	$query = "Select balance from customerbusiness
	 		where userid = ".$cid." and businessid=".$bid;
	$result = $mysqli->query($query);
	while($row = $result->fetch_assoc()){ 
	    $bal = $row['balance'] . '<br />';
	}
	$balance = $bal + $amount;

//add rewards to customer account  
//old query that create new rows for every add reward activity.
            
	$qryTrans  = "INSERT INTO rewardtransaction(userid, businessid,
	         earnedpoints, redeemedpoints, balance, isactive, modified, created)
	         VALUES (\"" . $cid . "\",\"" . $bid . "\", \"" . $amount . "\", 0,\"" . $balance . "\", 1, sysdate(), sysdate())";
	$qryResult = $mysqli->query($qryTrans);
	//This code is commented as it was giving a error.
	// if ($qryResult) {
	// 		//send mail to business owner
	// 		$query = "SELECT email FROM user WHERE userid=\"" . $userid . "\" and isactive=1";
	// 		$email = $mysqli->query($query)->fetch_object()->email;
	// 		//send email
	// 		$subject = "You have redeemed an offer!!";
	// 		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	// 									 <html xmlns="http://www.w3.org/1999/xhtml">
	// 									 <head>
	// 									 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	// 									 </head>
	// 									 <body style="background-color:#ffb900;margin:0 auto;text-align: center;width: 500px;padding-top:5%;">
	// 									 <img src="https://i2.wp.com/beanexpert.online/wp-content/uploads/2017/06/reset-password.jpg?resize=380%2C240&ssl=1">
	// 									 <div>
	// 											 <p> You have redeemed an offer </p>
	// 									 </div>
	// 									 </body>
	// 									 </html>';
	// 		$headers = "From : treatyrewards@gmail.com";
	// 		$headers = 'MIME-Version: 1.0' . "\r\n";
	// 		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// 		mail($email, $subject, $message, $headers);
	// }


	//query change from insert to update to make only one entry in customer business table with updated added balance
	 $qry = "UPDATE customerbusiness SET earnedpoints= ".$amount.", redeemedpoints= 0, balance= ".$balance.", modified = sysdate() WHERE userid=".$cid." and businessid=".$bid;
	$res = $mysqli->query($qry);
    if ($res) {
    		//send text message to customer
		    $queryPhone = "Select phonenumber from user
			 		where id = ".$cid;
			$resultPhone = $mysqli->query($queryPhone);
			while($rowPhone = $resultPhone->fetch_assoc()){ 
			    $phone = $rowPhone['phonenumber'];
			    $text = $amount. " rewards added to your treaty account. \nYour current Treaty Rewards are - ".$balance."\n\n\n";
			    
			    //echo '<script>window.location.href = "send_sms.php?flag=add&phone='.$phone.'&amount='.$amount.'&balance='.$balance.'";</script>'; 


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

				echo '<script>window.location.href = "business.php?flag=add";</script>';
			}
    } else {
        echo "Failed to add rewards.";
    }

?>