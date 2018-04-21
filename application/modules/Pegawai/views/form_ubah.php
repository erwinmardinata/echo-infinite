<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Ubah Data Petugas Pemeriksa</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Ubah Data</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Pegawai/update'); ?>">
					<br>
					<div class="col-md-8 offset-md-2">
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nama <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required>
							<input type="text" name="nama" value="<?php echo $data->nama; ?>" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Jenis Kelamin</label>
						<div class="col-md-6">
							<select class="form-control" name="jenis_kelamin">
								<option value=""> - </option>
								<option <?php echo $data->jenis_kelamin=='Laki-laki'?'selected':''; ?> value="Laki-laki"> Laki-laki </option>
								<option <?php echo $data->jenis_kelamin=='Perempuan'?'selected':''; ?> value="Perempuan"> Perempuan </option>
							</select>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Alamat</label>
						<div class="col-md-6">
							<textarea name="alamat" class="form-control" style="height: 100px"><?php echo $data->alamat; ?></textarea>
						</div>
					</div>			
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nomor HP</label>
						<div class="col-md-6">
							<input type="text" name="no_hp" value="<?php echo $data->no_hp; ?>" class="form-control">
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Jabatan</label>
						<div class="col-md-6">
							<input type="text" name="jabatan" value="<?php echo $data->jabatan; ?>" class="form-control">
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">NIP </label>
						<div class="col-md-6">
							<input type="text" name="nip" value="<?php echo $data->nip; ?>" class="form-control">
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
