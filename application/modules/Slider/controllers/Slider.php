<?php

class Slider extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mslider', 'mdl');
		
	}
	
	function index() {
		
		$data_array = array();

		$data_array['data']	= $this->mdl->get_data();

		$title = "Photo Slider";
		$subtitle = "slider";
		$content = $this->load->view('list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function add() {
		
		$data_array = array();

		$title = "Tambah Photo Slider";
		$subtitle = "slider";
		$content = $this->load->view('add.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function edit($id) {
		
		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['count'] = $this->db->count_all('slider');
		
		$title = "Edit Photo Slider";
		$subtitle = "slider";
		$content = $this->load->view('edit.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
		
		$media = $_FILES['photo']['name'];
		
		$config = array(
			'file_name'    => $media,
			'upload_path'  => './assets/image/slider/',
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size'      => 2048,
			'max_width'    => 1024,
			'max_height'   => 768
		);
		
		$this->upload->initialize($config);
		
		if(!$this->upload->do_upload('photo')) {
			
			$error = $this->upload->display_errors();
			$this->alert_error_upload($error);
			
			redirect('Slider/add');
			
		}	
				
		$get_name = $this->upload->data();
		$name = $get_name['file_name'];

		// Image Resizing
		$config2 = array(
			'image_library' 	=> 'gd2',
			'source_image' 		=> './assets/image/slider/'.$name,
			'new_image'			=> './assets/image/slider/thumb/',
			'maintain_ratio' 	=> TRUE,
			'width'         	=> 100,
			'height'       		=> 50				
		);
		
		$this->load->library('image_lib', $config2);
		
		if ( ! $this->image_lib->resize()){
			$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
		}

		$data = array(
			'judul'		=> $this->input->post('judul'),
			'deskripsi'		=> $this->input->post('deskripsi'),
			'photo'		=> $name
		);
		
		$query = $this->mdl->insert_data($data);
			
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Slider/add');		
		
	}
	
	function update() {
		
		$media = $_FILES['photo']['name'];
		$id = $this->input->post('id');
		$cek = $this->mdl->cek_data($id);
		
		if(empty($media)) {
			
			$name = $cek->photo;
			
		} else {
			
			$config = array(
				'file_name'    => $media,
				'upload_path'  => './assets/image/slider/',
				'allowed_types' => 'jpg|jpeg',
				'max_size'      => 2048,
				'max_width'    => 1024,
				'max_height'   => 768
			);
			
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('photo')) {
				
				$error = $this->upload->display_errors();
				$this->alert_error_upload($error);
				
				redirect('Slider/edit/'.$this->input->post('id'));
				
			}	
			
			$get_name = $this->upload->data();
			$name = $get_name['file_name'];
			
			//hapus photo sebelumnya
			unlink('assets/image/slider/'.$cek->photo);
			unlink('assets/image/slider/thumb/'.$cek->photo);

			// Image Resizing
			$config2 = array(
				'image_library' 	=> 'gd2',
				'source_image' 		=> './assets/image/slider/'.$name,
				'new_image'			=> './assets/image/slider/thumb/',
				'maintain_ratio' 	=> TRUE,
				'width'         	=> 100,
				'height'       		=> 50				
			);
			
			$this->load->library('image_lib', $config2);
			
			if ( ! $this->image_lib->resize()){
				$this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));
			}
			
		}
		
		$data = array(
			'judul'		=> $this->input->post('judul'),
			'deskripsi'		=> $this->input->post('deskripsi'),
			'photo'		=> $name,
			'posisi'	=> $this->input->post('posisi')
		);
		
		$query = $this->mdl->update_data($id, $data);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Slider');		
		
	}
	
	function delete($id) {
				
		//hapus photo
		$cek = $this->mdl->cek_data($id);
		unlink('assets/image/slider/'.$cek->photo);
		unlink('assets/image/slider/thumb/'.$cek->photo);
				
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Slider');
		
	}
	
	function edit_posisi() {
		
		$data_array = array();

		$data_array['data']	= $this->mdl->get_data();
		$title = "Photo Slider Posisi";
		$subtitle = "slider";
		$content = $this->load->view('edit_posisi.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function proses_edit_posisi() {
		
		$post = $this->input->post();
		// echo json_encode($post['posisi']); exit;
		
		$x = 1;
		foreach($post['posisi'] as $row):
			
			$data['posisi']  = $x;
			
			$this->mdl->update_data($row, $data);
		
		$x++;
		endforeach;
				
		$this->alert_info();

		redirect('Slider');		

		
	}
	
}