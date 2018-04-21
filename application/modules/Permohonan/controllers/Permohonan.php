<?php

class Permohonan extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mpermohonan', 'mdl');
		
		$cek = $this->session->userdata('hak_akses');
		
		if(!($cek)) { 
			redirect('Auth');
		} 

		if($cek != 6 && $cek != 7) {
			redirect('Page_error');
		}

	}
	
	function index() {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data();
				
		$title = "Dashboard Pendaftaran Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('beranda.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function data_pemohon() {

		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_pemohon();

		$title = "Data Pemohon SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('data_pemohon.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}

	function lihat_permohonan($id) {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['komoditi_pemohon'] = $this->mdl->get_data_komoditi_permohonan($id);

		$title = "Data Pemohon SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('lihat_data_permohonan.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}
	
	function keur($id) {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['keur'] = $this->mdl->cek_data_keur($id);

		$title = "Data Pemohon SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('data_keur.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}
	
	function tambah() {
		
		$data_array = array();
		$data_array['entitas'] = $this->mdl->get_entitas();
				
		$title = "Dashboard Pendaftaran Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('form_pemohon.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function ubah($id) {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->cek_data($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['entitas'] = $this->mdl->get_entitas();
				
		$title = "Dashboard Pendaftaran Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('form_pemohon_ubah.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	// function tambah_ternak() {

	// 	$post = $this->input->post();
	// 	$this->session->set_userdata($post);
	// 	echo json_encode($post);exit;
	// 	$data_array = array();
				
	// 	$title = "Dashboard Pendaftaran Permohonan SIJINAK";
	// 	$subtitle = "pemohon";
	// 	$content = $this->load->view('form_input_ternak.php', $data_array, true);
		
	// 	$this->load_content($title, $subtitle, $content);	

	// }

	// function insert_data_pemohon() {

	// 	$data = $this->input->post();

	// 	if($this->mdl->get_data_pemohon()) {	
	// 		$query = $this->mdl->update_data_pemohon($data, $data['id_user']);
	// 	} else {
	// 		$query = $this->mdl->insert_data_pemohon($data);
	// 	}

			
	// 	$query == true ? $this->alert_info('Berhasil ubah data') : $this->alert_error('Gagal ubah data');

	// 	redirect('Permohonan/data_pemohon');	

	// }

	function insert_data_permohonan() {
		$post = $this->input->post();
		// echo json_encode($post);exit;
		//ambil data pemohon
		$pemohon = $this->db->where('id_user', $this->session->userdata('id'))
							->get('data_pemohon')->row();

		$media = $_FILES['rekomendasi']['name'];
		
		$config = array(
			'file_name'    => $media,
			'upload_path'  => './assets/rekomendasi/',
			'allowed_types' => 'jpg|jpeg|png|pdf|docx',
			'max_size'      => 2048,
			'max_width'    => 1024,
			'max_height'   => 768
		);
			
		$this->upload->initialize($config);
		
		if(!$this->upload->do_upload('rekomendasi')) {
			
			$error = $this->upload->display_errors();
			$this->alert_error_upload($error);
			
			// $this->session->set_flashdata($post);

			redirect('Permohonan/tambah');
			
		}	
		
		$get_name = $this->upload->data();
		$name = $get_name['file_name'];

		//insert data ke table data_permohonan
		$data_permohonan = array(
				'id_user' 		 	 => $pemohon->id_user,
				'tanggal_permohonan' => date('Y-m-d'),
				'nama_perusahaan'	 => $pemohon->nama_perusahaan,
				'nama_pemohon'		 => $pemohon->nama_direktur,
				'alamat'			 => $pemohon->alamat,
				'tujuan'			 => $post['tujuan'],
				'pelabuhan_muat'	 => $post['pelabuhan_muat'],
				'pelabuhan_bongkar'	 => $post['pelabuhan_bongkar'],
				'rekomendasi'		 => $name
			);

		$this->mdl->insert_data_permohonan($data_permohonan);
		//akhir insert data ke table data_permohonan
		
		//cek id_permohonan data terakhir
		$cek = $this->db->where('id_user', $pemohon->id_user)
						->order_by('id', 'DESC')
						->get('data_permohonan')->row();

		//insert data jumlah komoditi
		$x = count($post['id_entitas']);
		// echo $x;exit;
		$total_komoditi = 0;
		for($i=0; $i<$x; $i++) {
			$total_komoditi = $total_komoditi + $post['qty'][$i];
			$data_jumlah_komoditi = array(
					'id_data_permohonan' => $cek->id,
					'id_entitas' 		 => $post['id_entitas'][$i],
					'quota'				 => $post['qty'][$i]
			);
			$this->mdl->insert_data_jumlah_komoditi($data_jumlah_komoditi);		

			for($a=0; $a<$post['qty'][$i]; $a++) {
				$id_entitas[] = $post['id_entitas'][$i];
			}

		}

		// echo $cek->id;exit;

		//insert data komoditi pemohon
		for($j=0; $j<$total_komoditi; $j++) {
			$data_komoditi_pemohon = array(
					'id_data_permohonan' => $cek->id,
					'id_entitas' 		 => $id_entitas[$j],
					'id_ternak'		     => '0'
			);
			$this->mdl->insert_data_komoditi_pemohon($data_komoditi_pemohon);					
		}

		redirect('Permohonan');	
		// echo json_encode($data_permohonan, $data_jumlah_komoditi);

	}

	function update_data_permohonan() {
		$post = $this->input->post();
		// echo json_encode($post);exit;
		//ambil data pemohon
		$pemohon = $this->db->where('id_user', $this->session->userdata('id'))
							->get('data_pemohon')->row();

		$cek = $this->mdl->cek_data($post['id']);
		$media = $_FILES['rekomendasi']['name'];
		
		if(empty($media)) {
			
			$name = $cek->rekomendasi;
			
		} else {

			$config = array(
				'file_name'    => $media,
				'upload_path'  => './assets/rekomendasi/',
				'allowed_types' => 'jpg|jpeg|png|pdf|docx',
				'max_size'      => 2048,
				'max_width'    => 1024,
				'max_height'   => 768
			);
				
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('rekomendasi')) {
				
				$error = $this->upload->display_errors();
				$this->alert_error_upload($error);
				
				// $this->session->set_flashdata($post);

				redirect('Permohonan/ubah/'.$post['id']);
				
			}	
			//hapus photo sebelumnya
			unlink('assets/rekomendasi/'.$cek->rekomendasi);
			
			$get_name = $this->upload->data();
			$name = $get_name['file_name'];

		}

		//insert data ke table data_permohonan
		$data_permohonan = array(
				'tujuan'			 => $post['tujuan'],
				'pelabuhan_muat'	 => $post['pelabuhan_muat'],
				'pelabuhan_bongkar'	 => $post['pelabuhan_bongkar'],
				'rekomendasi'		 => $name
			);

		$this->mdl->update_data_permohonan($data_permohonan, $post['id']);
		//akhir insert data ke table data_permohonan

		//cek id_permohonan data terakhir
		$cek = $this->db->where('id_user', $pemohon->id_user)
						->order_by('id', 'DESC')
						->get('data_permohonan')->row();

		//hapus data jumlah komoditi sebelumnya
		$this->db->where('id_data_permohonan', $cek->id)
				 ->delete('data_jumlah_komoditi');

		//insert data jumlah komoditi
		$x = count($post['id_entitas']);
		// echo $x;exit;
		$total_komoditi = 0;
		for($i=0; $i<$x; $i++) {
			$total_komoditi = $total_komoditi + $post['qty'][$i];
			$data_jumlah_komoditi = array(
					'id_data_permohonan' => $cek->id,
					'id_entitas' 		 => $post['id_entitas'][$i],
					'quota'				 => $post['qty'][$i]
			);
			$this->mdl->insert_data_jumlah_komoditi($data_jumlah_komoditi);		

			for($a=0; $a<$post['qty'][$i]; $a++) {
				$id_entitas[] = $post['id_entitas'][$i];
			}

		}

		// echo $cek->id;exit;
		//hapus data komoditi sebelumnya
		$this->db->where('id_data_permohonan', $cek->id)
				 ->delete('data_komoditi_pemohon');

		//insert data komoditi pemohon
		for($j=0; $j<$total_komoditi; $j++) {
			$data_komoditi_pemohon = array(
					'id_data_permohonan' => $cek->id,
					'id_entitas' 		 => $id_entitas[$j],
					'id_ternak'		     => '0'
			);
			$this->mdl->insert_data_komoditi_pemohon($data_komoditi_pemohon);					
		}

		$this->alert_info('Berhasil Ubah Data');

		redirect('Permohonan/lihat_permohonan/'.$post['id']);	
		// echo json_encode($data_permohonan, $data_jumlah_komoditi);

	}


	// function insert_data_permohonan2() {

	// 	//ambil data pemohon
	// 	$pemohon = $this->db->where('id_user', $this->session->userdata('id'))
	// 						->get('data_pemohon')->row();

	// 	//insert data ke table data_permohonan
	// 	$data_permohonan = array(
	// 			'id_user' 		 	 => $pemohon->id_user,
	// 			'tanggal_permohonan' => date('Y-m-d'),
	// 			'nama_perusahaan'	 => $pemohon->nama_perusahaan,
	// 			'nama_pemohon'		 => $pemohon->nama_direktur,
	// 			'alamat'			 => $pemohon->alamat,
	// 			'tujuan'			 => $this->session->userdata('tujuan'),
	// 			'pelabuhan_muat'	 => $this->session->userdata('pelabuhan_muat'),
	// 			'pelabuhan_bongkar'	 => $this->session->userdata('pelabuhan_bongkar')
	// 		);

	// 	$this->mdl->insert_data_permohonan($data_permohonan);
	// 	//akhir insert data ke table data_permohonan
		
	// 	//cek id_permohonan data terakhir
	// 	$cek = $this->db->where('id_user', $pemohon->id_user)
	// 					->order_by('id', 'DESC')
	// 					->get('data_permohonan')->row();

	// 	//insert data jumlah komoditi
	// 	$x = count($this->session->userdata('id_entitas'));
	// 	for($i=0; $i<$x; $i++) {
	// 		$data_jumlah_komoditi = array(
	// 				'id_data_permohonan' => $cek->id,
	// 				'id_entitas' 		 => $this->session->userdata('id_entitas')[$i],
	// 				'quota'				 => $this->session->userdata('qty')[$i]
	// 		);
	// 		$this->mdl->insert_data_jumlah_komoditi($data_jumlah_komoditi);		
	// 	}

	// 	//insert data komoditi pemohon
	// 	$jml_form = count($this->input->post('id_entitas'));
	// 	for($j=0; $j<$jml_form; $j++) {
	// 		$data_komoditi_pemohon = array(
	// 				'id_data_permohonan' => $cek->id,
	// 				'id_entitas' 		 => $this->input->post('id_entitas')[$j],
	// 				'id_ternak'		     => $this->input->post('id_ternak')[$j]
	// 		);
	// 		$this->mdl->insert_data_komoditi_pemohon($data_komoditi_pemohon);					
	// 	}

	// 	redirect('Permohonan');	
	// 	// echo json_encode($data_permohonan, $data_jumlah_komoditi);

	// }

	function cetak() {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data();
				
		$title = "Cetak Permohonan Izin SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('cetak.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}

	function update_data_komoditi_pemohon() {

		$post = $this->input->post();
		$data = array(
			'id_ternak' => $post['id_ternak'],
		);
		$query = $this->mdl->update_data_komoditi_pemohon($data, $post['id']);
		$query == true ? $this->alert_info() : $this->alert_error();
		redirect('Permohonan/lihat_permohonan/'.$post['id_data_permohonan']);		
		
		// echo json_encode($post);

	}

	function kirim_permohonan($id) {
		$data = array(
			'status' => 1
		);

		$query = $this->mdl->update_data_permohonan($data, $id);

		$query == true ? $this->alert_info('Berhasil Kirim Permohonan') : $this->alert_error('Gagal Kirim Permohonan');

		redirect('Permohonan/lihat_permohonan/'.$id);	

	}

	function keur_pdf($id) {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['pegawai'] = $this->mdl->get_pegawai();
		$data_array['keur'] = $this->mdl->cek_data_keur($id);
		$data_array['row_pegawai'] = $this->mdl->cek_pegawai($data_array['keur']->id_pegawai);
		
		$this->load->library('tcpdf/tcpdf.php');
		// require_once(dirname(__DIR__).'/libraries/tcpdf/tcpdf.php');
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 001');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		//view header/footer
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$pdf->AddPage();

		$html = $this->load->view('perintah_keur', $data_array, true);

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


		$pdf->Output($data_array['data']->nama_perusahaan.".pdf", 'I');
						
	}

}