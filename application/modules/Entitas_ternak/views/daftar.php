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
				<?php echo $this->session->flashdata('message'); ?>
				<table class="table" style="border: 1px solid #ddd;color: #000">
					<thead class="table-info">
						<tr>
							<td><strong>Data Komoditi Ternak</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								
								<table class="table table-striped" id="example">
									<thead>
										<tr class="table-success">
											<th style="text-align: left">No</th>
											<th style="text-align: left">Kode Entitas</th>
											<th style="text-align: left">Nama Entitas</th>
											<th style="text-align: left">Status</th>
											<th style="text-align: left">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php if(!$data) { ?>
										<tr>
											<td style="text-align: center" colspan="4">
												- Data User Belum ada -
											</td>
										</tr>
										<?php } else {
											foreach($data as $no => $row):
										?>
										<tr>
											<td style="text-align: left;width: 5%"><?php echo $no+1; ?></td>
											<td style="text-align: left;width: 20%"><?php echo $row->kode_entitas; ?></td>
											<td style="text-align: left"><?php echo $row->nama_entitas; ?></td>
											<td style="text-align: left;width: 7%;text-align: center"><?php echo $row->status=='1'?'<span class="badge badge-success">Aktif</span>':'<span class="badge badge-secondary">Nonaktif</span>'; ?></td>
											<td style="text-align: left; width: 17%;text-align: center;">
												<a href="<?php echo site_url('Entitas_ternak/ubah/'.$row->id); ?>" class="badge badge-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a> |
												<a href="<?php echo site_url('Entitas_ternak/delete/'.$row->id); ?>" onclick="return confirm('anda yakin?');" class="badge badge-warning"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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