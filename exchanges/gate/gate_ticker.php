<?php

require __DIR__ . '../../../cache.class.php';
$curl = curl_init();
$c = new Cache();


// $gate_ticker = $c->retrieve('gate_ticker');
// if(!$gate_ticker) {
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://data.gate.io/api2/1/tickers",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$gate_ticker = curl_exec($curl);
	// $c->store('gate_ticker', $gate_ticker);
// }


$err = curl_error($curl);
curl_close($curl);

$gate_ticker = json_decode($gate_ticker, true);
// print_r('<pre>');
// var_dump($gate_ticker); exit;
?>