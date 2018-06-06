<?php 
// $this->load->view('pegawai/header'); 
// var_dump($biodata_array);
?>
<!-- <table align="center">
	<tr>
		<td><div class="table-responsive"> -->
		<div class="container">
		<div class="panel panel-default">
		<div class="well well-sm">Daftar ITEM BELANJA </div>
	<div class="panel-body">
	<table class="table table-hover" id="example">
		<thead>
		<tr>
					<td><b>username</b>
					</td>
					<?php foreach ($item_array as $key)
					{
				
					?> 
					<?php 
				if($key['item1']=="")
					{ ?>
						<td><b>Anda tidak memilki ITEM BELANJA</b>
						</td> <?php
					}
				elseif ($key['item1']!="" && $key['item2']=="") 
					{ ?>			
						<td><b>Item 1</b>
						</td>
						<?php 
					} 
				elseif ($key['item1']!="" && $key['item2']!=""&& $key['item3']=="") 
					{ ?>
						<td><b>Item 1</b>
						</td>
						<td><b>Item 2</b>
						</td>
						<?php 
					} 
				elseif ($key['item1']!="" && $key['item2']!="" && $key['item3']!="") 
					{ ?>
						<td><b>Item 1</b>
						</td>
						<td><b>Item 2</b>
						</td>
						<td><b>Item 3</b>
						</td>
						<?php 
					} 

					?> <?php } ?>
					
				</tr>
				</thead>
			<?php foreach ($item_array as $key) {
				?>
				<tbody>
				<tr>
					<td><?php echo $key['username'] ?>
					</td>
				
<?php 
		if($key['item1']=="")
			{
			}
		elseif ($key['item1']!="" && $key['item2']=="") 
			{ ?>
				<td><?php echo $key['item1'] ?>
				</td><
					<?php 
			} 
		elseif ($key['item1']!="" && $key['item2']!=""&& $key['item3']=="") 
			{ ?>
				<td><?php echo $key['item1'] ?>
				</td>
				<td><?php echo $key['item2'] ?>
				</td><
					<?php 
			}
		elseif ($key['item1']!="" && $key['item2']!=""&& $key['item3']!="") 
			{ ?>
				<td><?php echo $key['item1'] ?>
				</td>
				<td><?php echo $key['item2'] ?>
				</td>
				<td><?php echo $key['item3'] ?>
				</td><
					<?php 
			}  

					?>
					<!-- <td><img  src=<?=base_url("assets/uploads")."/".$key['game1']?>>
					</td>
					<td><img  src=<?=base_url("assets/uploads")."/".$key['game2']?>> -->
					</td>
					<td><!-- 
						<a href="<?=site_url();?>/pegawai/Update/<?php echo $key['id'] ?>">
							<p data_placement="top" data_toogle="tooltip" title="Edit">
								<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
									<span class="glyphicon glyphicon-pencil">
											</span>
								</button>
							</p>
						</a>
					</td>
					<td>
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

		</tbody>
		<?php 
				$session_data =$this->session->userdata('logged_in');
				$data['username']=$session_data['username'];
				$data['id']=$session_data['id'];
				// $data['uang']=$session_data['uang'];
				
				// echo $data['username'];
				// echo $data['id'];
				// echo $data['uang'];
				// echo $data['uang'];
		} ?>
	</table>
</div>
</div>
</div>
<!-- /div>
</td> -->
<?php $this->load->view('pembelian/footer'); ?>