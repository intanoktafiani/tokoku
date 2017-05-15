<?php
	include 'header.php';
	$limit = 8;

	$data = Barang::filter($GLOBALS['id'], $GLOBALS['category'], $GLOBALS['str']);
	$total_records = $data['row'];
	$total_pages = ceil($total_records / $limit);
?>
    <div class="container">
        <br/>
        <br/>
        <?php if ($GLOBALS['str'] != "none") {
        	echo "<h3> Kata kunci pencarian: ".$GLOBALS['str']."</h3>";
        } else if ($GLOBALS['category'] != "fisik") {
        	echo "<h3> Filter berdasar kategori: ".$category."</h3>";        	
        } else { ?>
        <br>
		<div class="well"><p>Aplikasi ini menyediakan Layanan Belanja Online. Alur Aplikasi diawali dari mencari Barang, memasukkan dalam Keranjang, Checkout, Memproses Pembayaran, hingga Mekanisme Pengembalian Barang.</p></div>
		<?php } ?>
    </div>
	<div class = "container">
        <div class="col-md-2">
			<ul class="nav nav-pills nav-stacked" role="tablist" >
			  <li class="active"><a href="?controller=home&action=filter&id=1&category=fisik&str=none">Produk Fisik</a></li>
			  <li class=""><a href="?controller=home&action=filter&id=1&category=1&str=none">Fashion</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=2&str=none">Alat Tulis Kantor</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=3&str=none">Souvenir</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=4&str=none">Kecantikan</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=5&str=none">Elektronik</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=6&str=none">Handphone & Tablet</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=7&str=none">Laptop & Aksesoris</a></li>
			</ul>
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="">Produk Digital</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=8&str=none">Pulsa</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=9&str=none">Paket Data</a></li>
			  <li><a href="?controller=home&action=filter&id=1&category=10&str=none">Token Listrik</a></li>
			</ul>
        </div>
        <div class="col-md-10">
		  <div class="table-responsive">
		  <table class="table table-bordered">
			<tbody>
				<div>
				<div id="target-content" >memuat...</div>
				<div align="right">
				<ul class='pagination text-center' id="pagination">
				<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):
				            if($i == 1):?>
				            <li class='active' id="<?php echo $i;?>"><a href='?controller=paging&action=filter&id=<?php echo $i;?>&category=<?php echo $GLOBALS['category'];?>&str=<?php echo $GLOBALS['str'];?>'><?php echo $i;?></a></li> 
				            <?php else:?>
				            <li id="<?php echo $i;?>"><a href='?controller=paging&action=filter&id=<?php echo $i;?>&category=<?php echo $GLOBALS['category'];?>&str=<?php echo $GLOBALS['str'];?>'><?php echo $i;?></a></li>
				        <?php endif;?>
				<?php endfor;endif;?>
				</ul>
				</div>
				</div>
			</tbody>
		  </table>
		  </div>
       </div>
	</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Detil Barang</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">Nama Barang</div>
          <div class="col-md-8"><?php echo $id; ?></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Tambah ke Keranjang<span class="glyphicon glyphicon-shopping-cart"></span></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
	include 'footer.php';
?>