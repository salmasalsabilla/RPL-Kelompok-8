<?php

/**
 * 
 */
class Buku_m extends CI_model
{
	
	public function disp_buku()
	{
		return $this->db->get('buku')->result_array();

	}


	public function tambah(){
		
		  
		
		 $data = [
		 	
		 	"judul" => $this->input->post('nama',true),
		 	"penulis" => $this->input->post('penulis',true),
		 	"tahun" => $this->input->post('tahun',true),
		 	"penerbit" => $this->input->post('penerbit',true),
			 "jumlah_buku" => $this->input->post('jumlah_buku',true)
		 ];
		
		 $this->db->insert('buku',$data);

	}

	public function hapus($id_buku){
		$this->db->where('id_buku',$id_buku);
		$this->db->delete('buku');
	}

	public function getbyId($id_buku){
		return $this->db->get_where('buku', ['id_buku'=>$id_buku])->row_array();
	}
	
	public function update(){
		$data = [	
			"judul" => $this->input->post('nama',true),
			"penulis" => $this->input->post('penulis',true),
			"tahun" => $this->input->post('tahun',true),
			"penerbit" => $this->input->post('penerbit',true),
			"jumlah_buku" => $this->input->post('jumlah_buku',true)
		 ];

	
		 $this->db->where('id_buku', $this->input->post('id_buku'));
		 $this->db->update('buku',$data);

	}

	public function add_m_konfirmasi(){
		$data = [
			"id_user" => $this->input->post('id_user',true),
			"id_buku" => $this->input->post('id_buku',true),
			"status_pinjaman" =>  $this->input->post('status_pinjaman',true)
		];
		$this->db->insert('butuh_konfirmasi',$data);
	}
}