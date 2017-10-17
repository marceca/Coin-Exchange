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

// NEED TO ADD CACHE HERE TO SPEED UP PROCESS

// $i = 0;
$market_cache = new Cache();
$bittrex_markets = array();

$bittrex_markets = $market_cache->retrieve('market_name');
if(!$bittrex_markets){
	foreach($markets as $r) {
		foreach($r as $v) {
			$market = $v['MarketName'];
			$bittrex_markets[] = $market;
			$market_cache->store('market_name', $bittrex_markets);
			// $i++;
			// if($i > 50){
			// 	return;
			// }

		}
	}
}

// https://bittrex.com/api/v1.1/public/getticker?market= 
// this is for a smaller amount of data to possibly
// help speed up the process

$exchanges = array();

foreach ($bittrex_markets as $v) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://bittrex.com/api/v1.1/public/getmarketsummary?market=" . $v,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$market_values = curl_exec($curl);
	$err = curl_error($curl);

	$market_values = json_decode($market_values, true);
	$exchanges[$v] = $market_values;
}

curl_close($curl);

