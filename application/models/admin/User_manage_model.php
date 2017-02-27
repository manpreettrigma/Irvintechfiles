<?php

class User_manage_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_userlist($id=NULL) {
        
        
        $this->db->select(['users.id', 'users.username', 'users.email', 'users.status', 'user_role.role',  'users.created']);
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id = users.user_role', 'left');
        if(!empty($id)){
            $this->db->where('users.id', $id);
        }
        $queryUser = $this->db->get();
        if ($queryUser->num_rows() > 0) {
            $resultUser = $queryUser->result_array();
            $dataArr = array();
            foreach ($resultUser as $info) {
                $user_id = $info['id'];
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
                $info['meta_info'] = $metaArr;
                $dataArr[] = $info;
            }
            return $dataArr;
        }else{
            return false;
        }
    }
    
    public function update_user($data, $id) {
        $this->db->where('id', $id)->update('users', $data);
        return true;
    }
    
    public function update_user_info($data, $where) {
        $this->db->where($where)->update('user_info', $data);
        return true;
    }
    
    

    public function block_user($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('users');
        return true;
    }

    public function unblock_user($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('users');
        return true;
    }

    public function get_user_info($id) {
        return $this->db->get_where('users', 'id=' . $id)->result_array();
    }
    
    public function remove_user($id) {
        $this->db->where('id', $id)->from('users')->delete();
        return true;
    }

    public function get_admin_info($id) {
        return $this->db->get_where('admin', 'admin_id=' . $id)->result_array();
    }

    public function get_user_listings($id) {
        return $this->db->select('*')->where('seller_id', $id)->where('in_stock', 1)->from('products')->get()->result_array();
    }

    public function remove_admin($id) {
        $this->db->where('admin_id', $id)->from('admin')->delete();
        return true;
    }

    public function view_admin($id) {
        return $this->db->get_where('admin', 'admin_id=' . $id)->result_array();
    }

   

   

}
