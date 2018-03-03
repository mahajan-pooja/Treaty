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