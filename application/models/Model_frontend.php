<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_frontend extends  CI_Model
{
	public function catgory()
	{
		$this->db->select('*');
		$this->db->from('category');
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}
	
	public function get_home_video_data($per_page,$offset)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by("video_id", "DESC");
		$query=$this->db->get('',$per_page,$offset);
		$result=$query->result();
		return $result;
	}
	
	public function get_category_video_data($category_id)
	{
		$this->db->select('video.video_id as video_id,video.caption as caption,video.video_photo as video_photo');
		$this->db->from('category_assing');
		$this->db->join('video', 'video.video_id=category_assing.video_id');
		$this->db->where('category_assing.category_id',$category_id);
		$this->db->order_by("video.video_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	public function top_video()
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where('top_videos','1');
		$this->db->order_by("video_id", "DESC");
		$this->db->limit(3);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}
	
	public function home_slide_video()
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where('slide','1');
		$this->db->order_by("video_id", "DESC");
		$this->db->limit(3);
		$query=$this->db->get('');
		$result=$query->result();
		return $result;	
	}	
	
	public function get_individual_video_data($video_id)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->order_by("video_id", "DESC");
		$this->db->where('video_id',$video_id);
		$query=$this->db->get('');
		$result=$query->row();
		return $result;	
	}
	public function  get_individual_category_data($video_id)
	{
		$this->db->select('category_id');
		$this->db->from('category_assing');
		$this->db->where('video_id',$video_id);
		$query=$this->db->get('');
		$result=$query->row();
		return $result;
	}

}