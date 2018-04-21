<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Input Data Komoditi</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Input Data Komoditi</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Entitas_ternak/insert'); ?>">
					<br>
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Kode Komoditi <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="kode_entitas" class="form-control" required>
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-4">Nama Komoditi <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<input type="text" name="nama_entitas" class="form-control" required>
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
