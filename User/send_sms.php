<?php
$phone = $_GET['phone'];
$flag = $_GET['flag'];
$rewards = $_GET['amount'];
$balance = $_GET['balance'];
$points = $_GET['points'];
if($flag == 'add'){
$text = $rewards. " rewards added to your treaty account. \nYour current Treaty Rewards are - ".$balance."\n\n\n";
}elseif ($flag == 'redeem') {
    $text = $points. " rewards redeemed from your treaty account. \nYour current Treaty Rewards are - ".$balance."\n\n\n";
}
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
    if($flag == 'add'){
        echo '<script>window.location.href = "business.php?flag=add";</script>';
    }elseif ($flag == 'redeem') {
        echo '<script>window.location.href = "business.php?flag=redeem";</script>';
    }
?>





