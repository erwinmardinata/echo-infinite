<?php

class Auth extends Front_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mauth', 'mdl');

	}
	
	function index() {

		$this->cek_session();

		if(!$this->input->post('submit')) {

			$data_array = array();	
			$title = "Login SIJINAK";
			$subtitle = "login";
			$content = $this->load->view('form_login.php', $data_array, true);
			
			$this->load_content($title, $subtitle, $content);		
	
		} else {
			$hasil = $this->input->post('hasil');
			$bil1 = $this->input->post('bil1');
			$bil2 = $this->input->post('bil2');
			$bil3 = $bil1 + $bil2;
			
			if(empty($hasil) || $hasil != $bil3) {
				$this->alert_error('Hasil penjumlahan salah');
				redirect('Auth');
			} else {
				
				$email = $this->input->post('email');
				$pass = md5($this->input->post('password'));			
				
				$cek = $this->db->where('email', $email)
								->where('password', $pass)
								->get('user')
								->row();
				
				if(count($cek) > 0) {
					
					$cek_email = $this->mdl->cek_email($email);
					if($cek_email->status == 0 && $cek_email) {
						$this->alert_error('Email belum di konfirmasi. silakah konfirmasi dulu email anda');
						redirect('Auth');
					}
					
					$data = array(
						'logged_in' => 'user',
						'id' 		=> $cek->id,
						'email'		=> $cek->email,
						'hak_akses'	=> $cek->hak_akses
					);
				
					$this->session->set_userdata($data);
					$this->alert_info('Selamat Datang. Anda Masuk sebagai User');
					$this->cek_session();
				
				} else {
					
					$this->alert_error('Email atau Password Salah');
					redirect('Auth');
					
				}		
				
			}

		}
		
	}
	
	function registrasi() {
		
		$this->cek_session();
		
		$data_array = array();
				
		$title = "Registrasi Data Permohonan SIJINAK";
		$subtitle = "daftar";
		$content = $this->load->view('form_daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function proses_registrasi() {
	
		$post = $this->input->post();
		
		if($post['repassword'] != $post['password']) {
			$this->alert_error('Password tidak cocok');
			redirect('Auth/registrasi');	
		}
		$cek_email = $this->mdl->cek_email($post['email']);
		if($cek_email) {
			$this->alert_error('Email yang anda masukkan sudah tersedia, Silakan coba daftar ulang');
			redirect('Auth/registrasi');
		}
		
		$data = array(
			'nama' => $post['nama'],
			'email' => $post['email'],
			'password' => md5($post['password']),
			'hak_akses' => $post['hak_akses']
		);
		
		$query = $this->mdl->insert_data($data);	
		$query == true ? $this->alert_info('Berhasil Mendaftar. Silakan anda buka link konfirmasi yang dikirim ke email anda') : $this->alert_error('Pendaftaran tidak berhasil');
		redirect('Auth/registrasi');		
		
	
	}
	
	function logout() {
		
		$data = array(

			'logged_in' => '',
			'id' 		=> '',
			'email' 	=> '',
			'hak_akses' => ''
		
		);
		
		$this->session->set_userdata($data);
		// $this->session->sess_destroy();
		redirect('Auth');
		
	}

	function cek_session() {

		if($this->session->userdata('logged_in')) {
			switch($this->session->userdata('hak_akses')) {
				case '1' : $redirect = "Dashboard";
				break;
				case '2' : $redirect = "Ternak";
				break;
				case '3' : $redirect = "Data_permohonan";
				break;
				case '4' : $redirect = "Provinsi";
				break;
				case '5' : $redirect = "Dashboard";
				break;
				case '6' : $redirect = "Permohonan";
				break;
				case '7' : $redirect = "Permohonan";
				break;
			}
			redirect($redirect);
			// redirect('Dashboard');
		}

	}
	
}