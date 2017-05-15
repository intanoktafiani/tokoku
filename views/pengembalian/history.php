<?php
include 'header.php';
?>

      <div class="container">
        <br/>
        <br/>
        <br/>
		<div class="well"><p>Seluruh Transaksi Pengembalian harus direspon untuk meningkatkan kepastian di sisi Pelanggan. Hal ini merupakan komitmen Tokoku dalam memberikan pelayanan terbaik di bidangnya.</p></div>        
		<h1 align="center">History Respon Pengembalian</h1>
		<br/>
      </div>
	<div class = "container">
        <div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#">Administrasi</a></li>
			  <li><a href="?controller=laporan&action=laporanPenjualanAdvance">Laporan Penjualan Advance</a></li>
			  <li><a href="?controller=pengembalian&action=index">Respon Pengembalian</a></li>
			  <li><a href="#">History Respon Pengembalian</a></li>
			  <li class="active"><a href="#">Web Service</a></li>
			  <li><a href="?controller=api&action=listBarangService">Web Service List Barang</a></li>
			  <li><a href="?controller=api&action=listMetodePembayaranService">Web Service List Metode Pembayaran Bank</a></li>
			</ul>
        </div>
        <div class="col-md-10">

		<table class="table table-responsive">
            <tr>
                <th>ID Transaksi</th>
                <th>Status</th>
                <th>Alasan Pengembalian</th>
                <th>Bukti Foto</th>
                <th>No. Resi</th>
            </tr>
        	<?php foreach($pengembalian as $row) { ?>
            <tr>
                <td><?php echo $row->idTransaksi; ?></td>
                <td><?php echo $row->statusPengembalian; ?></td>
                <td><?php echo $row->alasanPengembalian; ?></td>
                <td><img src="img/pengembalian/<?php echo $row->lokasiGambarBuktiAlasan;?>" width="150" height="110"></td>
                <td><?php echo $row->noResiBuktiPengembalian; ?></td>
			</tr>
            <?php } ?>
	    </table>
        
	    </div>
	 </div>
	 
<?php 
	include 'footer.php';
?>