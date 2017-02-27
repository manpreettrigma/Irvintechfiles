<?php	
	class Category_model extends CI_Model {		
		public function __construct() {
			
		}
		
		public function getCategories(){
			$query = $this->db->from('credit_categories')->get();
			return $query->result_array();
		}
		
		public function addCategory($data){
			$data['status']	=	"1";
			$this->db->insert("credit_categories",$data);
			return $this->db->insert_id();
		}
		
		public function getCategoryById($id){
			$this->db->where("id",$id);
			$query = $this->db->from("credit_categories")->get();
			return $query->row_array();
		}
		
		public function updateCategory($id,$data){
			$this->db->where("id",$id);
			$this->db->update("credit_categories",$data);
			return true;
		}
		
		public function deleteCat($id){
			$this->db->where("id",$id);
			$this->db->delete("credit_categories");
		}
	}
?>