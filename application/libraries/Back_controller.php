<?php
	
class Back_Controller extends CI_Controller {
	
	var $content = array();

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		
		// $cek = $this->session->userdata('logged_in');
		
		// if(!($cek)) redirect('Adminpanel');
		
	}

	function load_content($title, $subtitle, $content) {

		$data = array(
				'title' 	=> $title,
				'subtitle'	=> $subtitle,
				'content'	=> $content
			);

		$this->load->view('admin/admin_themes.php', $data);	

	} 

	function alert_info($text) {
			
		$pesan = '<div class="alert alert-info text-center" style="border-radius: 0;font-size: 14px" role="alert">'.$text.'</div>';

		$this->session->set_flashdata('message', $pesan);

	}

	function alert_error($text) {

		$pesan = '<div class="alert alert-warning text-center" style="border-radius: 0;font-size: 14px" role="alert">'.$text.'</div>';

		$this->session->set_flashdata('message', $pesan);

	}
	
	function alert_error_upload($data) {

		$pesan = '<div class="alert alert-warning text-center" style="border-radius: 0;font-size: 14px" role="alert">'.$data.'</div>';

		$this->session->set_flashdata('message', $pesan);

	}


}

