<?php

class Provinsi extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('Mprovinsi', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) { 
			redirect('Auth');
		} 

		if($cek != 4) {
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

	function lihat_permohonan($id) {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['komoditi_pemohon'] = $this->mdl->get_data_komoditi_permohonan($id);

		$title = "Data Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('data_permohonan.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}

	function kirim_pemeriksaan($id) {
		$data = array(
			'status' => 2
		);

		$query = $this->mdl->update_data_permohonan($data, $id);

		$query == true ? $this->alert_info('Berhasil Kirim Pemeriksaan') : $this->alert_error('Gagal Kirim Permohonan');

		redirect('Pemeriksaan');	

	}

	function keur($id) {

		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['pegawai'] = $this->mdl->get_pegawai();
		$data_array['keur'] = $this->mdl->cek_data_keur($id);
		if($data_array['keur']) {
			$data_array['row_pegawai'] = $this->mdl->cek_pegawai($data_array['keur']->id_pegawai);
		}

		$title = "Data Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('keur.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}

	function surat_jalan($id) {

		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['pegawai'] = $this->mdl->get_pegawai();
		$data_array['surat_jalan'] = $this->mdl->cek_data_surat_jalan($id);
		if($data_array['surat_jalan']) {
			$data_array['row_pegawai'] = $this->mdl->cek_pegawai($data_array['surat_jalan']->id_pegawai);
		}

		$title = "Data Permohonan SIJINAK";
		$subtitle = "pemohon";
		$content = $this->load->view('surat_jalan.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		

	}
	
	function insert_data_keur() {

		$post = $this->input->post();		
				
		$query = $this->mdl->insert_data_keur($post);
			
		$query == true ? $this->alert_info('Berhasil membuat perintah keur') : $this->alert_error('Gagal membuat perintah keur');

		redirect('Data_permohonan/keur/'.$post['id_data_permohonan']);		
	}

	function insert_data_surat_jalan() {

		$post = $this->input->post();		
		// echo json_encode($post);exit;
				
		$query = $this->mdl->insert_data_surat_jalan($post);
			
		$query == true ? $this->alert_info('Berhasil membuat surat keterangan jalan') : $this->alert_error('Gagal membuat surat keterangan jalan');

		redirect('Data_permohonan/surat_jalan/'.$post['id_data_permohonan']);		
	}

	function update_data_keur() {

		$post = $this->input->post();		
				
		$query = $this->mdl->update_data_keur($post, $post['id']);
			
		$query == true ? $this->alert_info('Berhasil membuat perintah keur') : $this->alert_error('Gagal membuat perintah keur');

		redirect('Data_permohonan/keur/'.$post['id_data_permohonan']);		
	}

	function update_data_surat_jalan() {

		$post = $this->input->post();	
		// echo json_encode($post);exit;			
				
		$query = $this->mdl->update_data_surat_jalan($post, $post['id']);
			
		$query == true ? $this->alert_info('Berhasil membuat surat keterangan jalan') : $this->alert_error('Gagal membuat surat keterangan jalan');

		redirect('Data_permohonan/surat_jalan/'.$post['id_data_permohonan']);		
	}

	function get_pegawai() {

		$id = $this->input->get('id');
		$pegawai = $this->mdl->cek_pegawai($id);

		echo '
			<div class="form-group row">
				<label class="control-label text-right col-md-3">NIP</label>
				<div class="col-md-8">						
					<input type="text" value="'.$pegawai->nip.'" readonly class="form-control" required="">
				</div>
			</div>												
			<div class="form-group row">
				<label class="control-label text-right col-md-3">Jabatan</label>
				<div class="col-md-8">
					<input type="text" value="'.$pegawai->jabatan.'" readonly class="form-control" required="">
				</div>
			</div>
		';
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

		$html = $this->load->view('perintah_keur_pdf', $data_array, true);

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


		$pdf->Output($data_array['data']->nama_perusahaan.".pdf", 'I');
	}

	function surat_jalan_pdf($id) {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_data_detail_permohonan($id);
		$data_array['jml_ternak'] = $this->mdl->get_data_ternak($id);
		$data_array['pegawai'] = $this->mdl->get_pegawai();
		$data_array['surat_jalan'] = $this->mdl->cek_data_surat_jalan($id);
		$data_array['row_pegawai'] = $this->mdl->cek_pegawai($data_array['surat_jalan']->id_pegawai);
		
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

		$html = $this->load->view('surat_jalan_pdf', $data_array, true);

		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


		$pdf->Output($data_array['data']->nama_perusahaan.".pdf", 'I');
	}
		
}