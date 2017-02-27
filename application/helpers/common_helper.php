<?php
	function randomPassword($length) {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array();
		$alphaLength = strlen($alphabet) - 1; 
		for ($i = 0; $i < $length; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}
	
	function check_login() {
		$CI = get_instance();
		$currentClass = $CI->router->fetch_class();
		if ($currentClass == 'Account' || $currentClass == 'account' || $currentClass == 'provider' || $currentClass == 'presenter' || $currentClass == 'student'):
		if (empty($CI->session->userdata['user_info'])):
		redirect(base_url() . 'account/login', 'refresh');
		endif;
		endif;
	}
	
	function get_roll($id) {
		$CI = get_instance();
		$query = $CI->db->query("SELECT role from user_role left join users on user_role.id = users.user_role WHERE users.id = '$id'");
		$row = $query->row();
		if ($row) {
			return $row->role;
			} else {
			return false;
		}
	}
	
	function get_payment_status($user_id) {
		$CI = get_instance();
		$CI->db->select('*');
		$CI->db->from('payments');
		$CI->db->where(array('user_id' => $user_id, 'status'=> 'Completed'));
		$query = $CI->db->get();
		if ($query->num_rows()) {
			return $query->row();
			} else {
			return array();
		}
	}
	
	function sentence($string) {
		$finalText = str_replace('_', ' ', $string);
		return ucwords($finalText);
	}
	
	function get_settings() {
		$CI = get_instance();
		$query = $CI->db->query("SELECT * from settings");
		$row = $query->row();
		if ($row) {
			return $row;
			} else {
			return false;
		}
	}
	
	function get_user_data($id) {
		$CI = get_instance();
		$CI->db->select(['users.id', 'users.auth_id', 'users.username', 'users.email', 'users.status', 'user_role.role', 'users.created']);
		$CI->db->from('users');
		$CI->db->where("users.id", $id);
		$CI->db->join('user_role', 'user_role.id = users.user_role', 'left');
		$queryUser = $CI->db->get();
		if ($queryUser->num_rows() > 0) {
			$resultUser = $queryUser->row_array();
			$user_id = $resultUser['id'];
			$CI->db->select(['user_info.user_key', 'user_info.user_value']);
			$CI->db->from('user_info');
			$CI->db->where("user_info.user_id", $user_id);
			$queryUserInfo = $CI->db->get();
			$resultUserInfo = $queryUserInfo->result_array();
			$metaArr = array();
			if (!empty($resultUserInfo)) {
				foreach ($resultUserInfo as $key => $value) {
					$metaArr[$value['user_key']] = $value['user_value'];
				}
			}
			$resultUser['meta_info'] = $metaArr;
			return $resultUser;
			} else {
			return false;
		}
	}
	
	function upload_files($input_name, $path, $type, $filename = NULL, $overwrite = NULL, $width = NULL, $height = NULL, $size = NULL) {
		$CI = get_instance();
		$config['upload_path'] = $path;
		$config['allowed_types'] = $type;
		$config['max_width'] = $width;
		$config['max_height'] = $height;
		$config['max_size'] = $size;
		$config['encrypt_name'] = false;
		$config['overwrite'] = $overwrite;
		$config['file_name'] = $filename;
		
		$CI->upload->initialize($config);
		$CI->load->library('upload', $config);
		if ($CI->upload->do_upload($input_name)) {
			$response = $CI->upload->data();
			} else {
			$response = $CI->upload->display_errors();
		}
		return $response;
	}
	
	function facebook_login($appId, $appSecret, $redirectUrl, $fbPermissions) {
		$CI = get_instance();
		$appId = $appId;
		$appSecret = $appSecret;
		$redirectUrl = $redirectUrl;
		$fbPermissions = $fbPermissions;
		$facebook = new Facebook(array(
		'appId' => $appId,
		'secret' => $appSecret
		));
		return $facebook;
	}
	
	function get_user_status($id){
		$CI = get_instance();
		$query = $CI->db->from('payments')->where("user_id",$id)->get();
		$result = $query->row_array();
		return $result['status'];
	}
	
	function getCreditCategory($id){
		$CI = get_instance();
		$query = $CI->db->from('credit_categories')->where("id",$id)->get();
		$result = $query->row_array();
		return $result['title'];
	}

	function getTimezone($id){
		$CI = get_instance();
		$query = $CI->db->from('timezone')->where("value",$id)->get();
		$result = $query->row_array();
		return $result['name'];
	}
	
	function getSpeaker($id,$role){
		$CI = get_instance();
		$query = $CI->db->from('users')->where("id",$id)->where("user_role",$role)->get();
		$result = $query->row_array();
		return $result['username'];
	}