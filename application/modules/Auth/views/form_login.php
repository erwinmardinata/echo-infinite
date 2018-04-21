<div class="col-md-6 offset-md-3" style="padding: 0px 25px;">
	<div class="card" style="border-radius: 0">
	  <div class="card-body">
		<div class="text-center">
			<img src="<?php echo site_url(); ?>assets/image/logo/sijincow.jpg" class="img-fluid" alt="sijinakcow" style="max-width: 30%" />
		</div>
		<br>	
		<?php echo $this->session->flashdata('message'); ?>
		<form method="post" action="">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text input-group-text-costum" id="inputGroup-sizing-default"><i class="fas fa-user"></i></span>
		  </div>
		  <input type="email" name="email" class="form-control" placeholder="Email">
		</div>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text input-group-text-costum" id="inputGroup-sizing-default"><i class="fas fa-lock"></i></span>
		  </div>
		  <input type="password" name="password" class="form-control" placeholder="Password">
		</div>
		<table style="margin: 16px 0;">
			<tr>
				<td><input type="text" name="bil1" id="bil1" readonly class="form-control" style="width:50px;height:33px;text-align:center"></span></td>
				<td>+</td>
				<td><input type="text" name="bil2" id="bil2" readonly class="form-control" style="width:50px;height:33px;text-align:center"></td>
				<td>=</td>
				<td><input type="text" name="hasil" class="form-control" style="width:50px;height:33px;text-align:center" required></td>
			</tr>
		</table>
		<div class="input-group mb-3">
			<button type="submit" name="submit" value="login" class="btn btn-dark">Login <i class="far fa-arrow-alt-circle-right"></i></button>
		</div>
		</form>
		<hr>
		
		<div class="container" style="font-size: 13px">
			<div class="row">
				<div class="col-md-5">
					Lupa Password ?
				</div>
				<div class="col-md-7">
					Klik <a href="#" id="lp">lupa password</a> melihat password anda atau reset untuk mereset password Anda. 
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Belum Punya Akun ?
				</div>
				<div class="col-md-7">
					Klik <a href="<?php echo site_url('Auth/registrasi'); ?>">daftar</a> untuk pemohon ijin baru yang belum punya akun. 
				</div>
			</div>
		</div>
		
	  </div>
	</div>
</div>
<script>
	$(function () {
			var a = Math.ceil(Math.random() * 10);
			var b = Math.ceil(Math.random() * 10);       
			$("#bil1").attr("value", a);
			$("#bil2").attr("value", b);
  });
</script>