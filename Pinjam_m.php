<?php

/**
 * 
 */
class Pinjam_m extends CI_model
{
	
	public function disp_pinjam()
	{
		$this->db->select('*');
    	$this->db->from('sedang_dipinjam');
    	$this->db->join('user', 'user.id=sedang_dipinjam.id_user', 'left'); 
    	$this->db->join ( 'buku', 'buku.id_buku = sedang_dipinjam.id_buku' , 'left' );
    	$query = $this->db->get ();
    	return $query->result_array();

	}

	public function disp_konf()
	{
		$this->db->select('*');
    	$this->db->from('butuh_konfirmasi');
    	$this->db->join('user', 'user.id=butuh_konfirmasi.id_user', 'left'); 
    	 $this->db->join ( 'buku', 'buku.id_buku = butuh_konfirmasi.id_buku' , 'left' );
    	$query = $this->db->get ();
    	return $query->result_array();

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

	
	public function getbyId($id){
		return $this->db->get_where('peminjaman_buku', ['id_pinjam'=>$id])->row_array();
	}

	

	public function addriwayat(){
		$data = [
		 	
		 	"id_user" => $this->input->post('id_user',true),
		 	"id_buku" => $this->input->post('id_buku',true),
		 	"tanggal_kembali" => $this->input->post('tanggal_kembali',true)
		 ];
		
		 $this->db->insert('riwayat',$data);
		 if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
			} 
		else {
			return false;
		}
	}

	public function delriwayat($id_pinjam){
		$this->db->where('id_pinjam',$id_pinjam);
		$this->db->delete('sedang_dipinjam');
	}



	public function addkonfirmasi(){
		$data = [
		 	
		 	"id_user" => $this->input->post('id_user',true),
		 	"id_buku" => $this->input->post('id_buku',true),
		 	"status_pinjaman" => $this->input->post('status_pinjaman',true)
		 	
		 ];
		
		 $this->db->insert('sedang_dipinjam',$data);
		 if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
			} 
		else {
			return false;
		}
	}

	public function delmemintakonf($id_sdpinjam){
		$this->db->where('id_sdpinjam',$id_sdpinjam);
		$this->db->delete('butuh_konfirmasi');
	}
}