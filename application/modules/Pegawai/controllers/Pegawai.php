<?php

class Pegawai extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mpegawai', 'mdl');
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
				
		$title = "Data Pejabat Dinas SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function tambah() {
		
		$data_array = array();
				
		$title = "Input Data Pejabat Dinas SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_tambah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function ubah($id) {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->cek_data($id);
				
		$title = "Input Data Pejabat Dinas SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_ubah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
		
		$post = $this->input->post();		
				
		$query = $this->mdl->insert_data($post);
			
		$query == true ? $this->alert_info('Berhasil menambahkan data baru') : $this->alert_error('Gagal menambahkan data baru');

		redirect('Pegawai');		
		
	}
	
	function update() {

		$post = $this->input->post();		

		$query = $this->mdl->update_data($post, $post['id']);
			
		$query == true ? $this->alert_info('Berhasil ubah data') : $this->alert_error('Gagal ubah data');

		redirect('Pegawai');		
		
	}
	
	function hapus($id) {
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhail hapus data') : $this->alert_error('Gagal hapus data');

		redirect('Pegawai');
		
	} 
		
}