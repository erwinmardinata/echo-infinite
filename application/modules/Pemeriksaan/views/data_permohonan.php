<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style type="text/css">
	.table-costum {
		width: 100%
	}

	.table-costum2 {
		width: 100%;
	}

	.table-costum tr td {
		line-height: 30px;
		text-align: left;
		border: 0;
		color: #000
	}
	.table-costum2 tr th,
	.table-costum2 tr td {
		padding: 3px;
		line-height: 30px;
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
						<a class="nav-link active" href="#">Data Pemohon</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('Data_permohonan/pemeriksaan_ternak/'.$data->id); ?>">Input Pemeriksaan Ternak</a>
					</li>
				</ul>
				
				<div style="padding: 12px">
					
					<table class="table-costum">
						<tr>
							<td width="20%">Tanggal Permohonan</td>
							<td width="2%">:</td>
							<td style="text-align: left"><?php echo $data->tanggal_permohonan; ?></td>
						</tr>
						<tr>
							<td>Nama Perusahaan</td>
							<td>:</td>
							<td style="text-align: left"><?php echo $data->nama_perusahaan; ?></td>
						</tr>
						<tr>
							<td>Nama Direktur</td>
							<td>:</td>
							<td style="text-align: left"><?php echo $data->nama_pemohon; ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td style="text-align: left"><?php echo $data->alamat; ?></td>
						</tr>
	<!-- 									<tr>
							<td>Status</td>
							<td>:</td>
							<td style="text-align: left">
								<?php
									if($data->status == 0) $status = '<span class="badge badge-secondary">Pending</span>';
									if($data->status == 1) $status = '<span class="badge badge-success">Terkirim</span>';
									if($data->status == 2) $status = '<span class="badge badge-info">Selesai</span>';
									echo $status;
								?>											
							</td>
						</tr>
	-->								</table>

					<table class="table-costum">
						<tr>
							<td width="30%"><strong>Pengajuan permohonan izin ternak</strong></td>
							<td width="2%">:</td>
							<td style="text-align: left"></td>
						</tr>
					</table>

					<table class="table-costum">
						<?php foreach($jml_ternak as $row): ?>
						<tr>
							<td width="3%"></td>
							<td width="3%">-</td>
							<td width="14%"><?php echo $row->nama_entitas ?> </td>
							<td width="2%">:</td>
							<td width="10%" style="text-align: left"><?php echo $row->quota; ?> Ekor</td>
							<td style="text-align: left">
								<a class="badge badge-dark" data-toggle="collapse" href="#<?php echo $row->id; ?>" aria-expanded="false" aria-controls="<?php echo $row->id; ?>">Lihat Ternak <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td colspan="6" style="text-align: left">
								<div class="collapse" id="<?php echo $row->id; ?>">
									<!-- table yang akan menampilakan nomor kartu ternak dari data komoditi pemohon -->
									<table  class="table-costum2">
										<tr class="table-info">
											<th>No</th>
											<th>No. Kartu Ternak</th>
											<th>Berat (Kg)</th>
											<!-- <th>Status</th> -->
											<th>Aksi</th>
										</tr>
										<?php 
											$x=1;
											foreach($komoditi_pemohon as $no => $list): 
											if($list->id_entitas == $row->id_entitas) {
										?>
										<tr>
											<td width="2%"><?php echo $x; ?></td>
											<td><?php echo $list->id_ternak; ?></td>
											<td width="30%"><?php echo $list->berat; ?></td>
											<!-- <td><?php echo $list->status; ?></td> -->
											<td style="text-align: center;width: 5%">
											<!-- Link to open the modal -->
											<span><a href="#<?php echo $row->id_entitas.''.$x ?>" class="badge badge-primary" rel="modal:open">Edit</a></span>
											</td>
										</tr>
										
										<?php $x++; } endforeach; ?>
									</table>
								</div>											
							</td>
						</tr>
						<?php endforeach; ?>
					</table>

					<table class="table-costum">
						<tr>
							<td width="20%">Tujuan</td>
							<td width="2%">:</td>
							<td style="text-align: left"><?php echo $data->tujuan; ?></td>
						</tr>
						<tr>
							<td>Pelabuhan Muat</td>
							<td>:</td>
							<td style="text-align: left"><?php echo $data->pelabuhan_muat; ?></td>
						</tr>
						<tr>
							<td>Pelabuhan Bongkar</td>
							<td>:</td>
							<td style="text-align: left"><?php echo $data->pelabuhan_bongkar; ?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td></td>
							<td style="text-align: left"></td>
						</tr>
						<tr>
							<td style="text-align: left;" colspan="3">
								<a href="<?php echo site_url('Permohonan/pdf/'.$data->id); ?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Print Permohonan</a> 
							</td>
						</tr>
					</table>
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
