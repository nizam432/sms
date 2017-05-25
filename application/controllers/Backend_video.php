<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend video controller for Apparel Television
 */
class Backend_video extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$check_admin_id = $this->session->userdata('admin_id');
		if ($check_admin_id == NULL) {
		  redirect('backend_login/check_login', "refresh");
		}
		if($this->session->userdata('admin_user_type')!='1')
		{
			exit;
		}
	   $this->load->model('model_backend_video');
	   date_default_timezone_set('Asia/Dhaka');
	    $this->load->helper(array('form', 'url')); 
	}
	
	/**
	 * Show list
	 *
	 * @return void
	 */	
	public function index()
	{
		
		$data = array();
		$data['video_list'] =$this->model_backend_video->get_video_list_data();
		$data['content'] = $this->load->view('admin/video/list',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Add Form
	 *
	 * @return void
	 */	
	public function add()
	{
		$data = array();
		$data['category_data']= $this->model_backend_video->get_category_data();
		$data['content']=$this->load->view('admin/video/add',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Edit Form
	 *
	 * @return void
	 */		
	public function edit($id)
	{
		$data = array();
		$data['video_edit']= $this->model_backend_video->get_video_row($id);
		$data['category_data']= $this->model_backend_video->get_category_data();
		$data['category_assing_data']= $this->model_backend_video->get_category_asssing_data($data['video_edit']->video_id);
		$data['content']=$this->load->view('admin/video/edit',$data, TRUE);
		$this->load->view('admin/index', $data);
	}
	
	/**
	 * Update video
	 *
	 *@param int $id
	 * @return void
	 */	
	public function update($id)
	{
		$data=array();
	    //call photo upload function
		$result=$this->do_upload('video_photo');
		if(!empty($result[0]))
		{
			$data['video_photo'] = "/uplaod_file/video_photo/$result[0]" ;	
		}
		
		$data['caption']=$this->input->post('caption', TRUE);
		$data['video_link']=$this->input->post('video_link', TRUE);
		$data['top_videos']=$this->input->post('top_videos', TRUE);
		$data['slide']=$this->input->post('slide', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['update_by']=$this->session->userdata('admin_id');
		$data['update_date']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		// update video data 
		$this->model_backend_video->update_video_data($data,$id);
		
		//delete assing category data
		$this->model_backend_video->delete_assing_category($id);
		
		//insert assing category data
		$category=$this->input->post('category_id', TRUE);
		foreach($category as $category_id)
		{
			$data2=array();
			$data2['video_id']=$id;
			$data2['category_id']=$category_id;
			$this->model_backend_video->save_video_category_assing_data($data2);
		}
		
		$sdata=array();
		$sdata['message']="update insert successfully";
		$this->session->set_userdata($sdata);
		redirect('backend_video');
	}
	
	public function save()
	{
		$data=array();	
	    //call photo upload function
		$result=$this->do_upload('video_photo');
		if(!empty($result[0]))
		{
			$data['video_photo'] = "/uplaod_file/video_photo/$result[0]" ;	
		}

		$data['caption']=$this->input->post('caption', TRUE);
		$data['video_link']=$this->input->post('video_link', TRUE);
		$data['top_videos']=$this->input->post('top_videos', TRUE);
		$data['slide']=$this->input->post('slide', TRUE);
		$data['description']=$this->input->post('description', TRUE);
		$data['entry_by']=$this->session->userdata('admin_id');
		$data['entry_date']=date('Y-m-d H:i:s');
		$data['status']=$this->input->post('status', TRUE);
		$insert_id=$this->model_backend_video->save_video_data($data);
		
		if($insert_id)
		{
			//insert assing category data
			$category=$this->input->post('category_id', TRUE);
			foreach($category as $category_id)
			{
				$data2=array();
				$data2['video_id']=$insert_id;
				$data2['category_id']=$category_id;
				$this->model_backend_video->save_video_category_assing_data($data2);
			}
		}
		
		$result=array();
		$result['message']="Data insert successfully";
		$this->session->set_userdata($result);
		redirect('backend_video');
	}
	
	public function do_upload($video_photo)
	{
	    // photo upload
		$config = array();
		$config['upload_path'] = './uplaod_file/video_photo/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['max_size'] = '5000';	
		
		$this->load->library('upload', $config,'video_photo');
		$this->video_photo->initialize($config);
		$video_photo = $this->video_photo->do_upload('video_photo');
	
	    // Check uploads success
		if ($video_photo) 
		{
			$file_name=array();
		   if($video_photo)
		  { // Both Upload Success
			
		  // Data of your cover file
		  $video_photo = $this->video_photo->data();
		  $file_name[0]=$video_photo['file_name']; 
		  }
		  
		  return $file_name;
		} 
		else {
		 echo 'Cover upload Error : ' . $this->video_photo->display_errors() . '<br/>';
		
		}
	}
}