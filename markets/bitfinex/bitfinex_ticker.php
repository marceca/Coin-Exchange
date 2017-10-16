<?php

require __DIR__ . '../../../cache.class.php';
$c = new Cache();
$coin = array();

$symbols = curl_init();

$symbol_response = $c->retrieve('symbols');
if (!$symbol_response) {
	curl_setopt_array($symbols, array(
	  CURLOPT_URL => "https://api.bitfinex.com/v1/symbols",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$symbol_response = curl_exec($symbols);
	$c->store('symbols', $symbol_response);
}


$err = curl_error($symbols);

$symbol_response = json_decode($symbol_response, true);

foreach ($symbol_response as $key => $value) {

	$symbol_response_value = $c->retrieve('symbol_response_' . $value);
	if (!$symbol_response_value) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.bitfinex.com/v1/pubticker/". $value,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache"
		  ),
		));

		$symbol_response_value = curl_exec($curl);	
		$c->store('symbol_response_' . $value, $symbol_response_value);	
		$err = curl_error($curl);
		curl_close($curl);
	}


	$symbol_response_value = json_decode($symbol_response_value, true);
	$coin[$value] = $symbol_response_value;
}

	// print_r('<pre>');
	// var_dump($name);
	// print_r('<br />');
	// var_dump($coin);

curl_close($symbols);


?>