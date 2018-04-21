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
							<td><strong>Data User</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								
								<table class="table table-striped" id="example">
									<thead>
										<tr class="table-success">
											<th style="text-align: left">No</th>
											<th style="text-align: left">Nama</th>
											<th style="text-align: left">Email</th>
											<th style="text-align: left">Hak Akses</th>
											<th style="text-align: left">Status</th>
											<th style="text-align: left">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!$data) { ?>
										<tr>
											<td style="text-align: center" colspan="5">
												- Data User Belum ada -
											</td>
										</tr>
										<?php } else {
											foreach($data as $no => $row):
										?>
										<tr>
											<td style="text-align: left"><?php echo $no+1; ?></td>
											<td style="text-align: left"><?php echo $row->nama; ?></td>
											<td style="text-align: left"><?php echo $row->email; ?></td>
											<td style="text-align: left">
												<?php 
													switch($row->hak_akses) {
														case '1' : $hak_akses = "Super Admin";
														break;
														case '2' : $hak_akses = "Petugas Kecamatan";
														break;
														case '3' : $hak_akses = "Petugas Kabupaten";
														break;
														case '4' : $hak_akses = "Petugas Provinsi";
														break;
														case '5' : $hak_akses = "Petugas Laboratorium";
														break;
														case '6' : $hak_akses = "Pemohon Individu";
														break;
														case '7' : $hak_akses = "Pemohon Perusahaan";
														break;
													}
													
													echo $hak_akses;
												
												?>
											</td>
											<td style="text-align: left"><?php echo $row->status=='1'?'<span class="badge badge-pill badge-success">Aktif</span>':'<span class="badge badge-pill badge-warning">Tidak Aktif</span>'; ?></td>
											<td style="text-align: left; width: 15%">
												<a href="#" class="badge badge-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> |
												<a class="badge badge-warning"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>