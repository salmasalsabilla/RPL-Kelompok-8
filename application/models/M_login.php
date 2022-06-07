<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function get_sesi($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		 $result = $this->db->get('user',1);
    	return $result;
	}	
}