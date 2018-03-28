	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
			  <?php foreach($slider as $no => $row): ?>
				<li data-target="#carousel-example-generic" data-slide-to="<?php echo $no; ?>" class="<?php echo $no==0?"active":""; ?>"></li>
			  <?php endforeach; ?>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
		<?php foreach($slider as $no => $row): ?>
		<div class="item <?php echo $no==0?"active":""; ?>">
		  <div class="decs-slider">
			<h1 style="font-family: Roboto-Bold;font-size: 40px"><?php echo $row->judul; ?></h1>
			<div><?php echo $row->deskripsi; ?></div>
			<div style="margin-top: 17px">
				<button class="btn btn-primary" style="background-color: #FFF;color: #000;border: 1px solid #000;border-radius: 27px;padding: 13px 30px; font-size: 12px">LEARN MORE</button>
				<button class="btn btn-primary" style="background-color: #000;border: 1px solid #000;border-radius: 27px;padding: 13px 30px;font-size: 12px">BUY NOW</button>
			</div>
		  </div>
		  <div style="background-image: url('<?php echo base_url('assets/image/slider/'.$row->photo); ?>');background-size: cover;height: 600px;"></div>
		  <div class="carousel-caption">
		  </div>
		</div>
		<?php endforeach; ?>
	  </div>

	</div>
	
	<div class="container" style="padding-top: 70px;">
		<?php foreach($data as $no => $row): ?>		
		<div class="col-md-4">
			<p style="font-size: 60px;line-height: 0;"><?php echo $row->font; ?></p>
			<h3><?php echo $row->judul; ?></h3>
			<p>
				<?php echo $row->isi; ?>
			</p>
			<hr>
			<?php echo $no+1; ?>
		</div>
		<?php endforeach; ?>
		
	</div>
