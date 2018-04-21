<?php

class Petugas_pemeriksa extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mpetugas_pemeriksa', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) { 
			redirect('Auth');
		} 

		if($cek != 1) {
			redirect('Page_error');
		}
			
	}
	
	function index() {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data();
				
		$title = "Data Petugas Pemeriksa SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function tambah() {
		
		$data_array = array();
		$data_array['pegawai'] = $this->mdl->get_pegawai();
				
		$title = "Input Data Petugas Pemeriksa SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_tambah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function ubah($id) {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->cek_data($id);
		$data_array['pegawai'] = $this->mdl->get_pegawai();
				
		$title = "Input Data Petugas Pemeriksa SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_ubah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
		
		$post = $this->input->post();		
				
		$query = $this->mdl->insert_data($post);
			
		$query == true ? $this->alert_info('Berhasil menambahkan data baru') : $this->alert_error('Gagal menambahkan data baru');

		redirect('Petugas_pemeriksa');		
		
	}
	
	function update() {

		$post = $this->input->post();		

		$query = $this->mdl->update_data($post, $post['id']);
			
		$query == true ? $this->alert_info('Berhasil ubah data') : $this->alert_error('Gagal ubah data');

		redirect('Petugas_pemeriksa');		
		
	}
	
	function hapus($id) {
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhail hapus data') : $this->alert_error('Gagal hapus data');

		redirect('Petugas_pemeriksa');
		
	} 
		
}