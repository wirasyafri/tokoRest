
      <?php $this->load->view('b/header');?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Riwayat Pembelian</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Riwayat Pembelian</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="container">
    	<?php $this->load->view('admin/riwayat'); ?>
	</div>
        <?php $this->load->view('admin/footeradmin.php'); ?>          
           