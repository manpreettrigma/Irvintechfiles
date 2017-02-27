<?php

class Page_manage_model extends CI_Model {

    
    public function add_page($data) {
        
        return $this->db->insert('pages', $data);
    }
    public function add_SettingsPage($data) {
        
        return $this->db->insert('settings', $data);
    }
	public function add_provider($data) {

    $this->db->insert('manage_fields', $data);
    $insert_id = $this->db->insert_id();
      return  $insert_id;
	}
    public function add_manage_field_meta($table,$user_data) {
        
        $this->db->insert($table,$user_data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    public function edit_page($id) {
        return $this->db->get_where('pages', array('id =' => $id))->row();
    }
	
	

    public function update_page($title, $slug, $sidebar,$headline, $description, $id,$imagename,$banerimagename) {
   // public function update_page($title, $slug, $sidebar,$headline, $description, $id,$imagename) {
        $data = array('title' => $title,'slug' => $slug, 'sidebar' => $sidebar,'Headline' =>$headline, 'description' => $description,'image'=>$imagename,'banner_image'=>$banerimagename);
        //$data = array('title' => $title,'slug' => $slug, 'sidebar' => $sidebar,'Headline' =>$headline, 'description' => $description,'image'=>$imagename);
        $this->db->where('id',$id)->update('pages', $data);
        return true;
    }
    public function update_admin_profile($id,$first_name,$last_name,$password,$image,$email) {
        $data = array('firstname' => $first_name,'lastname' => $last_name, 'email' => $email,'password' =>$password, 'image' => $image);
        $this->db->where('admin_id',$id)->update('admin', $data);
        return true;
    }
    public function delete_page($id){
        $this->db->where('id', $id)->from('pages')->delete();
        return true;
    }
    public function update_image($id) {
		echo $id; die();
        $data = array('image' =>'');
        $this->db->where('id',$id)->update('pages', $data);
        return true;
    }
	    public function update_bannerimage($id) {
		
        $data = array('banner_image' =>'');
        $this->db->where('id',$id)->update('pages', $data);
        return true;
    }
    public function get_total_record($table) {
        $table_row_count = $this->db->count_all($table);
        return $table_row_count;
    }
    public function get_total_Providerrecord($table) {
        $table_row_count = $this->db->count_all($table);
        return $table_row_count;
    }
    public function get_pages($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('pages');
        if (!empty($search)) {
            $this->db->or_like(array('title' => $search, 'description' => $search));
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    public function get_provider($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('manage_fields');
        if (!empty($search)) {
            $this->db->or_like(array('key' => $search, 'value' => $search));
        }
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return array();
        }
    }
		public function get_settings_id(){
			$this->db->select("*");
			$this->db->from('settings');
			$query = $this->db->get();
            $result = $query->row();
			return $result;
	}
	public function update_records($id,$data){

	  
	    $this->db->where(array('id'=>$id))->update('settings',$data);
	
		return true;
	}
			public function get_admin_details(){
			$this->db->select("*");
			$this->db->from('admin');
			$query = $this->db->get();
            $result = $query->row();
			return $result;
	}
	
		public function get_navbaritems() {
		$this->db->select('*');
		$this->db->from('navbaritems');
		//$this->db->order_by("id","desc");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
			
	 }
	 
}
