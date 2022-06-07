<?php

/**
 * 
 */
class Rincianpendapatan_m extends CI_model
{
	
	public function disp_pesanan()
	{
		return $this->db->get('pesan_menu')->result_array();

	}

	public function cari(){
		$this->db->from('pesan_menu');
		$this->db->where('tgl_pemesanan >=',$this->input->post('tgl_awal'));
		$this->db->where('tgl_pemesanan <=',$this->input->post('tgl_akhir'));
		return $this->db->get()->result_array();

		

	}

}