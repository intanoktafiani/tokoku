<?php include 'header.php'; ?>
<br />
<br />
<br />
<div class="container">
	<div class="btn-group btn-group-justified">
		<a href="?controller=home&action=filter&id=1&category=1&str=none" class="btn btn-primary">Fashion</a>
		<a href="?controller=home&action=filter&id=1&category=2&str=none" class="btn btn-primary">ATK</a>
		<a href="?controller=home&action=filter&id=1&category=3&str=none" class="btn btn-primary">Souvenir</a>
		<a href="?controller=home&action=filter&id=1&category=4&str=none" class="btn btn-primary">Kecantikan</a>
		<a href="?controller=home&action=filter&id=1&category=5&str=none" class="btn btn-primary">Elektronik</a>
		<a href="?controller=home&action=filter&id=1&category=6&str=none" class="btn btn-primary">Handphone</a>
		<a href="?controller=home&action=filter&id=1&category=7&str=none" class="btn btn-primary">Laptop</a>
		<a href="?controller=home&action=filter&id=1&category=8&str=none" class="btn btn-primary">Pulsa</a>
		<a href="?controller=home&action=filter&id=1&category=9&str=none" class="btn btn-primary">Paket Data</a>
		<a href="?controller=home&action=filter&id=1&category=10&str=none" class="btn btn-primary">Token Listrik</a>
	</div>
	<br />
	<?php if(isset($_GET["message"]) && $_GET["message"] == "next_bayar") { ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
			<strong>Berhasil.</strong> Silahkan lanjutkan pada proses pembayaran.
		</div>
	<?php } else if(isset($_GET["message"]) && $_GET["message"] == "bayar_done") { ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
			<strong>Berhasil.</strong> Proses pembelian berhasil, Serial Number akan dimasukkan secara otomatis dalam beberapa menit.
		</div>
	<?php } else if(isset($_GET["message"]) && $_GET["message"] == "bayar_fail") { ?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
			<strong>Gagal.</strong> Proses pembelian gagal, silahkan dicoba beberapa saat lagi.
		</div>
	<?php } else if(isset($_GET["message"]) && $_GET["message"] == "accepted") { ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
			<strong>Berhasil.</strong> Terima kasih telah bertransaksi.
		</div>
	<?php } else if(isset($_GET["message"]) && $_GET["message"] == "return_success") { ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
			<strong>Berhasil.</strong> Pengajuan pengembalian barang akan ditinjau segera.
		</div>
	<?php } ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Daftar Transaksi</h4>
		</div>
		<div class="panel-body">
			<?php if ($listPembelian) { ?>
			<table class="table">
				<tr>
					<th>Tanggal</th>
					<th>Tagihan</th>
					<th>Resi Pengiriman</th>
					<th>Status</th>
					<th>&nbsp;</th>
				</tr>
				<?php foreach($listPembelian as $pembelian) { ?>
					<tr>
						<td><?php // echo date("d-m-Y", strtotime($pembelian->waktuCheckout)); ?></td>
						<td>Rp. <?php echo number_format($pembelian->jumlahNominal, 0, '', '.');?></td>
						<td><?php echo $pembelian->nomorResi; ?></td>
						<td><?php echo $pembelian->statusTransaksi; ?></td>
						<td>
							<?php if ($pembelian->statusTransaksi == "Belum Dibayar") { ?>
								<a href='?controller=pembelian&action=konfirmasiPembayaran' type="submit" class="btn btn-xs btn-primary">Bayar</a>
							<?php } else if ($pembelian->statusTransaksi == "Sudah Dibayar") { ?>
								<div class="btn-group" role="group" aria-label="...">
								  <a href="?controller=pembelian&action=terima&id_transaksi=<?php echo $pembelian->idTransaksi; ?>" type="button" class="btn btn-xs btn-success">Konfirmasi</a>
								  <a href="?controller=pengembalian&action=konfirmasi&id_transaksi=<?php echo $pembelian->idTransaksi; ?>" type="button" class="btn btn-xs btn-danger">Kembalikan</a>
								</div>
							<?php } ?>
						</td>
					</tr>
				<?php } //foreach ?> 
			</table>
			<?php } //if ?> 
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>
