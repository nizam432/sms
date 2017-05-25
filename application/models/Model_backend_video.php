<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Model_backend_video extends  CI_Model
{
	public function get_video_list_data()
	{
		
		
		$this->db->select('video.video_id as video_id,video.caption as caption,video.status as status,video.entry_date as entry_date,video.video_photo as video_photo,users.name as entry_by');
		$this->db->from('video');
		$this->db->join('users', 'users.id = video.entry_by');
		$this->db->order_by("video.video_id", "DESC");
		$query=$this->db->get('');
		$result=$query->result();
		return $result;
	}	
	
	public function save_video_data($data)
	{
		$this->db->insert('video',$data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	

	public function get_video_row($id)
	{
		$this->db->select('*');
		$this->db->from('video');
		$this->db->where('video_id',$id);
		$query=$this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function update_video_data($data, $id)
	{
		$this->db->where('video_id', $id);
		$result=$this->db->update('video', $data);
		return $result;		
	}
	
	public function get_category_data()
	{
		$this->db->select('category_id,category_name');
		$this->db->from('category');
		$this->db->order_by("category_id", "DESC");
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}
	
	public function save_video_category_assing_data($data)
	{
		$this->db->insert('category_assing',$data);
	}
	
	public function get_category_asssing_data($id)
	{
		$this->db->select('*');
		$this->db->from('category_assing');
		$this->db->where('video_id',$id);
		$query=$this->db->get();
		$result=$query->result();
		return $result;
	}
	
	public function delete_assing_category($id)
	{
		$this->db->where('video_id',$id);
        $this->db->delete('category_assing');
	}
	
}