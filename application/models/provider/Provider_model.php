<?php
	
	class Provider_model extends CI_Model {
		
		
		public function get_field_data() {
			$this->db->select("id, username");
			$this->db->from('users');
			$this->db->where(array('status' => 1, 'user_role' => 2));
			$query = $this->db->get();
			if ($query->num_rows()) {
				return $query->result_array();
				} else {
				return array();
			}    
		}
		
		function get_catalog($id=NULL) {
			$CI = get_instance();
			$CI->db->select('*');
			$this->db->where("catalog_events.visible_status",1);
			$this->db->select(['catalog_events.id', 'catalog_events.user_id', 'catalog_events.type', 'catalog_events.status', 'catalog_events.visible_status', 'catalog_events.timezone', 'catalog_events.start_date', 'catalog_events.end_date','catalog_events.created_at','catalog_event_meta.*']);
			$CI->db->from('catalog_events');
			if($id != NULL){
				$this->db->where("catalog_events.id",$id);
			}			
			$CI->db->join('catalog_event_meta', 'catalog_event_meta.catalog_event_id = catalog_events.id', 'left');
			$query = $CI->db->get();
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				return $result;
			}
			else {
				return false;
			}
		}
		
		function get_catalog_by_id($id){
			$this->db->where('catalog_events.id',$id);
			$this->db->join('catalog_event_meta', 'catalog_event_meta.catalog_event_id = catalog_events.id', 'left');
			$query = $this->db->from('catalog_events')->get();			
			return $query->row_array();
		}
		
		function get_time_zone(){
			$query = $this->db->from('timezone')->get();
			return $query->result_array();
		}
		
		public function get_provider_data($user_role,$fields) {
			$this->db->select($fields);
			$this->db->from('users');
			$this->db->where('status' , 1);
			$this->db->where('user_role' , $user_role);
			$query = $this->db->get();					
			return $query->result_array();			   
		}
	}
