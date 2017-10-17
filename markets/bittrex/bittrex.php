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
			<td>Bid: <?php print $exchanges_data['result']['Bid']; ?></td>
			<td>Ask: <?php print $exchanges_data['result']['Ask']; ?></td>
			<td>Last: <?php print $exchanges_data['result']['Last']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

