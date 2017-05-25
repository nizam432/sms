<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend Frontend controller for Apparel Television
 */
class Frontend extends CI_Controller {


	public function __construct() 
	{
		parent::__construct();
		$this->load->model('model_frontend');
	}
	
	public function index()
	{
		$data=array();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'frontend/index';
		$config['total_rows'] =$this->db->count_all('video');
		$config['per_page'] = 12;
		$offset = $this->uri->segment(3);
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous ';
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		
		$data = array();
		$data['home_video']=$this->model_frontend->get_home_video_data($config['per_page'],$offset);
		$data['slide_video']=$this->model_frontend->home_slide_video();
		$data['top_video']=$this->model_frontend->top_video();
		$data['content']=$this->load->view('home/home',$data, TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);
	}
	
	public function category($category_id)
	{
		$data=array();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'frontend/category';
		$config['total_rows'] =$this->db->count_all('video');
		$config['per_page'] = 4;
		$offset = $this->uri->segment(3);
		$config['full_tag_open'] = '<ul class="pagination pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous ';
		$config['num_links'] = 10;
		$this->pagination->initialize($config);
		
		$data = array();
		$data['category_video']= $this->model_frontend->get_category_video_data($category_id);
		$data['content']=$this->load->view('category/category',$data, TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);
	}
	
	public function video($video_id)
	{
		$data = array();
		$data['individual_video']= $this->model_frontend->get_individual_video_data($video_id);
		$data['individual_category']= $this->model_frontend->get_individual_category_data($video_id);
		$data['related_video']=$this->model_frontend->get_category_video_data($data['individual_category']->category_id);
		$data['content']=$this->load->view('pages/show_video',$data, TRUE);
		$data['category']=$this->model_frontend->catgory();
		$this->load->view('index',$data);	
	}
}
