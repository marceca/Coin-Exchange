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

print_r('<pre><br /><h1>POLONIEX</h1>');
print_r($response_poloniex['USDT_BTC']);
print_r('</pre>');

// BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX
// BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX
// BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX BITFINEX

$curl_bitfinex = curl_init();
curl_setopt_array($curl_bitfinex, array(
  CURLOPT_URL => "https://api.bitfinex.com/v1/pubticker/btcusd",
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

print_r('<pre><br /><h1>BITFINEX</h1>');
print_r($response_bitfinex);
print_r('</pre>');
?>


	<h1 style="text-align: center;">Compare Exchanges for USD to BTC</h1><div">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Exchange</th>
				<th>Ask</th>
				<th>Bid</th>
				<th>Volume</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Poloniex</td>
				<td><?php print_r($response_poloniex['USDT_BTC']['lowestAsk']) ?></td>
				<td><?php print_r($response_poloniex['USDT_BTC']['highestBid']) ?></td>
				<td><?php print_r($response_poloniex['USDT_BTC']['baseVolume']) ?></td>
			</tr>
			<tr>
				<td>Bitfinex</td>
				<td><?php print_r($response_bitfinex['ask']) ?></td>
				<td><?php print_r($response_bitfinex['bid']) ?></td>
				<td><?php print_r($response_bitfinex['volume']) ?></td>
			</tr>
		</tbody>
	</table>

	<footer>
<!-- 	
		THIS IS FOR RELOAD HAVE IT TURNED OFF WHILE IN PRODUCTION
		THE 5000 STANDS FOR 5 SECONDS. 1000 WOULD BE 1 SECOND
<script>
		setTimeout(function(){
		   window.location.reload(1);
		}, 5000);
	</script> 

-->
	</footer>


