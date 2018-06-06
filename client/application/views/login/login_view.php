<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
<title>Shop Login FirWirVick</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?=base_url()?>/assets/css/style1.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body style="background-image: url(<?php echo base_url()."images/shopping_area_in_beijing-wallpaper-1920x1080.jpg"?>); ">
<?php echo form_open('login/cekLogin'); ?>
	<div class="padding-all">
		<div class="header">
			<h1><img src="<?=base_url()?>/images/5.png" alt=" "> Shoping Login Form</h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
				<form action="#" method="post">
					<input type="text" name="username" placeholder="User Name" required=""/>
					<input type="password"  name="password" class="padding" placeholder="Password" required=""/>
					<input type="submit" value="submit">
					
				</form>
			</div>
		  <div class="clear"> </div>
		</div>

		<div class="footer">
		<p>Belum punya akun ?? YUK <a href="<?php echo site_url();?>/login/register" >daftar </a> dulu</p>
		<!-- <p>© 2017 Gaming Login form. All Rights Reserved | Design by  <a href="https://w3layouts.com/" >  w3layouts </a></p> -->
		</div>
	</div>
</body>
</html>