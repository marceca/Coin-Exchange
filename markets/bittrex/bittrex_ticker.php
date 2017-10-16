<?php

require __DIR__ . '../../../cache.class.php';
$curl = curl_init();
$c = new Cache();


$markets = $c->retrieve('markets');
if(!$markets){
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://bittrex.com/api/v1.1/public/getmarkets",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache"
		),
	));

	$markets = curl_exec($curl);
	$c->store('markets', $markets);
	
}


$err = curl_error($curl);
curl_close($curl);

$markets = json_decode($markets, true);

$i = 0;
$bittrex_markets = array();
foreach($markets as $r) {
	foreach($r as $v => $value) {
		$market = $value['MarketName'];
		$bittrex_markets[] = $market;
		
		// $i++;
		// if($i > 50){
		// 	return;
		// }

	}
}

$num = 0;
$exchanges = array();

foreach ($bittrex_markets as $value) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://bittrex.com/api/v1.1/public/getmarketsummary?market=" . $value,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$r = curl_exec($curl);
	$err = curl_error($curl);

	$r = json_decode($r, true);
	$exchanges[$value] = $r;
}

curl_close($curl);

