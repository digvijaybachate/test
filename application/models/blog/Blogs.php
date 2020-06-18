<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Model { 

	public function store($id){
		$this->db->trans_begin();
		$blog['blog_title']=$this->input->post('blog_title');
		$blog['blog_slug']=$this->input->post('blog_slug');
		$blog['blog_content']=$this->input->post('blog_content');
		if($id){
			$this->db->where('blog_id', $id);
			$this->db->update('blog', $blog);
		}else{
			$this->db->insert('blog', $blog);
		}				
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
	
	public function showlist(){
		$this->db->select('blog_id,blog_title,blog_slug,blog_content,blog_created_at');
		$this->db->from('blog');
		$this->db->order_by('blog_id','desc');
		return $this->db->get()->result_array();
	}
	
	public function getBlogData($id){
		$this->db->select('blog_id,blog_title,blog_slug,blog_content,blog_created_at');
		$this->db->from('blog');
		$this->db->where('blog_id',$id); 
		return $this->db->get()->row();
	}

	public function destroy($id){
		$this->db->trans_begin();
		$this->db->where('blog_id', $id);
		$this->db->delete('blog');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
			return TRUE;
		}
	}
}