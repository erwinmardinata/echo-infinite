<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style type="text/css">
	.table-costum {
		width: 100%
	}

	.table-costum2 {
		width: 50%;
	}

	.table-costum tr th,
	.table-costum tr td {
		padding: 5px;
		line-height: 35px;
		text-align: left;
		border: 1px solid #ddd;
		color: #000
	}
	.table-costum2 tr th,
	.table-costum2 tr td {
		line-height: 15px;
		text-align: left;
		border: 1px solid #ddd;
		color: #000

	}
</style>
<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Dashboard</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
	<!-- Start Page Content -->

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('Data_permohonan/lihat_permohonan/'.$data->id); ?>">Data Pemohon</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="#">Input Pemeriksaan Ternak</a>
					</li>
				</ul>
				
				<div style="padding: 12px">
					<form method="post" action="<?php echo site_url('Data_permohonan/update_ternak_pemohon'); ?>">
					<table class="table-costum">
						<tr class="table-info">
							<th width="2%">No</th>
							<th width="40%">Berat (Kg) </th>
						</tr>
						<?php 
							foreach($jml_ternak as $row): 
						?>						
						<tr>
							<td colspan="3" style="text-align: left; font-weight: bold"><?php echo strtoupper($row->nama_entitas); ?></td>
						</tr>						
						<?php 
							$x=1;
							foreach($komoditi_pemohon as $no => $list): 
								if($list->id_entitas == $row->id_entitas) {
						?>
						<tr>
							<td style="text-align: center">1</td>
							<td>
								<input type="hidden" name="id_data_permohonan" value="<?php echo $list->id_data_permohonan; ?>">
								<input type="hidden" name="id[]" value="<?php echo $list->id; ?>">
								<input type="text" name="berat[]" value="<?php echo $list->berat; ?>" class="form-control input-md" placeholder="Masukkan Berat (Kg)">
							</td>
						</tr>

						<?php 
								$x++; 
								} 
							endforeach;
							endforeach; 
						?>

					</table>
					<br>
					<div style="text-align: right">
						<a href="<?php echo site_url('Permohonan/pdf/'.$data->id); ?>" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Print Hasil Pemeriksaan</a> |
						<button href="<?php echo site_url('Permohonan/pdf/'.$data->id); ?>" target="_blank" class="btn btn-info"><i class="fa fa-save" aria-hidden="true"></i> Simpan Perubahan</button> 
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<?php 
	foreach($jml_ternak as $row):
		$x=1;
		foreach($komoditi_pemohon as $no => $list): 
		if($list->id_entitas == $row->id_entitas) {

?>
		<!-- Modal HTML embedded directly into document -->
		<div id="<?php echo $row->id_entitas.''.$x ?>" class="modal">
			<form method="post" action="<?php echo site_url('Permohonan/update_data_komoditi_pemohon'); ?>">
				  <p>No. Kartu Ternak</p>
				  <p>
				  	<input type="hidden" name="id_data_permohonan" value="<?php echo $list->id_data_permohonan; ?>" class="form-control">
				  	<input type="hidden" name="id" value="<?php echo $list->id; ?>" class="form-control">
				  	<input type="text" name="id_ternak" value="<?php echo $list->id_ternak; ?>" class="form-control">
				  </p>
				  <a href="#" class="btn btn-sm btn-primary" rel="modal:close">Tutup</a>
				  <button type="submit" class="btn btn-sm btn-success">Simpan</button>
			</form>
		</div>
<?php 
		$x++; 
		} 
		endforeach;
	endforeach;

?>
