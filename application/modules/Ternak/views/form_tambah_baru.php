<!-- Bread crumb -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-primary">Input Ternak Baru</h3> </div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
			<li class="breadcrumb-item active">Input Ternak Baru</li>
		</ol>
	</div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">

	<div class="row">
		<div class="col-lg-6">
		<form class="form-horizontal form-bordered" method="post" action="<?php echo site_url('Ternak/insert'); ?>">
			<div class="card">
				<br>
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Provinsi</label>
					<div class="col-md-8">
						<select name="id_propinsi" class="form-control">
							<option value="1">Nusa Tenggara Barat</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Kabupaten</label>
					<div class="col-md-8">
						<select name="id_kabupaten" class="form-control">
							<option value='11'>Sumbawa</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Kecamatan</label>
					<div class="col-md-8">
						<select name="id_kecamatan" id="id_kecamatan" class="form-control">
							<option value="">- Pilih Kecamatan -</option>
							<?php foreach($kecamatan as $row): ?>
							<option value="<?php echo $row->id_kec; ?>"><?php echo $row->nama; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Keluraha/Desa</label>
					<div class="col-md-8">
						<select name="id_desa" id="value" class="form-control">
							<option></option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Nama Peternak</label>
					<div class="col-md-8">
						<input type="text" name="nama_peternak" class="form-control">
					</div>
				</div>						
				<div class="form-group row">
					<label class="control-label text-right col-md-4">ID Peternak</label>
					<div class="col-md-8">
						<input type="text" name="id_peternak" class="form-control">
					</div>
				</div>						
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card" style="font-size: 14px;">
				<br>
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Entitas Ternak</label>
					<div class="col-md-8">
						<select name="id_entitas" class="form-control">
							<option value="">- Pilih Entitas -</option>
							<?php foreach($entitas as $row): ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->nama_entitas; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>						
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Sex</label>
					<div class="col-md-8">
						<select name="sex" class="form-control">
							<option value="">- Sex -</option>
							<option value="Jantan">Jantan</option>
							<option value="Betina">Betina</option>
						</select>
					</div>
				</div>						
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Tanggal Lahir</label>
					<div class="col-md-8">
						<input type="text" name="tgl_lahir" class="form-control">
					</div>
				</div>						
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Identifikasi Hewan</label>
					<div class="col-md-8">
						<input type="text" name="identifikasi_hewann" class="form-control">
					</div>
				</div>						
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Nama Petugas</label>
					<div class="col-md-8">
						<select name="id_petugas" class="form-control">
							<?php foreach($petugas as $row): ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->nama_petugas; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>						
				<div class="form-group row">
					<label class="control-label text-right col-md-4">Tanggal Daftar</label>
					<div class="col-md-8">
						<input type="date" name="tgl_daftar" value="<?php echo date('Y-m-d'); ?>" class="form-control">
					</div>
				</div>						
			</div>
		</div>
		<div class="col-lg-12">
			<div class="card" style="padding: 18px 18px 0px 0;">
				<div class="form-group row">
					<div class="col-md-12 text-right">
						<button type="reset" class="btn btn-inverse">Cancel</button>										
						<button type="submit" class="btn btn-success">Simpan <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
					</div>
				</div>	
			</div>
		</div>
		</form>
	</div>

	<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->

