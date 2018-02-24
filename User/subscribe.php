<?php
	require '../config.php';

	$bid = $_GET['bid'];
	$cid = $_GET['cid'];
//get current balance rewards of customer
	// $query = "Select balance from customeroffer
	//  		where userid = ".$cid;
	// $result = $mysqli->query($query);
	// while($row = $result->fetch_assoc()){ 
	//     $bal = $row['balance'] . '<br />';
	// }
	// $balance = $bal + $amount;

//add rewards to customer account              
	$qry  = "INSERT INTO customerbusiness(userid, businessid,
	         earnedpoints, redeemedpoints, balance, isactive, modified, created)
	         VALUES (\"" . $cid . "\",\"" . $bid . "\", 0, 0,0, 1, sysdate(), sysdate())";
	$res = $mysqli->query($qry);
    if ($res) {
   //  		//send text message to customer
		 //    $queryPhone = "Select phonenumber from userdetail
			//  		where userid = ".$cid;
			// $resultPhone = $mysqli->query($queryPhone);
			// while($rowPhone = $resultPhone->fetch_assoc()){ 
			//     $phone = $rowPhone['phonenumber'];
			//     $text = $amount. " rewards added to your treaty account. \nYour current Treaty Rewards are - ".$balance."\n\n\n";
			    
			//     //echo '<script>window.location.href = "send_sms.php?flag=add&phone='.$phone.'&amount='.$amount.'&balance='.$balance.'";</script>'; 


			//     //actual code to send text msg
			//     $url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
			//         'api_key' => d0fbd93d,
			//         'api_secret' => bcaca354e0887dd9,
			//         'to' => $phone,
			//         'from' => 12034089447,
			//         'text' => $text
			//     ]);
			//     $ch = curl_init($url);
			// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// 	$response = curl_exec($ch);
			// 	//Code end 

			// 	echo '<script>window.location.href = "business.php?flag=add";</script>';
			//}
    	echo "<script>alert('Subscribed Successfully.');</script>";
    	echo '<script>window.location.href = "customer.php#horzontalTab3";</script>';
    } else {
        echo "Failed to subscribe rewards.";
    }

?>