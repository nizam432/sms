<div class="col-md-12">
	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>/backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li><a href="<?php echo base_url(); ?>backend_video">Video</a></li>
		  <li class="active">Add</li>
		</ol>
	</div>
</div>

<div class="col-md-6 col-md-offset-3">
  <!-- general form elements -->
  <div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Add New Video</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form action="<?php echo base_url(); ?>backend_video/save" method="post" enctype="multipart/form-data">
	  <div class="box-body">
		<div class="form-group ">
		  <label >Caption</label>
		  <input type="text" name="caption" class="form-control">
		</div>		
		<div class="form-group">
			<label>Categroy</label>
			<select name="category_id[]" class="form-control select2" multiple="multiple" data-placeholder="Select Categroy" style="width: 100%;">
			  <?php
					foreach($category_data as $category_data_item)
					{
						echo '<option  value="'.$category_data_item->category_id.'">'.$category_data_item->category_name.'</option>';
					}
			  ?>

			</select>
         </div>

		<div class="form-group ">
		  <label >Video Link</label>
		  <input type="text" name="video_link" class="form-control">
		</div>		
		<div class="form-group ">
		  <label>Top Videos</label> &nbsp; &nbsp; 
		  <input type="radio" name="top_videos" class="flat-red" value="1"> Yes  &nbsp;&nbsp;
		  <input type="radio" name="top_videos" checked="checked" class="flat-red " value="0"> No 
		</div>
		<div class="form-group ">
		  <label>Slide Videos</label> &nbsp; &nbsp; 
		  <input type="radio" name="slide" class="flat-red" value="1"> Yes  &nbsp;&nbsp;
		  <input type="radio" name="slide" checked="checked" class="flat-red " value="0"> No 
		</div>		
		<div class="form-group ">
		  <label >Description</label>
		  <textarea id="editor1" name="description" class="form-control"></textarea>
		</div>
		<div class="form-group ">
		  <label>Picture</label>
		  <input type="file" name="video_photo" class="form-control">
		</div>
		<div class="form-group">
		  <label>Status</label>
		  <select name="status" class="form-control">
			<option value="1">Publish</option>
			<option value="2">Unpublish</option>
		  </select>
		</div>

	  <!-- /.box-body -->
	  <div class="box-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
  </div>
  <!-- /.box -->
</div>
