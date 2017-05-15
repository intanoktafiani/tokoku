<br />
<br />
<br />

<p>Berikut adalah Daftar Barang:</p>

<?php foreach($barang as $row) { ?>
  <p>
    <?php echo $row->namaBarang; ?>
	<img src="img/barang/<?php echo $row->lokasiGambar; ?>" class="img-responsive" width = "225" height = "175"/>    
    <a href='?controller=barang&action=show&id=<?php echo $row->idBarang; ?>'>Lihat Detil</a>
  </p>
<?php } ?>