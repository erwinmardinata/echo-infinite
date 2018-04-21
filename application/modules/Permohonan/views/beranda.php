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
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible fade show" role="alert">
			  <i class="fa fa-info-circle" aria-hidden="true"></i> 	This is a info alert—check it out!
			  <p style="font-size: 14px;"> Pilih Rekam / Edit Formulir kemudian klik Kirim Token, lalu masukkan token yang terkirim lewat email sewaktu mengirim permohonan. Permohonan pendaftaran dianggap selesai jika status pendaftaran adalah "KIRIM". Anda bisa membuat permohonan baru hanya jika belum pernah membuat permohonan sebelumnya atau jika permohonan sebelumnya sudah ditolak oleh KPP Tujuan. </p>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<table class="table" style="border: 1px solid #ddd;color: #000">
					<thead class="table-info">
						<tr>
							<td><strong>Status Pendaftaran Permohonan Izin Pengeluaran Ternak</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								
								<table class="table table-striped">
									<thead>
										<tr class="table-success">
											<th style="text-align: left">No</th>
											<th style="text-align: left">Tanggal</th>
											<th style="text-align: left">Nama Perusahaan</th>
											<th style="text-align: left">Nama Direktur</th>
											<th style="text-align: left">Status</th>
											<th style="text-align: left">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											if(!$data) {
												echo '<tr><td colspan="7" style="text-align: center">- Data Belum ada -</td></tr>';
											} else {
												foreach($data as $no => $row): 
										?>
										<tr>
											<td style="text-align: left;width: 2%"><?php echo $no+1; ?></td>
											<td style="text-align: left;width: 13%"><?php echo $row->tanggal_permohonan; ?></td>
											<td style="text-align: left;width: 20%"><?php echo $row->nama_perusahaan; ?></td>
											<td style="text-align: left;width: 20%"><?php echo $row->nama_pemohon; ?></td>
											<td style="text-align: left;width: 5%">
												<?php
													if($row->status == 0) $status = '<span class="badge badge-dark">Belum Terkirim</span>';
													if($row->status == 1) $status = '<span class="badge badge-success">Terkirim</span>';
													if($row->status == 2) $status = '<span class="badge badge-info">Selesai</span>';
													echo $status;
												?>
											</td>
											<td style="text-align: left; width: 25%">
												<a href="<?php echo site_url('Permohonan/lihat_permohonan/'.$row->id); ?>" class="badge badge-secondary">Lihat</a> 
												<?php if($row->status == 0) { ?>
												| <a href="<?php echo site_url('Permohonan/ubah/'.$row->id); ?>" class="badge badge-secondary">Ubah</a> 
												| <a href="<?php echo site_url('Permohonan/kirim_permohonan/'.$row->id); ?>" class="badge badge-secondary">Kirim Permohonan</a> 
												<?php } else { ?>
												| <span class="badge badge-dark">Ubah</span>
												| <span class="badge badge-dark">Kirim Permohonan</span>
												<?php } ?>
											</td>
										</tr>
										<?php endforeach; } ?>
									</tbody>
								</table>
						
								
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
