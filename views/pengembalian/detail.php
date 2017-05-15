<?php include 'header.php'; ?>

<br />
<br />
<br />
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Detail Pengembalian</h4></div>
		<div class="panel-body">
			<div class="form-group">
				<label for="alasan">Alasan</label>
				<input type="text" class="form-control" name="alasan" value="<?php echo $pengembalian->alasanPengembalian; ?>" disabled>
			</div>
			<div class="form-group">
				<label for="status">Status Pengembalian</label>
				<input type="text" class="form-control" name="status" value="<?php echo $pengembalian->statusPengembalian; ?>" disabled>
			</div>
			<div class="form-group">
				<label for="tanggal_pengajuan">Tanggal Pengajuan</label>
				<input type="text" class="form-control" name="tanggal_pengajuan" value="<?php echo $pengembalian->waktuPermintaanPengembalian; ?>" disabled>
			</div>
			<div class="form-group">
				<label for="tanggal_respon">Tanggal Respon</label>
				<input type="text" class="form-control" name="tanggal_respon" value="<?php echo $pengembalian->waktuResponPengembalian; ?>" disabled>
			</div>
			<div class="form-group">
				<label for="resi_pengembalian">Nomor Resi Pengembalian</label>
				<input type="text" class="form-control" name="resi_pengembalian" value="<?php echo $pengembalian->noResiPengembalian; ?>" disabled>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
