<style type="text/css">
	aside
	{
		display: none;
	}

	.receipt_body
	{
		width: 4in;
		padding: 10px;
		border: dashed 2px #000;
	}

	.title
	{
		text-align: center;
		line-height: 0px;
	}

	.items
	{
		margin-top: 0.3in
	}

	.date
	{
		text-align: right;
		padding-right: 10px;
		line-height: 10px;
		margin-top: 0.2in;
	}

	.footer
	{
		text-align: center;
		line-height: 0px;
		margin-top: 0.5in
	}

	table tr td
	{
		padding: 0px 15px;
	}

	
	@media print
	{
		.loader
		{
			display: none;
		}
	}
</style>

<div class = "receipt_body">
	<div class = "title">
		<h6>ZFV Enterprises</h6>
		<small>Baliwag, Bulacan</small>
	</div>

	<div class = "date">
		<small><?php echo date("F j Y", strtotime($transactions[0]->date_created))?></small>
		<br>
		<small><?php echo $user[0]->first_name.' '.$user[0]->last_name; ?></small>
	</div>
	<div class = "items">
		<table>
			<tbody>
				<?php if ($transaction_info != FALSE): ?>
					<?php foreach ($transaction_info as $info): ?>
						<tr>
							<td><?php echo $info->common_name ?></td>
							<td>----------------</td>
							<td><?php echo $info->quantity ?></td>
							<td><?php echo $info->price ?></td>
						</tr>
					<?php endforeach ?>
					
				<?php endif ?>
				<?php if ($transactions != FALSE): ?>
					<?php foreach ($transactions as $transaction): ?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo $transaction->total ?></td>
						</tr>
					<?php endforeach ?>
					
				<?php endif ?>
				
				<tr>
					
				</tr>
				<tr></tr>
			</tbody>
		</table>
	</div>

	<div class = "footer">
		<h6>Thank you!</h6>
	</div>
</div>

<script type="text/javascript">


	$(document).ready(function(){

		

		window.print();

		setTimeout(function(){
			window.top.close();
		}, 1000)
	});
</script>