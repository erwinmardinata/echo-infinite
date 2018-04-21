<div class="col-md-10 offset-md-1">
	<div class="card" style="font-size: 14px; border-radius: 0">
	  <div class="card-body">
		<h3 style="font-family: Roboto-Bold">Pendaftaran Akun Pemohon</h3>
		<hr>
		<?php echo $this->session->flashdata('message');	?>
		<form method="post" action="<?php echo site_url('Auth/proses_registrasi'); ?>">
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label">Nama Lengkap <span style="color: red">*</span></label>
			<div class="col-sm-9">
			  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label">Alamat Email <span style="color: red">*</span></label>
			<div class="col-sm-9">
			  <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label"></label>
			<div class="col-sm-9">
			  <div style="color: #979797"><span style="color: red">*</span> Pastikan email yang anda masukkan adalah email yang masih aktif dan sering anda gunakan.</div>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label">Password <span style="color: red">*</span></label>
			<div class="col-sm-9">
			  <input type="password" name="password" class="form-control" placeholder="Password" required>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label">Ulang Password <span style="color: red">*</span></label>
			<div class="col-sm-9">
			  <input type="password" name="repassword" class="form-control" placeholder="Ulang Password" required>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label">Status Pemohon<span style="color: red">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name="hak_akses" required>
				  <option value="">- Pilih Status Pemohon -</option>
				  <option value="6">Pribadi</option>
				  <option value="7">Perusahaan</option>
				</select>
			</div>
		  </div>
		  <div class="form-group row">
			<label class="col-sm-3 col-form-label"></label>
			<div class="col-sm-9">
				<a href="<?php echo site_url('Auth'); ?>" class="btn btn-primary"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
				<button type="submit" class="btn btn-secondary">Daftar <i class="far fa-arrow-alt-circle-right"></i></button>						
			</div>
		  </div>
		</form>
		
		<hr>
		<span>
			Kami akan mengirim link verifikasi ke alamat email anda terhadap status keaktifan akun anda
		</span>
		
	  </div>
	</div>
</div>
