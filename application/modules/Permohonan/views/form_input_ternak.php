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
							<td><strong>Masukkan Data Ternak</strong></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align: left">
								<br>
								<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Permohonan/insert_data_permohonan'); ?>">
									<div class="col-md-12 ">	

									<?php 
										$a = count($this->session->userdata('id_entitas'));
										if($this->session->userdata('id_entitas')[0] == '') {
											echo "<p style='text-align:center'>Data Tidak Ada</p>";
										} else {											
											for($i=0; $i<$a; $i++) {
											$entitas = $this->db->where('id', $this->session->userdata('id_entitas')[$i])
													 			->get('entitas')->row();
											$quota = $this->session->userdata('qty')[$i];
									 ?>

										<div class="accordion" id="accordion">
										  <div class="" style="border: 1px solid #ddd">
										    <div class="card-header" id=" <?php echo $i; ?>">
										      <h5 class="mb-0">
										        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
										          <span><i class="fa fa-sort" aria-hidden="true"></i></span>
										          <span style="font-size: 18px;font-weight: bold;"><?php echo $entitas->nama_entitas; ?></span>
										        </button>
										      </h5>
										    </div>

										    <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $i==0?'show':''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
										      <div class="card-body" style="padding: 12px">
												<?php for($x=1; $x<=$quota; $x++) { ?>
													  <div class="form-group row">
													    <label for="inputPassword" class="col-sm-1 col-form-label text-right"><?php echo $x; ?></label>
													    <div class="col-sm-10">
													      <input type="hidden" name="id_data_permohonan" value="<?php echo $entitas->id; ?>">
													      <input type="hidden" name="id_entitas[]" value="<?php echo $entitas->id; ?>">
													      <input type="text" name="id_ternak[]" class="form-control" id="inputPassword" placeholder="Masukkan Nomor Kartu Ternak">
													    </div>
													  </div>
												<?php } ?>
										      </div>
										    </div>
										  </div>
										</div>

									<?php } } ?>

									<br>
									<a href="<?php echo site_url('Permohonan/tambah'); ?>" type="reset" class="btn btn-inverse"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Kembali</a>		
									<button type="submit" class="btn btn-success">Simpan <i class="fa fa-save" aria-hidden="true"></i></button>
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