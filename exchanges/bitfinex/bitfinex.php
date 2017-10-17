<?php 
include 'bitfinex_ticker.php';
?>

<?php include __DIR__ . '/../../partials/header.php' ?>

<h1 style="text-align: center; padding-bottom: 20px;">BITFINEX</h1>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Coin</th>
			<th>Bid</th>
			<th>Ask</th>
			<th>Low Price</th>
			<th>High Price</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($coin as $coin_symbol => $coin_data): ?>
		<tr>
			<td>Coin: <?php print $coin_symbol; ?></td>
			<td>Bid: <?php print $coin_data['bid']; ?></td>
			<td>Ask: <?php print $coin_data['ask']; ?></td>
			<td>Low: <?php print $coin_data['low']; ?></td>
			<td>High: <?php print $coin_data['high']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>