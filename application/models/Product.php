<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model{
    //get and return product rows
    public function getRows($type){
        $this->db->select('id,name,provider_type,price');
        $this->db->from('providers_levels');
      
            $this->db->where('provider_type',$type);
            $query = $this->db->get();
            $result = $query->row_array();
         
        return $result;
    }
    //insert transaction data
    public function insertTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
}