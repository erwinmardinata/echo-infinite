<?php

class Pemeriksaan extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mpemeriksaan', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) { 
			redirect('Auth');
		} 

		if($cek != 3) {
			redirect('Page_error');
		}
			
	}
	
	function index() {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data();
				
		$title = "Data Permohonan SIJINAK";
		$subtitle = "user";
		$content = $this->load->view('daftar.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}

	function pemeriksaan_ternak($id) {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['komoditi_pemohon'] = $this->mdl->get_data_komoditi_permohonan($id);
		$data_array['petugas_pemeriksa'] = $this->mdl->get_petugas_pemeriksa();
		$data_array['petugas_pemeriksa_ternak'] = $this->mdl->cek_petugas_pemeriksa_ternak($id);

		$title = "Data Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('pemeriksaan_ternak.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}

	function update_ternak_pemohon() {
		$post = $this->input->post();

		$batas = count($post['id']);
		for ($i=0; $i < $batas; $i++) { 
			$data = array(
				'berat' => $post['berat'][$i],
				'umur'  => $post['umur'][$i]
			);
			$query = $this->mdl->update_ternak_pemohon($data, $post['id'][$i]);
		}
		redirect('Pemeriksaan/pemeriksaan_ternak/'.$post['id_data_permohonan']);
		// echo json_encode($post);
	}

	function input_nama_pemeriksa() {
		$post = $this->input->post();
		// echo json_encode($post);
		$cek = count($post['id_petugas']);
		for($i=0; $i<$cek; $i++) {
			$data = array(
				'id_data_permohonan' => $post['id_data_permohonan'],
				'id_petugas' 		 => $post['id_petugas'][$i]
			);
			$this->mdl->insert_data_pemeriksa_ternak($data);
		}
			
		$query == true ? $this->alert_info('Berhasil Mengubah data') : $this->alert_error('Gagal Mengubah data');

		redirect('Pemeriksaan/pemeriksaan_ternak/'.$post['id_data_permohonan']);		

	}
	
	function pdf($id) {
		
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['komoditi_pemohon'] = $this->mdl->get_data_komoditi_permohonan($id);
		
		$this->load->library('tcpdf/tcpdf.php');
		// require_once(dirname(__DIR__).'/libraries/tcpdf/tcpdf.php');
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nicola Asuni');
		$pdf->SetTitle('TCPDF Example 001');
		$pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$pdf->AddPage();

		$html = $this->load->view('hasil_pemeriksaan_pdf', $data_array, true);

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

		$pdf->Output("Hasil Pemeriksaan.pdf", 'I');
						
	}
		
}