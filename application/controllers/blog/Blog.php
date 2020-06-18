<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
                $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
				$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
				$this->output->set_header('Pragma: no-cache');
				$this->load->model('blog/blogs');
        }
		
        public function index()
        {                 
				$this->load->view('blog/add');				 
        }
		
		public function edit($id)
        {                 
				$page_data['ObjBlog'] = $this->blogs->getBlogData($id);
				$this->load->view('blog/edit',$page_data);				 
        }
		
		public function store($id){
			
			$this->form_validation->set_rules('blog_title','Blog Title','required');
			$this->form_validation->set_rules('blog_slug','Blog Slug','required');
			$this->form_validation->set_rules('blog_content','Blog Content','required');
			if($this->form_validation->run()==FALSE){
				$this->load->view('blog/add');
			}else{
				if($id){
					$result = $this->blogs->store($id);
					if($result){
						$this->session->set_flashdata('success','Blog updated Successfully');
						redirect('blog/list');
					}	
				}else{
					$result = $this->blogs->store();
					if($result){
						$this->session->set_flashdata('success','Blog created Successfully');
						redirect('blog/list');
					}	
				}				
			}
			
		}

		public function showlist(){
			$page_data['ArrBlogs'] = $this->blogs->showlist();
			$this->load->view('blog/list',$page_data);
		}
		
		public function destroy($id){
			if (isset($id) && !empty($id)) {
				$result = $this->blogs->destroy($id);				
				if ($result) {
					$this->session->set_flashdata('success', 'Blog Deleted Successfully.');
					redirect('blog/list');
				}
			}
		}
}