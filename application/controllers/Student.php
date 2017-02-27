<?php	
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Student extends CI_Controller {		
		function __construct() {
			parent::__construct();			
			$this->load->model('common/Common_model');
			$this->load->model('provider/Provider_model');
			$this->load->library('session');
			$this->load->library('upload');
			$this->load->library('Adobe');
			//$this->adobe->makeAuth('ACDeveloper', 'CLEDeveloper12');
		}
		
		function viewWebinar() {	
			$id 						= 	$this->uri->segment(3);
			$data['title'] 				= 	'LMS | View Webinar';
			$data['breadcrumb'] 		= 	'<li><a href="' . base_url() . 'account/student/viewWebinar">Webinar</a></li>';
			$this->load->view('account/dashboard/header');
			$data['user_info'] 			= 	$user_info = $this->session->userdata['user_info'];
			$data['get_profile'] 		= 	get_user_data($user_info['id']);
			$data['webinar'] 			= 	$this->Provider_model->get_catalog_by_id($id);						
			$this->load->view('account/dashboard/student/header', $data);
			$this->load->view('account/dashboard/student/wrapper-start');
			$this->load->view('account/dashboard/student/left-sidebar');
			$this->load->view('account/student/viewWebinar',$data);			
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		public function listWebinar(){
			$data['title'] 			= 	'LMS | View Webinar';
			$data['breadcrumb'] 	= 	'<li><a href="' . base_url() . 'account/student/viewWebinar">Webinar</a></li>';
			$this->load->view('account/dashboard/header');
			$data['user_info'] 		= 	$user_info = $this->session->userdata['user_info'];
			$data['get_profile'] 	= 	get_user_data($user_info['id']);
			$data['webinars']		=	$this->Common_model->getwebinar();				
			$this->load->view('account/dashboard/student/header', $data);
			$this->load->view('account/dashboard/student/wrapper-start');
			$this->load->view('account/dashboard/student/left-sidebar');
			$this->load->view('account/student/listWebinar',$data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		public function filterList(){			
			$data['provider']			=	$this->input->post("provider");
			$data['credit']				=	$this->input->post("credit");			
			$result 					=	$this->Common_model->filterWebinars($data);
			$data['webinars']			=	$result;
			$data['title'] 				= 	'LMS | View Webinar';
			$data['breadcrumb'] 		= 	'<li><a href="' . base_url() . 'account/student/viewWebinar">Webinar</a></li>';
			$this->load->view('account/dashboard/header');
			$data['user_info'] 			= 	$user_info = $this->session->userdata['user_info'];
			$data['get_profile'] 		= 	get_user_data($user_info['id']);	
			$data['presenters']		=	$this->Common_model->getPresenters();
			$data['credits']			=	$this->Common_model->getCredit();
			$this->load->view('account/dashboard/student/header', $data);
			$this->load->view('account/dashboard/student/wrapper-start');
			$this->load->view('account/dashboard/student/left-sidebar');
			$this->load->view('account/student/filterWebinar',$data);
			$this->load->view('account/dashboard/student/right-sidebar',$data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function purchaseWebinar() {
			if ($this->input->post()) {
				if (isset($this->session->userdata['user_info'])) {
					$user_id 		= 	$this->session->userdata['user_info']['id'];
				}
				else {
					$json_arr 		= 	array('response' => 'failed', 'msg' => 'Please register or login to buy the webinar');
					echo json_encode($json_arr);
					return false;
				}
				$id 					= 	$this->input->post('id');				
				$return_url 			= 	base_url() . 'student/success';
				$cancel_url 			= 	base_url() . 'student/cancel';
				$back_url 			= 	base_url() . 'dashboard/provider_level';
				$webinar 			= 	$this->Common_model->getwebinarbyid($id);				
				if (!empty($webinar)) {
					$payment['user_id'] 			= 	$user_id;					
					$payment['item_number'] 		= 	1;
					$payment['payment_amt'] 		= 	$webinar[''];
					$payment['currency_code'] 		= 	'USD';
					$payment['status'] 			= 	'Pending';
					$payment['created_at'] 		= 	date('Y-m-d H:i:s');
					$payment_id 				= 	$this->Common_model->add('payments', $payment);
					$meta_info 					= 	$this->session->userdata['user_info'];
					$meta_info['meta_info']['payment_id'] 	= 	$payment_id;
					$meta_info['meta_info']['provider_level'] 	= 	$product->name;
					$this->session->set_userdata('user_info', $meta_info);
					$html 						= 	$this->paypal_form_attribut($return_url, $cancel_url, $back_url, $product->name, $product->price);
					$json_arr 					= 	array('response' => 'success', 'form_name' => $name, 'form_data' => $html);
					echo json_encode($json_arr);
				}
				else {
					$json_arr = array('response' => 'failed_found', 'msg' => 'Type or level not found.');
					echo json_encode($json_arr);
				}
				return false;
			}
			$this->data['title'] = 'LMS | Provider Levels';
			$this->load->view('public/header', $this->data);
			$this->load->view('pages/level');
			$this->load->view('public/footer');
		}
		
		function success() {
			if ($this->input->get()) {
				$paypalInfo = $this->input->get();
				if ($paypalInfo['st'] == 'Completed') {
					if(isset($this->session->userdata['user_info']['meta_info']['payment_id'])) {
						$payment_id = $this->session->userdata['user_info']['meta_info']['payment_id'];
						$provider_level = $this->session->userdata['user_info']['meta_info']['provider_level'];
						$user_id = $this->session->userdata['user_info']['id'];
						$payment_where = array('id' => $payment_id);
						$payment_data['txn_id'] = $paypalInfo["tx"];
						$payment_data['status'] = 'Completed';
						$user_where = array('user_id' => $user_id, 'user_key'=>'provider_level');
						$user_data['user_value'] = $provider_level;
						$this->Common_model->update_info('payments', $payment_where, $payment_data);
						$this->Common_model->update_info('user_info', $user_where, $user_data);
					}
				}
			}
			$this->data['title'] = 'LMS | Payment Success';
			$this->load->view('public/header', $this->data);
			$this->load->view('pages/success');
			$this->load->view('public/footer');
		}
		
		public function cancel() {
			$this->data['title'] = 'LMS | Provider Levels';
			$this->load->view('public/header', $this->data);
			$this->load->view('public/banner');
			$this->load->view('public/wraperstart');
			$this->load->view('paypal/cancel');
			$this->load->view('public/wraperend');
			$this->load->view('public/footer');
		}
	}
?>