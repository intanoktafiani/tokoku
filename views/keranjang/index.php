<?php include 'header.php'; ?>

	<br/>
	<br/>
	<br/>
	<div class="container">
		<?php if(isset($_GET["message"]) && $_GET["message"] == "error") { ?>
			<div class="alert alert-danger">
				<strong>Gagal!</strong> Pemesanan barang gagal. Cobalah beberapa saat lagi.
			</div>
		<?php } ?>
		<p>Silakan melanjutkan belanja, kami menyediakan Kategori Barang sebagai berikut:</p>
		<div class="btn-group btn-group-justified">
		  <a href="?controller=home&action=filter&id=1&category=1&str=none" class="btn btn-primary">Fashion</a>
		  <a href="?controller=home&action=filter&id=1&category=2&str=none" class="btn btn-primary">ATK</a>
		  <a href="?controller=home&action=filter&id=1&category=3&str=none" class="btn btn-primary">Souvenir</a>
		  <a href="?controller=home&action=filter&id=1&category=4&str=none" class="btn btn-primary">Kecantikan</a>
		  <a href="?controller=home&action=filter&id=1&category=5&str=none" class="btn btn-primary">Elektronik</a>
		  <a href="?controller=home&action=filter&id=1&category=6&str=none" class="btn btn-primary">Handphone</a>
		  <a href="?controller=home&action=filter&id=1&category=7&str=none" class="btn btn-primary">Laptop</a>
		</div>		
		<br>
		<form id="formTransaksi" action="?controller=pembelian&action=konfirmasiPembayaran" class="form container-fluid" method="post">			
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php if ($items) { ?>
				&nbsp;
				<div class="btn-group pull-right" role="group" aria-label="...">				
					<a href='?controller=home&action=index' type="submit" class="btn btn-default">Belanja Lagi <i class="glyphicon glyphicon-eye-open"></i></a>
					<a href='?controller=keranjang&action=clean' type="submit" class="btn btn-danger">Hapus Semua <i class="glyphicon glyphicon-trash"></i></a>
					<button type="submit" class="btn btn-primary">Checkout <i class="glyphicon glyphicon-check"></i></button>
				</div>
				<br>
				<br>
				&nbsp;
			<?php } ?>
				<div class="row">
					<div class="col-md-8">
						<h3><strong>Keranjang Anda</strong></h3>
					</div>
					<div class="col-md-4">
						<h3 class="pull-right"><strong>Total Harga: <?php $indonesian_format_number = number_format($totalHarga, 0, '', '.'); echo "Rp. ".$indonesian_format_number;?></strong></span></h3>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<?php if ($items) { ?>
				<table class="table table-hover">
					<tr>
						<th>Nama Barang</th>
						<th>Jumlah</th>
						<th>Harga Satuan</th>
						<th>Subtotal</th>
						<th></th>
					</tr>
					<?php foreach ($items as $row) { ?>
					<tr>
						<td>
							<strong><?php echo $row->namaBarang; ?></strong>
							<h6><?php if ($row->keterangan != "") { echo "Keterangan: ".$row->keterangan; } ?></h6>
						</td>
						<td>
							<strong><?php echo $row->kuantitas; ?></strong>
						</td>
						<td>
							<strong><?php $indonesian_format_number = number_format($row->harga, 0, '', '.'); echo "Rp. ".$indonesian_format_number; ?></strong>
						</td>
						<td>
							<strong><?php $indonesian_format_number = number_format($row->subtotal, 0, '', '.'); echo "Rp. ".$indonesian_format_number; ?></strong>
						</td>
						<td>
							<a href='?controller=keranjang&action=remove&idBarang=<?php echo $row->idBarang;?>'><span class="glyphicon glyphicon-remove" aria-hidden="true" style="color: red"></span></a>
						</td>					
					</tr>
					<?php }?>
				</table>
				<?php } else { ?>
					<p>Kosong. Silahkan memilih barang.</p>
				<?php } ?>
			</div>
			<?php if ($items) { ?>
			<div class="panel-heading">
				<strong>Alamat Utama</strong>
			</div>
			<div class="panel-body">
				<?php
				echo $pelanggan->alamat;
				echo "<br>";
				echo $pelanggan->kodePos;
				?>
			</div>
			<div class="panel-heading">
				<strong>Alamat Pengiriman Lain (jika berbeda dengan Alamat Utama)</strong>
			</div>
			<div class="panel-body">
				<form id="formAlamat">
					<div class="form-group col-md-4">
						<input type="text" class="form-control" name="provinsi" list="provinsi" placeholder="Pilih Provinsi">
						<datalist id="provinsi">
							<option value="Jawa Barat" />
							<option value="Jawa Timur" />
						</datalist>
					</div>						
					<div class="form-group col-md-4">
						<input type="text" class="form-control" name="kabkota" list="kabkota" placeholder="Pilih Kabupaten/Kota">
						<datalist id="kabkota">
							<option value="Bandung" />
							<option value="Surabaya" />
						</datalist>
					</div>						
					<div class="form-group col-md-4">
						<input type="text" class="form-control" name="kecamatan" list="kecamatan" placeholder="Pilih Kecamatan">
						<datalist id="kecamatan">
							<option value="- Pilih Kecamatan-"/>
							<option value="Setiabudi" />
							<option value="Waru" />
						</datalist>
					</div>
					<br>
					<br>
					<textarea name="alamat"" class="form-control" placeholder="Alamat Detil" style="height: 100"></textarea>
					<br>
					<input name="kodePos" type="text" class="form-control" placeholder="Kode Pos">
					<br>
					<input type="button" class="btn btn-default pull-right" onclick="myFunction()" value="Kosongkan Alamat Pengiriman Lain">
				</form>				
			</div>
			<div class="panel-heading">
				<strong>Voucher</strong>
			</div>
			<div class="panel-body">
				<input name="kodeVoucher" type="text" class="form-control" placeholder="Kode Voucher">
			</div>			
			<div class="panel-footer">
				&nbsp;
				<div class="btn-group pull-right" role="group" aria-label="...">				
					<a href='?controller=home&action=index' type="submit" class="btn btn-default">Belanja Lagi <i class="glyphicon glyphicon-eye-open"></i></a>
					<a href='?controller=keranjang&action=clean' type="submit" class="btn btn-danger">Hapus Semua <i class="glyphicon glyphicon-trash"></i></a>
					<button type="submit" class="btn btn-primary">Checkout <i class="glyphicon glyphicon-check"></i></button>
				</div>
				<br>
				&nbsp;
			</div>		
			<?php } ?>
		</div>
		</form>
	</div>
	<br/>
	
	<script>
	function myFunction() {
	    document.getElementById("formAlamat").reset();
	}
	</script>	
	
<?php include 'footer.php'; ?>
