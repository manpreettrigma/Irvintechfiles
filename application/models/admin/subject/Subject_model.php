<?php

class Subject_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_subjectlist($id=NULL) {
        
        
        $this->db->select(['subjects.id',  'subjects.user_id', 'users.username', 'subjects.title', 'subjects.description', 'subjects.status', 'subjects.created_at']);
        $this->db->from('subjects');
        $this->db->join('users', 'users.id = subjects.user_id', 'left');

        if(!empty($id)){
            $this->db->where('users.id', $id);
        }
        $queryUser = $this->db->get();
        if ($queryUser->num_rows() > 0) {
            $resultUser = $queryUser->result_array();
            $dataArr = array();
            foreach ($resultUser as $info) {
                $user_id = $info['user_id'];
                $this->db->select(['user_info.user_key', 'user_info.user_value']);
                $this->db->from('user_info');
                $this->db->where("user_info.user_id", $user_id);
                $queryUserInfo = $this->db->get();
                $resultUserInfo = $queryUserInfo->result_array();
                $metaArr = array();
                if (!empty($resultUserInfo)) {
                    $metaArr['user_id'] = $user_id;
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
	    public function add_subject($data) {
     //   echo "<pre>"; print_r($data); exit;
        return $this->db->insert('subjects', $data);
    }
    public function edit_subject($id) {
        return $this->db->get_where('subjects', array('id =' => $id))->row();
    }
	    public function update_subject($records,$id) {
			
        $this->db->where('id',$id)->update('subjects', $records);
        return true;
    }
	    public function delete_subject($id){
        $this->db->where('id', $id)->from('subjects')->delete();
        return true;
    }
    public function block_subject($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('subjects');
        return true;
    }
	
    public function unblock_subject($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('subjects');
        return true;
    }
    public function user_id() {
        $this->db->select('id');
        $this->db->from('users');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
    }
    public function get_subjects($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('subjects');
        if (!empty($search)) {
            $this->db->or_like(array('title' => $search, 'description' => $search,'author'=>$search));
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
    public function get_total_record($table) {
        $table_row_count = $this->db->count_all($table);
        return $table_row_count;
    }
     public function update_image($id) {
		
        $data = array('image' =>'');
        $this->db->where('id',$id)->update('subjects', $data);
        return true;
    }
	 public function get_subject_listing() {
			$this->db->select('*');
			$this->db->from('subjects');
			$this->db->order_by("id","desc");
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
}