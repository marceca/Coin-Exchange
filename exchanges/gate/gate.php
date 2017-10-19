<?php 
include 'gate_ticker.php';
?>


<?php include __DIR__ . '/../../partials/header.html' ?>

<h1 style="text-align: center;">GATE</h1><div">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Coin</th>
				<th>Last</th>
				<th>Lowest Ask</th>
				<th>Highest Bid</th>
				<th>Percent Change</th>
				<th>Base Volume</th>
				<th>Qoute Volume</th>
				<th>High 24 Hour</th>
				<th>Low 24 Hour</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($gate_ticker as $coin => $val) : ?>
			<tr>
				<td>Coin: <?php print $coin ?></td>
				<td>Last: <?php print $val["last"] ?></td>
				<td>Lowest Asked:<br /> <?php print $val["lowestAsk"] ?></td>
				<td>Highest Asked:<br /> <?php print $val["highestBid"] ?></td>
				<td>Percent Change:<br /> <?php print $val["percentChange"] ?></td>
				<td>Base Volume:<br /> <?php print $val["baseVolume"] ?></td>
				<td>Quote Volume:<br /> <?php print $val["quoteVolume"] ?></td>
				<td>High 24 Hour:<br /> <?php print $val["high24hr"] ?></td>
				<td>Lowest 24 Hour:<br /> <?php print $val["low24hr"] ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
