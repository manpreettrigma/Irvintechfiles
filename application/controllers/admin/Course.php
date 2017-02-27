<?php
	
	class Course extends CI_Controller {
		
		public function __construct() {
			parent::__construct();
			if (!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')) {
				redirect('admin');
				} else {
				$this->load->model('admin/course/Course_model');
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
			$this->data['courseList'] = $this->Course_model->get_courselist();			
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/course/course', $this->data);
			$this->load->view('admin/include/footer');
		}
		
		public function add() {
			$data['users_id'] = $this->Course_model->user_id();			
			$data['subjects'] =	$this->Course_model->getsubjects();
			$data['instructors'] =	$this->Course_model->getinstructors();			
			$data['degrees'] =	$this->Course_model->getdegree();			
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');			
			$this->load->view('admin/course/add', $data);
			$this->load->view('admin/include/footer');
		}
		
		public function processCourse(){
			if ($this->input->post()) {
				$this->form_validation->set_rules("course[title]","Title","trim|required");
				$this->form_validation->set_rules("course[description]","Description","trim|required");
				//$this->form_validation->set_rules("course[user_id]","User","trim|required");
				$this->form_validation->set_rules("course[subject]","Subject","trim|required");
				$this->form_validation->set_rules("course[workshop_day]","Workshop Day","trim|required");
				$this->form_validation->set_rules("course[workshop_instructor]","Workshop Instructor","trim|required");
				$this->form_validation->set_rules("course[workshop_time]","Workshop Time","trim|required");
				$this->form_validation->set_rules("course[workshop_learning_objectives]","Workshop Learning Objectives","trim|required");
				$this->form_validation->set_rules("course[workshop_rtme]","Workshop Equipment","trim|required");
				$this->form_validation->set_rules("course[course_code]","Course Code","trim|required");
				$this->form_validation->set_rules("course[course_name]","Course Name","trim|required");
				$this->form_validation->set_rules("course[price]","Course Price","trim|required");
				$this->form_validation->set_rules("course[term]","Course term","trim|required");
				$this->form_validation->set_rules("course[start_date]","Course Start Date","trim|required");
				$this->form_validation->set_rules("course[end_date]","Course End Date","trim|required");
				$this->form_validation->set_rules("course[course_days]","Course Days","trim|required");
				$this->form_validation->set_rules("course[course_time]","Course time","trim|required");
				$this->form_validation->set_rules("course[learning_objectives]","Course learning objectives","trim|required");
				$this->form_validation->set_rules("course[rtme]","Course equipment","trim|required");
				$this->form_validation->set_rules("course[ame]","Course assignments","trim|required");
				$this->form_validation->set_rules("course[topics]","Course topics","trim|required");
				$this->form_validation->set_rules("course[prerequisites]","Course prerequisites","trim|required");
				$this->form_validation->set_rules("course[certificate_desc]","Certificate Description","trim|required");
				$this->form_validation->set_rules("course[certificate_rtme]","Certificate equipment","trim|required");
				if(empty($_FILES['course_image']['name'])){
					$this->form_validation->set_rules("course_image","Image","trim|required");
				}
				if($this->form_validation->run() == FALSE){
					$this->add();				
				}
				else{
					$records = $this->input->post('course');				
					if (isset($_FILES['course_image']['name']) && $_FILES['course_image']['name'] != '') {
						$path = FCPATH . 'uploads/courses_image/';
						$data = upload_files('course_image', $path, 'gif|jpg|png', 'courses'.time(), FALSE);						
						$records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
					}
					else {
						$records['image'] = $this->input->post('upload_image');
					}
					$records['created_at'] = date('Y-m-d H:i:s');
					$records['user_id'] = 126;
					$this->Course_model->add_course($records);
					redirect('admin/course');
				}
			}
		}
		
		public function edit_course($courseid = null) {
			if($courseid != null){
				$id = $courseid;
			}
			else{
				$id = $this->uri->segment(4);			
			}
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			
			$data['subjects'] =	$this->Course_model->getsubjects();
			$data['instructors'] =	$this->Course_model->getinstructors();		
			$data['degrees'] = $this->Course_model->getdegree();
			$data['course_data'] = $this->Course_model->edit_course($id);
			$data['subjectid'] 	= 	$this->Course_model->edit_subject($id);									
			$data['instructorid'] 	= 	$this->Course_model->edit_instructor($id);									
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/course/edit_course', $data);
			$this->load->view('admin/include/footer');
		}
		
		public function updateCourse(){
			
			if ($this->input->post()) {
				$this->form_validation->set_rules("course[title]","Title","trim|required");
				$this->form_validation->set_rules("course[description]","Description","trim|required");
				//$this->form_validation->set_rules("course[user_id]","User","trim|required");
				$this->form_validation->set_rules("course[subject]","Subject","trim|required");
				$this->form_validation->set_rules("course[workshop_day]","Workshop Day","trim|required");
				$this->form_validation->set_rules("course[workshop_instructor]","Workshop Instructor","trim|required");
				$this->form_validation->set_rules("course[workshop_time]","Workshop Time","trim|required");
				$this->form_validation->set_rules("course[workshop_learning_objectives]","Workshop Learning Objectives","trim|required");
				$this->form_validation->set_rules("course[workshop_rtme]","Workshop Equipment","trim|required");
				$this->form_validation->set_rules("course[course_code]","Course Code","trim|required");
				$this->form_validation->set_rules("course[course_name]","Course Name","trim|required");
				$this->form_validation->set_rules("course[price]","Course Price","trim|required");
				$this->form_validation->set_rules("course[term]","Course term","trim|required");
				$this->form_validation->set_rules("course[start_date]","Course Start Date","trim|required");
				$this->form_validation->set_rules("course[end_date]","Course End Date","trim|required");
				$this->form_validation->set_rules("course[course_days]","Course Days","trim|required");
				$this->form_validation->set_rules("course[course_time]","Course time","trim|required");
				$this->form_validation->set_rules("course[learning_objectives]","Course learning objectives","trim|required");
				$this->form_validation->set_rules("course[rtme]","Course equipment","trim|required");
				$this->form_validation->set_rules("course[ame]","Course assignments","trim|required");
				$this->form_validation->set_rules("course[topics]","Course topics","trim|required");
				$this->form_validation->set_rules("course[prerequisites]","Course prerequisites","trim|required");
				$this->form_validation->set_rules("course[certificate_desc]","Certificate Description","trim|required");
				$this->form_validation->set_rules("course[certificate_rtme]","Certificate equipment","trim|required");
				if(empty($_FILES['course_image']['name'])){
					$this->form_validation->set_rules("course_image","Image","trim|required");
				}
				if($this->form_validation->run() == FALSE){
					$this->edit_course($this->input->post("id"));				
				}
				else{
					$records = $this->input->post('course');
					if (isset($_FILES['course_image']['name']) && $_FILES['course_image']['name'] != '') {
						$path = FCPATH . 'uploads/courses_image/';
						$data = upload_files('course_image', $path, 'gif|jpg|png', 'course'.time(), FALSE);
						$records['image'] = isset($data['file_name']) ? $data['file_name'] : '';
					}
					else {				
						$records['image'] = $this->input->post('upload_image');
					}
					
					$id = $this->input->post("id");
					// echo "<pre>";
	          		// print_r($records); die;
					$this->Course_model->update_course($records, $id);
					$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Updated!</strong> Course updated successfully.</div>';
					$this->session->set_flashdata('flash_data', $flash_message);
					redirect('admin/course');
				}
			}
		}
		
		public function delete($id) {
			if ($id == 0) {
				redirect('admin/course');
				;
				} else {
				$this->Course_model->delete_course($id);
				redirect('admin/course');
			}
			}
		
		public function block_course($id = 0) {
			
			if ($id == 0 || $id == null) {
				redirect('admin/course');
				} else {
				$this->Course_model->block_course($id);
				$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/course');
			}
		}
		
		public function unblock_course($id = 0) {
			
			if ($id == 0 || $id == null) {
				redirect('admin/course');
				} else {
				$this->Course_model->unblock_course($id);
				$flash_message = '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/course');
			}
		}
		
		public function image_delete() {
			$id = $_GET['id'];
			$this->Course_model->update_image($id);
		}
		
	}
