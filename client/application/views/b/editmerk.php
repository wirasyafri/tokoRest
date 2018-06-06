<?php $this->load->view('b/header');?>
			<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
        <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Edit Merk</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Toko</a></li>
            <li><i class="fa fa-laptop"></i>Edit Merk</li>                
          </ol>
        </div>
      </div>
                               
                </div>
              </div> 
               
            </div>
				 <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Edit Merk</div>
                  <div class="widget-icons pull-right">
                    <!-- <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>  -->
                    <a href="<?php echo site_url();?>/Merk" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                
                <div class="panel-body">
                  <div class="padd">
                <?php echo form_open_multipart('Merk/edit/'.$this->uri->segment(3));?>     
                      <div class="form quick-post">
                                      <form class="form-horizontal">
      <div class="form-group">
    <label for="">ID Merk</label>
    <input type="text" value="<?php echo $datamerk[0]->id_merk ?>" class="form-control" name="id_merk" readonly>
  
    
  </div>                   
                                         <div class="form-group">
    <label for="">Merk</label>
    <input type="text" name="nama_merk" class="form-control" id="nama_merk" placeholder="nama Merk" value="<?php echo $datamerk[0]->nama_merk ?>">
    <?php //echo validation_errors();  ?>           
  </div>
                                          </div>
                                          
                                          <!-- Buttons -->
                                          <div class="form-group">
                                             <!-- Buttons -->
											 <div class="col-lg-offset-2 col-lg-9">
												<?php echo form_submit('submit','Simpan');?>
												<button type="reset" class="btn btn-default">Reset</button>
											 </div>
                                          </div>
                                      </form>
                                      
                                    </div>
                                    <?php echo form_close(); ?>
                  

                  </div>
                  <?php $this->load->view('b/footer');?>