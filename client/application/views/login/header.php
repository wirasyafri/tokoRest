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

	<link href="<?=base_url()?>assets/datatables.min.css" rel="stylesheet">		
	</head>

<body>
<!-- static navbar -->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- <a class="navbar-brand" href="#">Bootstrap</a> -->
		</div>
		<div id="navbar" class="navbar-collapse collapse ">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo site_url();?>/login/register"><i class="glyphicon glyphicon-registration-mark"></i> register </a></li>

				
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="index.php/tugasp3/about">About</a></li>
						<li><a href="index.php/tugasp3/contact">Contact</a></li>
						<!-- <li><a href="#">Something else here</a></li> 
						<li class="divider"></li>
						<li class="dropdown-header">WEBSITE</li>
						<li><a href="index.php/tugasp3/wisata">wisata</a></li>
						<li><a href="index.php/tugasp3/websiteku">websiteku</a></li>
					</ul>
				</li>-->
			</ul>
			<!-- <form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form> -->
			<!-- <ul class="nav navbar-nav navbar-right">
			<li><a href="../navbar/">defaults</a></li>
			<li class="active"><a href="./">static top <span class="sr-only">(current)</span></a></li>
			<li><a href="../navbar-fixed-top">fixed top</a></li>
			</ul> -->
		</div><!-- /.navbar-collapse -->
	</div>
</nav>