<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale-1"> 
		<meta name="description" content="">
		<meta name="author" content="Fabernainggolan">
		<title>CRUD</title>
		<!-- bootstrap core css-->
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" >
	<!-- custom styles for this template-->
	<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" >		
	</head>

<body>
<div class="alert alert-success">
	<strong>Data berhasil di update</strong>
	<?php 
echo anchor('pembelian','lihat data BELANJAMU');
	?>
</div>

<script src="<?=base_url()?>assets/js/jquery.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>