<?php

class Content extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mcontent', 'mdl');
		
	}
	
	function index() {
		
		$data_array = array();
		
		$data_array['data']	= $this->mdl->get_data();

		$title = "Content";
		$subtitle = "content";
		$content = $this->load->view('list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function add() {
		
		$data_array = array();

		$title = "Add Content";
		$subtitle = "content";
		$content = $this->load->view('add.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function edit($id) {
		
		$data_array = array();

		$data_array	= $this->mdl->cek_data($id);
		
		$title = "Edit Content";
		$subtitle = "content";
		$content = $this->load->view('edit.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
		
		$query = $this->mdl->insert_data();
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Content/add');		
		
	}
	
	function update() {
		
		$query = $this->mdl->update_data();
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Content');		
		
	}
	
	function delete($id) {
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Content');
		
	} 

}