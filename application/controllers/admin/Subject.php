<?php

class Subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/subject/Subject_model');
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
        $this->data['subjectList'] = $this->Subject_model->get_subjectlist();
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/subject/subject', $this->data);
        $this->load->view('admin/include/footer');
    }
	
    public function add() {
        $data['users_id'] = $this->Subject_model->user_id();
        // $user_id="126";
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        if ($this->input->post()) {
            $records = $this->input->post('subject');
            if (isset($_FILES['subject_image']['name']) && $_FILES['subject_image']['name'] != '') {
                $path = FCPATH . 'uploads/subjects_image/';
                $data = upload_files('subject_image', $path, 'gif|jpg|png', 'subjects_image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {
                $records['image'] = $this->input->post('upload_image');
            }
            $records['created_at'] = date('Y-m-d H:i:s');
            $this->Subject_model->add_subject($records);
            redirect('admin/subject');
        }
        $this->load->view('admin/subject/add', $data);
        $this->load->view('admin/include/footer');
    }
	
	    public function edit_subject() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $id = $this->uri->segment(4);
        $data['subject_data'] = $this->Subject_model->edit_subject($id);
        if ($this->input->post()) {
            $records = $this->input->post('subject');
            if (isset($_FILES['subject_image']['name']) && $_FILES['subject_image']['name'] != '') {
                $path = FCPATH . 'uploads/subjects_image/';
                $data = upload_files('subject_image', $path, 'gif|jpg|png', 'subject_Image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {

                $records['image'] = $this->input->post('upload_image');
            }

            $this->Subject_model->update_subject($records, $id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Subject updated successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/subject');
        }

        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/subject/edit_subject', $data);
        $this->load->view('admin/include/footer');
    }
	
	public function delete($id) {
        if ($id == 0) {
            redirect('admin/subject');
            ;
        } else {
            $this->Subject_model->delete_subject($id);
            redirect('admin/subject');
        }
    }

    public function block_subject($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/subject');
        } else {
            $this->Subject_model->block_subject($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/subject');
        }
    }

    public function unblock_subject($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/subject');
        } else {
            $this->Subject_model->unblock_subject($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/subject');
        }
    }

    public function image_delete() {
        $id = $_GET['id'];
        $this->Subject_model->update_image($id);
    }

   
}
