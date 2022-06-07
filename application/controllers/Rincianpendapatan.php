<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rincianpendapatan extends CI_Controller {
		// public function __construct(){
		// parent::__construct();
		// $this->load->model('menu_m');
		// $this->load->library('form_validation');
	public function __construct(){
		parent::__construct();
		$this->load->model('Rincianpendapatan_m');
		$this->load->library('form_validation');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

		public function index()
	{
		$data['order'] = $this->Rincianpendapatan_m->disp_pesanan(); 
		$this->load->view('rincianpendapatan_v',$data);//,$data);

	}

	public function max(){
		$data = $this->db->select('id_pm, jumlah as total_qty')
                 ->from('pesan_menu')
                 ->order_by('total_qty','desc')
                 ->limit(5)
                 ->group_by('id_pm')
                 ->get()->result_array();
	}
	
	public function cetak(){
		
			$data['order'] = $this->Rincianpendapatan_m->cari();
			$this->load->view('rincianpendapatan_v',$data);
		
			
		
		
		
	}
}


