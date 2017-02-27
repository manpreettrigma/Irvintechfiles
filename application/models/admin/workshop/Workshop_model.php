<?php

class Workshop_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_workshoplist($id=NULL) {
        
        
        $this->db->select(['workshops.id', 'workshops.user_id', 'users.username', 'workshops.title', 'workshops.description', 'workshops.price', 'workshops.status', 'workshops.created_at']);
        $this->db->from('workshops');
        $this->db->join('users', 'users.id = workshops.user_id', 'left');

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
	
	public function getinstructors(){
		$this->db->where("status","1");
		$query = $this->db->from("instructors")->get();
		return $query->result_array();
	}
	
	    public function add_workshop($data) {
        
        return $this->db->insert('workshops', $data);
    }
    public function edit_workshop($id) {
        return $this->db->get_where('workshops', array('id =' => $id))->row();
    }
	public function edit_instructor($id) {
			return $this->db->get_where('workshops', array('id=' => $id))->row_array();
		}	
	
	 public function getworkshop($id) {
        return $this->db->get_where('workshops', array('id =' => $id))->row();
    }
	
	public function getRows($id = ''){
		$this->db->select('id,name,image,price');
		$this->db->from('courses');
		if($id){
			$this->db->where('id',$id);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('name','asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		return !empty($result)?$result:false;
	}
	//insert transaction data
	public function insertTransaction($data = array()){
		$insert = $this->db->insert('payments',$data);
		return $insert?true:false;
	}
	    public function update_workshop($records,$id) {
			
        $this->db->where('id',$id)->update('workshops', $records);
        return true;
    }
	    public function delete_workshop($id){
        $this->db->where('id', $id)->from('workshops')->delete();
        return true;
    }
    public function block_workshop($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('workshops');
        return true;
    }
	
    public function unblock_workshop($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('workshops');
        return true;
    }
    public function user_id() {
        $this->db->select('id');
        $this->db->from('users');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
    }
    public function get_workshop($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('workshops');
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
			return $this->db->get_where('workshops', array('id=' => $id))->row_array();
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
        $this->db->where('id',$id)->update('workshops', $data);
        return true;
    }
	 public function get_workshop_listing() {
			$this->db->select('*');
			$this->db->from('workshops');
			$this->db->order_by("id","desc");
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
}