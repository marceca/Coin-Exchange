<?php

require __DIR__ . '../../../cache.class.php';
$curl = curl_init();
$c = new Cache();


$market_pairs = $c->retrieve('market_pairs');
if(!$market_pairs){
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.liqui.io/api/3/info",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache"
		),
	));

	$markets = curl_exec($curl);
	



	$err = curl_error($curl);
	curl_close($curl);

	$markets = json_decode($markets, true);

	$market_pairs[] = array();
	
	foreach ($markets as $market) {
		foreach($market as $k => $v) {
			$market_pairs[] = $k;
			$c->store('market_pairs', $market_pairs);
		}
	}
}
unset($market_pairs[0]);
$exchanges = array();

foreach ($market_pairs as $v) {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.liqui.io/api/3/ticker/" . $v,
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
	$exchanges[] = $market_values;
}

curl_close($curl);

?>