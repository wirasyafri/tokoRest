<?php 
// $this->load->view('admin/header'); 
?>
<!-- <table align="center">
	<tr>
		<td><div class="table-responsive"> -->
		<div class="container">
		<div class="panel panel-default">
		<div class="well well-sm">Daftar Item</div>
	<div class="panel-body">

	<table class="table table-hover">
		<thead>
		<tr>
					<td><b>Nama pembeli</b>
					</td>
					<td><b>Nama Barang</b>
					</td>
					<td><b>Harga</b>
					</td>
					<td><b>Tanggal Pembelian</b>
					</td>
					
				</tr>
				</thead>
			<?php foreach ($item_array as $key) {
				?>
				<tbody>
				<tr>
					<td><?php echo $key['nama'] ?>
					</td>
					<td><?php echo $key['barang'] ?>
					</td>
					<td><?php echo "Rp . ".$key['harga'] ?>
					</td>
					<td><?php echo $key['time'] ?>
					</td>
				</tr>
		</tbody>
		<?php } ?>
	</table>
</div>
</div>
</div>
<!-- /div>
</td> -->
<?php $this->load->view('admin/footer'); ?>