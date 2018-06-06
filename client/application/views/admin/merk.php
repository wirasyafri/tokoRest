
<!-- <table align="center">
	<tr>
		<td><div class="table-responsive"> -->
		<div class="container">
		<div class="panel panel-default">
		<div class="well well-sm">Daftar Merk</div>
	<div class="panel-body">

	<table class="table table-hover">
		<thead>
		<tr>
					<td><b>merk</b>
					</td>
					<td><b>Edit</b>
					</td>
					<td><b>Delete</b>
					</td>
					
				</tr>
				</thead>
			<?php foreach ($merk_array as $key) {
				?>
				<tbody>
				<tr>
					<td><?php echo $key['nama_merk'] ?>
					</td>
					<td>
						<!-- <a href="<?=site_url();?>/admin/Update/<?php echo $key['id'] ?>">edit</a> -->
						<a href="<?=site_url();?>/merk/edit/<?php echo $key['id_merk']?>">
							<p data_placement="top" data_toogle="tooltip" title="Edit">
								<button class="btn btn-primary btn-xs" >
									<span class="glyphicon glyphicon-pencil">
											</span>
								</button>
							</p>
						</a>
					</td>
					<td>
					<!-- <a href="<?=site_url();?>/admin/delete/<?php echo $key['id'] ?>">hapus</a> -->
						<a href="<?=site_url();?>/merk/delete/<?php echo $key['id_merk'] ?>">
							<p data_placement="top" data_toogle="tooltip" title="Delete">
								<button class="btn btn-danger btn-xs" data-title="Delete">
									<span class="glyphicon glyphicon-trash">
											</span>
								</button>
							</p>
						</a>
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