<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Account extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('account/Account_manage_model');
			$this->load->model('account/User');
			$this->load->model('common/Common_model');
			$this->load->library('paypal_lib');
			$this->load->library('session');
			$this->load->library('image_lib');
			$this->load->library('upload');
			$this->load->library('Adobe');
			//$this->adobe->loginAdobe();
			$this->adobe->makeAuth('ACDeveloper', 'CLEDeveloper12');
                } 
		
		public function index() {
			$this->data['title'] = 'LMS | Home';
			$this->load->view('public/header', $this->data);
			$this->load->view('home');
			$this->load->view('public/footer');
		}
		
		public function login() {
			
			$sess_id = $this->session->userdata;
			if (isset($sess_id['user_info'])) {
				redirect('account/dashboard', 'refresh');
			}
			
			$this->data['title'] = 'LMS | Login';
			$this->load->view('public/header', $this->data);
			include_once APPPATH . "libraries/facebook-api-php-codexworld/facebook.php";
			$redirectUrl = base_url() . 'account/login';
			$fbPermissions = 'email';
			$facebook = facebook_login('1802468290039223', '0d36447370413ea6b74d5fdd11cf89cb', $redirectUrl, $fbPermissions);
			$fbuser = $facebook->getUser();
			if ($fbuser) {
				$userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,picture');
				$userData['auth_id'] = $userProfile['id'];
				$userData['user_role'] = '4';
				$userData['username'] = $userProfile['first_name'];
				$userData['email'] = $userProfile['email'];
				$passwordmd5 = md5(randomPassword(15));
				$userData['password'] = randomPassword(23);
				$table = "users";
				$email = $userData['email'];
				$facebook_user_detail = $this->Account_manage_model->get_users($email);
				
				if (!empty($facebook_user_detail)) {
					$user_info = get_user_data($facebook_user_detail->id);
					$this->session->set_userdata('user_info', $user_info);
					redirect('account/dashboard', 'refresh');
					} else {
					$userID = $this->Account_manage_model->add($table, $userData);
					$user_meta = array('user_id' => $userID, 'user_key' => 'profile_picture', 'user_value' => $userProfile['picture']['data']['url']);
					$facebook_user_detail = $this->Account_manage_model->add_user_info($user_meta);
					$user_info = get_user_data($userID);
					$this->session->set_userdata('user_info', $user_info);
					redirect('account/dashboard', 'refresh');
					}
			}
			else {
				$fbuser = '';
				$data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri' => $redirectUrl, 'scope' => $fbPermissions));
			}
			
			if (isset($_REQUEST['login_submit'])) {				
				$username = $this->input->post("username");
				$password = md5($this->input->post("password"));
				$user_info = $this->Account_manage_model->getdata($username, $password);				
				if (!empty($user_info)) {
					if ($user_info['status'] != 1) {
						$data['msg'] = 'Account is disable. Please contact admin manager';
					}
					else {
						$this->session->set_userdata('user_info', $user_info);
						redirect('account/dashboard', 'refresh');
					}
				}
				else {
					$data['msg'] = 'Please enter the correct username or password';
				}
			}
			
			$this->load->view('account/login', $data);
			$this->load->view('public/footer');
		}
		
		function dashboard() {
			$this->data['title'] 				= 	'LMS | Student Dashboard';
			$this->data['breadcrumb'] 		= 	'';
			$this->load->view('account/dashboard/header');
			$this->data['user_info'] 		= 	$user_info = $this->session->userdata['user_info'];			
			$this->data['get_profile'] 		= 	get_user_data($user_info['id']);
			$role 						= 	get_roll($user_info['id']);
			$this->data['webinarList']		= 	$this->Common_model->getwebinar($user_info['id']);
			$this->data['webinars']			= 	$this->Common_model->getwebinar();
			$this->data['presenters']		=	$this->Common_model->getPresenters();
			$this->data['credits']			=	$this->Common_model->getCredit();
			$this->load->view('account/dashboard/' . $role . '/header', $this->data);
			$this->load->view('account/dashboard/' . $role . '/wrapper-start');
			$this->load->view('account/dashboard/' . $role . '/left-sidebar');
			$this->load->view('account/dashboard/' . $role . '/dashboard');
			$this->load->view('account/dashboard/' . $role . '/right-sidebar',$this->data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function edit_profile() {
			if ($this->input->post()) {
				$id = $this->input->post('id');
				$users = $this->input->post('users');
				$meta_info = $this->input->post('meta_info');
				$password = $this->input->post('password');
				$confirm_password = $this->input->post('cfpassword');
				
				if ($password != '') {
					if ($password != $confirm_password) {
						$data['msg'] = $this->session->set_flashdata('password', 'Password and confirm password should be match.');
						} else {
						$this->Account_manage_model->update_password($id, md5($password));
					}
				}
				
				$this->Account_manage_model->update_users($id, $users);
				$usersInfo = $this->Account_manage_model->update_users_info($id, $meta_info);
				$data['msg'] = $this->session->set_flashdata('message_name', 'Profile updated succcessfully');
				redirect('Account/edit-profile');
			}
			$this->load->view('account/dashboard/header');
			$this->data['title'] = 'LMS | Edit Profile';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/edit-profile">Edit Profile</a></li>';
			$user_id = $this->session->userdata['user_info']['id'];
			$user_role = $this->session->userdata['user_info']['role'];
			$this->data['get_profile'] = get_user_data($user_id);
			$this->load->view('account/dashboard/' . $user_role . '/header', $this->data);
			$this->load->view('account/dashboard/' . $user_role . '/wrapper-start');
			$this->load->view('account/dashboard/' . $user_role . '/left-sidebar');
			$this->load->view('account/dashboard/edit-profile');
			$this->load->view('account/dashboard/' . $user_role . '/right-sidebar');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function createThumbnail($filename) {
			$config['image_library'] = "gd2";
			$config['source_image'] = "uploads/small/" . $filename;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = "80";
			$config['height'] = "80";
			$this->load->library('image_lib', $config);
			if (!$this->image_lib->resize()) {
				echo $this->image_lib->display_errors();
			}
		}
		
		public function update_profile_picture() {
			if (!empty($_FILES)) {
				$user_id = $this->input->post('user_id');
				$get_profile_ata = get_user_data($user_id);
				$file_name = $get_profile_ata['role'] . '_' . $user_id;
				$path = FCPATH . 'uploads/user_profile/large/';
				$s_path = FCPATH . 'uploads/user_profile/small/';
				$data = upload_files('profile_img', $path, 'gif|jpg|png', $file_name, TRUE);
				$metaArr = array('profile_picture' => $data['file_name']);
				$this->Account_manage_model->update_users_info($user_id, $metaArr);
				echo json_encode($data);
				return false;
			}
		}
		
		public function create_presenter() {			
			if ($this->input->post()) {
				$first_name = $this->input->post('first_name');
				$passwordmd5 = md5(randomPassword(15));
				$password = randomPassword(15);
				$last_name = $this->input->post('last_name');
				$username = $this->input->post('username');
				$address1 = $this->input->post('address1');
				$address2 = $this->input->post('address2');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				$country = $this->input->post('country');
				$phone_number = $this->input->post('phone_number');
				$email = $this->input->post('email');
				$website = $this->input->post('website');
				$speaking_experience = $this->input->post('speaking_experience');
				$link1 = $this->input->post('link1');
				$link2 = $this->input->post('link2');
				$link3 = $this->input->post('link3');
				$link4 = $this->input->post('link4');
				$link5 = $this->input->post('link5');
				$link6 = $this->input->post('link6');
				$roll = 2;
				$created = date('Y-m-d H:i:s');
				$table_user = 'users';
				$table_user_info = 'user_info';
				
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');
				$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('phone_number', 'Presenter Number', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				
				if ($this->form_validation->run()) {
					$data = array('user_role' => $roll, 'username' => $username, 'password' => $passwordmd5, 'email' => $email, 'created' => $created);
					$user_id = $this->Account_manage_model->add($table_user, $data);
					$metaArr = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'city' => $city,
					'address' => $address1,
					'state' => $state,
					'zip' => $zip,
					'country' => $country,
					'phone_number' => $phone_number,
					'website' => $website,
					'speaking_experience' => $speaking_experience,
					'link1' => $link1,
					'link2' => $link2,
					'link3' => $link3,
					'link4' => $link4,
					'link5' => $link5,
					'link6' => $link6,
					'profile_picture' => ''
					);
					foreach ($metaArr as $key => $value) {
						$user_data = array('user_id' => $user_id, 'user_key' => $key, 'user_value' => $value);
						$this->Account_manage_model->add($table_user_info, $user_data);
					}
					
					$message = '<tr><td><tr>
					<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; color: #333333;line-height: 30px;" st-title="fulltext-title">
					Account Created Successfully
					</td></tr><tr>
					<td st-content="fulltext-content" style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; line-height: 30px;">
					Your account is created as <strong>Provider</strong>. Below is the account information. Please make it secure and do not share.
					</td></tr><tr><td st-content="fulltext-content" style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; line-height: 30px;">
					<strong>User Name:</strong> ' . $username . '<br> 
					<strong>Password:</strong> ' . $password . '</td>
					</tr></td></tr>';
					$emailConfirm = email_send($email, 'Lms Account Confirmation', $message);
					if ($emailConfirm)
					$this->session->set_flashdata("email_sent", "Email sent successfully.");
					else
					$this->session->set_flashdata("email_sent", "Error in sending Email.");
					redirect('page/thanks');
				}
			}
			
			$this->data['title'] = 'LMS | Create Presenter';
			$this->load->view('public/header', $this->data);
			$this->load->view('account/create-presenter');
			$this->load->view('public/footer');
		}
		
		public function create_provider() {
			$field_id = $this->Account_manage_model->get_field_id();
			$role_type = $field_id->role_type;
			$id = $field_id->id;
			$data['provider_form'] = $this->Account_manage_model->get_provider_data($role_type);
			if ($this->input->post()) {
				
				$username = $this->input->post('username');
				$passwordmd5 = md5(randomPassword(15));
				$password = randomPassword(15);
				$email = $this->input->post('email');
				$address1 = $this->input->post('address1');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip_code = $this->input->post('zip_code');
				$country = $this->input->post('country');
				$phone_number = $this->input->post('phone_number');
				$website = $this->input->post('website');
				$fed_tax_id = $this->input->post('fed_tax_id');
				$provider_level = $this->input->post('provider_level');
				$provider_number = $this->input->post('phone_number');
				$created = date('Y-m-d H:i:s');
				$table_user = 'users';
				$table_user_info = 'user_info';
				$roll = 3;
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');
				$this->form_validation->set_rules('zip_code', 'Zip', 'trim|required');
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
				$this->form_validation->set_rules('phone_number', 'Provider Number', 'trim|required');
				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				if ($this->form_validation->run()) {
					$data = array('user_role' => $roll, 'username' => $username, 'password' => $passwordmd5, 'email' => $email, 'created' => $created);
					$user_id = $this->Account_manage_model->add($table_user, $data);
					$metaArr = array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'city' => $city,
					'address' => $address1,
					'state' => $state,
					'zip' => $zip_code,
					'country' => $country,
					'phone_number' => $phone_number,
					'website' => $website,
					'fed_tax_id' => $fed_tax_id,
					'provider_level' => $provider_level,
					'profile_picture' => ''
					);
					foreach ($metaArr as $key => $value) {
						$user_data = array('user_id' => $user_id, 'user_key' => $key, 'user_value' => $value);
						$this->Account_manage_model->add($table_user_info, $user_data);
					}
					
					$message = '<tr><td><tr>
					<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; color: #333333;line-height: 30px;" st-title="fulltext-title">
					Account Created Successfully
					</td></tr><tr>
					<td st-content="fulltext-content" style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; line-height: 30px;">
					Your account is created as <strong>Presenter</strong>. Below is the account information. Please make it secure and do not share.
					</td></tr><tr><td st-content="fulltext-content" style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; line-height: 30px;">
					<strong>User Name:</strong> ' . $username . '<br> 
					<strong>Password:</strong> ' . $password . '</td>
					</tr></td></tr>';
					$emailConfirm = email_send($email, 'Lms Account Confirmation', $message);
					if ($emailConfirm)
					$this->session->set_flashdata("email_sent", "Email sent successfully.");
					else
					$this->session->set_flashdata("email_sent", "Error in sending Email.");
					
					
					redirect('page/thanks');
				}
			}
			
			$this->data['title'] = 'LMS | Create Provider';
			$this->load->view('public/header', $this->data);
			$this->load->view('account/create-provider', $data);
			$this->load->view('public/footer');
		}
		
		public function confirm() {
			$this->load->view('public/header');
			$this->load->view('account/confirmation');
			$this->load->view('public/footer');
		}
		
		public function logout() {
			$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
			$this->session->sess_destroy();
			redirect('Account/login');
		}
		
		public function facebook_logout() {
			$this->session->unset_userdata('userData');
			$this->session->sess_destroy();
			redirect('account/login');
		}
		
		public function create_student() {
			$field_id = $this->Account_manage_model->get_field_id();
			$role_type = $field_id->role_type;
			$id = $field_id->id;
			$data['provider_form'] = $this->Account_manage_model->get_provider_data($role_type);
			$this->data['title'] = 'LMS | Create Student';
			$this->load->view('public/header', $this->data);
			$this->load->view('account/create-student', $data);
			$this->load->view('public/footer');
		}
		
		public function processStudent(){
			if ($this->input->post()) {								
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');				
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('address1', 'Address1', 'trim|required');
				$this->form_validation->set_rules('phone_number', 'Provider Number', 'trim|required');
				//$this->form_validation->set_rules('bar_number', 'Bar Member Number', 'trim|required');
				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				if ($this->form_validation->run() == FALSE) {
					$this->create_student();
				}
				else{
					$data 			= 	array('user_role' => 4, 'username' => $this->input->post('username'), 'password' => md5($this->input->post('password')), 'email' => $this->input->post('email'), 'created' => date("Y-m-d H:i:s"));
					
					 $principalid 		=	$this->adobe->createUser($this->input->post("email"),md5($this->input->post("password")),$this->input->post("first_name").$this->input->post("last_name"));
					// echo $principalid;die;
					$user_id = $this->Account_manage_model->add("users", $data);
					$metaArr 		= 	array(
					'first_name' 		=> 	$this->input->post('first_name'),
					'last_name' 		=>	$this->input->post('last_name'),
					'city' 			=> 	$this->input->post('city'),
					'address' 		=> 	$this->input->post('address1'),
					'state' 			=> 	$this->input->post('state'),
					'zip' 			=> 	$this->input->post('zip'),
					'country' 			=> 	$this->input->post('country'),
					'phone_number' 	=> 	$this->input->post('phone_number'),
					'profile_picture' 	=> 	''
					);
					foreach ($metaArr as $key => $value) {
						$user_data 		= 	array('user_id' => $user_id, 'user_key' => $key, 'user_value' => $value);
						$this->Account_manage_model->add("user_info", $user_data);
					}
					
					$message = '<tr><td><tr>
					<td style="font-family: Helvetica, arial, sans-serif; font-size: 30px; color: #333333;line-height: 30px;" st-title="fulltext-title">
					Account Created Successfully
					</td></tr><tr>
					<td st-content="fulltext-content" style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; line-height: 30px;">
					Your account is created as <strong>Student</strong>. Below is the account information. Please make it secure and do not share.
					</td></tr><tr><td st-content="fulltext-content" style="font-family: Helvetica, arial, sans-serif; font-size: 16px; color: #666666; line-height: 30px;">
					<strong>User Name:</strong> ' . $this->input->post('username') . '<br> 
					<strong>Password:</strong> ' . $this->input->post('password') . '</td>
					</tr></td></tr>';
					$emailConfirm 		= 	email_send($this->input->post('email'), 'Lms Account Confirmation', $message);
					if ($emailConfirm){
						$this->session->set_flashdata("email_sent", "Email sent successfully.");
					}
					else{
						$this->session->set_flashdata("email_sent", "Error in sending Email.");
					}					
					redirect('page/thanks');
				}
			}
		}		
	}
?>