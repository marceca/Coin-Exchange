<?php include 'partials/header.php' ?>
<br />
<br />
<br />
<?php

// include 'exchanges/poloniex/poloniex.php';
include 'exchanges/poloniex/poloniex_ticker.php';

foreach($response as $coin => $val) {
	print_r('<button><a href= markets/' . $coin . '.php>' . $coin . '</a></button><br />');	
}

?>