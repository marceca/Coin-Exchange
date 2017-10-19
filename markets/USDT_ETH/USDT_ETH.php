<?php include '../../partials/header.html'; ?>
<br />
<br />
<?php

// POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX
// POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX
// POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX POLONIEX

$curl_poloniex = curl_init();

curl_setopt_array($curl_poloniex, array(
  CURLOPT_URL => "https://poloniex.com/public?command=returnTicker",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response_poloniex = curl_exec($curl_poloniex);
$err = curl_error($curl_poloniex);

curl_close($curl_poloniex);


$response_poloniex = json_decode($response_poloniex, true);


// BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX
// BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX
// BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX

$curl_bitfinex = curl_init();
curl_setopt_array($curl_bitfinex, array(
  CURLOPT_URL => "https://api.bitfinex.com/v1/pubticker/ethusd",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response_bitfinex = curl_exec($curl_bitfinex);
$err = curl_error($curl_bitfinex);
curl_close($curl_bitfinex);

$response_bitfinex = json_decode($response_bitfinex, true);


// BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX
// BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX
// BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX BITTREX
$curl_bittrex = curl_init();
curl_setopt_array($curl_bittrex, array(
  CURLOPT_URL => "https://bittrex.com/api/v1.1/public/getmarketsummary?market=USDT-ETH",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response_bittrex = curl_exec($curl_bittrex);
$err = curl_error($curl_bittrex);

$response_bittrex = json_decode($response_bittrex, true);



// GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE 
// GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE 
// GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE GATE 
$curl_gate = curl_init();
curl_setopt_array($curl_gate, array(
  CURLOPT_URL => "http://data.gate.io/api2/1/ticker/eth_usdt",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response_gate = curl_exec($curl_gate);
$err = curl_error($curl_gate);

$response_gate = json_decode($response_gate, true);


// THE DIFFERENCE BETWEEN ASK AND BID FOR EACH MARKET
// THE DIFFERENCE BETWEEN ASK AND BID FOR EACH MARKET
// THE DIFFERENCE BETWEEN ASK AND BID FOR EACH MARKET
$poloniex_diff = ($response_poloniex['USDT_ETH']['lowestAsk'] - $response_poloniex['USDT_ETH']['highestBid']);
$bitfinex_diff = ($response_bitfinex['ask'] - $response_bitfinex['bid']);
$bittrex_diff = ($response_bittrex['result'][0]['Ask'] - $response_bittrex['result'][0]['Bid']);
$gate_diff = ($response_gate['lowestAsk'] - $response_gate['highestBid']);


if(($response_poloniex['USDT_ETH']['lowestAsk'] - $response_bitfinex['ask'])  > 10 || ($response_poloniex['USDT_ETH']['lowestAsk'] - $response_bittrex['result'][0]['Ask']) > 10 || ($response_poloniex['USDT_ETH']['lowestAsk'] - $response_gate['lowestAsk']) > 10) {
	var_dump('Poloniex has an ask greater than 10 more then atleast one of the  others');
	print_r('<br />' . ($response_poloniex['USDT_ETH']['lowestAsk'] - $response_bitfinex['ask']) . ' -- Bitfinex');
	print_r('<br />' . ($response_poloniex['USDT_ETH']['lowestAsk'] - $response_bittrex['result'][0]['Ask']) . ' -- Bittrex');
	print_r('<br />' . ($response_poloniex['USDT_ETH']['lowestAsk'] - $response_gate['lowestAsk']) . ' -- Gate');
	print_r('<br />');
}

if(($response_bitfinex['ask'] - $response_poloniex['USDT_ETH']['lowestAsk']) > 10 || ($response_bitfinex['ask'] - $response_bittrex['result'][0]['Ask']) > 10 || ($response_bitfinex['ask'] - $response_gate['lowestAsk']) > 10) {
	var_dump('Bitfinex has an ask greater than 10 more then atleast one of the  others');
	print_r('<br />' . ($response_bitfinex['ask'] - $response_poloniex['USDT_ETH']['lowestAsk']) . 'Poloniex');
	print_r('<br />' . ($response_bitfinex['ask'] - $response_bittrex['result'][0]['Ask']) . ' -- Bittrex');
	print_r('<br />' . ($response_bitfinex['ask'] - $response_gate['lowestAsk']) . ' -- Gate');
	print_r('<br />');
}

if(($response_bittrex['result'][0]['Ask'] - $response_poloniex['USDT_ETH']['lowestAsk']) > 10 || ($response_bittrex['result'][0]['Ask'] - $response_bitfinex['ask']) > 10 || ($response_bittrex['result'][0]['Ask'] - $response_gate['lowestAsk']) > 10) {
	var_dump('Bittrex has an ask greater than 10 more then atleast one of the  others');
	print_r('<br />' . ($response_bittrex['result'][0]['Ask'] - $response_poloniex['USDT_ETH']['lowestAsk']) . ' -- Poloniex');
	print_r('<br />' . ($response_bittrex['result'][0]['Ask'] - $response_bitfinex['ask']) . ' -- Bitfinex');
	print_r('<br />' . ($response_bittrex['result'][0]['Ask'] - $response_gate['lowestAsk']) . ' -- Gate');
	print_r('<br />');
}

if(($response_gate['lowestAsk'] - $response_poloniex['USDT_ETH']['lowestAsk']) > 10 || ($response_gate['lowestAsk'] - $response_bitfinex['ask']) > 10 || ($response_gate['lowestAsk'] - $response_bittrex['result'][0]['Ask']) > 10) {
	var_dump('Gate has an ask greater than 10 more then atleast one of the  others');
	print_r('<br />' . ($response_gate['lowestAsk'] - $response_poloniex['USDT_ETH']['lowestAsk']) . ' -- Poloniex');
	print_r('<br />' . ($response_gate['lowestAsk'] - $response_bitfinex['ask']) . ' -- Bitfinex');
	print_r('<br />' . ($response_gate['lowestAsk'] - $response_bittrex['result'][0]['Ask']) . ' -- Bittrex');
	print_r('<br />');
}
?>


	<h1 style="text-align: center;">Compare Exchanges for USD to ETH</h1><div">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Exchange</th>
				<th>Ask</th>
				<th>Bid</th>
				<th>Volume</th>
				<th>Difference ASK-BID</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Poloniex</td>
				<td><?php print_r($response_poloniex['USDT_ETH']['lowestAsk']) ?></td>
				<td><?php print_r($response_poloniex['USDT_ETH']['highestBid']) ?></td>
				<td><?php print_r($response_poloniex['USDT_ETH']['baseVolume']) ?></td>
				<td><?php print_r($poloniex_diff) ?></td>
			</tr>
			<tr>
				<td>Bitfinex</td>
				<td><?php print_r($response_bitfinex['ask']) ?></td>
				<td><?php print_r($response_bitfinex['bid']) ?></td>
				<td><?php print_r($response_bitfinex['volume']) ?></td>
				<td><?php print_r($bitfinex_diff) ?></td>
			</tr>
			<tr>
				<td>Bittrex</td>
				<td><?php print_r($response_bittrex['result'][0]['Ask']) ?></td>
				<td><?php print_r($response_bittrex['result'][0]['Bid']) ?></td>
				<td><?php print_r($response_bittrex['result'][0]['Volume']) ?></td>
				<td><?php print_r($bittrex_diff) ?></td>
			</tr>
			<tr>
				<td>Gate</td>
				<td><?php print_r($response_gate['lowestAsk']) ?></td>
				<td><?php print_r($response_gate['highestBid']) ?></td>
				<td><?php print_r($response_gate['baseVolume']) ?></td>
				<td><?php print_r($gate_diff) ?></td>
			</tr>
		</tbody>
	</table>

	<?php
		print_r('<pre><h1>POLONIEX</h1>');
		print_r($response_poloniex['USDT_ETH']);
		print_r('</pre>');

		print_r('<pre><h1>BITFINEX</h1>');
		print_r($response_bitfinex);
		print_r('</pre>');

		print_r('<pre><h1>BITTREX</h1>');
		var_dump($response_bittrex);
		print_r('</pre>');

		print_r('<pre><h1>GATE</h1>');
		var_dump($response_gate);
		print_r('</pre>');
	?>

<footer>
	
<?php include '../../assets/JS/reload.js' ?>

</footer>