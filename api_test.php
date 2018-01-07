<?php
//	http://qiita.com/re-24/items/bfdd533e5dacecd21a7a
//	http://docs.cyrano.apiary.io/#reference/0/messages-sent-by-bot
//	http://developer.chatwork.com/ja/endpoints.html

$base_url = 'cyrano@unbabel.com';
$data = [

];

$header = [
    'Authorization: Bearer '.$token,	
	'Content-Type: application/json',
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $base_url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, true);

$response = curl_exec($curl);

$header_size	= curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$header			= substr($response, 0, $header_size);
$body			= substr($response, $header_size);
$result			= json_decode($body, true);

curl_close($curl);

print_r($result);
?>
