<?php

class Workshop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/workshop/Workshop_model');
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
        $this->data['workshopList'] = $this->Workshop_model->get_workshoplist();
       // $this->data['subject'] = $this->Course_model->get_subject();
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/workshop/workshop', $this->data);
        $this->load->view('admin/include/footer');
    }

    public function add() {
        $data['users_id'] = $this->Workshop_model->user_id();
        $data['instructors'] =	$this->Workshop_model->getinstructors();	
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        if ($this->input->post()) {
            $records = $this->input->post('workshop');
			
            if (isset($_FILES['workshop_image']['name']) && $_FILES['workshop_image']['name'] != '') {
                $path = FCPATH . 'uploads/workshops_image/';
                $data = upload_files('workshop_image', $path, 'gif|jpg|png', 'workshops_image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {
                $records['image'] = $this->input->post('upload_image');
            }
            $records['created_at'] = date('Y-m-d H:i:s');
            $this->Workshop_model->add_workshop($records);
            redirect('admin/workshop');
        }
        $this->load->view('admin/workshop/add', $data);
        $this->load->view('admin/include/footer');
    }

    public function edit_workshop() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $id = $this->uri->segment(4);
        
		//$data['subjects'] =	$this->Workshop_model->getsubjects();
        //$data['degrees'] = $this->Workshop_model->getdegree();
        $data['workshop_data'] = $this->Workshop_model->edit_workshop($id);
		$data['subjectid'] 	= 	$this->Workshop_model->edit_subject($id);	
		$data['instructors'] =	$this->Workshop_model->getinstructors();		
		$data['instructorid'] 	= 	$this->Workshop_model->edit_instructor($id);		
	    if ($this->input->post()) {
            $records = $this->input->post('workshop');
			
            if (isset($_FILES['workshop_image']['name']) && $_FILES['workshop_image']['name'] != '') {
                $path = FCPATH . 'uploads/workshops_image/';
                $data = upload_files('workshop_image', $path, 'gif|jpg|png', 'workshop_Image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {

                $records['image'] = $this->input->post('upload_image');
            }

            $this->Workshop_model->update_workshop($records, $id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Workshop updated successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/workshop');
        }

        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/workshop/edit_workshop', $data);
        $this->load->view('admin/include/footer');
    }

    public function delete($id) {
        if ($id == 0) {
            redirect('admin/workshop');
            ;
        } else {
            $this->Workshop_model->delete_workshop($id);
            redirect('admin/workshop');
        }
    }

    public function block_workshop($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/workshop');
        } else {
            $this->Workshop_model->block_workshop($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/workshop');
        }
    }

    public function unblock_workshop($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/workshop');
        } else {
            $this->Workshop_model->unblock_workshop($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/workshop');
        }
    }

    public function image_delete() {
        $id = $_GET['id'];
        $this->Workshop_model->update_image($id);
    }

}
