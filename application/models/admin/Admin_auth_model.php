<?php 
 class Admin_auth_model extends CI_Model{
	public function __construct(){
		
	}
	public function validate_admin($username,$password){
		$this->db->select('*')
		->where('password',$password)
		->where('username',$username)
		->or_where('email',$username)
		
		->from('admin');
		
		$que = $this->db->get();
		
		 $num= $que->num_rows();
	        if($num>=1)
	        {
		      return $que->result_array();
	        }
			else{
				return false;
	         }
	}
	public function get_user($user){
		$que = $this->db->or_where('username',$user)->or_where('email',$user)->from('admin')->get();
		if($que->num_rows()==1){
			return $que->result_array();
		}else{
			return false;
		}
	}
	public function verify_password_request($user){
		$que = $this->db->get_where('admin_password_reset','admin_id='.$user);
		
		if($que->num_rows()>=1){
			return false;
		}else{
			return true;
		}
	}
	public function request_password($user){
		$data = array('admin_id'=>$user);
		$this->db->insert('admin_password_reset',$data);
		return true;
	}
   }
?>
