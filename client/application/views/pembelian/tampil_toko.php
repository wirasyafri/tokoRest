<?php 
// $this->load->view('pegawai/header');
?>

<div class="container">
		<div class="panel panel-default">
		<div class="well well-sm">Daftar ITEM</div>
	<div class="panel-body">
	<table class="table table-hover" id="example2">
		<thead>
		<tr>
					<td><b>Nama</b>
					</td>
					<!-- <td><b>gambar</b>
					</td> -->
					<td><b>Jenis Kelamin<b>
					</td>
					<td><b>ukuran</b>
					</td>
					<td><b>tipe</b>
					</td>
					<td><b>merk</b>
					</td>
					<td><b>harga</b>
					</td>
					<td><b>beli</b>
					</td>
					<!-- <td><b>delete</b>
					</td> -->
				</tr>
				</thead>
				<tbody>
			<?php foreach ($item_array as $key) {
				?>
				
				<tr>
					<td><?php echo $key['nama'] ?>
					</td>
					<td><?php echo $key['jenis_kelamin'] ?>
					</td>
					<td><?php echo $key['ukuran'] ?>
					</td>
					<td><?php echo $key['tipe'] ?>
					</td>
					<td><?php echo $key['nama_merk'] ?>
					</td>
					<td><?php echo "Rp. ".$key['harga'] ?>
					</td>
					
					<td>
						<a href="<?=site_url();?>/pembelian/Update/<?php echo $key['id_item'] ?>">
							<p data_placement="top" data_toogle="tooltip" title="Edit">
								<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
									<span class="glyphicon glyphicon-shopping-cart">
											</span>
								</button>
							</p>
						</a>
					</td>
					<!-- <td>
						<a href="<?=site_url()?>/pegawai/delete/<?php echo $key['id'] ?>">
							<p data_placement="top" data_toogle="tooltip" title="Delete">
								<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#edit">
									<span class="glyphicon glyphicon-trash">
											</span>
								</button>
							</p>
						</a>
					</td> -->
				</tr>
		
		<?php } ?>
		</tbody>
	</table>
</div>
</div>
</div>
<?php $this->load->view('pembelian/footer'); ?>