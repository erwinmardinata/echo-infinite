<?php
	
class Front_Controller extends CI_Controller {
	
	var $content = array();

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		
	}

	function load_content($title, $subtitle, $content) {
	
		$data = array(
				'title' 	=> $title,
				'subtitle'	=> $subtitle,
				'content'	=> $content
			);

		$this->load->view('user/user_themes.php', $data);	

	} 

	function alert_info($text) {

		$pesan = "<div class='alert alert-info text-center' style='border-radius: 0;font-size: 14px'>".$text."</div>";

		$this->session->set_flashdata('message', $pesan);

	}

	function alert_error($text) {

		$pesan = "<div class='alert alert-danger text-center' style='border-radius: 0;font-size: 14px'>".$text."</div>";

		$this->session->set_flashdata('message', $pesan);

	}
	
}