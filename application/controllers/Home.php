<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('admin/blog/Blog_model');
			$this->load->model('common/Common_model');
			$this->load->model('admin/course/Course_model');
			$this->load->model('admin/instructor/Instructor_model');
			$this->load->model('admin/degree/Degree_model');
			// if (isset($this->session->userdata['user_info'])) {
				// $this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
				// $this->data['get_profile'] = get_user_data($user_info['id']);
			// }
			
		}
		
		public function index() {
			$this->data['title'] = 'Pyramids Academy | Home';
			$data['instructorList'] = $this->Instructor_model->get_instructorlist();
			$data['degreeList'] = $this->Degree_model->getdegreelist();
			
			// $data['blogList'] = $this->Blog_model->get_bloglist();
			// $data['webinarList']= $this->Common_model->getwebinar();
			// $data['courseList']= $this->Course_model->get_course_listing();
			$this->load->view('public/header', $this->data);
			$this->load->view('home', $data);
			$this->load->view('public/footer');
		}
		
		public function blog_inner() {
			$category = $this->uri->segment(2);
			$this->data['title'] = 'LMS | Blog ' . $category;
			$this->load->view('public/header', $this->data);
			$data['blog_data'] = $this->Blog_model->get_inner_page($category);
			$this->load->view('pages/blog_inner', $data);
			$this->load->view('public/footer');
		}
		
		public function blog_detail_page() {
			$this->data['title'] = 'LMS | Blog ';
			$this->load->view('public/header', $this->data);
			$data['blogPage_data'] = $this->Blog_model->get_blog_data();
			$this->load->view('pages/blog_inner', $data);
			$this->load->view('public/footer');
		}
		
		public function webinarDetail(){
			$id 					=	$this->uri->segment(3);
			$data['webinar']		=	$this->Common_model->getwebinarbyid($id);
			//$data['webinar_meta']  = 	unserialize($data['webinar']['value']);			
			$data['title'] 		= 	'LMS | Webinar ';
			$this->load->view('public/header', $data);
			$this->load->view('viewWebinar', $data);
			$this->load->view('public/footer');
		}
		
		public function webinarList(){
			$data['webinars']		=	$this->Common_model->getwebinar();			
			$data['title'] 			= 	'LMS | Webinar ';
			$this->load->view('public/header', $data);
			$this->load->view('listWebinar', $data);
			$this->load->view('public/footer');
		}
		
		public function byJurisdictions(){
			$this->data['title'] = 'LMS ';
			$this->load->view('public/header', $this->data);
			$this->load->view('public/banner', $this->data);
			$this->load->view('pages/byjurisdictions',$this->data);				
			$this->load->view('public/sidebar');			
			$this->load->view('public/wraperend');
			$this->load->view('public/footer');
		}
		
		/* public function registerStudent(){
			$this->load->library('Adobe');
			$this->adobe->makeAuth('ACDeveloper', 'CLEDeveloper12'); 
			$principalid 	=	$this->adobe->createUser("sonia.gupta@trigma.com","e10adc3949ba59abbe56e057f20f883e","Sonia Gupta");
			echo $principalid;die;
		} */
	}
?>