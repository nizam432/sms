<div class="video_header"> 
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-8">
					<div class="home_slider">
						<div class="embed-responsive embed-responsive-16by9">
						  <iframe class="embed-responsive-item" src="<?php echo $individual_video->video_link;?>"></iframe>
						</div>
					</div>
					
				</div>

				<div class="col-sm-4">
					<div class="title_top_videos">
						<h3 style="width:135px;">Related Videos</h3>
					</div>
					<?php
						foreach($related_video as $related_video_data)
						{
					?><div class="col-sm-12">
						<div class="row top_videos">
							<div class="col-md-6">
								<a href="<?php echo base_url();?>frontend/video/<?php echo $related_video_data->video_id;?>">
									<img class="test " src="<?php echo base_url().$related_video_data->video_photo; ?>" height="80" style="margin-bottom:20px;" width="100%" alt="..."  >
								</a>
								<div class="middle">
									<div class="text">
									  <a href="<?php echo base_url();?>frontend/video/<?php echo $related_video_data->video_id;?>"> 
										<img class="image" src="<?php echo base_url()?>assets/frontend/images/playBTN.png" style="width:60px;margin-top:20px;" >
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-6">
							<a href="<?php echo base_url();?>frontend/video/<?php echo $related_video_data->video_id;?>">
								<?php echo $related_video_data->caption; ?>
							</a>
							</div></div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>