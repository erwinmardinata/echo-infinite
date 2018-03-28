<h1 style="border-bottom: 1px solid #ddd;padding-bottom: 7px">
	Content
</h1>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">

	  <div class="box">
		<a href="<?php echo site_url('Content/add'); ?>" class="btn btn-warning" style="float: right;margin-right: 12px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a><br><br>
		<?php echo $this->session->flashdata('message'); ?>
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr class="warning">
					<th>No.</th>
					<th>Judul</th>
					<th>Isi</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data as $no => $row): ?>
				<tr>
					<td width="5%"><?php echo $no+1; ?></td>
					<td><?php echo $row->judul; ?></td>
					<td><?php echo $row->isi; ?></td>
					<td width="10%">
					  <div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						  Aksi
						  <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
						  <li><a href="<?php echo site_url('Content/edit/'.$row->id); ?>">Ubah</a></li>
						  <li><a href="<?php echo site_url('Content/delete/'.$row->id); ?>" onclick="return confirm('anda yakin ?')">Hapus</a></li>
						</ul>
					  </div>					
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>