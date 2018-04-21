<?php

class Dashboard extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
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
				
		$title = "Dashboard Pendaftaran Permohonan SIJINAK";
		$subtitle = "dashboard";
		$content = $this->load->view('dashboard.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
}