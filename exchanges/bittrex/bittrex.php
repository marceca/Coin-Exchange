<?php 
include 'bittrex_ticker.php';
?>


<?php include __DIR__ . '/../../partials/header.php' ?>

<h1 style="text-align: center; padding-bottom: 20px;">BITTREX</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Coin</th>
			<th>Bid</th>
			<th>Ask</th>
			<th>Low Price</th>
			<th>High Price</th>
			<th>Volume</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($exchanges as $exchanges_symbol => $exchanges_data): ?>
		<tr>
			<td>Coin: <?php print $exchanges_symbol; ?></td>
			<td>Bid: <?php print $exchanges_data['result'][0]['Bid']; ?></td>
			<td>Ask: <?php print $exchanges_data['result'][0]['Ask']; ?></td>
			<td>Low: <?php print $exchanges_data['result'][0]['Low']; ?></td>
			<td>High: <?php print $exchanges_data['result'][0]['High']; ?></td>
			<td>Volume: <?php print $exchanges_data['result'][0]['Volume']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

