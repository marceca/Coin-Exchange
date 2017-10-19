<?php

require __DIR__ . '../../../cache.class.php';
$curl = curl_init();
$c = new Cache();


$bter_ticker = $c->retrieve('bter_ticker');
if(!$bter_ticker) {
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://data.bter.com/api2/1/tickers",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$bter_ticker = curl_exec($curl);
	$c->store('bter_ticker', $bter_ticker);
}


$err = curl_error($curl);
curl_close($curl);

$bter_ticker = json_decode($bter_ticker, true);
// print_r('<pre>');
// var_dump($bter_ticker); exit;
?>