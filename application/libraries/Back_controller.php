<?php
	
class Back_Controller extends CI_Controller {
	
	var $content = array();

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		
		$cek = $this->session->userdata('logged_in');
		
		if(!($cek)) redirect('Adminpanel');
		
	}

	function load_content($title, $subtitle, $content) {

		$data = array(
				'title' 	=> $title,
				'subtitle'	=> $subtitle,
				'content'	=> $content
			);

		$this->load->view('admin/admin_themes.php', $data);	

	} 

	function alert_info() {
			
		$pesan = '<div class="alert alert-info" role="alert">Sukses!!!</div>';

		$this->session->set_flashdata('message', $pesan);

	}

	function alert_error() {

		$pesan = '<div class="alert alert-warning" role="alert">Gagal!!!</div>';

		$this->session->set_flashdata('message', $pesan);

	}
	
	function alert_error_upload($data) {

		$pesan = '<div class="alert alert-warning" role="alert">'.$data.'</div>';

		$this->session->set_flashdata('message', $pesan);

	}


}

