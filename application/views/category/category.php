<div class="home_video">

	<div class="row">
	<?php
		foreach($category_video as $category_video_data)
		{
	?>

		
	   <div class="col-sm-4 col-md-3 ">
			<div class="<?php echo 'individual_video'?>">
			<a href="<?php echo base_url();?>frontend/video/<?php echo $category_video_data->video_id;?>">
				<img class="test img-responsive" src="<?php echo base_url().$category_video_data->video_photo; ?>" width="100%" alt="..."  >
			</a>
				<div class="middle">
					<div class="text">
					  <a href="<?php echo base_url();?>frontend/video/<?php echo $category_video_data->video_id;?>"> 
						<img class="image" src="<?php echo base_url()?>assets/frontend/images/playBTN.png">
						</a>
					</div>
				</div>
		  <div class="caption">
			<h1>
				<a href="<?php echo base_url();?>frontend/video/<?php echo $category_video_data->video_id;?>"> <?php echo $category_video_data->caption; ?> </a>
			</h1>
		  </div>
		</div>
		
	  </div>
	

	<?php
	}
	?>
	 </div>
	<?php //echo $this->pagination->create_links(); ?>
</div>
