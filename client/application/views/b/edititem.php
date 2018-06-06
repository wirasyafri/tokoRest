

<?php $this->load->view('b/header');?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
        <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Edit Item</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Toko</a></li>
            <li><i class="fa fa-laptop"></i>Edit Item</li>                
          </ol>
        </div>
      </div>
                               
                </div>
              </div> 
               
            </div>
			
				 <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Edit Item</div>
                  <div class="widget-icons pull-right">
                    <!-- <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>  -->
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                
                <div class="panel-body">
                  <div class="padd">
                 <?php echo form_open_multipart('item/edit/'.$this->uri->segment(3));?>
                      <div class="form quick-post">
                      
                                      <!-- Edit profile form (not working)-->
                                      <form class="form-horizontal">
                                          <!-- Title -->

                                          <div class="form-group">
    <label for="">ID Item</label>
    <input type="text" value="<?php echo $dataitem[0]->id_item ?>" class="form-control" name="id_item" readonly>
  
    
  </div>
                                        <div class="form-group">
    <label for="">Nama Item</label>
    <input type="text" name="nama" class="form-control" id="nama"  placeholder="Nama ITEM" value="<?php echo $dataitem[0]->nama ?>">
  
    
  </div>
  <div class="form-group">
    <label for="">Ukuran</label>
    <!-- <input type="text" name="id_ukuran" class="form-control" id="Ukuran" placeholder="Ukuran" value="<?php echo $dataitem[0]->id_ukuran?>"> -->
    
  <select name="id_ukuran" class="form-control">
    <option>pilih ukuran</option>
    <?php foreach($list_ukuran as $ukuran): ?>
        <option value="<?= $ukuran->id_ukuran ?>"> <?= $ukuran->ukuran ?></option>
    <?php endforeach;  ?>
    </select>     
  </div>

  <div class="form-group">
    <label for="">Jenis Kelamin</label>
    <!-- <input type="text" name="id_jeniskelamin" class="form-control" id="jeniskelamin" placeholder="id_jeniskelamin" value="<?php echo $dataitem[0]->id_jeniskelamin?>"> -->
     <select name="id_jeniskelamin" class="form-control">
    <?php foreach($list_kelamin as $jeniskelamin): ?>
        <option value="<?= $jeniskelamin->id_jeniskelamin ?>"> <?= $jeniskelamin->jenis_kelamin ?></option>
    <?php endforeach;  ?>
    </select>        
  </div>

  <div class="form-group">
    <label for="">Tipe</label>
    <!-- <input type="text" name="id_tipe" class="form-control" id="tipe" placeholder="id_tipe" value="<?php echo $dataitem[0]->id_tipe?>"> -->
     <select name="id_tipe" class="form-control">
    <option>pilih tipe</option>
    <?php foreach($list_tipe as $tipe): ?>
        <option value="<?= $tipe->id_tipe ?>"> <?= $tipe->tipe ?></option>
    <?php endforeach;  ?>
    </select>  
            
  </div>

  <div class="form-group">
    <label for="">Merk</label>
    <!-- <input type="text" name="id_merk" class="form-control" id="merk" placeholder="id_merk" value="<?php echo $dataitem[0]->id_merk?>"> -->
     <select name="id_merk" class="form-control">
    <option>pilih merk</option>
    <?php foreach($list_merk as $merk): ?>
        <option value="<?= $merk->id_merk ?>"> <?= $merk->nama_merk ?></option>
    <?php endforeach;  ?>
    </select> 
  </div>
  <div class="form-group">
    <label for="">Harga</label>
    <input type="text" name="harga" class="form-control" id="harga"  placeholder="harga" value="<?php echo $dataitem[0]->harga ?>">
  
    
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
                  
<!-- <?php var_dump($dataitem[0]);?> -->
                  </div>
                  <?php $this->load->view('b/footer');?>