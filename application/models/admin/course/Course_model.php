<?php

class Course_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_courselist($id=NULL) {
        
        
        $this->db->select(['courses.id',  'courses.user_id', 'users.username', 'courses.title', 'courses.description', 'courses.price', 'courses.subject', 'courses.degree', 'courses.status', 'courses.created_at']);
        $this->db->from('courses');
        $this->db->join('users', 'users.id = courses.user_id', 'left');

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
	    public function add_course($data) {
        
        return $this->db->insert('courses', $data);
    }
    public function edit_course($id) {
        return $this->db->get_where('courses', array('id =' => $id))->row();
    }
	
	public function getcourse($id) {
        return $this->db->get_where('courses', array('id =' => $id))->row();
    }
	
		public function getcoursess($id) {
		return $this->db->query("SELECT * FROM courses WHERE id IN ('".$id."')")->result_array();
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
	    public function update_course($records,$id) {
			
        $this->db->where('id',$id)->update('courses', $records);
        return true;
    }
	    public function delete_course($id){
        $this->db->where('id', $id)->from('courses')->delete();
        return true;
    }
    public function block_course($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('courses');
        return true;
    }
	
    public function unblock_course($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('courses');
        return true;
    }
    public function user_id() {
        $this->db->select('id');
        $this->db->from('users');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
    }
    public function get_courses($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('courses');
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
	
	public function getinstructors(){
		$this->db->where("status","1");
		$query = $this->db->from("instructors")->get();
		return $query->result_array();
	}
	
	public function edit_subject($id) {
			return $this->db->get_where('courses', array('id=' => $id))->row_array();
		}
	public function edit_instructor($id) {
			return $this->db->get_where('courses', array('id=' => $id))->row_array();
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
        $this->db->where('id',$id)->update('courses', $data);
        return true;
    }
	 public function get_course_listing() {
			$this->db->select('*');
			$this->db->from('courses');
			$this->db->order_by("id","desc");
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
}