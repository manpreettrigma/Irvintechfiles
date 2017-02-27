<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Page extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('page/Page_model');
			$this->load->model('common/Common_model');
			$this->load->model('account/Account_manage_model');
			$this->load->model('admin/workshop/Workshop_model');
	    	$this->load->model('admin/course/Course_model');
	    	$this->load->model('admin/certificate/Certificate_model');
			$this->load->helper('form');
			$this->load->helper(array('form', 'url'));
			// if (isset($this->session->userdata['user_info'])) {
				// $this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
				// $this->data['get_profile'] = get_user_data($user_info['id']);
			// }
		}
		
		public function index() {
			// $page_slug = $this->uri->segment(2);
			// $getContent = $this->Page_model->get_pages($page_slug);
			// if (!empty($getContent)) {
				// $title = '| ' . $getContent->title;
				// $content_title = $getContent->title;
				// $headline = $getContent->headline;
				// $image = $getContent->image;
				// $content = $getContent->description;
				// $banner_images = $getContent->banner_image;
				// } else {
				// $title = '';
				// $content = '<section class="width-70 about-text"><p>Please add the content from admin</p></section>';
			// }
			// $this->data['title'] = 'LMS ' . $title;
			// $this->data['content_title'] = $content_title;
			// $this->data['headline'] = $headline;
			// $this->data['image'] = $image;
			// $this->data['content'] = $content;
			// $this->data['banner_images'] = $banner_images;
			// $this->load->view('public/header', $this->data);
			// $this->load->view('public/banner', $this->data);
			// $this->load->view('public/wraperstart');
			// $this->load->view('pages/page', $this->data);
			// if ($getContent->sidebar == 1):
			// $this->load->view('public/sidebar');
			// endif;
			// $this->load->view('public/wraperend');
			// $this->load->view('public/footer');
		}
		
					
		protected function paypal_form_attribut($return_url, $cancel_url, $back_url, $item_name,$item_number,$ammount) {
			$html = '<input type="hidden" name="rm" value="2" />';
			$html .= '<input type="hidden" name="business" value="bindu.kamboj@trigma.co.in" />';
			$html .= '<input type="hidden" name="cmd" value="_xclick" />';
			$html .= '<input type="hidden" name="currency_code" value="USD" />';
			$html .= '<input type="hidden" name="quantity" value="1" />';
			$html .= '<input type="hidden" name="return" value="' . $return_url . '" />';
			$html .= '<input type="hidden" name="cancel_return" value="' . $cancel_url . '" />';
			$html .= '<input type="hidden" name="back_return" value="' . $back_url . '"  />';
			$html .= '<input type="hidden" name="item_name" value="' . $item_name . '"  />';
			$html .= '<input type="hidden" name="custom" value="1"/>';
			$html .= '<input type="hidden" name="item_number" value="' . $item_number . '"  />';
			$html .= '<input type="hidden" name="amount" value="' . $ammount . '"  />';
			return $html;
		}
		
		function level() {
			if ($this->input->post()) {
				if (isset($this->session->userdata['user_info'])) {
					$user_id = $this->session->userdata['user_info']['id'];
					} else {
					$json_arr = array('response' => 'failed', 'msg' => 'Please register or login for get premium level access');
					echo json_encode($json_arr);
					return false;
				}
				$id = $this->input->post('type');
				$name = $this->input->post('name');
				$return_url = base_url() . 'page/success';
				$cancel_url = base_url() . 'page/cancel';
				$back_url = base_url() . 'dashboard/provider_level';
				$product = $this->Page_model->getRows($id);
				if (!empty($product)) {
					$payment['user_id'] = 171; //$user_id;
					$payment['account_level_id'] = $id;
					$payment['item_number'] = 1;
					$payment['payment_amt'] = $product->price;
					$payment['currency_code'] = 'USD';
					$payment['status'] = 'Pending';
					$payment['created_at'] = date('Y-m-d H:i:s');
					$payment_id = $this->Common_model->add('payments', $payment);
					$meta_info = $this->session->userdata['user_info'];
					$meta_info['meta_info']['payment_id'] = $payment_id;
					$meta_info['meta_info']['provider_level'] = $product->name;
					$this->session->set_userdata('user_info', $meta_info);
					$html = $this->paypal_form_attribut($return_url, $cancel_url, $back_url, $product->name, $product->price);
					$json_arr = array('response' => 'success', 'form_name' => $name, 'form_data' => $html);
					echo json_encode($json_arr);
					} else {
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
		
		function thanks() {
			$this->data['title'] = 'LMS | Contact';
			$this->load->view('public/header', $this->data);
			$this->load->view('public/wraperstart');
			$this->load->view('pages/thanks');
			$this->load->view('public/wraperend');
			$this->load->view('public/footer');
		}
		
		function contact_us() {
			$this->data['title'] = 'Pyramids Academy | Contact';
			$this->load->view('public/header', $this->data);
		    $this->load->view('pages/contact');
			$this->load->view('public/footer');
			if (isset($_POST['contact_info'])) {
				$name = $this->input->post("name");
				$email = $this->input->post("email");
				$message = $this->input->post("message");
				$this->load->library('email');
				$from_email = "info@trigma.us";
				$to_email = "bindu.kamboj@trigma.co.in";
				$msg = '';
				$msg .= 'Contact Information' . '<br>';
				$msg .= 'Name' . $name . '<br>';
				$msg .= 'Email' . $email . '<br>';
				$msg .= 'Message : ' . $message . '<br>';
				$msg .= 'Pyramids Academy' . '<br>';
				$msg .= 'Thanks' . '<br>';
				$this->email->set_mailtype("html");
				$this->email->from($from_email);
				$this->email->to($to_email);
				$this->email->subject('Contact Information');
				$this->email->message($msg);
				$this->email->send();
				redirect('page/thanks');
			}
		}
		
		
		function about_us() {
			$this->data['title'] = 'Pyramids Academy | About us';
			$this->load->view('public/header', $this->data);
			
			$this->load->view('pages/aboutus');
			
			$this->load->view('public/footer');
		}
		
	    function faqs() {
		
			$this->data['title'] = 'Pyramids Academy | Faqs';
			$this->load->view('public/header', $this->data);
			
			$this->load->view('pages/faqs');
			
			$this->load->view('public/footer');
		}
		
		function coding() {
		    $id = $this->uri->segment(3); 
			$this->data['title'] = 'Pyramids Academy | Coding';
			$this->data['workshopList'] = $this->Workshop_model->get_workshoplist();
		    $this->data['workshopdata'] = $this->Workshop_model->getworkshop($id);
			$this->data['courseList'] = $this->Course_model->get_courselist();
			$this->data['certificateList'] = $this->Certificate_model->get_certificatelist();
			
			
			$this->load->view('public/header', $this->data);
			
			$this->load->view('pages/coding');
			
			$this->load->view('public/footer');
			$this->sendEmail();
		}
		
		function courses() {
		    $id = $this->uri->segment(3); 
	
			//echo $this->session->userdata['user_info'];
			$this->data['title'] = 'Pyramids Academy | Courses';
			$this->data['workshopList'] = $this->Workshop_model->get_workshoplist();
		    $this->data['workshopdata'] = $this->Workshop_model->getworkshop($id);
			$this->data['courseList'] = $this->Course_model->get_courselist();
			$this->data['coursedata'] = $this->Course_model->getcourse($id);
			$this->data['certificateList'] = $this->Certificate_model->get_certificatelist();
			$this->data['certificatedata'] = $this->Certificate_model->getcertificate($id);
			
			$course_ids = json_decode($this->data['certificatedata']->courses_id);
			if(!empty($course_ids)){
			foreach($course_ids as $course_id){
			$coursedetails = $this->Course_model->getcoursess($course_id);
			$this->data['coursedetails'][] = $coursedetails;
			}
			}
			if ($this->input->post()) {
				
				if (isset($this->session->userdata['logged_in'])) {
					$user_id = $_SESSION['user_id'];
					} else {
					$json_arr = array('response' => 'failed', 'msg' => 'Please register or login for get premium level access');
					echo json_encode($json_arr);
					return false;
				}
				$id = $this->input->post('cid');
				$name = $this->input->post('name');
				$return_url = base_url() . 'page/success';
				$cancel_url = base_url() . 'page/cancel';
				$back_url = base_url() . 'page/coding/20';
				$course = $this->Page_model->getRows($id);
				//print_r($course->course_code); exit;
				if (!empty($course)) {
					$payment['user_id'] = $user_id;
			        $payment['account_level_id'] = 5; 
					$payment['item_number'] = $course->course_code;
					$payment['payment_amt'] = $course->price;
					$payment['currency_code'] = 'USD';
					$payment['status'] = 'Pending';
					$payment['created_at'] = date('Y-m-d H:i:s');
					$payment_id = $this->Common_model->add('payments', $payment);
					$meta_info = $this->session->userdata['user_info'];
					$meta_info['meta_info']['payment_id'] = $payment_id;
					$meta_info['meta_info']['provider_level'] = $course->title;
					$this->session->set_userdata('user_info', $meta_info);
					$html = $this->paypal_form_attribut($return_url, $cancel_url, $back_url, $course->title, $course->course_code, $course->price);
					$json_arr = array('response' => 'success', 'form_name' => $name, 'form_data' => $html);
					echo json_encode($json_arr);
					} else {
					$json_arr = array('response' => 'failed_found', 'msg' => 'Type or level not found.');
					echo json_encode($json_arr);
				}
				return false;
			}
			$this->load->view('public/header', $this->data);
			
			$this->load->view('pages/courses');
			
			$this->load->view('public/footer');
			$this->sendEmail();
		}
		
		
			function certificates() {
		    $id = $this->uri->segment(3); 
			$this->data['title'] = 'Pyramids Academy | Certificates';
			$this->data['workshopList'] = $this->Workshop_model->get_workshoplist();
		    $this->data['workshopdata'] = $this->Workshop_model->getworkshop($id);
			$this->data['courseList'] = $this->Course_model->get_courselist();
			$this->data['certificateList'] = $this->Certificate_model->get_certificatelist();
			$this->data['certificatedata'] = $this->Certificate_model->getcertificate($id);
			
			$course_ids = json_decode($this->data['certificatedata']->courses_id);
			if(!empty($course_ids)){
			foreach($course_ids as $course_id){
			$coursedetails = $this->Course_model->getcoursess($course_id);
			$this->data['coursedetails'][] = $coursedetails;
			}
			}
			
			
						
			$this->load->view('public/header', $this->data);
			
			$this->load->view('pages/certificates');
			
			$this->load->view('public/footer');
			$this->sendEmail();
		}
		
		public function sendEmail(){   
 			if (isset($_POST['reg_more_info'])) {
				$name = $this->input->post("name");
				$email = $this->input->post("email");
				$phone = $this->input->post("phone");
				$phonechk = $this->input->post("phonechk");
				$emailchk = $this->input->post("emailchk");
				$amchk = $this->input->post("amchk");
				$pmchk = $this->input->post("pmchk");
				if($phonechk == "on"){
					$commmessage =  "phone";
				}else{
					$commmessage =  "Email";
				}
                if($amchk == "on"){
					$callmessage =  "Morning";
				}else{
					$callmessage =  "Evening";
				}				
				
				$this->load->library('email');
				$from_email = "info@trigma.us";
				$to_email = "bindu.kamboj@trigma.co.in";
				$msg = '';
				$msg .= 'Contact Information' . '<br>';
				$msg .= 'Name' . $name . '<br>';
				$msg .= 'Email' . $email . '<br>';
				$msg .= 'Phone : ' . $phone . '<br>';
				$msg .= 'Preferred Method of Communication: ' . $commmessage . '<br>';
				$msg .= 'Preferred Time of Calling: ' . $callmessage . '<br>';
				$msg .= 'Pyramids Academy' . '<br>';
				$msg .= 'Thanks' . '<br>';
				$this->email->set_mailtype("html");
				$this->email->from($from_email);
				$this->email->to($to_email);
				$this->email->subject('Request More Information');
				$this->email->message($msg);
				$this->email->send();
			}
        }
		
		
	}