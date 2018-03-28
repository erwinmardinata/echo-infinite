<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>LOGIN</title>

		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
		<script src="<?php echo base_url(); ?>assets/js/jquery-11.0.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

	</head>
	<body> 	
	
		<div class="container-fluid">
					
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default" style="margin-top: 100px">
				  <div class="panel-body">
					<h1 style="text-align: center;border-bottom: 1px solid #ddd;margin-bottom: 17px;padding-bottom: 11px;">LOGIN ADMIN</h1>
					<?php echo $this->session->flashdata('message'); ?>
					<form method="post" action="">
					  <div class="form-group">
						<div class="input-group">
						  <div class="input-group-addon icon-login" style="border-radius: 0;"><i class="fa fa-user" aria-hidden="true" style="width: 25px;"></i></div>
						  <input type="text" name="email" class="form-control form-costum" id="exampleInputAmount" placeholder="Masukkan Email">
						</div>					  
					  </div>
					  <div class="form-group">
						<div class="input-group">
						  <div class="input-group-addon icon-login" style="border-radius: 0;"><i class="fa fa-key" aria-hidden="true" style="width: 25px;"></i></div>
						  <input type="password" name="password" class="form-control form-costum" id="exampleInputAmount" placeholder="Masukkan Password">
						</div>					  
					  </div>
					  <button type="submit" name="submit" value="login" style="border-radius: 0;" class="btn btn-primary btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i> LOGIN</button>
					</form>
				  </div>
				</div>							
			</div>
			

		</div>
	</div>
	

	</body>
</html>