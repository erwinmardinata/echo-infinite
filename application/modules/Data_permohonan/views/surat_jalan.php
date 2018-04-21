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
				<h4 class="card-title">Buat Surat Keterangan Jalan Ternak</h4>
                <div id="extra-area-chart"></div>
				<?php echo $this->session->flashdata('message'); ?>
				<br>
				<?php if($surat_jalan) { ?>
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Data_permohonan/update_data_surat_jalan'); ?>" enctype="multipart/form-data">
				<?php } else { ?>
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Data_permohonan/insert_data_surat_jalan'); ?>" enctype="multipart/form-data">				
				<?php } ?>
					<div class="form-group row">
						<label class="control-label text-right col-md-3"><strong>Yang bertanda tangan </strong></label>
						<div class="col-md-8">
						</div>
					</div>												
					<?php if($surat_jalan) { ?>
					<input type="hidden" name="id" value="<?php echo $surat_jalan->id; ?>" class="form-control">
					<?php } ?>
					<input type="hidden" name="id_data_permohonan" value="<?php echo $data->id; ?>" class="form-control">
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Nama</label>
						<div class="col-md-8">
							<select class="form-control" name="id_pegawai" id="pegawai" required="">
								<option value=""> - </option>
								<?php foreach($pegawai as $row): ?>
								<option <?php if(empty($surat_jalan)) { echo ""; } else { echo $row->id==$row_pegawai->id?'selected':''; } ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
								<?php endforeach; ?>							
							</select>
						</div>
					</div>					
					<div id="value">							
						<div class="form-group row">
							<label class="control-label text-right col-md-3">NIP</label>
							<div class="col-md-8">						
								<input type="text" readonly value="<?php if(empty($surat_jalan)) { echo ""; } else { echo $row_pegawai->nip; } ?>" class="form-control" required="">
							</div>
						</div>												
						<div class="form-group row">
							<label class="control-label text-right col-md-3">Jabatan</label>
							<div class="col-md-8">
								<input type="text" id="jabatan" value="<?php if(empty($surat_jalan)) { echo ""; } else { echo $row_pegawai->jabatan; } ?>" readonly class="form-control" required="">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-3"><strong>Memberikan SKJ Kepada </strong></label>
						<div class="col-md-8">
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Nama </label>
						<div class="col-md-8">
							<input type="text" value="<?php echo $data->nama_perusahaan; ?>" readonly class="form-control" required="">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Pekerjaan </label>
						<div class="col-md-8">
							<input type="text" name="pekerjaan" value="<?php if(empty($surat_jalan->pekerjaan)) { echo "Dagang"; } else { echo $surat_jalan->pekerjaan; } ?>" class="form-control">
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Nomor</label>
						<div class="col-md-8">
							<input type="text" name="nomor" value="<?php if(empty($surat_jalan->nomor)) { echo ""; } else { echo $surat_jalan->nomor; } ?>" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Tanggal</label>
						<div class="col-md-8">
							<input type="date" name="tanggal" value="<?php if(empty($surat_jalan->tanggal)) { echo ""; } else { echo $surat_jalan->tanggal; } ?>" class="form-control" required="">
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Jenis dan Jumlah Ternak </label>
						<div class="col-md-8">
							<table width="100%">
							<?php foreach($jml_ternak as $no => $row): ?>
								<tr>
									<td width="5%"><?php echo $no+1; ?>. </td>
									<td width="20%"><?php echo $row->nama_entitas; ?></td>
									<td width="10%">=</td>
									<td width="10%"><?php echo $row->quota; ?></td>
									<td style="text-align: left;">Ekor</td>
								</tr>
							<?php endforeach; ?>
							</table>
							
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3"></label>
						<div class="col-md-8">
							<button type="reset" class="btn btn-inverse">Cancel</button>										
							<button type="submit" class="btn btn-success">Simpan <i class="fa fa-save" aria-hidden="true"></i></button>
							<?php if($surat_jalan) { ?>
							<a href="<?php echo site_url('Data_permohonan/surat_jalan_pdf/'.$data->id); ?>" target="_blank" class="btn btn-danger">Cetak Surat Jalan <i class="fa fa-print" aria-hidden="true"></i></a>
							<?php } ?>
						</div>
					</div>	
				</form>
			
			</div>
		</div>
	</div>

	<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<script type="text/javascript">
$(document).ready(function(){
	$("#pegawai").change(function() {
		var id = $("#pegawai").val();
		
		$.ajax({
			url : '<?php echo site_url("Data_permohonan/get_pegawai"); ?>',
            data : 'id=' + id,
            type : 'get', 
            success : function(result) {
                $("#value").html(result);
            }
		});

	});
});
</script>