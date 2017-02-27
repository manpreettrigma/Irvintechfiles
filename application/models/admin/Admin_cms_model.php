<?php 
	class Admin_cms_model extends CI_Model{
		public function get_pages_list(){
			return $this->db->get('pages')->result_array();
		}
		public function new_page($data){
			$this->db->insert('pages',$data);
			return true;
		}
		public function delete_page($id){
			$this->db->where('id',$id)->from('pages')->delete();
			return true;
		}
		public function get_page($id){
			return $this->db->get_where('pages','id='.$id)->result_array();
		}
		public function update_page($data,$id){
			$this->db->where('id',$id)->update('pages',$data);
		}
		public function get_partnerlist(){
			return $this->db->get('partners')->result_array();
		}
		public function add_partner($name,$filename){
			$data = array('name'=>$name,
			'image'=>$filename);
			$this->db->insert('partners',$data);
			return true;
		}
		public function get_partner($id){
			return $this->db->get_where('partners','id='.$id)->result_array();
		}
		public function delete_partner($id){
			$this->db->where('id',$id)->from('partners')->delete();
			return true;
		}
		public function update_partner($id,$data){
			
			$this->db->where('id',$id)->update('partners',$data);
			return true;
		}
		
		public function get_homepage_slides(){
			return $this->db->get('homepage_slider')->result_array();
		}
		public function get_slide_count(){
			return $this->db->get('homepage_slider')->num_rows();
		}
		public function get_homepage_slide($id){
			return $this->db->get_where('homepage_slider','id='.$id)->result_array();
		}
		public function update_slide($id,$data){
			
			$this->db->where('id',$id)->update('homepage_slider',$data);
			return true;
		}
		public function add_slide($data){
			$this->db->insert('homepage_slider',$data);
			return true;
		}
		public function delete_slide($id){
			$this->db->where('id',$id)->from('homepage_slider')->delete();
			return true;
		}
		public function get_social_list(){
			return $this->db->get('social_icons')->result_array();
		}
		public function save_social_network($data){
			$this->db->insert('social_icons',$data);
			return true;
		}
		public function get_social_network($id){
			return $this->db->get_where('social_icons','id='.$id)->result_array();
		}
		public function update_social_network($id,$data){
			$this->db->where('id',$id)->update('social_icons',$data);
			return true;
		}
		public function delete_social_network($id){
			$this->db->where('id',$id)->from('social_icons')->delete();
			return true;
		}
		public function get_ladress_feature($id){
			return $this->db->get_where('ladress_features_images','id='.$id)->result_array();
		}
		public function update_ladress_feature($id,$data){
			$this->db->where('id',$id)->update('ladress_features_images',$data);
			return true;
		}
		public function get_ladress_features(){
			return $this->db->get('ladress_features_images')->result_array();
		}
		
		
		
	}