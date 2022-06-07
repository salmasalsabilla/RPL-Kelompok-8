<?php

/**
 * 
 */
class User_m extends CI_model
{
	
	public function disp_user()
	{
		return $this->db->get('user')->result_array();

	}


	public function tambah_user(){
		
		  
		
		 $data = [
		 	
		 	"username" => $this->input->post('username',true),
		 	"password" => md5($this->input->post('password',true)),
		 	"auth_pass" => $this->input->post('password',true),
		 	"email" => $this->input->post('email',true),
		 	"user_role" => $this->input->post('user_role',true)
		 ];
		
		 $this->db->insert('user',$data);

	}

	public function hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('user');
	}

	public function getbyId($id){
		return $this->db->get_where('user', ['id'=>$id])->row_array();
	}

	public function update(){
		$data = [
		 	
		 	"username" => $this->input->post('username',true),
		 	"password" => md5($this->input->post('auth_pass',true)),
		 	"email" => $this->input->post('email',true),
		 	"user_role" => $this->input->post('user_role',true),
		 	"auth_pass" => $this->input->post('auth_pass',true)
		 ];

	
		 $this->db->where('id', $this->input->post('id'));
		 $this->db->update('user',$data);

	}
}