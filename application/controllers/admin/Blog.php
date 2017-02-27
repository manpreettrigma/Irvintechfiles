<?php

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/blog/Blog_model');
            $this->load->helper('email');
			$this->load->library('image_lib');
			      $this->load->library('upload');
        }
    }

    public function index() {
		
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $data['blogList'] = $this->Blog_model->get_bloglist();
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/blog/blog', $data);
        $this->load->view('admin/include/footer');
    }

    public function add() {
        $data['users_id'] = $this->Blog_model->user_id();
        // $user_id="126";
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
      if ($this->input->post()) {
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!='')
			{
			
				$image= $this->thumbnail_image().",";	
			   $image .=$this->small_image().","; 
		     	$image .=$this->large_image(); 
			}
			else
			{
				$image = $this->input->post('upload_image');
			}
			
            $records = $this->input->post('blog');
            $records['image'] = $image;
            
            $this->Blog_model->add_blog($records);
            redirect('admin/blog');
        }
        $this->load->view('admin/blog/add', $data);
        $this->load->view('admin/include/footer');
    }

    public function edit_blog() {
        $data['users_id'] = $this->Blog_model->user_id();
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $id = $this->uri->segment(4);
        $data['blog_data'] = $this->Blog_model->edit_blog($id);
        if ($this->input->post()) {
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!='')
			{
				$image= $this->thumbnail_image().",";	
				$image .=$this->small_image().","; 
		     	$image .=$this->large_image(); 
			}
			else
			{
				$image = $this->input->post('upload_image');
			}
				$edit_records = $this->input->post('blog');
				$edit_records['image']= $image;
				$this->Blog_model->update_blog($edit_records, $id);
				$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Blog updated successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/blog');
        }

				$this->load->view('admin/include/menufooter');
				$this->load->view('admin/include/topnavigation');
				$this->load->view('admin/blog/edit_blog', $data);
				$this->load->view('admin/include/footer');
    }

    public function delete($id) {
        if ($id == 0) {
            redirect('admin/blog');
            ;
        } else {
            $this->Blog_model->delete_blog($id);
            redirect('admin/blog');
        }
    }

    public function block_blog($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/blog');
        } else {
            $this->Blog_model->block_blog($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/blog');
        }
    }

    public function unblock_blog($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/blog');
        } else {
            $this->Blog_model->unblock_blog($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/blog');
        }
    }
    function image_delete() {
        $id = $_GET['id'];
      $this->Blog_model->update_image($id);
        
    }
	
    function thumbnail_image() {
       		 $this->load->library('upload');
        $this->load->library('image_lib');

        // Set configuration array for uploaded photo.
		$imagePrefix = time();
        $imagename1 = $imagePrefix;
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
		 $config['overwrite'] = false;
        $config['file_name'] = $imagename1;


        // Set configuration array for thumbnail.
		
        $config_thumb['image_library'] = 'GD2';
        $config_thumb['create_thumb'] = TRUE;
        $config_thumb['maintain_ratio'] = TRUE;
        $config_thumb['width'] = 50;
        $config_thumb['height'] = 50;

        // Upload first photo and create a thumbnail of it.
        if (!empty($_FILES['userfile']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('userfile')) {
                $photo_info = $this->upload->data();
                $config_thumb['source_image'] = $photo_info['full_path'];
                $db_info['userfile'] = $photo_info['file_name'];
                $this->image_lib->initialize($config_thumb);
                $this->image_lib->resize();
                $db_info['thumb_one'] = $photo_info['raw_name'] . '_thumb' . $photo_info['file_ext'];
				
            } 
			return   $db_info['thumb_one'];
		}
    }
    function small_image() {
		// echo("hello");die();
        $this->load->library('upload');
        $this->load->library('image_lib');
	// Set configuration array for uploaded photo.
		$imagePrefix = time();
        $imagename2 = $imagePrefix;
        $config['upload_path'] = './uploads/blog_profile/small/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '8000';
		 $config['overwrite'] = false;
         $config['file_name'] = $imagename2;

        // Set configuration array for thumbnail.
		
        $config_thumb['image_library'] = 'GD2';
        $config_thumb['create_small'] = TRUE;
        $config_thumb['maintain_ratio'] = TRUE;
        $config_thumb['width'] = 100;
        $config_thumb['height'] =100;

        // Upload first photo and create a thumbnail of it.
        if (!empty($_FILES['userfile']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('userfile')) {
                $photo_info = $this->upload->data();
                $config_thumb['source_image'] = $photo_info['full_path'];
                $db_info['userfile'] = $photo_info['file_name'];
                $this->image_lib->initialize($config_thumb);
                $this->image_lib->resize();
                $db_info['small_one'] = $photo_info['raw_name'] . '_thumb' . $photo_info['file_ext'];
				
            }
			return   $db_info['small_one'];
		}
    }
	    function large_image() {
       		 $this->load->library('upload');
        $this->load->library('image_lib');

        // Set configuration array for uploaded photo.
		$imagePrefix = time();
        $imagePrefix1 = time();
        $imagename3 = $imagePrefix;
        $config['upload_path'] = './uploads/blog_profile/large/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '10000';
		 $config['overwrite'] = false;
         $config['file_name'] = $imagename3;

        // Set configuration array for thumbnail.
		
        $config_thumb['image_library'] = 'GD2';
        $config_thumb['create_large'] = TRUE;
        $config_thumb['maintain_ratio'] = TRUE;
        $config_thumb['width'] = 400;
        $config_thumb['height'] =400;

        // Upload first photo and create a thumbnail of it.
        if (!empty($_FILES['userfile']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('userfile')) {
                $photo_info = $this->upload->data();
                $config_thumb['source_image'] = $photo_info['full_path'];
                $db_info['userfile'] = $photo_info['file_name'];
                $this->image_lib->initialize($config_thumb);
                $this->image_lib->resize();
                $db_info['large_one'] = $photo_info['raw_name'] . '_thumb' . $photo_info['file_ext'];
				
            } 
			return   $db_info['large_one'];
		}
    }

}
