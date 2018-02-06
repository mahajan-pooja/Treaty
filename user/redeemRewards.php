<?php
    require '../config.php';
    
    $points = $_POST['points'];
    $bid = $_GET['bid'];
    $cid = $_GET['cid'];
//get current balance rewards of customer
    $query = "Select balance from customeroffer
     		where userid = ".$cid;
    $result = $mysqli->query($query);
    while($row = $result->fetch_assoc()){ 
        $bal = $row['balance'] . '<br />';
    }
    $balance = $bal - $points;

//redeem rewards from customer account                  
    $qry  = "INSERT INTO customeroffer(userid, businessid,
            earnedpoints, redeemedpoints, balance, isactive, modified, created)
            VALUES (\"" . $cid . "\",\"" . $bid . "\", 0, \"" . $points . "\",\"" . $balance . "\", 1, sysdate(), sysdate())";
    $res = $mysqli->query($qry);
    if ($res) {
        echo '<script>window.location.href = "business.php?flag=redeem";</script>';
    } else {
        echo "Failed to redeem rewards.";
    }
?>