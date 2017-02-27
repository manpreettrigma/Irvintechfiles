<?php

class Certificate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/certificate/Certificate_model');
			$this->load->model('admin/Page_manage_model');
            $this->load->helper('email');
            $this->load->library('image_lib');
            $this->load->library('upload');
        }
    }

    public function index() {
        $this->load->view('admin/include/subheader');
		$data['navbaritems'] = $this->Page_manage_model->get_navbaritems();
        $this->load->view('admin/include/superadminsidebar',$data);
        $this->data['certificateList'] = $this->Certificate_model->get_certificatelist();
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/certificate/certificate', $this->data);
        $this->load->view('admin/include/footer');
    }
	
    public function add() {
        $data['users_id'] = $this->Certificate_model->user_id();
        		
		// $reqcourses  = $this->Certificate_model->get_courses();
		//get the category the vendor belongs to
		// $reqcourse = array();
		// foreach($courses as $course => $value){
			// $reqcourse[$value->id] = $value->id;
		// }   
		//data array for view 
		// $data['$reqcourse'] = $reqcourse;
		$data['courses'] = $this->Certificate_model->get_courses("1",'id,title');
		
		
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
			
        if ($this->input->post()) {
			$coursesids = $this->input->post('courses_id');
		$select_vals = array();	
    foreach($coursesids as $courseid) {
     array_push($select_vals, $courseid);
     
	}	
	//$records = $select_vals;
	$selectedcourse = json_encode($select_vals);
	
	$records = $this->input->post('certificate');
	$records['courses_id'] = $selectedcourse;
	
	 
	  // echo "<pre>"; print_r($records); 
				// die;
            if (isset($_FILES['subject_image']['name']) && $_FILES['subject_image']['name'] != '') {
                $path = FCPATH . 'uploads/subjects_image/';
                $data = upload_files('subject_image', $path, 'gif|jpg|png', 'subjects_image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {
                $records['image'] = $this->input->post('upload_image');
            }
            $records['created_at'] = date('Y-m-d H:i:s');
			
            $this->Certificate_model->add_certificate($records);
            redirect('admin/certificate');
        }
        $this->load->view('admin/certificate/add', $data);
        $this->load->view('admin/include/footer');
    }
	
	    public function edit_certificate() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $id = $this->uri->segment(4);
		$data['courses'] = $this->Certificate_model->get_courses("1",'id,title');
		$courseid	= 	$this->Certificate_model->editcertificate($id);		
        $courseids = json_decode($courseid['courses_id']);
		
		 
        $data['certificate_data'] = $this->Certificate_model->edit_certificate($id);
        if ($this->input->post()) {
			$records = $this->input->post('certificate');
			$coursesids = $this->input->post('courses_id');
			if(!empty($coursesids)){
				$select_vals = array();	
			
			foreach($coursesids as $courseid) {
			 array_push($select_vals, $courseid);
			 
			}
				
			
			$selectedcourse = json_encode($select_vals);
			
			
			
				$records['courses_id'] = $selectedcourse;
			}else{
				
				$records['courses_id'] = $courseid['courses_id'];
			}
			
		
    
            if (isset($_FILES['certificate_image']['name']) && $_FILES['certificate_image']['name'] != '') {
                $path = FCPATH . 'uploads/certificates_image/';
                $data = upload_files('certificate_image', $path, 'gif|jpg|png', 'certificate_Image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {

                $records['image'] = $this->input->post('upload_image');
            }
           //echo "<pre>"; print_r($records); exit;
            $this->Certificate_model->update_certificate($records, $id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Certificate updated successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/certificate');
        }

        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/certificate/edit_certificate', $data);
        $this->load->view('admin/include/footer');
    }
	
	public function delete($id) {
        if ($id == 0) {
            redirect('admin/certificate');
            ;
        } else {
            $this->Certificate_model->delete_subject($id);
            redirect('admin/certificate');
        }
    }

    public function block_certificate($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/certificate');
        } else {
            $this->Certificate_model->block_subject($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/certificate');
        }
    }

    public function unblock_certificate($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/certificate');
        } else {
            $this->Certificate_model->unblock_certificate($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/certificate');
        }
    }

    public function image_delete() {
        $id = $_GET['id'];
        $this->Certificate_model->update_image($id);
    }

   
}
