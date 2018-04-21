<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Data Pemohon</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Data Pemohon</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<table class="table" style="border: 1px solid #ddd">
					<thead class="table-info">
						<tr>
							<td><strong>Data Pemohon</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align: left">
								<br>
								<?php echo $this->session->flashdata('message'); ?>
								<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Permohonan/insert_data_pemohon'); ?>">
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Nama Perusahaan</label>
										<div class="col-md-8">
											<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id'); ?>" class="form-control">
											<input type="text" name="nama_perusahaan" value="<?php if(!$data) { echo ''; } else { echo $data->nama_perusahaan; } ?>" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Nama Direktur</label>
										<div class="col-md-8">
											<input type="text" name="nama_direktur" value="<?php if(!$data) { echo ''; } else { echo $data->nama_direktur; } ?>" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Alamat</label>
										<div class="col-md-8">
											<textarea class="form-control" style="height: 100px" name="alamat"><?php if(!$data) { echo ''; } else { echo $data->alamat; } ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label text-right col-md-3"></label>
										<div class="col-md-8">
											<button type="reset" class="btn btn-inverse">Cancel</button>										
											<button type="submit" class="btn btn-success">Simpan <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
										</div>
									</div>	
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
