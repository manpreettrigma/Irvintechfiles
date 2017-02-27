<?php	
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Mastercatalog extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->model('admin/catalogevent/Event_model');
			$this->load->model('common/Common_model');
			$this->load->model('admin/course/Course_model');
			$this->load->model('provider/Provider_model');
			
			$this->load->library('image_lib');			
			$this->load->library('Adobe');
			//$this->adobe->makeAuth('ACDeveloper', 'CLEDeveloper12');
			$this->load->library('upload');
		}
		public function index() {
			$data['catalog_records']=$this->Event_model->get_catalogEventList();
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');	
			$this->load->view('admin/master_catalog/catalog', $data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');		
		}
		public function add_mastercatalog() {
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$data['user_id'] 			= 	$this->Course_model->user_id();
			$data['get_presenter'] 		= 	$this->Event_model->get_presenter();
			$data['timezone'] 			= 	$this->Event_model->get_time_zone();
			$data['get_meeting'] 		= 	$this->Common_model->get('adobe_meeting');
			$data['category'] 			= 	$this->Common_model->getcategory();
			$data['providers'] 			= 	$this->Provider_model->get_provider_data("3",'id,username');
			if ($this->input->post()) {		
				$this->form_validation->set_rules('catalog_events[title]', 'Title', 'trim|required');
				$this->form_validation->set_rules('catalog_events[start_date]', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[end_date]', 'End Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[type]', 'Catalog Type', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[short_description]', 'Short Description', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[price]', 'Price', 'trim|required|is_numeric');
				$this->form_validation->set_rules('catalog_event_meta[presenter]', 'Speaker of the Event', 'trim|required');
				if ($this->form_validation->run()) {
					$_POST['catalog_events']['visible_status']	=	1;
					$id 					= 	$this->Common_model->add('catalog_events',$this->input->post('catalog_events'));
					$post_data 			= 	$this->input->post('catalog_event_meta');
					$post_data['pdf']			=	"";
					$post_data['ondemand_file']			=	"";
					/*Pdf file upload*/
					if(isset($post_data['pdf_file']) && $post_data['pdf_file'] != ""){
						$pdf_file 			= 	$post_data['pdf_file'];
						$pdf_path 			= 	FCPATH.'/uploads/catalog_event/others/'.$pdf_file;
						$pdf_ext 			= 	pathinfo($pdf_path, PATHINFO_EXTENSION);
						$pdf_name 			= 	$id.time().'.'.$pdf_ext;
						$post_data['pdf'] 		= 	base_url().'uploads/catalog_event/others/'.$pdf_name;
						$pdf_path_rename 	= 	FCPATH . '/uploads/catalog_event/others/'.$pdf_name;
						rename($pdf_path, $pdf_path_rename);
					}
					
					/*Image upload*/
					if(isset($post_data['image']) && $post_data['image'] != ""){
						$img 				= 	$post_data['image'];
						$img_path 			= 	FCPATH.'/uploads/catalog_event/picture/'.$img;
						$ext 				= 	pathinfo($img_path, PATHINFO_EXTENSION);				
						$pic_name 			= 	$id.time().'.'.$ext;
						$post_data['image'] 	= 	base_url().'uploads/catalog_event/picture/'.$pic_name;
						$img_path_rename 	= 	FCPATH . '/uploads/catalog_event/picture/'.$pic_name;
						rename($img_path, $img_path_rename);
					}
					
					/*Thumbnail Image upload*/
					if(isset($post_data['thumb_img']) && $post_data['thumb_img'] != ""){
						$thumb_img 			= 	$post_data['thumb_img'];
						$thumb_path 		= 	FCPATH . '/uploads/catalog_event/picture/thumbnail/' . $thumb_img;
						$ext 				= 	pathinfo($thumb_path, PATHINFO_EXTENSION);				
						$pic_name 			= 	$id.time().'.'.$ext;
						$post_data['thumb_img'] = 	base_url().'uploads/catalog_event/picture/thumbnail/'.$pic_name;
						$thumb_path_rename 	= 	FCPATH . '/uploads/catalog_event/picture/thumbnail/'.$pic_name;
						rename($thumb_path, $thumb_path_rename);
					}
					
					/************** Serialize and insert the catalog meta **********************/
					//$catalog_meta_data 	= 	serialize($post_data); 
					//$catalog_meta 		= 	array('catalog_event_id'=>$id,'key'=>'catalog_meta', 'value'=>$catalog_meta_data);
					unset($post_data['pdf_file']);
					unset($post_data['type_webinar_first']);
					$this->Common_model->add('catalog_event_meta',$post_data);
					$data['msg'] 			=  	$this->session->set_flashdata('catalogevent_name', 'Catalog updated succcessfully');
					redirect('admin/mastercatalog');
				}
			}
			$this->load->view('admin/master_catalog/add_catalog', $data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function edit_catalog($formdata = NULL) {			
			$id 							= 	$this->uri->segment(4);
			$data['catalog_id']			=	$id;
			if(!is_array($formdata)){
				$data['catalog_event'] 			= 	$this->Event_model->edit_catalog($id);
				$data['catalog_event_meta'] 	= 	$this->Event_model->edit_catalog_meta($id);	
			}
			else{				
				unset($data['catalog_event']);
				unset($data['catalog_event_meta']);
			}
			$data['get_presenter'] 			= 	$this->Event_model->get_presenter();
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');			
			
			$data['timezone'] 				= 	$this->Event_model->get_time_zone();
			$data['get_meeting'] 			= 	$this->Common_model->get('adobe_meeting');
			$data['providers'] 				= 	$this->Provider_model->get_provider_data("3",'id,username');
			$data['category'] 				= 	$this->Common_model->getcategory();
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/master_catalog/edit_catalog', $data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');			
		}
		
		public function updateCatalog(){
			if ($this->input->post()) {
				$this->form_validation->set_rules('catalog_events[title]', 'Title', 'trim|required');
				$this->form_validation->set_rules('catalog_events[start_date]', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[end_date]', 'End Date', 'trim|required');
				$this->form_validation->set_rules('catalog_events[type]', 'Catalog Type', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[short_desc]', 'Short Description', 'trim|required');
				$this->form_validation->set_rules('catalog_event_meta[price]', 'Price', 'trim|required|is_numeric');
				$this->form_validation->set_rules('catalog_event_meta[speaker_events]', 'Speaker of the Event', 'trim|required');
				if ($this->form_validation->run() == FALSE) {					
					$this->edit_catalog($_POST);
				}
				else{
					$id = $this->input->post('id');
					$catalogdata 				= 	$this->Provider_model->get_catalog_by_id($id);	
					//$catalogmeta				=	unserialize($catalogdata['value']);			
					
					$where = "id = ".$id;				
					$this->Common_model->update_event('catalog_events',$where,$this->input->post('catalog_events'));				
					$post_data 				= 	$this->input->post('catalog_event_meta');										
					$post_data['pdf']			=	"";
					$post_data['ondemand_file']			=	"";
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
					if(($catalogdata['image'] != $post_data['image']) && !empty($post_data['image'])){
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
					
					//$catalog_meta_data = serialize($post_data);
					//$catalog_meta = array('catalog_event_id' =>$this->input->post('id'), 'key' => 'catalog_meta', 'value' => $catalog_meta_data);
					$where = "catalog_event_id = ".$this->input->post('id');
					unset($post_data['pdf_file']);
					unset($post_data['type_webinar_first']);
					unset($post_data['ondemand_file']);
					$this->Common_model->update_event_meta('catalog_event_meta', $where , $post_data);
					$data['msg'] = $this->session->set_flashdata('message_status', 'Added catalog successfully');
					redirect("admin/mastercatalog");
				}
			}
		}
		
		
		public function uploader_pdf() {
			if (!empty($_FILES)) {				
				$file_tmp_type 			= 	$_FILES['handout_pdf']['type'][0];
				$file_name 				= 	$_FILES['handout_pdf']['name'][0];
				$file_tmp_name 			= 	$_FILES['handout_pdf']['tmp_name'][0];
				if($file_tmp_type=='application/pdf'){
					$destination_folder 	= 	'uploads/catalog_event/others/';
					if (move_uploaded_file($file_tmp_name, $destination_folder . $file_name)) {
						$json_arr 		= 	array('resonse' => 'success', 'msg'=> '<div class="message" style="color:green">File uploaded successfully....</div>', 'filename' => $file_name);
						echo json_encode($json_arr);
					}
				}
				else{
					$json_arr 			= 	array('resonse' => 'failed', 'msg'=> '<div class="message" style="color:red">Only pdf file can be uploaded....</div>', 'filename' => $file_name);
					echo json_encode($json_arr);
				}
				return false;
			}
		}
		
		public function uploader() {
			if (!empty($_FILES)) {				
				$config["generate_image_file"] 			= 	true;
				$config["generate_thumbnails"] 			= 	true;
				$config["image_max_size"] 			= 	500;
				$config["thumbnail_size"] 				= 	200;
				$config["thumbnail_prefix"] 				= 	"";
				$config["destination_folder"] 			= 	'uploads/catalog_event/picture/';
				$config["thumbnail_destination_folder"] 	= 	'uploads/catalog_event/picture/thumbnail/';
				$config["quality"] 						= 	90;
				$config["random_file_name"] 			= 	true;
				$config["file_data"] 					= 	$_FILES["banner"];
				$this->load->library('uploadresize', $config);
				$responses 							= 	$this->uploadresize->resize();
				$json_arr 							= 	array('img' => $responses['images'][0], 'msg'=>'<div class="message" style="color:green">File uploaded successfully....</div>', 'thumb' => $responses['thumbs'][0]);
				echo json_encode($json_arr);
				return false;
			}
		}
		public function block_catalogevent($id = 0) {			
			if ($id == 0 || $id == null) {
				redirect('admin/blog');
			}
			else {
				$this->Event_model->block_blog($id);
				$flash_message 		= 	'<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Blocked!</strong> User blocked successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/blog');
			}
		}
		
		public function unblock_catalogevent($id = 0) {			
			if ($id == 0 || $id == null) {
				redirect('admin/mastercatalog');
			}
			else {
				$this->Event_model->unblock_blog($id);
				$flash_message 	= 	'<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Active!</strong> User enabled successfully.</div>';
				$this->session->set_flashdata('flash_data', $flash_message);
				redirect('admin/mastercatalog');
			}
		}
		public function delete($id) {
			if ($id == 0) {
				redirect('admin/mastercatalog');				
			}
			else {
				$this->Event_model->delete_catalog($id);
				redirect('admin/mastercatalog');
			}
		}
		
		public function adobe_folder() {
			$this->data['title'] 			= 	'LMS | Adobe Folders';
			$this->data['breadcrumb'] 	= 	'<li><a href="' . base_url() . 'admin/mastercatalog/adobe_folder">Adobe Folder</a></li>';
			$this->data['get_folder'] 	= 	$this->Common_model->get('adobe_folder');
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/master_catalog/adobe-folder',$this->data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function add_folder() {
			if ($this->input->post()) {
				$post_data 				= 	$this->input->post('adobe_folder');				
				$folder_id 				= 	$this->adobe->createFolder($post_data['title'], $post_data['desc'], $post_data['folder_id']);
				if ($folder_id) {
					$post_data['folder_id'] = 	$folder_id;
					$this->Common_model->add('adobe_folder', $post_data);
					$data['msg'] 			= 	$this->session->set_flashdata('message_status', 'Folder created successfully');
				}
			}
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->data['field_data'] 		= 	$this->Provider_model->get_field_data();	
			$this->data['get_folder'] 		= 	$this->Common_model->get('adobe_folder');			
			$this->load->view('admin/master_catalog/add_folder',$this->data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function adobe_meeting() {
			$this->data['title'] = 'LMS | Create Meeting';			
			$this->data['catalog'] = $this->Provider_model->get_catalog(NULL);
			$this->data['get_folder'] = $this->Common_model->get('adobe_folder');
			$this->data['get_meeting'] = $this->Common_model->get('adobe_meeting');
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/master_catalog/adobe-meeting',$this->data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function create_adobe_meeting() {
			$this->data['title'] = 'LMS | Student Dashboard';		
			$this->data['get_folder'] = $this->Common_model->get('adobe_folder');
			$this->load->view('admin/include/subheader');
			$this->load->view('admin/include/superadminsidebar');
			$this->load->view('admin/include/menufooter');
			$this->load->view('admin/include/topnavigation');
			$this->load->view('admin/master_catalog/create-adobe-meeting',$this->data);
			$this->load->view('account/dashboard/public/jquery');
			$this->load->view('admin/include/footer');
		}
		
		public function processMeeting(){
			if ($this->input->post()) {
				$this->form_validation->set_rules('adobe_meeting[title]', 'Title', 'trim|required|is_unique[adobe_meeting.title]');
				$this->form_validation->set_rules('adobe_meeting[url]', 'Url', 'trim|required|is_unique[adobe_meeting.slug]');
				$this->form_validation->set_rules('adobe_meeting[date_begin]', 'Start Date', 'trim|required');
				$this->form_validation->set_rules('adobe_meeting[date_end]', 'End Date', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$this->create_adobe_meeting();
				}
				else{
					$post_data = $this->input->post('adobe_meeting');
					$meeting_id = $this->adobe->createMeeting($post_data['folder_id'], $post_data['title'], $post_data['date_begin'], $post_data['date_end'], $post_data['url'], null);						
					if ($meeting_id) {
						$post_data['meeting_id'] = $meeting_id;
						$post_data['slug'] = $post_data['url'];
						$post_data['url'] = $this->adobe->getHost() . $post_data['url'];						
						$this->Common_model->add('adobe_meeting', $post_data);
						$data['msg'] = $this->session->set_flashdata('message_status', 'Meeting created successfully');
						redirect('admin/mastercatalog/adobe-meeting');
					}
				}
			}
			else{
				redirect("admin/mastercatalog/create_adobe_meeting");
			}
		}
	}
?>