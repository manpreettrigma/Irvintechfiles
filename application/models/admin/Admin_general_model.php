<?php
class Admin_general_model extends CI_Model{
	public function __construct(){
		
	}
	public function total_rows($table){
		$que = $this->db->get($table);
		return $que->num_rows();
	}
	public function total_rows_selling(){
		return $this->db->where('listing_type',1)
		->where('in_stock',1)
		->get('products')
		->num_rows();
	}
	public function get_unverified_users(){
		return  $this->db->where('status',0)->get('users')->num_rows();
	}
	public function admin_password_requests(){
		return $this->db->select('*')->from('admin_password_reset')->join('admin','admin.admin_id=admin_password_reset.admin_id')->get()->result_array();
	}
	public function get_user($id){
		$que = $this->db->get_where('admin','admin_id='.$id);
		if($que->num_rows()>=1){
			return $que->result_array();
		}else{
			return false;
		}
	}
		public function verify_password_request($user){
		$que = $this->db->get_where('admin_password_reset','admin_id='.$user);
		
		if($que->num_rows()>=1){
			return true;
		}else{
			return false;
		}
	}
	public function save_new_password($data,$id){
		$this->db->where('admin_id',$id)->update('admin',$data);
		return true;
	}
	public function delete_request($id){
		$this->db->where('admin_id',$id)->from('admin_password_reset')->delete();
			return true;
	}
	

}