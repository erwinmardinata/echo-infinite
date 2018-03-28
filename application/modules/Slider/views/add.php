<h1 style="border-bottom: 1px solid #ddd;padding-bottom: 7px">
	Photo Slider
</h1>
<!-- Main content -->
<section class="content">
  <div class="row">
	<!-- left column -->
	<form role="form" method="post" action="<?php echo site_url('Slider/insert'); ?>" enctype="multipart/form-data">
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-primary">
		<!-- /.box-header -->
		<!-- form start -->
		  <div class="box-body">
  			<?php echo $this->session->flashdata('message'); ?>
  			<div class="form-group">
  			  <label for="exampleInputPassword1">Judul</label>
  			  <input type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo $this->session->flashdata('judul'); ?>" required>
  			</div>
  			<div class="form-group">
  			  <label for="exampleInputPassword1">Deskripsi</label>
  			  <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required><?php echo $this->session->flashdata('judul'); ?></textarea>
  			</div>
  			<div class="form-group">
  			  <label for="exampleInputPassword1">Photo</label>
  			  <input type="file" name="photo" class="form-control" placeholder="Judul" value="<?php echo $this->session->flashdata('photo'); ?>" required>
  			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
			<button type="reset" class="btn btn-warning">Batal</button>	</div>
		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>

  </div>
  </form>
  <!-- /.row -->
</section>
<!-- /.content -->
