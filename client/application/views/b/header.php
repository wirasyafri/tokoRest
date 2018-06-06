<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>ADMIN TOKO</title>

    <link href="<?=base_url()?>assets/css1/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css1/bootstrap-theme.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css1/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css1/font-awesome.min.css" rel="stylesheet" />    
  <link href="<?=base_url()?>assets/css1/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css1/style.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/css1/xcharts.min.css" rel=" stylesheet">  
  <link href="<?=base_url()?>assets/datatables.min.css" rel="stylesheet"> 
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start--><a ><?php $session_data =$this->session->userdata('logged_in');
            $data['username']=$session_data['username']; 
            // echo     $data['username'];        ?></a>
            <a href="<?php echo site_url();?>/admin" class="logo"><span class="lite">Admin</span></a>
                    
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            </span>
                            <span class="username"><?php echo     $data['username'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            
                            <li>
                                <a href="<?php echo site_url();?>/login/logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <?php $this->load->view('b/pinggir');?>
      <!--sidebar end-->