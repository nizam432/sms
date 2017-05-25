<?php $this->load->view('admin/search/subscriber_search');?>

<div class="panel panel-default table-responsive ">
	<!-- Default panel contents -->
	<div class="panel-heading"><span class="glyphicon glyphicon-list"></span> Subscriber Application List</div>

	<!-- Table -->
	<table class="table ">
		<tr>
			<th><span class="glyphicon glyphicon-align-justify"></span> SL</th>
			<th><span class="glyphicon glyphicon-calendar"></span> Subscription</th>
			<th><span class="glyphicon glyphicon-user"></span> Name</th>
			<th><span class="glyphicon glyphicon-map-marker"></span> Address</th>
			<th><span class="glyphicon glyphicon-phone"></span> Mobile</th>
			<th><span class="glyphicon glyphicon-calendar"></span> Date</th>
			<th><span class="glyphicon glyphicon-calendar"></span> Edit</th>
		</tr>
		<?php 	
			$sl=1;
			foreach($register_list as $register_list_data)
			{
				echo '<tr class="odd gradeX">
				<td>' . $sl++. '</td>';
				echo '<td>';
					if($register_list_data->subscripion_type=='1') echo 'Quaterly';
					if($register_list_data->subscripion_type=='2') echo 'Half Yearly';
					if($register_list_data->subscripion_type=='3') echo 'Yearly';
				echo '</td>';
				echo '<td><a href="'.base_url().'backend_dashboard/view_register/'.$register_list_data->id.'">' . $register_list_data->name . '</a></td>
				<td>' . $register_list_data->address . '</td>
				<td>' . $register_list_data->mobile . '</td>
				<td>' . $register_list_data->entry_daty . '</td>
				<td><a href="'.base_url().'backend_dashboard/edit_register/'.$register_list_data->id.'"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
				</tr>
				';
			}  
		?>
	</table
	
</div>
<?php echo $this->pagination->create_links(); ?>