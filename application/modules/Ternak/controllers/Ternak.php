<?php

class Ternak extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mternak', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) { 
			redirect('Auth');
		} 

		if($cek != 2) {
			redirect('Page_error');
		}
		
	}
	
	function index() {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data();
				
		$title = "Dashboard Data Ternak SIJINAK";
		$subtitle = "dashboard";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function data_ternak() {

		$data_array = array();
		$data_array['data'] = $this->mdl->get_data();
				
		$title = "Dashboard Data Ternak SIJINAK";
		$subtitle = "dashboard";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
		
	}
	
	function tambah_baru() {
		
		$data_array = array();
		$data_array['kecamatan'] = $this->mdl->get_kecamatan();
		$data_array['entitas'] = $this->mdl->get_entitas();
		$data_array['petugas'] = $this->mdl->get_petugas();
				
		$title = "Tambah Data Ternak Baru ";
		$subtitle = "add";
		$content = $this->load->view('form_tambah_baru.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function tambah_lama() {
		
		$data_array = array();
		$data_array['kecamatan'] = $this->mdl->get_kecamatan();
		$data_array['entitas'] = $this->mdl->get_entitas();
		$data_array['petugas'] = $this->mdl->get_petugas();
				
		$title = "Tambah Data Ternak Lama Belum Terdata";
		$subtitle = "add";
		$content = $this->load->view('form_tambah_lama.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
		
		$query = $this->mdl->insert_data();
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Ternak');		
		
	}
	
	function update() {
		
		$query = $this->mdl->update_data();
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Ternak');		
		
	}
	
	function delete($id) {
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Ternak');
		
	} 

	function get_desa() {
		
		$id = $this->input->get('id_kec');
		
		$desa = $this->mdl->get_desa($id);
		
		// echo $id;exit;
		
		echo "<option value=''>- Pilih desa -</option>";
		foreach($desa as $row){
			echo "<option value='".$row->id_kel."'>".$row->nama."</option>";
		}
		
	}
	
}