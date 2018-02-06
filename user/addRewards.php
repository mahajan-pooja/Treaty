<?php
	require '../config.php';
	$amount = $_POST['amount'];
	$bid = $_GET['bid'];
	$cid = $_GET['cid'];
//get current balance rewards of customer
	$query = "Select balance from customeroffer
	 		where userid = ".$cid;
	$result = $mysqli->query($query);
	while($row = $result->fetch_assoc()){ 
	    $bal = $row['balance'] . '<br />';
	}
	$balance = $bal + $amount;

//add rewards to customer account              
	$qry  = "INSERT INTO customeroffer(userid, businessid,
	         earnedpoints, redeemedpoints, balance, isactive, modified, created)
	         VALUES (\"" . $cid . "\",\"" . $bid . "\", \"" . $amount . "\", 0,\"" . $balance . "\", 1, sysdate(), sysdate())";
	$res = $mysqli->query($qry);
    if ($res) {
        echo '<script>window.location.href = "business.php?flag=add";</script>';
    } else {
        echo "Failed to add rewards.";
    }
?>