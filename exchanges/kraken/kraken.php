<?php include __DIR__ . '/../../partials/header.html' ?>

<?php 

include 'kraken_ticker.php';

echo '<h1 style="text-align: center;">KRAKEN</h1><div style="text-align: center;">';
	
    // a = ask array(<price>, <whole lot volume>, <lot volume>),
    // b = bid array(<price>, <whole lot volume>, <lot volume>),
    // c = last trade closed array(<price>, <lot volume>),
    // v = volume array(<today>, <last 24 hours>),
    // p = volume weighted average price array(<today>, <last 24 hours>),
    // t = number of trades array(<today>, <last 24 hours>),
    // l = low array(<today>, <last 24 hours>),
    // h = high array(<today>, <last 24 hours>),
    // o = today's opening price


foreach($response as $coin => $val) {
	echo '
		<div style="display: inline-block;width: 15%; padding: 20px; margin:10px; border: 1px solid black;"><h3>' . $coin . '</h3>
			<div style="display: inline-block;">
				<div style="display: block;">
					<p>Last: ' . $val["c"] . '</p>
				</div>
			</div>
		</div>';
	}
echo '</div>';

?>