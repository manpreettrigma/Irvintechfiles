<?php
	
	class Account_manage_model extends CI_Model {
		
		public function add($table, $data) {
			
			$this->db->insert($table, $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		
		function getdata($username, $password) {
			$this->db->select(['users.id', 'users.auth_id', 'users.username', 'users.email', 'users.status', 'user_role.role', 'users.created']);
			$this->db->from('users');
			$this->db->where("users.username", $username);
			$this->db->where("users.password", $password);
			$this->db->join('user_role', 'user_role.id = users.user_role', 'left');
			$queryUser 		= 	$this->db->get();			
			if ($queryUser->num_rows() > 0) {
				$resultUser 	= 	$queryUser->row_array();
				$user_id 	= 	$resultUser['id'];
				$this->db->select(['user_info.user_key', 'user_info.user_value']);
				$this->db->from('user_info');
				$this->db->where("user_info.user_id", $user_id);
				$queryUserInfo = $this->db->get();
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
		
		public function get_dashboard_id($id) {
			$this->db->select("*");
			$this->db->from('users');
			$this->db->where("id", $id);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		public function get_field_id() {
			$this->db->select("role_type,id");
			$this->db->from('manage_fields');
			$query = $this->db->get();
			$result = $query->row();
			//echo '<pre>';print_r($result);die;
			return $result;
		}
		
		public function get_profile_data($id) {
			$sql = "SELECT users.*,user_info.* from  users  inner join user_info  on users.id=user_info.user_id where users.id=$id ";
			// echo '<pre>';print_r($query);die;
			$query = $this->db->query($sql);
			$result = $query->result_array();
			// echo '<pre>';print_r($result);
			$array = array();
			$array1 = array(
			'id' => $result[0]['id'],
			'username' => $result[0]['username'],
			'email' => $result[0]['email'],
			'password' => $result[0]['password'],
			);
			
			foreach ($result as $key => $row) {
				// this I want to construct associative array
				$array[$row['user_key']] = $row['user_value'];
			}
			$array_result = array_merge($array, $array1);
			return $array_result;
		}
		
		public function update_users($id, $users_profile) {
			$this->db->where('id', $id)->update('users', $users_profile);
			return true;
		}
		
		public function update_facebook_users($email, $userData) {
			$this->db->where('email', $email)->update('users', $userData);
			return true;
		}
		
		public function add_user_info($data) {
			return $this->db->insert('user_info', $data);
		}
		
		public function update_users_info($id, $metaArr) {
			foreach ($metaArr as $key => $value) {
				$data = array(
				'user_value' => $value
				);
				
				$this->db->where(array('user_id' => $id, 'user_key' => $key))->update('user_info', $data);
			}
			return true;
		}
		
		public function update_password($id, $password) {
			$data = array(
			'password' => $password
			);
			$this->db->where('id', $id)->update('users', $data);
			return true;
		}
		
		public function add_image($data) {
			return $this->db->insert('user_info', $data);
		}
		
		public function get_image($id) {
			$this->db->select("*");
			$this->db->from('user_info');
			$this->db->where(array('user_id' => $id, 'user_key' => 'image'));
			$query = $this->db->get();
			$result = $query->row();
			return $result;
		}
		
		public function update_image($userinfo_id, $user_data) {
			
			
			$this->db->where(array('id' => $userinfo_id, 'user_key' => 'image'))->update('user_info', $user_data);
			
			return true;
		}
		
		public function get_provider() {
			$this->db->select('*');
			$this->db->from('manage_fields');
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get();
			//echo $this->db->last_query();
			if ($query->num_rows()) {
				return $query->result_array();
				} else {
				return array();
			}
		}
		
		public function get_provider_data($role_type) {
			$sql = "SELECT manage_fields.*,manage_field_meta.* from  manage_fields  inner join manage_field_meta  on manage_fields.id=manage_field_meta.field_id where manage_fields.role_type='$role_type' ";
			
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$field_array = array();
			$data_field = array();
			foreach ($result as $keyLabel => $provider) {
				
				// $field_array[$provider['key']] = $provider['value']; 
				// echo "<pre>";print_r($provider) ;
				
				if ($provider['field'] == 'text') {
					
					foreach ($provider as $key => $providers) {
						
						// echo "<pre>";print_r($key) ;
						// echo "<pre>";print_r($providers) ;
						// echo "<pre>";print_r($providers) ;
						/*  $i=0;
							foreach($provider as $key=> $provider_form_data)
							{
							echo "<pre>";print_r($provider) ;
							$data_field[$provider['id']]['text'][0]['field-label'.$i] = $field_array['field_lable'];
							$data_field[$provider['id']]['text'][0]['field-name'.$i] = $field_array['field_name'];
							$data_field[$provider['id']]['text'][0]['field-placeholder'.$i] = $field_array['field_placeholder'];
							
							
							$i++;
						} */
					}
				}
			}
			
			return $data_field;
		}
		
		public function get_users($email) {
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where("email", $email);
			$query = $this->db->get();
			$rowcount = $query->row();
			return $rowcount;
		}
		
	}
