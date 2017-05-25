<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Backend logout controller for Apparel Television
 */
class Backend_logout extends CI_Controller{

    public function logout() 
	{
        $this->session->unset_userdata('admin_id');
        $sdata = array();
        $sdata['logout'] = "Successfully Logout";
        $this->session->set_userdata($sdata);
        redirect('backend_login');
    }
}
















