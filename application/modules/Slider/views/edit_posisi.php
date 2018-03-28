<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: auto; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<h1 style="border-bottom: 1px solid #ddd;padding-bottom: 7px">
	Photo Slider
</h1>

<!-- Main content -->
  <div class="row">
	<!-- left column -->
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-primary">	  
		<div class="box-body">
			<form method="post" action="<?php echo site_url('Slider/proses_edit_posisi'); ?>">           
				<ul id="sortable">
					<?php foreach($data as $no => $row): ?>
						<li class="ui-state-default">
							<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
								<i class="fa fa-arrows" aria-hidden="true"></i>
								<img src="<?php echo base_url('assets/image/slider/thumb/'.$row->photo); ?>" alt=<?php echo $row->judul; ?>" width="70px" class="img-thumbnail">					
								<?php echo $row->judul; ?>
								<input type="hidden" name="posisi[<?php echo $no; ?>]" value="<?php echo $row->id; ?>">
						</li>
					<?php endforeach; ?>
					<br>
					<button type="submit" class="btn btn-success btn-warng1">Simpan</button>
				</ul>
			</form>
	    </div>
	  </div>
	  <!-- /.box -->

	</div>

  </div>
  </form>
  <!-- /.row -->
<!-- /.content -->
<script>
	$( function() {
	$( "#sortable" ).sortable();
	$( "#sortable" ).disableSelection();
	} );
</script>	  
