<?php
	$barang = $data['list'];
	foreach($barang as $row) {
		$listIDBarang[] = $row->idBarang;
		$listNamaBarang[] = $row->namaBarang;
		$listHarga[] = $row->harga;
		$listLokasiGambar[] = $row->lokasiGambar;
	}
	
	$count = count($barang);
?>

<table class="table table-bordered">  
	<thead>  
	</thead>  
	<tbody>
		<?php if ($count > 0 ) {?>
        <tr>
		<?php
			if ($count <= 4) {	
				for ($i = 0 ; $i < $count ; $i++){ ?>
            		<td align="center"><img src="img/barang/<?php echo $listLokasiGambar[$i]; ?>" width="150" height="110"></td>  			
			<?php } ?>        
        </tr>
        <tr>
		<?php
			for ($i = 0 ; $i < $count ; $i++){ ?>
	            <td>           
	            	<p><strong><a href='?controller=barang&action=show&id=<?php echo $listIDBarang[$i]; ?>&category=<?php echo $_GET['category']; ?>'><?php echo $listNamaBarang[$i]; ?></a></strong></p>
	            	<p style="color: #d65046;"><strong>Rp. <?php $indonesian_format_number = number_format($listHarga[$i], 0, '', '.'); echo $indonesian_format_number; ?></strong></p>
	            </td>  			
			<?php }}?>
		</tr>
		
		
		<tr>
		<?php if (($count > 4) && ($count < 8)) {
			for ($i = 0 ; $i < 4 ; $i++){ ?>
            	<td align="center"><img src="img/barang/<?php echo $listLokasiGambar[$i]; ?>" width="150" height="110"></td>
        <?php }?>
        </tr>
        <tr>
		<?php
			for ($i = 0 ; $i < 4 ; $i++){ ?>
	            <td>           
	            	<p><strong><a href='?controller=barang&action=show&id=<?php echo $listIDBarang[$i]; ?>&category=<?php echo $GLOBALS['category']; ?>'><?php echo $listNamaBarang[$i]; ?></a></strong></p>
	            	<p style="color: #d65046;"><strong>Rp. <?php $indonesian_format_number = number_format($listHarga[$i], 0, '', '.'); echo $indonesian_format_number; ?></strong></p>
	            </td>  			
			<?php } ?>
        </tr>
        <tr>
		<?php
			for ($i = 4 ; $i < $count ; $i++){ ?>
            	<td align="center"><img src="img/barang/<?php echo $listLokasiGambar[$i]; ?>" width="150" height="110"></td>
        <?php }?>
        </tr>
        <tr>
		<?php
			for ($i = 4 ; $i < $count ; $i++){ ?>
	            <td>           
	            	<p><strong><a href='?controller=barang&action=show&id=<?php echo $listIDBarang[$i]; ?>&category=<?php echo $GLOBALS['category']; ?>'><?php echo $listNamaBarang[$i]; ?></a></strong></p>
	            	<p style="color: #d65046;"><strong>Rp. <?php $indonesian_format_number = number_format($listHarga[$i], 0, '', '.'); echo $indonesian_format_number; ?></strong></p>
	            </td>  			
			<?php }} ?>
        </tr>


		<tr>
		<?php if ($count >= 8) {
			for ($i = 0 ; $i < 4 ; $i++){ ?>
            	<td align="center"><img src="img/barang/<?php echo $listLokasiGambar[$i]; ?>" width="150" height="110"></td>
        <?php }?>
        </tr>
        <tr>
		<?php
			for ($i = 0 ; $i < 4 ; $i++){ ?>
	            <td>           
	            	<p><strong><a href='?controller=barang&action=show&id=<?php echo $listIDBarang[$i]; ?>&category=<?php echo $GLOBALS['category']; ?>'><?php echo $listNamaBarang[$i]; ?></a></strong></p>
	            	<p style="color: #d65046;"><strong>Rp. <?php $indonesian_format_number = number_format($listHarga[$i], 0, '', '.'); echo $indonesian_format_number; ?></strong></p>
	            </td>  			
			<?php } ?>
        </tr>
        <tr>
		<?php
			for ($i = 4 ; $i < 8 ; $i++){ ?>
            	<td align="center"><img src="img/barang/<?php echo $listLokasiGambar[$i]; ?>" width="150" height="110"></td>
        <?php }?>
        </tr>
        <tr>
		<?php
			for ($i = 4 ; $i < 8 ; $i++){ ?>
	            <td>           
	            	<p><strong><a href='?controller=barang&action=show&id=<?php echo $listIDBarang[$i]; ?>&category=<?php echo $GLOBALS['category']; ?>'><?php echo $listNamaBarang[$i]; ?></a></strong></p>
	            	<p style="color: #d65046;"><strong>Rp. <?php $indonesian_format_number = number_format($listHarga[$i], 0, '', '.'); echo $indonesian_format_number; ?></strong></p>
	            </td>  			
			<?php }} ?>
        </tr>

		
		<?php		
		} else {
			echo "Data Barang tidak tersedia";
		}
		?>        
	</tbody>  
</table>