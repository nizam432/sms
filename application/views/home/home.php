<div class="video_header"> 
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-8">
					<?php $this->load->view('pages/home_slider.php'); ?>
				</div>

				<div class="col-sm-4">
					<div class="title_top_videos">
						<h3>Top Videos</h3>
					</div> 
					<?php
						foreach($top_video as $top_video_data)
						{
					?><div class="col-sm-12">
							<div class="top_videos row hidden-xs">
							
								<div class="col-sm-6 ">
									<a href="<?php echo base_url();?>frontend/video/<?php echo $top_video_data->video_id;?>">
										<img  src="<?php echo base_url().$top_video_data->video_photo; ?>"  class="image" width="100%" alt="..."  >
									</a>
										<div class="middle">
											<div class="text">
											  <a href="<?php echo base_url();?>frontend/video/<?php echo $top_video_data->video_id;?>"> 
												<img class="image" src="<?php echo base_url()?>assets/frontend/images/playBTN.png" style="width:60px;margin-top:20px;">
												</a>
											</div>
										</div>
								</div>
								<div class="col-sm-6">
									<a href="<?php echo base_url();?>frontend/video/<?php echo $top_video_data->video_id;?>">
										<p><?php echo $top_video_data->caption; ?></p>
									</a>
								</div>
							</div>
							
							<div class="top_videos row visible-xs">

									<a href="<?php echo base_url();?>frontend/video/<?php echo $top_video_data->video_id;?>">
										<img  src="<?php echo base_url().$top_video_data->video_photo; ?>"  width="100%" alt="..."  >
									</a>
									

									<a href="<?php echo base_url();?>frontend/video/<?php echo $top_video_data->video_id;?>">
										<p style="margin-left:10px"><?php echo $top_video_data->caption; ?></p>
									</a>

							</div>
						</div> 
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="home_video">
	<div class="home_video_title">
		<h3>Home Videos</h3>
	</div>

	<div class="row">
		<?php
			$sl=1;
			foreach($home_video as $home_video_data)
			{
				
				
				if($sl==4)
				{
					$individual_class='individual_video2';
					$sl=0;
				}
				else
				{
					$individual_class='individual_video';
				}
				$sl++;
		?>

			
		  <div class="col-sm-4 col-md-3 ">
			<div class="<?php echo $individual_class; ?>">
				<a href="<?php echo base_url();?>frontend/video/<?php echo $home_video_data->video_id;?>">
					<img class="test img-responsive " src="<?php echo base_url().$home_video_data->video_photo; ?>" width="100%" alt="..."   >
				</a>
				
				<div class="middle">
					<div class="text">
					  <a href="<?php echo base_url();?>frontend/video/<?php echo $home_video_data->video_id;?>"> 
						<img class="image" src="<?php echo base_url()?>assets/frontend/images/playBTN.png"  >
						</a>
					</div>
				</div>
				
			  <div class="caption">
				<h1>
					<a href="<?php echo base_url();?>frontend/video/<?php echo $home_video_data->video_id;?>"> <?php echo $home_video_data->caption; ?> </a>
				</h1>
			  </div>
			</div>
		 </div>

		<?php
		}
		?>
		<div class="col-xs-12">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>

