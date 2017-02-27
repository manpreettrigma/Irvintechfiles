<?php

class Page_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_pages($slug) {
        return $this->db->get_where('pages', array('slug =' => $slug))->row();
    }

    public function getRows($id) {
        $this->db->select('id,title,price,course_code');
        $this->db->from('courses');
        $this->db->where(array('id' => $id, 'status'=> 1));
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->row();
        } else {
            return array();
        }
    }

}
