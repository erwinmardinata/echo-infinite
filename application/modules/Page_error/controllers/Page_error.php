<?php

class Page_error extends Front_controller {
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	function index() {
		
		$data_array = array();
				
		$title = "404 Page not found ";
		$subtitle = "error";
		$content = $this->load->view('page.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
}