<?php
	
	class Event_model extends CI_Model {
		
		public function __construct() {
			
		}
		public function get_presenter() {
			
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_role','2');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		public function get_catalogEventList($id=NULL) {
			$this->db->select(['catalog_events.id', 'catalog_events.user_id', 'catalog_events.title', 'catalog_events.type', 'catalog_events.status', 'catalog_events.visible_status', 'catalog_events.timezone', 'catalog_events.start_date','catalog_events.end_date','catalog_events.created_at','meta.*','meta.id as meta_id']);
			$this->db->from('catalog_events');
			$this->db->order_by("catalog_events.id","desc");
			$this->db->join('catalog_event_meta as meta', 'catalog_events.id = meta.catalog_event_id', 'left');
			
			if(!empty($id)){
				$this->db->where('users.id', $id);
			}
			$queryUser = $this->db->get();
			return $queryUser->result_array();
			/* if ($queryUser->num_rows() > 0) {
				$result_catalogevents = $queryUser->result_array();
				$dataArr = array();
				foreach ($result_catalogevents as $info) {
					$id = $info['id'];
					$this->db->select(['catalog_events_meta.key', 'catalog_events_meta.value']);
					$this->db->from('catalog_events_meta');
					$this->db->where("catalog_events_meta.catalog_event_id", $id);
					$queryUserInfo = $this->db->get();
					$resultUserInfo = $queryUserInfo->result_array();
					$metaArr = array();
					if (!empty($resultUserInfo)) {
						$metaArr['catalog_event_id'] = $id;
						foreach ($resultUserInfo as $key => $value) {
							$metaArr[$value['key']] = $value['value'];
						}
					}
					$info['meta_info'] = $metaArr;
					$dataArr[] = $info;
				}
				return $dataArr;
			}else{
				return false;
			} */
		}
		public function block_blog($id) {
			$this->db->where('id', $id)
			->set('status', 0)
			->update('catalog_events');
			return true;
		}
		
		public function unblock_blog($id) {
			$this->db->where('id', $id)
			->set('status', 1)
			->update('catalog_events');
			return true;
		}
		public function delete_catalog($id){
			$this->db->where('id', $id)->from('catalog_events')->delete();
			return true;
		}
		public function edit_catalog($id) {
			return $this->db->get_where('catalog_events', array('id =' => $id))->row();
		}
		public function edit_catalog_meta($id) {
			return $this->db->get_where('catalog_event_meta', array('catalog_event_id	 =' => $id))->row_array();
		}
		
		public function get_time_zone(){
			$query = $this->db->from('timezone')->get();
			return $query->result_array();
		}
		
	}	