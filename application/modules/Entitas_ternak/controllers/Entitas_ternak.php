<?php

class Entitas_ternak extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mentitas_ternak', 'mdl');
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
				
		$title = "Data Komoditi SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function tambah() {
		
		$data_array = array();
				
		$title = "Input Data Komoditi SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_tambah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function ubah($id) {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->cek_data($id);
			
		$title = "Ubah Data Komoditi SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_ubah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function insert() {
		
		$query = $this->mdl->insert_data();
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Entitas_ternak/tambah');		
		
	}
	
	function update() {

		$post = $this->input->post();
		
		$query = $this->mdl->update_data($post, $post['id']);
			
		$query == true ? $this->alert_info('Berhasil ubah data') : $this->alert_error('Gagal ubah data');

		redirect('Entitas_ternak');		
		
	}
	
	function delete($id) {
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhasil hapus data!') : $this->alert_error('Gagal hapus data!');

		redirect('Entitas_ternak');
		
	} 
	
}