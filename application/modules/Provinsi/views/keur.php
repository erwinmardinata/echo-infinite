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
				<h4 class="card-title">Buat Perintah Keur</h4>
                <div id="extra-area-chart"></div>
				<?php echo $this->session->flashdata('message'); ?>
				<br>
				<?php if($keur) { ?>
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Data_permohonan/update_data_keur'); ?>" enctype="multipart/form-data">
				<?php } else { ?>
				<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Data_permohonan/insert_data_keur'); ?>" enctype="multipart/form-data">				
				<?php } ?>
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Nomor</label>
						<div class="col-md-8">
							<?php if($keur) { ?>
							<input type="hidden" name="id" value="<?php echo $keur->id; ?>" class="form-control">
							<?php } ?>
							<input type="hidden" name="id_data_permohonan" value="<?php echo $data->id; ?>" class="form-control">
							<input type="text" name="nomor" value="<?php if(empty($keur->nomor)) { echo ""; } else { echo $keur->nomor; } ?>" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Nama Direktur Muat</label>
						<div class="col-md-8">
							<input type="text" value="<?php echo $data->nama_pemohon; ?>" readonly class="form-control" required="">
						</div>
					</div>
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Waktu Pengurusan/No. Urut </label>
						<div class="col-md-8">
							<input type="text" name="waktu_pengurusan" value="<?php if(empty($keur->waktu_pengurusan)) { echo ""; } else { echo $keur->waktu_pengurusan; } ?>" class="form-control">
						</div>
					</div>						
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Hari/Tanggal Keur</label>
						<div class="col-md-8">
							<input type="date" name="tanggal_keur" value="<?php if(empty($keur->tanggal_keur)) { echo ""; } else { echo $keur->tanggal_keur; } ?>" class="form-control" required="">
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
						<label class="control-label text-right col-md-3">Petugas Pemeriksa </label>
						<div class="col-md-8">
							<input type="text" name="petugas_pemeriksa" value="<?php if(empty($keur->petugas_pemeriksa)) { echo "TIM PEMERIKSA"; } else { echo $keur->petugas_pemeriksa; } ?>" class="form-control" readonly required="">
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Tujuan Pemeriksaan </label>
						<div class="col-md-8">
							<input type="text" name="tujuan_pemeriksa" value="<?php if(empty($keur->tujuan_pemeriksa)) { echo "Houlding Ground Sumbawa Besar"; } else { echo $keur->tujuan_pemeriksa; } ?>" value="" readonly class="form-control" required="">
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Tujuan Pengeluaran</label>
						<div class="col-md-8">
							<input type="text" value="<?php echo $data->tujuan ?>" readonly class="form-control" required="">
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3"><strong>Disahkan Oleh </strong></label>
						<div class="col-md-8">
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3">Nama</label>
						<div class="col-md-8">
							<select class="form-control" name="id_pegawai" id="pegawai" required="">
								<option value=""> - </option>
								<?php foreach($pegawai as $row): ?>
								<option <?php if(empty($keur)) { echo ""; } else { echo $row->id==$row_pegawai->id?'selected':''; } ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
								<?php endforeach; ?>							
							</select>
						</div>
					</div>					
					<div id="value">							
						<div class="form-group row">
							<label class="control-label text-right col-md-3">NIP</label>
							<div class="col-md-8">						
								<input type="text" readonly value="<?php if(empty($keur)) { echo ""; } else { echo $row_pegawai->nip; } ?>" class="form-control" required="">
							</div>
						</div>												
						<div class="form-group row">
							<label class="control-label text-right col-md-3">Jabatan</label>
							<div class="col-md-8">
								<input type="text" id="jabatan" value="<?php if(empty($keur)) { echo ""; } else { echo $row_pegawai->jabatan; } ?>" readonly class="form-control" required="">
							</div>
						</div>
					</div>												
					<div class="form-group row">
						<label class="control-label text-right col-md-3"></label>
						<div class="col-md-8">
							<button type="reset" class="btn btn-inverse">Cancel</button>										
							<button type="submit" class="btn btn-success">Simpan <i class="fa fa-save" aria-hidden="true"></i></button>
							<?php if($keur) { ?>
							<a href="<?php echo site_url('Data_permohonan/keur_pdf/'.$data->id); ?>" target="_blank" class="btn btn-danger">Cetak Keur <i class="fa fa-print" aria-hidden="true"></i></a>
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