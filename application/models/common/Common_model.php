<?php
	
	class Common_model extends CI_Model {
		
		
		public function add($table,$data) {
			$this->db->insert($table, $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
				
		public function update_info($table, $where, $data) {
			$this->db->where($where)->update($table, $data);			
			return true;
		}
		
		public function delete($table,$where){
			$this->db->where($where);
			$this->db->from($table)->delete();
			return true;
		}
		
		public function get($table) {
			$query = $this->db->get($table);
			if ($query->num_rows()) {
				return $query->result_array();
			} else {
				return array();
			}
		}
		
		public function update_event($table, $where, $data) {
			$this->db->where($where)->update($table, $data);				
			return true;
		}
		
		public function update_event_meta($table, $where, $data) {
			$this->db->where($where)->update($table, $data);					
			return true;
		}
		
		public function getcategory(){
			$this->db->where("status","1");
			$query = $this->db->from("credit_categories")->get();
			return $query->result_array();
		}
		// EDITED for academy
		public function getsubjects(){
			$this->db->where("status","1");
			$query = $this->db->from("subjects")->get();
			return $query->result_array();
		}
		
		public function getmeeting($id){
			$this->db->where("user_id",$id);
			$query = $this->db->from("adobe_meeting")->get();
			return $query->result_array();
		}
		
		public function getwebinar($userid = NULL){
			if($userid != NULL){
				$this->db->where("user_id",$userid);
			}
			$this->db->where("visible_status",'1');
			$query = $this->db->from("catalog_events as events")->join("catalog_event_meta as meta","events.id = meta.catalog_event_id")->get();
			return $query->result_array();
		}
		
		public function getwebinarbyid($id){
			$this->db->where("events.id",$id);
			$this->db->where("visible_status",'1');
			$query = $this->db->from("catalog_events as events")->join("catalog_event_meta as meta","events.id = meta.catalog_event_id")->get();
			return $query->row_array();
		}
		
		public function getProviders(){			
			$this->db->where("status",'1');
			$this->db->where("user_role",'3');
			$query = $this->db->from("users")->get();
			return $query->result_array();
		}
		
		public function getPresenters(){			
			$this->db->where("status",'1');
			$this->db->where("user_role",'2');
			$query = $this->db->from("users")->get();
			return $query->result_array();
		}
		
		public function getCredit(){			
			$this->db->where("status",'1');			
			$query = $this->db->from("credit_categories")->get();
			return $query->result_array();
		}
		
		public function filterWebinars($data){
			if(isset($data['provider']) && !empty($data['provider'])){
				$this->db->where("speaker_events",$data['provider']);
			}
			if(isset($data['credit']) && !empty($data['credit'])){
				$this->db->where("credit_events",$data['credit']);
			}
			$this->db->from("catalog_event_meta as meta");
			$this->db->join("catalog_events as events","events.id = meta.catalog_event_id");
			$query 	=	$this->db->get();			
			return $query->result_array();
		}
	}
?>