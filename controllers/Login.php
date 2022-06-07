	<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->library('form_validation');
 
	}
 
	function index(){
		$this->load->view('v_login');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)	
			);
		$cek = $this->M_login->cek_login("user",$where)->num_rows();
		$data = $this->M_login->get_sesi($username,$password);
		$cob = $data->row_array();

		$level = $cob['user_role'];
		$id = $cob['id'];
		if($cek > 0){
 
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'user_role'=> $level,
				'id' => $id
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("Buku"));
 
		}else{
			$this->session->set_flashdata('flash','Username atau Pasword salah!!!');
			redirect('Login');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}