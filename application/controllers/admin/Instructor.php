<?php
	
	class Instructor extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
				redirect('admin');
				} else {
				$this->load->model('admin/instructor/Instructor_model');
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
			$this->data['instructorList'] = $this->Instructor_model->get_instructorlist();			
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/instructor/instructor', $this->data);
			$this->load->view('admin/include/footer');
		}
		
		public function add() {
			$data['users_id'] = $this->Instructor_model->user_id();			
					
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');	
           if ($this->input->post()) {
            $records = $this->input->post('instructor');
            if (isset($_FILES['instructor_image']['name']) && $_FILES['instructor_image']['name'] != '') {
                $path = FCPATH . 'uploads/instructors_image/';
                $data = upload_files('instructor_image', $path, 'gif|jpg|png', 'instructors_image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {
                $records['image'] = $this->input->post('upload_image');
            }
            $records['created_at'] = date('Y-m-d H:i:s');
            $this->Instructor_model->add_instructor($records);
            redirect('admin/instructor');
        }			
			$this->load->view('admin/instructor/add', $data);
			$this->load->view('admin/include/footer');
		}
		
		
		/*public function processInstructor(){
			if ($this->input->post()) {
				die;
				//$this->form_validation->set_rules("instructor[title]","Title","trim|required");
				$this->form_validation->set_rules("instructor[description]","Description","trim|required");
				$this->form_validation->set_rules("instructor[user_id]","User","trim|required");
				
				if(empty($_FILES['instructor_image']['name'])){
					$this->form_validation->set_rules("instructor_image","Image","trim|required");
				}
				if($this->form_validation->run() == FALSE){
					$this->add();				
				}
				else{
					$records = $this->input->post('instructor');				
					if (isset($_FILES['instructor_image']['name']) && $_FILES['instructor_image']['name'] != '') {
						$path = FCPATH . 'uploads/instructors_image/';
						$data = upload_files('instructor_image', $path, 'gif|jpg|png', 'instructors'.time(), FALSE);						
						$records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
					}
					else {
						$records['image'] = $this->input->post('upload_image');
					}
					$records['created_at'] = date('Y-m-d H:i:s');
					$this->Instructor_model->add_instructor($records);
					redirect('admin/instructor');
				}
			}
		}*/
		
		
	public function edit_instructor() {

        $this->load->view('admin/include/subheader');
        $this->load->view('admin/include/superadminsidebar');
        $id = $this->uri->segment(4);
        $data['instructor_data'] = $this->Instructor_model->edit_instructor($id);
        if ($this->input->post()) {
            $records = $this->input->post('instructor');
            if (isset($_FILES['instructor_image']['name']) && $_FILES['instructor_image']['name'] != '') {
                $path = FCPATH . 'uploads/instructors_image/';
                $data = upload_files('instructor_image', $path, 'gif|jpg|png', 'instructor_Image', FALSE);
                $records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
            } else {

                $records['image'] = $this->input->post('upload_image');
            }

            $this->Instructor_model->update_instructor($records, $id);
            $flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Instructor updated successfully.</div>';
            $this->session->set_flashdata('flash_data', $flash_message);
            redirect('admin/instructor');
        }

        $this->load->view('admin/include/menufooter');
        $this->load->view('admin/include/topnavigation');
        $this->load->view('admin/instructor/edit_instructor', $data);
        $this->load->view('admin/include/footer');
    }
		/*public function updateInstructor(){
			if ($this->input->post()) {
			//	$this->form_validation->set_rules("instructor[title]","Title","trim|required");
				$this->form_validation->set_rules("instructor[description]","Description","trim|required");
				$this->form_validation->set_rules("instructor[user_id]","User","trim|required");
				
				if(empty($_FILES['instructor_image']['name'])){
					$this->form_validation->set_rules("instructor_image","Image","trim|required");
				}
				if($this->form_validation->run() == FALSE){
					$this->edit_instructor($this->input->post("id"));				
				}
				else{
					$records = $this->input->post('instructor');
					if (isset($_FILES['instructor_image']['name']) && $_FILES['instructor_image']['name'] != '') {
						$path = FCPATH . 'uploads/instructors_image/';
						$data = upload_files('instructor_image', $path, 'gif|jpg|png', 'instructor'.time(), FALSE);
						$records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
					}
					else {				
						$records['image'] = $this->input->post('upload_image');
					}
					
					$this->Instructor_model->update_instructor($records, $id);
					$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> instructor updated successfully.</div>';
					$this->session->set_flashdata('flash_data', $flash_message);
					redirect('admin/instructor');
				}
			}
		}*/
		
		public function delete($id) {
			if ($id == 0) {
				redirect('admin/instructor');
				;
				} else {
				$this->Instructor_model->delete_instructor($id);
				redirect('admin/instructor');
			}
			}
		
		public function block_instructor($id = 0) {
			
			if ($id == 0 || $id == null) {
				redirect('admin/instructor');
				} else {
				$this->Instructor_model->block_instructor($id);
				$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/instructor');
			}
		}
		
		public function unblock_instructor($id = 0) {
			
			if ($id == 0 || $id == null) {
				redirect('admin/instructor');
				} else {
				$this->Instructor_model->unblock_instructor($id);
				$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/instructor');
			}
		}
		
		public function image_delete() {
			$id = $_GET['id'];
			$this->Instructor_model->update_image($id);
		}
		
	}
