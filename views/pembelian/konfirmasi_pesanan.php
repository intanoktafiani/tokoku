<?php
	include 'header.php';
?>

<br>
<form id="formPembayaran" action="?controller=pembelian&action=bayar" class="form container-fluid" method="post"></form>
<div class="container">
	<?php if(isset($_GET["message"]) && $_GET["message"] == "voucher_invalid") { ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
			<strong>Maaf!</strong> Voucher tidak berlaku untuk barang yang anda pesan.
		</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Konfirmasi Data Diri</h4></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" value="<?php echo $pelanggan->namaLengkap; ?>" form="form_pembelian" disabled>
					</div>
					<div class="form-group">
						<label for="provisi">Provinsi</label>
						<input type="text" class="form-control" name="provinsi" value="" form="form_pembelian">
					</div>
					<div class="form-group">
						<label for="kabupaten">Kabupaten</label>
						<input type="text" class="form-control" name="kabupaten" value="" form="form_pembelian">
					</div>
					<div class="form-group">
						<label for="kecamatan">Kecamatan</label>
						<input type="text" class="form-control" name="kecamatan" value="" form="form_pembelian">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo $pelanggan->alamat; ?>" form="form_pembelian">
					</div>
					<div class="form-group">
						<label for="kodepos">Kode Pos</label>
						<input type="text" class="form-control" name="kodepos" value="<?php echo $pelanggan->kodePos; ?>" form="form_pembelian">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button type="submit" class="btn btn-primary pull-right" form="form_pembelian">Oke <span class="glyphicon glyphicon-check"></span></button>
					<h4>Konfirmasi Tagihan</h4>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="jumlah_nominal">Total Tagihan</label>
						<input type="number" class="form-control" name="jumlah_nominal" value="<?php echo $totalTagihan; ?>" form="form_pembelian" disabled>
					</div>
					<div class="form-group">
						<label for="kode_voucher">Kode Voucher</label>
						<input type="text" class="form-control" name="kode_voucher" form="form_pembelian">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	include 'footer.php';
?>
