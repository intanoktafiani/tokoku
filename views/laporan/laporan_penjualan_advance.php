<?php 
	include 'header.php';
?>

      <div class="container">
        <br/>
        <br/>
        <br/>
		<div class="well"><p>Laporan dihasilkan langsung dari Data Transaksi Penjualan saat ini. Keseluruhan Data pada Laporan dapat di-Filter untuk memberikan perspektif yang lebih spesifik terhadap Data yang diharapkan.</p></div>        
		<h1 align="center">Laporan Penjualan Advance</h1>
		<br/>
      </div>
	<div class = "container">
        <div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#">Administrasi</a></li>
			  <li><a href="#">Laporan Penjualan Advance</a></li>
			  <li><a href="?controller=pengembalian&action=index">Respon Pengembalian</a></li>
			  <li><a href="?controller=pengembalian&action=history">History Respon Pengembalian</a></li>
			  <li class="active"><a href="#">Web Service</a></li>
			  <li><a href="?controller=api&action=listBarangService">Web Service List Barang</a></li>
			  <li><a href="?controller=api&action=listMetodePembayaranService">Web Service List Metode Pembayaran Bank</a></li>
			</ul>
        </div>
        <div class="col-md-10">

		<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Bulan</th>
	                <th>Tahun</th>
	                <th>Total Penjualan</th>
	                <th>Jumlah Transaksi</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                <th>Bulan</th>
	                <th>Tahun</th>
	                <th>Total Penjualan</th>
	                <th>Jumlah Transaksi</th>
	            </tr>
	        </tfoot>
	        <tbody>
	        <?php foreach($req as $row) { ?>
	            <tr>
	                <td><?php echo $row['bulan'] ?></td>
	                <td><?php echo $row['tahun']; ?></td>
	                <td><?php $indonesian_format_number = number_format($row['totalPenjualan'], 0, '', '.'); echo "Rp. ".$indonesian_format_number; ?></td>
	                <td><?php echo $row['jumlahTransaksi']; ?></td>
	            </tr>
            <?php } ?>
	        </tbody>
	    </table>
        
	    </div>
	 </div>
	 
<?php 
	include 'footer.php';
?>