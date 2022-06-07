<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Buku_m');
		$this->load->library('form_validation');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
	
	public function index()
	{
		$data['buku'] = $this->Buku_m->disp_buku(); 
		$this->load->view('buku_v',$data);

	}

	public function add(){
		$data['buku'] = $this->Buku_m->disp_buku(); 

		$this->form_validation->set_rules('nama','Judul Buku','required|trim');
		$this->form_validation->set_rules('tahun','Tahun Terbit','required|numeric');
		if($this->form_validation->run()==FALSE){
			$this->load->view('buku_v',$data);
		}
		else{
			$upload_image = $_FILES['gambar'];
            $name = $upload_image['name'];

            
            if ($upload_image) {
                $config['upload_path']          = "./img";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;

                $this->load->library('upload',$config);
                if($this->upload->do_upload('gambar')){

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);

            }   else{
                    echo $this->upload->display_errors();
            }
            }   
 


			$data['buku'] = $this->Buku_m->disp_buku(); 
			$this->Buku_m->tambah();//Fungsi Utama tambah data
			$this->session->set_flashdata('flash','Berhasil Menambahkan Menu Baru');
			redirect('buku',$data);	
			}

					
	}

	

	public function del($id_buku){
		$data['buku'] = $this->Buku_m->disp_buku();
		$this->Buku_m->hapus($id_buku);
		$this->session->set_flashdata('flash','Berhasil Menghapus Menu yang Dipilih');
		redirect('Buku',$data);	
	}

	public function ubah($id_buku){

		$this->form_validation->set_rules('nama', 'Nama', 'required');

		$data['buku'] = $this->Buku_m->getbyId($id_buku);
		
		if ($this->form_validation->run() == false) {
		
				$this->load->view('ubah_v',$data);}
		else{
		    
		    $upload_image = $_FILES['gambar'];
            $name = $upload_image['name'];

            
            if ($upload_image) {
                $config['upload_path']          = "./img";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;

                $this->load->library('upload',$config);
                if($this->upload->do_upload('gambar')){

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);

            }   else{
                    
            }
            } 
            
			$this->Buku_m->update(); 
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil diubah!</div>');
            redirect('Buku');
		}
		
	}

	public function addmahasiswapinjam(){
		$data['buku'] = $this->Buku_m->disp_buku(); 

		//$data['riwayat'] = $this->Pinjam_m->getbyId($id);
		if($this->Buku_m->add_m_konfirmasi()==true){
			redirect('Pinjam',$data);
		}
		else{
			redirect('Pinjam',$data);
		}
		//$this->Pinjam_m->hapus($id_buku);
		//redirect('Pinjam',$data);
	}

	}


