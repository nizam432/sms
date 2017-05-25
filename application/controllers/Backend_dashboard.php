<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Backend Dashboard controller for Apparel Television
 */
class Backend_dashboard extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$check_admin_id = $this->session->userdata('admin_id');
		if ($check_admin_id == NULL) {
		  redirect('backend_login/check_login', "refresh");
		}
		$this->load->model('model_dashboard');
		$this->load->library('session');
    }
	/**
	  
	  * show on dashboard totat category,video,user
	 */
	public function index()
	{
		$data = array();
		//get total category
		$data['total_category']=$this->model_dashboard->get_total_category();
		//get total video
		$data['total_video']=$this->model_dashboard->get_total_video();
		//get total user
		$data['total_user']=$this->model_dashboard->get_total_user();
		$data['content'] = $this->load->view('admin/dashboard/dashboard',$data, TRUE);
		$this->load->view('admin/index',$data);
	}
}
