<?php

class User extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Muser', 'mdl');
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
				
		$title = "Data User SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function tambah() {
		
		$data_array = array();
				
		$title = "Input Data User SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('form_tambah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
		
		$post = $this->input->post();
		
		if($post['repassword'] != $post['password']) {
			$this->alert_error('Password tidak cocok');
			redirect('User/tambah');	
		}
		
		$cek_email = $this->mdl->cek_email($post['email']);
		if($cek_email) {
			$this->alert_error('Email yang anda masukkan sudah tersedia');
			redirect('User/tambah');
		}
		
		$data = array(
			'nama' => $post['nama'],
			'email' => $post['email'],
			'password' => md5($post['password']),
			'hak_akses' => $post['hak_akses'],
			'status' => $post['status']
		);
		
				
		$query = $this->mdl->insert_data($data);
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('User');		
		
	}
	
	function update() {
		
		$query = $this->mdl->update_data();
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('User');		
		
	}
	
	function delete($id) {
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('User');
		
	} 
		
}