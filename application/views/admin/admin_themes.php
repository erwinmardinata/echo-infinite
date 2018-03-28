<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Ensiklopedia Sumbawa | <?php echo $title; ?></title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/image/logo/sumbawa.png"/>

		<link href="<?php echo base_url(); ?>assets/ckeditor/contents.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">		
		<script src="<?php echo base_url(); ?>assets/js/jquery-11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>

	</head>
	<body style="margin: 80px 0 0 0;"> 	
	
	<div class="navbar-fixed-top">
		<!--div class="menu-top">
			<a class="img-header" href="#">ENSIKLOPEDIA SUMBAWA</a>
		</div-->
		<nav class="navbar navbar-default" role="navigation">
			<div class="col-md-10 col-md-offset-1">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="<?php echo site_url(); ?>">Admin</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo site_url('Adminpanel/logout'); ?>">LOGOUT</a></li>
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</div><!-- /.container-fluid -->
		</nav>					
		
	</div>

	<div class="container-fluid">
		<div class="col-md-10 col-md-offset-1">
			

			<div class="col-md-3 col-costum">
				<div class="list-group">
				  <a href="<?php echo site_url('Adminpanel'); ?>" class="list-group-item <?php echo $subtitle=='dashboard'?'active':''; ?>">
					<span class="glyphicon glyphicon-home" aria-hidden="true"></span> 
					DASHBOARD
				  </a>
				  <a href="<?php echo site_url('Slider'); ?>" class="list-group-item <?php echo $subtitle=='slider'?'active':''; ?>">
					<span class="glyphicon glyphicon-picture" aria-hidden="true"></span> 
					PHOTO SLIDER
				  </a>
				  <a href="<?php echo site_url('Content'); ?>" class="list-group-item <?php echo $subtitle=='content'?'active':''; ?>">
					<span class="glyphicon glyphicon-share" aria-hidden="true"></span> 
					CONTENT
				  </a>
				</div>
			</div>

			<div class="col-md-9 col-costum">
				<div class="panel panel-default">
				  <div class="panel-body">
					<?php echo $content; ?>
				  </div>
				</div>								
			</div>
			
		</div>

	</div>
	</body>
</html>