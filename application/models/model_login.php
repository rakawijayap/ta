<?php 

class Model_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function cek_p($data){
		
		$sql = $this->db->query("SELECT * FROM user where username='$data'");
		return $sql->result_array();
	}
}
?>