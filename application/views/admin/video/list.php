<?php 
	/*$message_success=$this->session->userdata('message');
	if(isset($message_success))
	{
		echo '<div class="alert alert-success" role="alert">'.$message_success.'</div>';
		$this->session->unset_userdata('message');
	}*/
?>

<div class="col-md-12">

	<div class="breadcrumb_container">
		<ol class="breadcrumb">
		  <li><a href="<?php echo base_url()?>backend_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		  <li class="active">Video</li>
		</ol>
	</div>
	
	<div class="submit_btn_all">
		<a href="<?php echo base_url()?>backend_video/add"> 
			<button type="button" class="btn btn-primary ">Add new</button>
		</a>
		<!--<button type="button" class="btn btn-success ">Publish</button>
		<button type="button" class="btn btn-warning ">Unpublish</button>-->
	</div>

	<div class="box box-primary" >
		<div class="box-header ">
		  <h3 class="box-title">Video List</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
		  <table id="example1"  class="table table-bordered  table-striped ">
			<thead>
			<tr>
				<th>#</th>
				<th>Picture</th>
				<th>Caption</th>
				<th>Entry By</th>
				<th>Entry Date</th>
				<th>status</th>
				<th>Edit</th>
			</tr>
			</thead>
			<?php 	
				$sl=1;
				foreach($video_list as $video_list_data)
				{
					
					
					echo '<tr>
					<td>' . $sl++. '</td>
					<td> <img class="img-circle" width="50" height="50" src="' .base_url().$video_list_data->video_photo. '"></td>
					<td>' . $video_list_data->caption. '</td>
					<td>' . $video_list_data->entry_by. '</td>
					<td>' . $video_list_data->entry_date. '</td>	
					<td>' . (($video_list_data->status==1)? 
					'<span class="label label-success">Publish</span>' :  '<span class="label label-warning">Unpublish</span>'). '</td>	
					<td><a href="'.base_url().'backend_video/edit/'.$video_list_data->video_id.'"><i class="fa fa-edit"></i> Edit</a></td>	
					</tr>';
				}  
			?> 
		  </table > 
		</div>       <!-- /.box-body -->
		<?php //echo $this->pagination->create_links(); ?>
	</div>
</div>

