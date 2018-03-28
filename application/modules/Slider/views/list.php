<h1 style="border-bottom: 1px solid #ddd;padding-bottom: 7px">
	Photo Slider
</h1>

<div class="box">
<div class="box-header">
</div>
<a href="<?php echo site_url('Slider/add'); ?>" class="btn btn-warning" style="float: right;margin-right: 12px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
<a href="<?php echo site_url('Slider/edit_posisi'); ?>" class="btn btn-primary" style="float: right;margin-right: 12px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Edit Posisi</a><br><br>
<?php echo $this->session->flashdata('message'); ?>
<!-- /.box-header -->
<div class="box-body">
  <table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr class="warning">
			<th width="5%">No.</th>
			<th>Photo</th>
			<th>Judul</th>
			<th></th>
		</tr>
	</thead>
	<tbody >
		<?php foreach($data as $no => $row): ?>
		<tr>
			<td><?php echo $no+1; ?></td>
			<td>
				<img src="<?php echo base_url('assets/image/slider/thumb/'.$row->photo); ?>" alt=<?php echo $row->judul; ?>" width="70px" class="img-thumbnail">						
			</td>
			<td><?php echo $row->judul; ?></td>
			<td width="10%">
			  <div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				  Aksi
				  <span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
				  <li><a href="<?php echo site_url('Slider/edit/'.$row->id); ?>">Ubah</a></li>
				  <li><a href="<?php echo site_url('Slider/delete/'.$row->id); ?>" onclick="return confirm('anda yakin ?')">Hapus</a></li>
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

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>