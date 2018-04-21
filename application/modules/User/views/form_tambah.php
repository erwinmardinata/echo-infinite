<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Input Data User</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Input Data User</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('User/insert'); ?>">
					<br>
					<div class="col-md-8 offset-md-2">
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nama User <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="nama" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Email <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="email" name="email" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Password <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Ulang Password <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="password" name="repassword" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Hak Akses <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<select class="form-control" name="hak_akses" required>
								<option value=""> - </option>
								<option value="1"> Super Admin </option>
								<option value="2"> Petugas Kecamatan </option>
								<option value="3"> Petugas Kabupaten </option>
								<option value="4"> Petugas Provinsi </option>
								<option value="5"> Petugas Laboratorium </option>
								<option value="6"> Pemohon Individu </option>
								<option value="7"> Pemohon Perusahaan </option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Satus <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<select class="form-control" name="status" required>
								<option value=""> - </option>
								<option value="0"> nonaktif </option>
								<option value="1"> aktif </option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-10 text-right">
							<button type="reset" class="btn btn-inverse">Cancel</button>										
							<button type="submit" class="btn btn-success">Simpan <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>

	<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
