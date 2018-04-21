<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Data Petugas Pemeriksa</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">Data Petugas Pemeriksa</li>
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
							<td><strong>Data Petugas Pemeriksa</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<?php echo $this->session->flashdata('message'); ?>								
								<table class="table table-striped" id="example">
									<thead>
										<tr class="table-success">
											<th style="text-align: left;width: 2%">No</th>
											<th style="text-align: left">Nama</th>
											<th style="text-align: left">Jenis Kelamin</th>
											<th style="text-align: left">Alamat</th>
											<th style="text-align: left">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!$data) { ?>
										<tr>
											<td style="text-align: center" colspan="5">
												- Data Belum ada -
											</td>
										</tr>
										<?php } else {
											foreach($data as $no => $row):
										?>
										<tr>
											<td style="text-align: left"><?php echo $no+1; ?></td>
											<td style="text-align: left"><?php echo $row->nama; ?></td>
											<td style="text-align: left"><?php echo $row->jenis_kelamin; ?></td>
											<td style="text-align: left"><?php echo $row->alamat; ?></td>
											<td style="text-align: left; width: 15%">
												<a href="<?php echo site_url('Petugas_pemeriksa/ubah/'.$row->id); ?>" class="badge badge-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> |
												<a href="<?php echo site_url('Petugas_pemeriksa/hapus/'.$row->id); ?>" class="badge badge-warning" onClick="return alert('Anda yakin ?')"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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