<?php

class Admin_manage_model extends CI_Model {
    
    public function get_total_record($table){
        $table_row_count = $this->db->count_all($table);
        return $table_row_count;
    }

    public function get_adminlist($limit, $offset, $search) {

        $this->db->select('*');
        $this->db->from('admin');
        if(!empty($search)){
            $this->db->or_like(array('firstname' =>  $search, 'email' => $search));
            
        }
        
        $this->db->order_by('admin_id', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get(); 
        //echo $this->db->last_query();
        if ($query->num_rows()) {
            return $query->result_array();
        } else {
            return array();
        }
        
    }

    public function create_admin($data) {
        $this->db->insert('admin', $data);
        return true;
    }

}
