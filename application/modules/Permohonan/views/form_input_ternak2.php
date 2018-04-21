<style type="text/css">
	.chosen-container-multi .chosen-choices {
		border-radius: 0;
		padding: 3px;
	}
</style>
<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Pendaftaran Permohonan</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Pendaftaran Permohonan</li>
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
							<td><strong>Formulir Registrasi Permohonan Izin Pengeluaran Ternak</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align: left">
								<br>
								<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Permohonan/coba2'); ?>">
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Pilih Hewan Ternak</label>
										<div class="col-md-7">
											<select name="id_entitas[]" class="chosen-select form-control" multiple tabindex="4">
								              <option value=""></option>
											  <?php foreach($ternak as $no => $row): ?>
											  <option value="<?php echo $row->id; ?>"><?php echo  $row->no_kartu_ternak." - ".$row->desa." - ". $row->nama_peternak; ?></option>
											  <?php endforeach; ?>
											</select>
										</div>
									</div>										
									<div class="form-group row">
										<label class="control-label text-right col-md-3"></label>
										<div class="col-md-8">
											<button type="button" id="tes" class="btn btn-inverse">Cancel</button>										
											<button type="submit" class="btn btn-success">Lanjutkan <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
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
<script>
  $(function() {
    $('.chosen-select').chosen();
    $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
  });
</script>
