<?php 
// Use https://www.kraken.com/help/api#get-ticker-info
// to finish up Kraken. WIP


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.kraken.com/0/public/AssetPairs",
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

$markets = array();
$i = 0;
print_r('<pre>');
var_dump($response);exit;
foreach ($response as $value => $coin) {
	var_dump($coin['BCHEUR']);
	$i++;
}

exit;

print_r('<pre>');
var_dump($response); exit;
echo "<pre>"; print_r($response);
?>