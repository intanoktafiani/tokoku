<?php
include 'header.php';
?>

      <div class="container">
        <br/>
        <br/>
        <br/>
		<div class="well"><p>Layanan Web Service memberikan akses Interoperabilitas terhadap seluruh sistem yang memerlukan data dari Tokoku berkaitan dengan layanan yang disediakan.</p></div>        
		<h1 align="center">Web Service</h1>
		<br/>
      </div>
	<div class = "container">
        <div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#">Administrasi</a></li>
			  <li><a href="?controller=laporan&action=laporanPenjualanAdvance">Laporan Penjualan Advance</a></li>
			  <li><a href="?controller=pengembalian&action=index">Respon Pengembalian</a></li>
			  <li><a href="?controller=pengembalian&action=history">History Respon Pengembalian</a></li>
			  <li class="active"><a href="#">Web Service</a></li>
			  <li><a href="?controller=api&action=listBarangService">Web Service List Barang</a></li>
			  <li><a href="?controller=api&action=listMetodePembayaranService">Web Service List Metode Pembayaran Bank</a></li>
			</ul>
        </div>
        <div class="col-md-10">

		<?php			
			foreach($message as $row) {
				echo json_encode($row, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
			}
		?>    	    	
		</div>

<?php 
	include 'footer.php';
?>		