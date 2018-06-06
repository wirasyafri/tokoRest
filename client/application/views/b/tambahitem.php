

<?php $this->load->view('b/header');?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
        <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-laptop"></i> Tambah Item</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Toko</a></li>
            <li><i class="fa fa-laptop"></i>Tambah Item</li>                
          </ol>
        </div>
      </div>
                               
                </div>
              </div> 
               
            </div>
			
				 <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Tambah Item</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                
                <div class="panel-body">
                  <div class="padd">
                <?php echo form_open_multipart('item/Create');?>     
                      <div class="form quick-post">
                      
                                      <!-- Edit profile form (not working)-->
                                      <form class="form-horizontal">
                                          <!-- Title -->
                                        <div class="form-group">
    <label for="">Nama Item</label>
    <input type="text" name="nama" class="form-control" id="nama"  placeholder="Nama ITEM">
           
  </div>
                         
  <div class="form-group">
    <label for="">Ukuran</label>
    <!-- <input type="text" name="id_ukuran" class="form-control" id="Ukuran" placeholder="Ukuran"> -->
    <select name="id_ukuran" class="form-control">
    <option>pilih ukuran</option>
    <?php foreach($list_ukuran as $ukuran): ?>
        <option value="<?= $ukuran->id_ukuran ?>"> <?= $ukuran->ukuran ?></option>
    <?php endforeach;  ?>
    </select>  
  </div>

  <div class="form-group">
    <label for="">Jenis Kelamin</label>
    <!-- <input type="text" name="id_jeniskelamin" class="form-control" id="jeniskelamin" placeholder="id_jeniskelamin"> -->
    <select name="id_jeniskelamin" class="form-control">
    <?php foreach($list_kelamin as $jeniskelamin): ?>
        <option value="<?= $jeniskelamin->id_jeniskelamin ?>"> <?= $jeniskelamin->jenis_kelamin ?></option>
    <?php endforeach;  ?>
    </select>          
  </div>

  <div class="form-group">
    <label for="">Tipe</label>
    <!-- <input type="text" name="id_tipe" class="form-control" id="tipe" placeholder="id_tipe"> -->
    <select name="id_tipe" class="form-control">
    <option>pilih tipe</option>
    <?php foreach($list_tipe as $tipe): ?>
        <option value="<?= $tipe->id_tipe ?>"> <?= $tipe->tipe ?></option>
    <?php endforeach;  ?>
    </select>  
   
  </div>

  <div class="form-group">
    <label for="">Merk</label>
    <!-- <input type="text" name="id_merk" class="form-control" id="merk" placeholder="id_merk">    -->
    <select name="id_merk" class="form-control">
    <option>pilih merk</option>
    <?php foreach($list_merk as $merk): ?>
        <option value="<?= $merk->id_merk ?>"> <?= $merk->nama_merk ?></option>
    <?php endforeach;  ?>  
    </select>
  </div>

  <form class="form-horizontal">

<div class="form-group">
    <label for="">Harga</label>
    <input type="text" name="harga" class="form-control" id="harga"  placeholder="Harga">
           
  </div>
                                          </div>
                                          
<!-- Buttons -->
<div class="form-group">

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