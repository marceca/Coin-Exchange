<?php 
include 'liqui_ticker.php';
?>


<?php include __DIR__ . '/../../partials/header.html' ?>



<h1 style="text-align: center;">LIQUI</h1><div">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Coin</th>
				<th>Last</th>
				<th>Lowest Ask</th>
				<th>Highest Bid</th>
				<th>Base Volume</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($exchanges as $coin) : ?>
			<?php foreach($coin as $value => $val) : ?>
			<tr>
				<td>Coin: <?php print $value ?></td>
				<td>Last: <?php print $val["last"] ?></td>
				<td>Lowest Asked:<br /> <?php print $val["sell"] ?></td>
				<td>Highest Asked:<br /> <?php print $val["buy"] ?></td>
				<td>Base Volume:<br /> <?php print $val["vol"] ?></td>
			</tr>
			<?php endforeach; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
