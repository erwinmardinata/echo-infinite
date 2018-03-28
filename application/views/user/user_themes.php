<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/image/logo/sumbawa.png"/>

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
		
		<script src="<?php echo base_url(); ?>assets/js/jquery-11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

	</head>
	<body> 	
	
	<div class="navbar-fixed-top">
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">K L E A N I T Y .</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.html">HOME</a></li>
				<li><a href="#">PAGES</a></li>
				<li><a href="#">PORTOFOLIO</a></li>
				<li><a href="#">BLOG</a></li>
				<li><a href="#">GALLERY</a></li>
				<li><a href="#">FEATURES</a></li>
				<li><a href="#">SHOP</a></li>
			  </ul>
			</div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>					
	</div>

	<?php echo $content; ?>
	
	</body>
</html>
