<?php
	$url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
        'api_key' => d0fbd93d,
        'api_secret' => bcaca354e0887dd9,
        'to' => 16072329877,
        'from' => 12034089447,
        'text' => 'Hello from Nexmo'
    ]);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
?>





