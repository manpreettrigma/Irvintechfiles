<?php	
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Provider extends CI_Controller {		
		function __construct() {
			parent::__construct();
			
			$this->load->model('common/Common_model');
			$this->load->model('provider/Provider_model');
			$this->load->library('session');
			$this->load->library('upload');
			$this->load->library('Adobe');
			//$this->adobe->makeAuth('ACDeveloper', 'CLEDeveloper12');
			if(empty($this->session->userdata['user_info'])){
				redirect("account/login");
			}
		}
		
		function course() {			
			$this->data['title'] = 'LMS | Student Dashboard';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/provider/course">Course</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] = get_user_data($user_info['id']);
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/course');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		public function adobe_folder() {
			$this->data['title'] = 'LMS | Student Dashboard';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/provider/adobe-folder">Adobe Folder</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] = get_user_data($user_info['id']);
			$this->data['catalog'] = $this->Provider_model->get_catalog(NULL);
			$this->data['get_folder'] = $this->Common_model->get('adobe_folder');
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/adobe-folder');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function create_adobe_folder() {
			if ($this->input->post()) {
				$this->form_validation->set_rules('adobe_folder[title]', 'Title', 'trim|required|is_unique[adobe_folder.title]');
				if ($this->form_validation->run()) {
					$post_data = $this->input->post('adobe_folder');
					$folder_id = $this->adobe->createFolder($post_data['title'], $post_data['desc'], $post_data['folder_id']);
					if ($folder_id) {
						$post_data['folder_id'] = $folder_id;
						$this->Common_model->add('adobe_folder', $post_data);
						$data['msg'] = $this->session->set_flashdata('message_status', 'Folder created successfully');
						redirect('account/provider/adobe-folder');
					}
				}
			}
			$this->data['title'] = 'LMS | Create Adobe Folder';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/provider/create-adobe-folder">Create Adobe Folder</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['field_data'] = $this->Provider_model->get_field_data();
			$this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] = get_user_data($user_info['id']);
			$this->data['get_folder'] = $this->Common_model->get('adobe_folder');
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/create-adobe-folder');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		public function adobe_meeting() {
			$this->data['title'] = 'LMS | Student Dashboard';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/provider/adobe-meeting">Adobe Meeting</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] = get_user_data($user_info['id']);
			$this->data['catalog'] = $this->Provider_model->get_catalog(NULL);
			$this->data['get_folder'] = $this->Common_model->get('adobe_folder');
			$this->data['get_meeting'] = $this->Common_model->get('adobe_meeting');
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/adobe-meeting');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function create_adobe_meeting() {
			if ($this->input->post()) {
				$this->form_validation->set_rules('adobe_meeting[title]', 'Title', 'trim|required|is_unique[adobe_meeting.title]');
				$this->form_validation->set_rules('adobe_meeting[url]', 'Url', 'trim|required|is_unique[adobe_meeting.slug]');
				$this->form_validation->set_rules('adobe_meeting[date_begin]', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('adobe_meeting[date_end]', 'End Date', 'trim|required');
				if ($this->form_validation->run()) {
					$post_data = $this->input->post('adobe_meeting');
					$meeting_id = $this->adobe->createMeeting($post_data['folder_id'], $post_data['title'], $post_data['date_begin'], $post_data['date_end'], $post_data['url'], null);					
					if ($meeting_id) {
						$post_data['meeting_id'] = $meeting_id;
						$post_data['slug'] = $post_data['url'];
						$post_data['url'] = $this->adobe->getHost() . $post_data['url'];
						$this->Common_model->add('adobe_meeting', $post_data);
						$data['msg'] = $this->session->set_flashdata('message_status', 'Meeting created successfully');
						redirect('account/provider/adobe-meeting');
					}
				}
			}
			
			$this->data['title'] = 'LMS | Student Dashboard';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/add-course">Add Course</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['field_data'] = $this->Provider_model->get_field_data();
			$this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] = get_user_data($user_info['id']);
			$this->data['get_folder'] = $this->Common_model->get('adobe_folder');
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/create-adobe-meeting');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function catalog() {			
			$this->data['title'] = 'LMS | Create Webinar';
			$this->data['breadcrumb'] = '<li><a href="' . base_url() . 'account/provider/catalog">Webinar</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['user_info'] = $user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] = get_user_data($user_info['id']);
			$this->data['catalog'] = $this->Provider_model->get_catalog(NULL);
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/catalog');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		function add_catalog() {			
			$this->data['title'] 				= 	'LMS | Add Webinar';
			$this->data['breadcrumb'] 		= 	'<li><a href="' . base_url() . 'account/add-course">Add Webinar</a></li>';
			$this->load->view('account/dashboard/header');
			$this->data['field_data'] 		= 	$this->Provider_model->get_field_data();
			$this->data['user_info'] 		= 	$user_info = $this->session->userdata['user_info'];
			$this->data['get_profile'] 		= 	get_user_data($user_info['id']);
			$this->data['timezone'] 		= 	$this->Provider_model->get_time_zone();
			$this->data['get_meeting'] 		= 	$this->Common_model->getmeeting($user_info['id']);
			$this->data['category'] 			= 	$this->Common_model->getcategory();
			$this->load->view('account/dashboard/provider/header', $this->data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/add-catalog');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');
		}
		
		public function processCatalog(){
			if ($this->input->post()) {				
				/*             * ************ form validation ********************* */
				$this->form_validation->set_rules('catalog_events[title]', 'Title', 'trim|required');
				$this->form_validation->set_rules('catalog_events[start_date]', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[end_date]', 'End Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[type]', 'Catalog Type', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[short_desc]', 'Short Description', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[speaker_events]', 'Speaker of the Event', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$this->add_catalog();
				}
				else{
					$_POST['catalog_events']['visible_status']	=	1;					
					$id = $this->Common_model->add('catalog_events', $this->input->post('catalog_events'));
					$post_data = $this->input->post('catalog_event_meta');					
					/*                 * ************ get file name ********************* */
					if(isset($post_data['pdf_file']) && !empty($post_data['pdf_file'])){
						$pdf_file = $post_data['pdf_file'];
						$pdf_path = FCPATH . 'uploads/catalog_event/others/' . $pdf_file;
						$pdf_ext = pathinfo($pdf_path, PATHINFO_EXTENSION);
						$pdf_name = $id . time() . '.' . $pdf_ext;						
						$post_data['pdf'] = base_url() . 'uploads/catalog_event/others/' . $pdf_name;
						$pdf_path_rename = FCPATH . 'uploads/catalog_event/others/' . $pdf_name;
						rename($pdf_path, $pdf_path_rename);
					}
				/* 	if(isset($post_data['ondemand_file']) && !empty($post_data['ondemand_file'])){
						$ondemand_file = $post_data['ondemand_file'];
						$ondemand_path = FCPATH . 'uploads/catalog_event/ondemand/' . $ondemand_file;
						$pdf_ext = pathinfo($ondemand_path, PATHINFO_EXTENSION);
						$pdf_name = $id . time() . '.' . $pdf_ext;						
						$post_data['ondemand_file'] = base_url() . 'uploads/catalog_event/ondemand/' . $pdf_name;
						$pdf_path_rename = FCPATH . 'uploads/catalog_event/ondemand/' . $pdf_name;
						rename($ondemand_path, $pdf_path_rename);
					} */
					$img = $post_data['image'];
					$thumb_img = $post_data['thumb_img'];
					/*                 * ************ get file path ********************* */
					
					$img_path = FCPATH . '/uploads/catalog_event/picture/' . $img;
					$thumb_path = FCPATH . '/uploads/catalog_event/picture/thumbnail/' . $thumb_img;
					/*                 * ************ get file extension ********************* */
					
					$ext = pathinfo($img_path, PATHINFO_EXTENSION);
					
					$pic_name = $id . time() . '.' . $ext;
					/*                 * ************ Rename file with the combination of time and id ********************* */
					
					$post_data['image'] 			= 	base_url() . 'uploads/catalog_event/picture/' . $pic_name;
					$post_data['thumb_img'] 		= 	base_url() . 'uploads/catalog_event/picture/thumbnail/' . $pic_name;
					
					$img_path_rename 			= 	FCPATH . '/uploads/catalog_event/picture/' . $pic_name;
					$thumb_path_rename 			= 	FCPATH . '/uploads/catalog_event/picture/thumbnail/' . $pic_name;
					
					rename($img_path, $img_path_rename);
					rename($thumb_path, $thumb_path_rename);					
					/*                 * ************ Serialize and insert the catalog meta ********************* */					
					//$catalog_meta_data 			= 	serialize($post_data);
					$post_data['catalog_event_id'] 	=	$id;					
					unset($post_data['pdf_file']);
					unset($post_data['type_webinar_first']);										
					$this->Common_model->add('catalog_event_meta', $post_data);
					$data['msg'] 					= 	$this->session->set_flashdata('message_status', 'Added catalog successfully');
					redirect('account/provider/catalog');
				}
			}
			else{
				redirect('account/provider/add_catalog');
			}
		}
		
		function edit_catalog(){			
			$catalog_id 			=	$this->uri->segment(3);			
			$data['title'] 			= 	'LMS | Edit Catalog';
			$data['catalog_id']	=	$catalog_id;
			$data['catalog'] 		= 	$this->Provider_model->get_catalog_by_id($catalog_id);			
			$data['field_data'] 	= 	$this->Provider_model->get_field_data();
			$data['timezone'] 		= 	$this->Provider_model->get_time_zone();
			$data['get_meeting'] 	= 	$this->Common_model->get('adobe_meeting');
			$data['user_info'] 		= 	$user_info = $this->session->userdata['user_info'];
			$data['get_profile'] 	= 	get_user_data($user_info['id']);
			$data['user_status']	=	get_user_status($user_info['id']);
			$data['category'] 			= 	$this->Common_model->getcategory();
			$data['breadcrumb'] 	= 	'<li><a href="' . base_url() . 'account/provider/catalog">Catalog</a></li>';
			$this->load->view('account/dashboard/header');
			$this->load->view('account/dashboard/provider/header', $data);
			$this->load->view('account/dashboard/provider/wrapper-start');
			$this->load->view('account/dashboard/provider/left-sidebar');
			$this->load->view('account/provider/edit-catalog');
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('public/footer');			
		}
		
		public function updateCatalog(){
			if($this->input->post()){				
				$catalogdata 		= 	$this->Provider_model->get_catalog_by_id($this->input->post('id'));	
				$this->form_validation->set_rules('catalog_events[title]', 'Title', 'trim|required');
				$this->form_validation->set_rules('catalog_events[start_date]', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[end_date]', 'End Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[type]', 'Catalog Type', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[short_desc]', 'Catalog Type', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[speaker_events]', 'Speaker of the Event', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[price]', 'Price', 'trim|required');
				if ($this->form_validation->run() == FALSE) {					
					$this->edit_catalog();
				}
				else{
					$where = "id = ".$this->input->post('id');
					$this->Common_model->update_event('catalog_events',$where, $this->input->post('catalog_events'));
					$post_data = $this->input->post('catalog_event_meta');	
					$id = $this->input->post('id');
					/*                 * ************ get file name ********************* */
					//$catalogmeta	=	unserialize($catalogdata['value']);
					if(isset($post_data['pdf_file']) && !empty($post_data['pdf_file']) && ($catalogdata['pdf'] != $post_data['pdf_file'])){
						$pdf_file = $post_data['pdf_file'];
						$pdf_path = FCPATH . 'uploads/catalog_event/others/' . $pdf_file;
						$pdf_ext = pathinfo($pdf_path, PATHINFO_EXTENSION);
						$pdf_name = $id . time() . '.' . $pdf_ext;						
						$post_data['pdf'] = base_url() . 'uploads/catalog_event/others/' . $pdf_name;
						$pdf_path_rename = FCPATH . 'uploads/catalog_event/others/' . $pdf_name;
						rename($pdf_path, $pdf_path_rename);
					}
					/* if(isset($post_data['ondemand_file']) && !empty($post_data['ondemand_file']) && ($catalogmeta['ondemand_file'] != $post_data['ondemand_file'])){
						$ondemand_file = $post_data['ondemand_file'];
						$ondemand_path = FCPATH . 'uploads/catalog_event/ondemand/' . $ondemand_file;
						$pdf_ext = pathinfo($ondemand_path, PATHINFO_EXTENSION);
						$pdf_name = $id . time() . '.' . $pdf_ext;						
						$post_data['ondemand_file'] = base_url() . 'uploads/catalog_event/ondemand/' . $pdf_name;
						$pdf_path_rename = FCPATH . 'uploads/catalog_event/ondemand/' . $pdf_name;
						rename($ondemand_path, $pdf_path_rename);
					} */
					if($catalogdata['image'] != $post_data['image']){
						$img = $post_data['image'];						
						/*                 * ************ get file path ********************* */						
						$img_path = FCPATH . '/uploads/catalog_event/picture/' . $img;						
						/*                 * ************ get file extension ********************* */						
						$ext = pathinfo($img_path, PATHINFO_EXTENSION);						
						$pic_name = $id . time() . '.' . $ext;
						/*                 * ************ Rename file with the combination of time and id ********************* */						
						$post_data['image'] = base_url() . 'uploads/catalog_event/picture/' . $pic_name;
						$img_path_rename = FCPATH . '/uploads/catalog_event/picture/' . $pic_name;
						rename($img_path, $img_path_rename);						
					}
					if($catalogdata['thumb_img'] != $post_data['thumb_img']){
						$thumb_img = $post_data['thumb_img'];
						$thumb_path = FCPATH . '/uploads/catalog_event/picture/thumbnail/' . $thumb_img;
						$ext = pathinfo($thumb_path, PATHINFO_EXTENSION);						
						$pic_name = $id . time() . '.' . $ext;
						$post_data['thumb_img'] = base_url() . 'uploads/catalog_event/picture/thumbnail/' . $pic_name;
						$thumb_path_rename = FCPATH . '/uploads/catalog_event/picture/thumbnail/' . $pic_name;
						rename($thumb_path, $thumb_path_rename);			
					}
					/*                 * ************ Serialize and insert the catalog meta ********************* */					
					$catalog_meta_data = serialize($post_data);
					//$catalog_meta = array('catalog_event_id' =>$this->input->post('id'), 'key' => 'catalog_meta', 'value' => $catalog_meta_data);
					$where = "catalog_event_id = ".$this->input->post('id');
					unset($post_data['pdf_file']);
					unset($post_data['type_webinar_first']);	
					unset($post_data['ondemand_file']);	
					$this->Common_model->update_event_meta('catalog_event_meta', $where , $post_data);
					$data['msg'] = $this->session->set_flashdata('message_status', 'Webinar updated successfully');
					redirect('account/provider/catalog');
				}
			}
			else{
				redirect('account/provider/edit_catalog');
			}
		}
		
		public function uploader_pdf() {
			if (!empty($_FILES)) {				
				$file_tmp_type = $_FILES['handout_pdf']['type'][0];
				$file_name = $_FILES['handout_pdf']['name'][0];
				$file_tmp_name = $_FILES['handout_pdf']['tmp_name'][0];
				if ($file_tmp_type == 'application/pdf') {
					$destination_folder = 'uploads/catalog_event/others/';
					if (move_uploaded_file($file_tmp_name, $destination_folder . $file_name)) {
						$json_arr = array('resonse' => 'success', 'msg' => '<div class="message" style="color:green">File uploaded successfully....</div>', 'filename' => $file_name);
						echo json_encode($json_arr);
					}
					} else {
					$json_arr = array('resonse' => 'failed', 'msg' => '<div class="message" style="color:red">Only pdf file can be uploaded....</div>', 'filename' => $file_name);
					echo json_encode($json_arr);
				}
				return false;
			}
		}
		
		public function uploader_ondemand() {
			if (!empty($_FILES)) {				
				$file_tmp_type = $_FILES['type_webinar_second']['type'][0];
				$file_name = $_FILES['type_webinar_second']['name'][0];
				$file_tmp_name = $_FILES['type_webinar_second']['tmp_name'][0];
				if ($file_tmp_type == 'application/pdf') {
					$destination_folder = 'uploads/catalog_event/ondemand/';
					if (move_uploaded_file($file_tmp_name, $destination_folder . $file_name)) {
						$json_arr = array('resonse' => 'success', 'msg' => '<div class="message" style="color:green">File uploaded successfully....</div>', 'filename' => $file_name);
						echo json_encode($json_arr);
					}
					} else {
					$json_arr = array('resonse' => 'failed', 'msg' => '<div class="message" style="color:red">Only pdf file can be uploaded....</div>', 'filename' => $file_name);
					echo json_encode($json_arr);
				}
				return false;
			}
		}
		
		public function uploader() {
			if (!empty($_FILES)) {
				
				$config["generate_image_file"] = true;
				$config["generate_thumbnails"] = true;
				$config["image_max_size"] = 500;
				$config["thumbnail_size"] = 270;
				$config["thumbnail_prefix"] = "";
				$config["destination_folder"] = 'uploads/catalog_event/picture/';
				$config["thumbnail_destination_folder"] = 'uploads/catalog_event/picture/thumbnail/';
				$config["quality"] = 90;
				$config["random_file_name"] = true;
				$config["file_data"] = $_FILES["banner"];
				$this->load->library('uploadresize', $config);
				$responses = $this->uploadresize->resize();
				$json_arr = array('img' => $responses['images'][0], 'msg' => '<div class="message" style="color:green">File uploaded successfully....</div>', 'thumb' => $responses['thumbs'][0]);
				echo json_encode($json_arr);
				return false;
			}
		}
		
		public function delete($from, $id) {
			if ($id == 0) {
				redirect('account/provider/' . $from);
				} else {
				$where = array('id' => $id);
				if ($from == 'adobe-meeting') {
					$table = 'adobe_meeting';
					$msg = 'Meeting deleted successfully';
					} else {
					$table = 'adobe_folder';
					$msg = 'Folder deleted successfully';
				}
				$this->Common_model->delete($table, $where);
				$data['msg'] = $this->session->set_flashdata('message_status', $msg);
				redirect('account/provider/' . $from);
			}
		}	
		
		public function registerStudent(){
			$principalid 	=	$this->adobe->createUser("sonia.gupta@trigma.co.in","123456","Sonia Gupta");
			echo $principalid;die;
		}
	}
?>