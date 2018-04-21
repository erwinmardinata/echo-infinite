<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Tambah Data Petugas Pemeriksa</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Tambah Data</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Pegawai/insert'); ?>">
					<br>
					<div class="col-md-8 offset-md-2">
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nama <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="nama" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Jenis Kelamin</label>
						<div class="col-md-6">
							<select class="form-control" name="jenis_kelamin">
								<option value=""> - </option>
								<option value="Laki-laki"> Laki-laki </option>
								<option value="Perempuan"> Perempuan </option>
							</select>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Alamat</label>
						<div class="col-md-6">
							<textarea name="alamat" class="form-control" style="height: 100px"></textarea>
						</div>
					</div>		
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nomor HP</label>
						<div class="col-md-6">
							<input type="text" name="no_hp" class="form-control">
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Jabatan</label>
						<div class="col-md-6">
							<input type="text" name="jabatan" class="form-control">
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">NIP </label>
						<div class="col-md-6">
							<input type="text" name="nip" class="form-control">
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
