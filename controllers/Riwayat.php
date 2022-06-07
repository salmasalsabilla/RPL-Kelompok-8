<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Riwayat_m');
		$this->load->library('form_validation');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	
	public function index()
	{
		$data['riwayat'] = $this->Riwayat_m->disp_riwayat();
		$this->load->view('riwayat_v',$data);

	}

	
}