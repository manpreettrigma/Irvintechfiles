<?php	
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class CreditCategory extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('admin/Category_model');
			$this->load->model('common/Common_model');					
		}
		
		public function index() {
			$this->data['title'] 			= 	'LMS | Credit Category';
			$this->data['breadcrumb'] 	= 	'<li><a href="' . base_url() . 'admin/creditcategory">Credit Category</a></li>';
			$this->data['get_category']	=	$this->Category_model->getCategories();
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/credit_category/category',$this->data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function add_category() {			
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');			
			$this->load->view('admin/credit_category/add_category');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function processCategory(){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				if ($this->form_validation->run() == FALSE) {					
					$this->add_category();
				}
				else{
					$id 	=	$this->Category_model->addCategory($_POST);
					if($id){
						redirect("admin/creditcategory");
					}
				}
			}
		}
		
		public function edit_category() {
			$id 					=	$this->uri->segment(4);
			$data['categories'] 	=	$this->Category_model->getCategoryById($id);
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');			
			$this->load->view('admin/credit_category/edit_category',$data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function updateCategory(){
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				if ($this->form_validation->run() == FALSE) {					
					$this->edit_category();
				}
				else{
					$id 	=	$this->input->post("id");
					unset($_POST['id']);
					$this->Category_model->updateCategory($id,$_POST);					
					redirect("admin/creditcategory");					
				}
			}
		}
		
		public function deleteCategory($id){
			$this->Category_model->deleteCat($id);
			redirect("admin/creditcategory");
		}
	}
?>