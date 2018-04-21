<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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
				<h4 class="card-title">Data Permohonan</h4>
                <div id="extra-area-chart"></div>
				<ul class="nav nav-tabs">
				  <li class="nav-item">
				    <a class="nav-link" href="<?php echo site_url('Permohonan/lihat_permohonan/'.$data->id); ?>">Lihat Data</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link active" href="<?php echo site_url('Permohonan/keur/'.$data->id); ?>">Lihat Perintah Keur</a>
				  </li>
				</ul>
				<div class="row">
					<div class="col-md-12">
						<br>
						<table class="table" style="border: 1px solid #ddd">
							<tr class="table-info">
								<td style="text-align: left;">
									<span style="font-size: 17px;"><i class="fa fa-info-circle" aria-hidden="true"></i> Status</span>
								</td>
							</tr>
							<tr>
								<td style="text-align: left">
									<?php if($keur) { ?>
									<a href="<?php echo site_url('Permohonan/keur_pdf/'.$data->id); ?>" class="btn btn-sm btn-danger" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> Cetak Perintah Keur</a>
									<?php } else { ?>
									<div class="alert alert-danger" role="alert" style="border-radius: 0">
									  <p style="text-align: left;color: #000;margin: 10px 0">
									  	Mohon maaf, Perintah Keur saat ini belum bisa dilihat.<br>
									  	Permohonan belum dikirim atau menunggu persetujuan dari pihak petugas perizinan Kabupaten.<br>
									  	Kembali ke data <a href="<?php echo site_url('Permohonan/lihat_permohonan/'.$data->id); ?>">permohonan</a>
									  </p>
									 </div>
									 <?php } ?>
								</td>
							</tr>
						</table>
					</div>
				</div>


				</ul>                				
			</div>
		</div>
	</div>

	<!-- End PAge Content -->
</div>
