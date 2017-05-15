<?php
	include 'header.php';
?>

<br />
<br />
<br />
<div class="container">
	<form id="formPembelian" action="?controller=pembelian&action=kembalikan" class="form container-fluid" method="post">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Konfirmasi Pengembalian</h4></div>
		<div class="panel-body">
			<p><?php var_dump($pembelian); ?></p>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary">Kembalikan<i class="glyphicon glyphicon-check"></i></button>
		</div>
	</div>
	</form>
</div>

<?php
	include 'footer.php';
?>
