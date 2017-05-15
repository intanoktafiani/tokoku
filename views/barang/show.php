<?php
	include 'header.php';
?>

    <div class="container">
        <br/>
        <br/>
        <br/>
		<div class="well"><p>Untuk memproses pembelian Barang, Anda harus Login terlebih dahulu menggunakan e-mail dan password yang telah terdaftar. Kami menyediakan berbagai jenis Metode Pembayaran untuk kemudahan transaksi Anda.</p></div>
		<form id="formBelanja" action="?controller=keranjang&action=add" class="form container-fluid" method="post">
			<table class="table table-responsive">  
				<thead>  
				</thead>  
				<tbody>
			        <tr>
			        	<th rowspan="4">
					        <img src="img/barang/<?php echo $barang->lokasiGambar; ?>" class="img-responsive" width="225" height="180"> 			
			        	</th>
		        	</tr>
		        	<tr>		        	
			        	<td colspan="2">
							<p><strong><?php echo $barang->namaBarang; ?></strong></p>
			        	</td>
			        	<td>
							<p><strong>Rp. <?php $indonesian_format_number = number_format($barang->harga, 0, '', '.'); echo $indonesian_format_number;?></strong></p>
			        	</td>
		        	</tr>
		        	<tr>
		        		<td>
							<p><strong>Bobot</strong></p>
							<p><strong>Stok</strong></p>
		        		</td>
		        		<td>
							<p><?php echo $barang->bobot; ?> (gram)</p>
							<p><?php echo $barang->stok; ?> buah</p>
		        		</td>
		        		<td>
							<input name="idBarang" type="hidden" value="<?php echo $barang->idBarang; ?>">
							<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "PELANGGAN_ROLE")) {?>
							<input name="kuantitas" type="number" min="1" step="1" maxlength="2" size="2" class="form-control" placeholder="Jumlah" required="required">
							<?php }?>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td>
							<p><strong>Deskripsi</strong></p>
		        		</td>
		        		<td>
							<p><?php echo $barang->deskripsi; ?></p>
		        		</td>
		        		<td>
							<?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "PELANGGAN_ROLE")) {?>
							<textarea name="keterangan"" class="form-control" placeholder="Keterangan" style="height: 100"></textarea>
							<br>		        		
		        			<button type="submit" class="btn btn-primary">Tambahkan <i class="glyphicon glyphicon-shopping-cart"></i></button>
		        			<?php }?>
		        		</td>
		        	</tr>
	        	</tbody>
	        </table>
        </form>
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
    </div>
	<br/>

<?php
	include 'footer.php';
?>