<?php 
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->has_userdata('c718b175bc162f27f740fbfa91a3f090')){
			redirect('admin');
		}else{
			$this->load->model('admin/Admin_general_model');
		}
	}
	public function index(){
		$admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;		
		$this->load->view('admin/include/subheader');
		if($admin_level==1){
			$this->load->view('admin/include/superadminsidebar');
		}else{
			$this->load->view('admin/include/adminsidebar');
		}
		$users_table='users';
		$this->data['password_change_admin']= $this->Admin_general_model->admin_password_requests();
		$this->data['unverified_users']=$this->Admin_general_model->get_unverified_users();
		$this->data['total_users'] = $this->Admin_general_model->total_rows($users_table);
		$this->load->view('admin/include/menufooter');
		$this->load->view('admin/include/topnavigation');
		$this->load->view('admin/dashboard/main_page',$this->data);
		$this->load->view('admin/include/footer');
	}
        
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function change_password($id=0){
		$admin_level = $this->session->DBFB02C48B52C44881B6F43007240A9C;		
		if($admin_level==1){
		if($id==0){
			redirect('admin');
			echo "hehe";
		}else{
			$user = $this->Admin_general_model->get_user($id);
			if(!$user){
				echo"user ee hainee";
				redirect('admin');
		}else{
			$verify = $this->Admin_general_model->verify_password_request($id);
			if($verify){
				 $this->load->helper('string');
				 $config['mailtype'] = "html";
				 $this->email->initialize($config);	
				 $new_password = random_string('alnum', 12);
				 $password = md5($new_password);
				 $data = array('password'=>$password);
				 $this->Admin_general_model->save_new_password($data,$id);
				 $this->load->library('email');
				 $this->email->from('prabhjot.singh@trigma.in', 'Admin Ladress');
				 $this->email->to($user['0']['email']);
				 $this->email->subject('Password Reset Request Accepted');
				 $this->email->message('Password reset request accepted</br>Your new password is '.$new_password."</br>Please do change your password after using this system generated password.");
				 $this->email->send(); 
				 $this->Admin_general_model->delete_request($id);
				 redirect('admin');
			}else{
				redirect('admin');
			}
		}
			
		}}else{
			redirect('admin');
		}
	}
	
	
}