<?php

class Home extends Front_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mhome');
		
	}
	
	function index() {
			
		$data_array = array();
		
		$data_array['data'] = $this->mhome->get_data();
		$data_array['slider'] = $this->mhome->get_slider();
		
		$title = "Home";
		$subtitle = "beranda";
		$content = $this->load->view('user/home.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
		
	}
	
}