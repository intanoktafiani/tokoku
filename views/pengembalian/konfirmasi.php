<?php include 'header.php'; ?>

<br />
<br />
<br />
<div class="container">
	<form id="formPengembalian" action="?controller=pengembalian&action=kembalikan" class="form container-fluid" enctype="multipart/form-data" method="post">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Konfirmasi Pengembalian</h4></div>
		<div class="panel-body">
			<input type="hidden" name="id_transaksi" value="<?php echo $pembelian->idTransaksi; ?>" />
			<div class="form-group">
				<label for="alasan">Alasan</label>
				<input type="text" class="form-control" name="alasan">
			</div>
			<div class="form-group">
				<label for="bukti">Foto Bukti</label>
				<input type="file" class="btn btn-default" name="bukti">
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary pull-right">Kembalikan<i class="glyphicon glyphicon-check"></i></button>
			<br />
			&nbsp;
		</div>
	</div>
	</form>
</div>

<?php include 'footer.php'; ?>
