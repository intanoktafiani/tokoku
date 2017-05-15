<?php include 'header.php'; ?>

	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Ringkasan Biaya</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label for="jumlah_nominal">Total Tagihan</label>
							<input type="text" class="form-control" name="jumlah_nominal" value="Rp. <?php $indonesian_format_number = number_format($pembelian->jumlahNominal, 0, '', '.'); echo $indonesian_format_number;?>" disabled>
						</div>
						<div class="form-group">
							<label for="potongan_harga">Potongan Harga</label>
							<input type="text" class="form-control" name="potongan_harga" value="Rp. <?php $indonesian_format_number = number_format($pembelian->potonganVoucher, 0, '', '.'); echo $indonesian_format_number;?>" disabled>
						</div>
						<div class="form-group">
							<label for="biaya_pengiriman">Biaya Pengiriman</label>
							<input type="text" class="form-control" name="biaya_pengiriman" value="Rp. <?php $indonesian_format_number = number_format($biayaPengiriman, 0, '', '.'); echo $indonesian_format_number;?>" disabled>
						</div>
					</div>
					<div class="panel-footer">
						<h4>Total: Rp. Rp. <?php $indonesian_format_number = number_format(($pembelian->jumlahNominal - $pembelian->potonganVoucher + $biayaPengiriman), 0, '', '.'); echo $indonesian_format_number;?></h4>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<button type="submit" class="btn btn-primary pull-right" form="form_pembayaran">Bayar<i class="glyphicon glyphicon-check"></i></button>
						<h4>Metode Pembayaran</h4>
					</div>
					<div class="panel-body">
						<form id="form_pembayaran" action="?controller=pembelian&action=bayar" class="form container-fluid" method="post">
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
						<input name="jenisPembayaran" type="hidden" value="Fisik">						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
