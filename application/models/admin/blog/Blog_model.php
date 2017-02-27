<?php

class Blog_model extends CI_Model {

    public function __construct() {
        
    }

    public function get_bloglist($id=NULL) {
        
        
        $this->db->select(['blog.id',  'blog.user_id', 'users.username', 'blog.title','blog.category', 'blog.description', 'blog.author', 'blog.status', 'blog.blog_date']);
        $this->db->from('blog');
		$this->db->order_by("id","desc");
        $this->db->join('users', 'users.id = blog.user_id', 'left');

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
	    public function add_blog($data) {
        
        return $this->db->insert('blog', $data);
    }
    public function edit_blog($id) {
        return $this->db->get_where('blog', array('id =' => $id))->row();
    }
	    public function update_blog($blog,$id) {
			
        $data = $blog;
        $this->db->where('id',$id)->update('blog', $data);
        return true;
    }
	    public function delete_blog($id){
        $this->db->where('id', $id)->from('blog')->delete();
        return true;
    }
    public function block_blog($id) {
        $this->db->where('id', $id)
                ->set('status', 0)
                ->update('blog');
        return true;
    }
	
    public function unblock_blog($id) {
        $this->db->where('id', $id)
                ->set('status', 1)
                ->update('blog');
        return true;
    }
    public function user_id() {
        $this->db->select('id');
        $this->db->from('users');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
    }
    public function get_blog($limit, $offset, $search) {
        $this->db->select('*');
        $this->db->from('blog');
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
	

	 public function get_inner_page($category) {
			$this->db->select('*');
			$this->db->from('blog');
			$this->db->where('category',$category);
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
	 public function get_blog_data() {
			$this->db->select('*');
			$this->db->from('blog');
            $query = $this->db->get();
            $result = $query->result_array();
			return $result;
			
	 }
     public function update_image($id) {
		
        $data = array('image' =>'');
        $this->db->where('id',$id)->update('blog', $data);
        return true;
    }
	
}