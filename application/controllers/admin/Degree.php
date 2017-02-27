<?php

class Degree extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
            redirect('admin');
        } else {
            $this->load->model('admin/degree/Degree_model');
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
        $this->data['degreeList'] = $this->Degree_model->get_degreelist();
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/degree/degree', $this->data);
        $this->load->view('admin/include/footer');
    }

    public function add() {
        $data['users_id'] = $this->Degree_model->user_id();
        // $user_id="126";
        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        if ($this->input->post()) {
            $records = $this->input->post('degree');
            if (isset($_FILES['degree_image']['name']) && $_FILES['degree_image']['name'] != '') {
                $path = FCPATH . 'uploads/degrees_image/';
                $data = upload_files('degree_image', $path, 'gif|jpg|png', 'degrees_image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {
                $records['image'] = $this->input->post('upload_image');
            }
            $records['created_at'] = date('Y-m-d H:i:s');
            $this->Degree_model->add_degree($records);
            redirect('admin/degree');
        }
        $this->load->view('admin/degree/add', $data);
        $this->load->view('admin/include/footer');
    }

    public function edit_degree() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $id = $this->uri->segment(4);
        $data['degree_data'] = $this->Degree_model->edit_degree($id);
        if ($this->input->post()) {
            $records = $this->input->post('degree');
		//	print_r($_FILES['degree_image']['name']); die;
            if (isset($_FILES['degree_image']['name']) && $_FILES['degree_image']['name'] != '') {
                $path = FCPATH . 'uploads/degrees_image/';
                $data = upload_files('degree_image', $path, 'gif|jpg|png', 'degree_Image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {

                $records['image'] = $this->input->post('upload_image');
            }

            $this->Degree_model->update_degree($records, $id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Degree updated successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/degree');
        }

        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/degree/edit_degree', $data);
        $this->load->view('admin/include/footer');
    }

    public function delete($id) {
        if ($id == 0) {
            redirect('admin/degree');
            ;
        } else {
            $this->Degree_model->delete_degree($id);
            redirect('admin/degree');
        }
    }

    public function block_degree($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/degree');
        } else {
            $this->Degree_model->block_degree($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/degree');
        }
    }

    public function unblock_degree($id = 0) {

        if ($id == 0 || $id == null) {
            redirect('admin/degree');
        } else {
            $this->Degree_model->unblock_degree($id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/degree');
        }
    }

    public function image_delete() {
        $id = $_GET['id'];
        $this->Degree_model->update_image($id);
    }

}
