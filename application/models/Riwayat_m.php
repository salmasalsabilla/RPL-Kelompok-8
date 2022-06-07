<?php

/**
 * 
 */
class Riwayat_m extends CI_model
{
	
	public function disp_riwayat()
	{
		$this->db->select('*');
    	$this->db->from('riwayat');
    	$this->db->join('user', 'user.id=riwayat.id_user', 'left'); 
    	 $this->db->join ( 'buku', 'buku.id_buku = riwayat.id_buku' , 'left' );
    	$query = $this->db->get ();
    	return $query->result_array();

	}

}