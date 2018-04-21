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
				<table class="table" style="border: 1px solid #ddd;color: #000">
					<thead class="table-info">
						<tr>
							<td><strong>Data Permohonan Pemeriksaan Ternak</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								
								<table class="table table-striped" id="example">
									<thead>
										<tr class="table-success">
											<th style="text-align: left;width: 1%">No</th>
											<th style="text-align: left">Tanggal</th>
											<th style="text-align: left">Nama Perusahaan</th>
											<th style="text-align: left">Nama Direktur</th>
											<th style="text-align: left">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!$data) { ?>
										<tr>
											<td style="text-align: center" colspan="5">
												- Data User Belum ada Permohonan Pemeriksaan -
											</td>
										</tr>
										<?php } else {
											foreach($data as $no => $row):
											if($row->status == 2) {
										?>
										<tr>
											<td style="text-align: left"><?php echo $no+1; ?></td>
											<td style="text-align: left"><?php echo $row->tanggal_permohonan; ?></td>
											<td style="text-align: left"><?php echo $row->nama_perusahaan; ?></td>
											<td style="text-align: left"><?php echo $row->nama_pemohon; ?></td>
											<td style="text-align: left; width: 15%">
												<a href="<?php echo site_url('Pemeriksaan/pemeriksaan_ternak/'.$row->id); ?>" class="badge badge-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Periksa Ternak</a>
											</td>
										</tr>
										<?php } endforeach; } ?>
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
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>