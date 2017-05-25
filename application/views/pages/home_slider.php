<div class="home_slider">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" >
	<!-- Indicators -->
	<ol class="carousel-indicators">
	  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	  <li data-target="#myCarousel" data-slide-to="1"></li>
	  <li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	<?php
		$sl=1;
		foreach($slide_video as $slide_video_data)
		{
			
	?>
	  <div class="item <?php if($sl==1) echo 'active'; ?>">
		<a href="<?php echo base_url();?>frontend/video/<?php echo $slide_video_data->video_id;?>">
			<img src="<?php echo base_url().$slide_video_data->video_photo; ?>" alt="Chicago" class="slide_img image">
		</a>
		<div class="middle">
					<div class="text">
					  <a href="<?php echo base_url();?>frontend/video/<?php echo $slide_video_data->video_id;?>"> 
						<img class="image" src="<?php echo base_url()?>assets/frontend/images/playBTN.png">
						</a>
					</div>
				</div>
		<div class="carousel-caption">
		  <!--<h3>Chicago</h3>
		  <p>Thank you, Chicago!</p>-->
		</div>
	  </div>

	<?php $sl++; } ?>

	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	  <span class="sr-only">Next</span>
	</a>
	</div>
</div>