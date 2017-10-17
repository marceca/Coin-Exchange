<?php 

include '../partials/header.php';
// include '../exchanges/poloniex/poloniex_ticker.php';
// include '../exchanges/bitfinex/bitfinex_ticker.php';
?>

<?php

// POLONIEX POLONIEX POLONIEX POLONIEX

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://poloniex.com/public?command=returnTicker",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$response = json_decode($response, true);


print_r($response['USDT_BTC']);

// BITFINEX BITFINEX BITFINEX BITFINEX

$curl_BITFINEX = curl_init();
curl_setopt_array($curl_BITFINEX, array(
  CURLOPT_URL => "https://api.bitfinex.com/v1/pubticker/". $value,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$symbol_response_value = curl_exec($curl_BITFINEX);
$err = curl_error($curl_BITFINEX);
curl_close($curl_BITFINEX);

