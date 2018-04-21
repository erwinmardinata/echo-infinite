<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Ubah Data Pendaftaran Permohonan</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Ubah Data</li>
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
								<?php echo $this->session->flashdata('message'); ?>
								<br>
								<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Permohonan/update_data_permohonan'); ?>" enctype="multipart/form-data">
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Tujuan<span class="text-danger">*</span></label>
										<div class="col-md-8">
											<input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required="">
											<input type="text" name="tujuan" value="<?php echo $data->tujuan; ?>" class="form-control" required="">
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Pelabuhan Muat<span class="text-danger">*</span></label>
										<div class="col-md-8">
											<input type="text" name="pelabuhan_muat" value="<?php echo $data->pelabuhan_muat; ?>" class="form-control" required="">
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Pelabuhan Bongkar<span class="text-danger">*</span></label>
										<div class="col-md-8">
											<input type="text" name="pelabuhan_bongkar" value="<?php echo $data->pelabuhan_bongkar; ?>" class="form-control" required="">
										</div>
									</div>						
									<div class="form-group row">
										<label class="control-label text-right col-md-3">Upload Rekomendasi</label>
										<div class="col-md-8">
											<a target="_blank" href="<?php echo base_url('assets/rekomendasi/'.$data->rekomendasi); ?>">Lihat Rekomendasi</a>
											<input type="file" name="rekomendasi" class="form-control">
										</div>
									</div>						
									<div id="komoditi">
										<?php foreach($jml_ternak as $no => $list): ?>
										<div class="form-group row" id="form-komoditis<?php echo $no; ?>">
											<label class="control-label text-right col-md-3">Masukkan Komoditi<span class="text-danger">*</span></label>
											<div class="col-md-6">
												<select name="id_entitas[]" class="form-control" required="">
													<option value="">- Pilih Komoditi -</option>
													<?php foreach($entitas as $row): ?>
													<option <?php echo $row->id==$list->id_entitas?'selected':''; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama_entitas; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="col-md-2">
												<input type="text" name="qty[]" value="<?php echo $list->quota; ?>" class="form-control" placeholder="Jumlah" required="">
											</div>
											<?php if($no > 0) { ?>
											<div class="col-md-1" style="margin-left: -17px"> 
												<button id="<?php echo $no; ?>" class="btn_removes" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>  
											</div>
											<?php } ?> 											
										</div>	
										<?php endforeach; ?>									
									</div>						
									<div class="form-group row">
										<label class="control-label text-right col-md-3"></label>
										<div class="col-md-7">
											<button id="tambah_btn" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Komoditi</button>
											<!-- <button id="tambah_btn2" type="button" class="btn btn-warning"><i class="fa fa-plus" aria-hidden="true"></i> Komoditi Lain</button> -->
										</div>
									</div>						
									<div class="form-group row">
										<label class="control-label text-right col-md-3"></label>
										<div class="col-md-8">
											<button type="reset" class="btn btn-inverse">Cancel</button>										
											<button type="submit" class="btn btn-success">Simpan <i class="fa fa-save" aria-hidden="true"></i></button>
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
$(document).ready(function(){
	var i = 1;
    $("#tambah_btn").click(function(){
		$("#komoditi").append('		<div class="form-group row" id="form-komoditi'+i+'"> \
										<label class="control-label text-right col-md-3"></label> \
										<div class="col-md-6"> \
											<select name="id_entitas[]" class="form-control" required> \
												<option value="">- Pilih Komoditi -</option> \
												<?php foreach($entitas as $row): ?> \
												<option value="<?php echo $row->id; ?>"><?php echo $row->nama_entitas; ?></option> \
												<?php endforeach; ?> \
											</select> \
										</div> \
										<div class="col-md-2"> \
											<input type="text" name="qty[]" class="form-control" placeholder="Jumlah" required> \
										</div> \
										<div class="col-md-1" style="margin-left: -17px"> \
											<button id="'+i+'" class="btn_remove" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>  \
										</div> \
									</div> ');
		i++;
    });
    $(document).on('click', '.btn_removes', function(){
    	var button_id = $(this).attr("id");
    	$("#form-komoditis"+button_id).remove();
    });
  //   $("#tambah_btn2").click(function(){
		// $("#komoditi").append('		<div class="form-group row" id="form-komoditi'+i+'"> \
		// 								<label class="control-label text-right col-md-3"></label> \
		// 								<div class="col-md-6"> \
		// 									<input type="text" name="id_entitas[]" class="form-control" placeholder="Masukkan nama komoditi lain" value="0"> \
		// 									<input type="text" name="nama_entitas[]" class="form-control" placeholder="Masukkan nama komoditi lain" required> \
		// 								</div> \
		// 								<div class="col-md-2"> \
		// 									<input type="text" name="qty[]" class="form-control" placeholder="Jumlah" required> \
		// 								</div> \
		// 								<div class="col-md-1" style="margin-left: -17px"> \
		// 									<button id="'+i+'" class="btn_remove" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>  \
		// 								</div> \
		// 							</div> ');
		// i++;
  //   });
    $(document).on('click', '.btn_remove', function(){
    	var button_id = $(this).attr("id");
    	$("#form-komoditi"+button_id).remove();
    });
});
</script>