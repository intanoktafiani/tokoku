<?php
	include 'header.php';
?>

    <div class="container">
        <br/>
        <br/>
        <br/>
        <?php if ($barang == NULL) {
        	echo "<h3><strong>Hasil Pencarian tidak ditemukan.</strong></h3>";
        } else { ?>
        <h3><strong>Hasil Pencarian:</strong></h3>
        <br/>
		<table class="table table-responsive">  
			<thead>  
			</thead>  
			<tbody>
				<?php foreach($barang as $row) { ?>
		        <tr>
		        	<th rowspan="4">
				        <img src="img/barang/<?php echo $row->lokasiGambar; ?>" class="img-responsive" width="225" height="180"> 			
		        	</th>
	        	</tr>
	        	<tr>		        	
		        	<td colspan="2">
						<p><strong><?php echo $row->namaBarang; ?></strong></p>
		        	</td>
		        	<td>
						<p><strong>Rp. <?php $indonesian_format_number = number_format($row->harga, 0, '', '.'); echo $indonesian_format_number;?></strong></p>
		        	</td>
	        	</tr>
	        	<tr>
	        		<td>
						<p><strong>Bobot</strong></p>
	        		</td>
	        		<td>
						<p><?php echo $row->bobot; ?> (gram)</p>
	        		</td>
	        		<td>
						<input type="number" min="0" step="1" maxlength="2" size="2" class="form-control" placeholder="Jumlah">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
						<p><strong>Deskripsi</strong></p>
	        		</td>
	        		<td>
						<p><?php echo $row->deskripsi; ?></p>
	        		</td>
	        		<td>
	        			<button type="submit" class="btn btn-primary">Tambahkan <i class="glyphicon glyphicon-shopping-cart"></i></button>
	        		</td>
	        	</tr>
	        	<?php }} ?>
        	</tbody>
        </table>
        <br/>
	</div>

<?php
	include 'footer.php';
?>