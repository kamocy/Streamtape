<?php

$login = ''; // L 'API Login openload
$key = '';   // L 'API key openload
$urls = ''; // Video URL

	$curl = curl_init();
	$opts = [
		CURLOPT_URL => 'https://api.streamtape.com/remotedl/add?login='.$login.'&key='.$key.'&url='.$url.'',
	];
	curl_setopt_array($curl, $opts);
	$response = json_decode(curl_exec($curl), true);
	
	echo '<pre>';
	print_r($response);
	echo '</pre>';
	
	$id = $response['result']['id'];
	
	$curl2 = curl_init();
	$opts = [
		CURLOPT_URL => 'https://api.streamtape.com/remotedl/status?login='.$login.'&key='.$key.'&limit=1&id='.$id.'',
		CURLOPT_RETURNTRANSFER => true,
	];
	curl_setopt_array($curl2, $opts);
	$response = json_decode(curl_exec($curl2), true);
	
	echo '<pre>';
	print_r($response);
	echo '</pre>';
	
	$lien = $response['result'][''.$id.'']['url'];
	
	echo $lien;
?>
