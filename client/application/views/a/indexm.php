<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>Toko FirWirVick</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/responsive.css" rel="stylesheet" type="text/css">
<link href="<?=base_url()?>assets/css/animate.css" rel="stylesheet" type="text/css">

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.isotope.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/wow.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/classie.js"></script>
<script src="contactform/contactform.js"></script>

<!-- =======================================================
    Theme Name: Knight
    Theme URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
======================================================= -->

</head>
<body>
<header class="header" id="header" style="background-image: url(<?php echo base_url()."images/pw_maze_black_2X.png"?>); "><!--header-start-->
	<div class="container" >


    	<figure class="logo animated fadeInDown delay-07s">
        <!--	<a href="#"><img src="img/logo.png" alt=""></a>	-->
        </figure>	
        <h1 class="animated fadeInDown delay-07s">ASSALAMUALAIKUM 
        <?php $session_data =$this->session->userdata('logged_in');
                        $data['username']=$session_data['username']; 
                        echo        $data['username'];              ?></h1>
        <ul class="we-create animated fadeInUp delay-1s">
        	<li>SELAMAT DATANG DI WEBSITE TOKO FIRWIRVICK</li>
        </ul>
            <a class="link animated fadeInUp delay-1s" href="#test">YUK BELANJA</a>
    </div>
</header><!--header-end-->

<nav class="main-nav-outer" id="test" ><!--main-nav-start-->
	<div class="container">
        <ul class="main-nav">
            <li><a href="<?php echo site_url();?>/pembelian"><i class="glyphicon glyphicon-home"></i> Data ITEM </a></li>
            <li><a href="<?php echo site_url();?>/pembelian/toko"><i class="glyphicon glyphicon-shopping-cart"></i>Toko</a></li>
            <li class="small-logo"><a href="#header"><img src="../images/small-logo.png" alt=""></a></li>
            <li><a href="<?=site_url();?>/cetak">Cetak</a></li>
            <li>
                        <a href="login/logout"><i class="glyphicon glyphicon-log-out"></i>logout</a>
                    </li>
            <!-- <li><a href="#contact">LOGIN</a></li> -->
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->



<section class="main-section" id="service" style="background-image: url(<?php echo base_url()."images/shopping_area_in_beijing-wallpaper-1920x1080.jpg"?>); "><!--main-section-start-->
	<div class="container">
    	<?php $this->load->view('pembelian/tampil_pembelian_view'); ?>
	</div>
</section><!--main-section-end-->

<footer class="footer">
    <div class="container">
        
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Knight
            -->
            <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
  </script>


<script type="text/javascript">
	$(window).load(function(){
		
		$('.main-nav li a').bind('click',function(event){
			var $anchor = $(this);
			
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top - 102
			}, 1500,'easeInOutExpo');
			/*
			if you don't want to use the easing effects:
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1000);
			*/
			event.preventDefault();
		});
	})
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
			
            filter: selector,
         });
         return false;
    });
  
});

</script>

</body>
</html>