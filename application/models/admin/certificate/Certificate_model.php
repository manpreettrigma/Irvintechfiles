<?php

class Certificate_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_certificatelist($id=NULL) {
        
        
        $this->db->select(['certificates.id',  'certificates.user_id', 'users.username', 'certificates.title', 'certificates.description', 'certificates.status', 'certificates.created_at']);
        $this->db->from('certificates');
        $this->db->join('users', 'users.id = certificates.user_id', 'left');

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
	    public function add_certificate($data) {
     //   echo "<pre>"; print_r($data); exit;
        return $this->db->insert('certificates', $data);
    }
    public function edit_certificate($id) {
        return $this->db->get_where('certificates', array('id =' => $id))->row();
    }
	    public function update_certificate($records,$id) {
			
        $this->db->where('id',$id)->update('certificates', $records);
        return true;
    }
	    public function delete_certificate($id){
        $this->db->where('id', $id)->from('certificates')->delete();
        return true;
    }
    public function block_certificate($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('certificates');
        return true;
    }
	
    public function unblock_certificate($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('certificates');
        return true;
    }
    public function user_id() {
        $this->db->select('id');
        $this->db->from('users');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
    }
		public function getcertificate($id) {
        return $this->db->get_where('certificates', array('id =' => $id))->row();
    }
    public function get_certificates($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('certificates');
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
        $this->db->where('id',$id)->update('certificates', $data);
        return true;
    }
	 public function get_certificate_listing() {
			$this->db->select('*');
			$this->db->from('certificates');
			$this->db->order_by("id","desc");
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
	 	
		public function get_courses($course_type,$fields) {
			$this->db->select($fields);
			$this->db->from('courses');
			$this->db->where('status' , 1);
			$this->db->where('course_type' , $course_type);
			$query = $this->db->get();					
			return $query->result_array();			   
		}
		
		public function getcourses($courseid,$fields) {
			$this->db->select($fields);
			$this->db->from('courses');
			$this->db->where('status' , 1);
			$this->db->where('id' , $courseid);
			$query = $this->db->get();					
			return $query->result_array();			   
		}
		
		public function editcertificate($id) {
			return $this->db->get_where('certificates', array('id=' => $id))->row_array();
		}
}