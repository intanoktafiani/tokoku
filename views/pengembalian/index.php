<?php
include 'header.php';
?>

      <div class="container">
        <br/>
        <br/>
        <br/>
		<div class="well"><p>Seluruh Transaksi Pengembalian harus direspon untuk meningkatkan kepastian di sisi Pelanggan. Hal ini merupakan komitmen Tokoku dalam memberikan pelayanan terbaik di bidangnya.</p></div>        
		<h1 align="center">Respon Pengembalian</h1>
		<br/>
      </div>
	<div class = "container">
        <div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#">Administrasi</a></li>
			  <li><a href="?controller=laporan&action=laporanPenjualanAdvance">Laporan Penjualan Advance</a></li>
			  <li><a href="#">Respon Pengembalian</a></li>
			  <li><a href="?controller=pengembalian&action=history">History Respon Pengembalian</a></li>
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
                <th colspan=2>Respon</th>
            </tr>
        	<?php foreach($pengembalian as $row) { ?>
            <tr>
                <td><?php echo $row->idTransaksi; ?></td>
                <td><?php echo $row->statusPengembalian; ?></td>
                <td><?php echo $row->alasanPengembalian; ?></td>
                <td><img src="img/pengembalian/<?php echo $row->lokasiGambarBuktiAlasan;?>" width="150" height="110"></td>
                <td><?php echo $row->noResiBuktiPengembalian; ?></td>
                <td>
                	<a href="?controller=pengembalian&action=terima&id_transaksi=<?php echo $row->idTransaksi; ?>" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i></a>
                </td>
                <td>
                	<a href="?controller=pengembalian&action=tolak&id_transaksi=<?php echo $row->idTransaksi; ?>" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i></a>
                </td>                
	        </tr>
            <?php } ?>
	    </table>
        
	    </div>
	 </div>
	 
<?php 
	include 'footer.php';
?>