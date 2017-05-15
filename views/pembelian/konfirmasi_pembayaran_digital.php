<?php include 'header.php'; ?>

	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button type="submit" class="btn btn-primary pull-right" form="form_pembayaran">Bayar<i class="glyphicon glyphicon-check"></i></button>
					<h4>Metode Pembayaran</h4>
				</div>
				<div class="panel-body">
					<form id="form_pembayaran" action="?controller=pembelian&action=bayar" class="form container-fluid" method="post">
					<?php if ($jenisBarangDigital == "Telekomunikasi") {?>
					<strong>Nomor Handphone: <?php echo $nomor; ?></strong>
					<?php } else { ?>
					<strong>ID Pelanggan Token Listrik: <?php echo $nomor; ?></strong>
					<?php } ?>
					<br>
					<input name="serialNumber" type="text" value="<?php echo $serialNumber;?>">
					<br>
					<input name="jenisPembayaran" type="hidden" value="Digital">
					<br>
					<strong>Harga Rp. <?php $indonesian_format_number = number_format($hargaBarang, 0, '', '.'); echo $indonesian_format_number;?></strong>					
					<br>
					<br>
					<div class="form-group">
						<input type="text" class="form-control" name="metode" list="metode" placeholder="Pilih Metode">
						<datalist id="metode">
							<option value="TRANSFER" />
							<option value="VIRTUAL" />
						</datalist>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="bank" list="bank" placeholder="Pilih Bank">
						<datalist id="bank">
							<option value="BRI" />
							<option value="BCA" />
							<option value="Mandiri" />
						</datalist>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
