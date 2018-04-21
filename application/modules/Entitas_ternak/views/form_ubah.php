<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Data Komoditi</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Ubah Data Komoditi</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Entitas_ternak/update'); ?>">
					<br>
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Kode Komoditi <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required>
							<input type="text" name="kode_entitas" value="<?php echo $data->kode_entitas; ?>" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nama Komoditi <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="nama_entitas" value="<?php echo $data->nama_entitas; ?>" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Status <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<select name="status" class="form-control" required="">
								<option value=""> - </option>
								<option <?php echo $data->status=='1'?'selected':''; ?> value="1">Aktif</option>
								<option <?php echo $data->status=='0'?'selected':''; ?> value="0">Nonaktif</option>
							</select>
						</div>
					</div>						
					<div class="form-group row">
						<div class="col-md-10 text-right">
							<a href="<?php echo site_url('Entitas_ternak'); ?>" class="btn btn-inverse"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Kembali</a>										
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
