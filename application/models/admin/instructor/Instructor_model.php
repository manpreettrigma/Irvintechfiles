<?php

class Instructor_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_instructorlist($id=NULL) {
        
        
        $this->db->select(['instructors.id',  'instructors.user_id', 'users.username', 'instructors.instructor_name', 'instructors.instructor_desg', 'instructors.description', 'instructors.image', 'instructors.status', 'instructors.created_at']);
        $this->db->from('instructors');
        $this->db->join('users', 'users.id = instructors.user_id', 'left');

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
	    public function add_instructor($data) {
        
        return $this->db->insert('instructors', $data);
    }
    public function edit_instructor($id) {
        return $this->db->get_where('instructors', array('id =' => $id))->row();
    }
	    public function update_instructor($records,$id) {
			
        $this->db->where('id',$id)->update('instructors', $records);
        return true;
    }
	    public function delete_instructor($id){
        $this->db->where('id', $id)->from('instructors')->delete();
        return true;
    }
    public function block_instructor($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('instructors');
        return true;
    }
	
    public function unblock_instructor($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('instructors');
        return true;
    }
    public function user_id() {
        $this->db->select('id');
        $this->db->from('users');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
    }
    public function get_instructor($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('instructors');
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
	public function getsubjects(){
		$this->db->where("status","1");
		$query = $this->db->from("subjects")->get();
		return $query->result_array();
	}
	public function edit_subject($id) {
			return $this->db->get_where('instructors', array('id=' => $id))->row_array();
		}	
	
	public function getdegree(){
		$this->db->where("status","1");
		$query = $this->db->from("degree")->get();
		return $query->result_array();
	}
    public function get_total_record($table) {
        $table_row_count = $this->db->count_all($table);
        return $table_row_count;
    }
     public function update_image($id) {
		
        $data = array('image' =>'');
        $this->db->where('id',$id)->update('instructors', $data);
        return true;
    }
	 public function get_instructor_listing() {
			$this->db->select('*');
			$this->db->from('instructors');
			$this->db->order_by("id","desc");
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
}