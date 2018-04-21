<?php

class Mprovinsi extends CI_Model {
		
	function get_data() {

		$this->db->order_by('id', 'ASC');
		return $this->db->get('data_permohonan')->result();
		
	}

	function cek_pegawai($id) {
		$this->db->where('id', $id);
		return $this->db->get('pegawai')->row();
	}

	function get_pegawai() {

		$this->db->order_by('id', 'ASC');
		return $this->db->get('pegawai')->result();

	}

	function cek_data_keur($id) {

		$this->db->where('id_data_permohonan', $id);
		return $this->db->get('perintah_keur')->row();

	}

	function cek_data_surat_jalan($id) {

		$this->db->where('id_data_permohonan', $id);
		return $this->db->get('surat_jalan')->row();

	}

	function get_data_detail_permohonan($id) {

		$this->db->select('dper.*')
				 ->from("data_permohonan dper")
 				 ->where('dper.id', $id)
				 ->order_by('dper.id', 'DESC');
				 
		return $this->db->get()->row();

	}

	function get_data_ternak($id) {

		$this->db->select('djk.*, e.nama_entitas')
				 ->from('data_jumlah_komoditi djk')
				 ->join('entitas e', 'e.id = djk.id_entitas')
				 ->join('data_permohonan dper', 'dper.id=djk.id_data_permohonan')
 				 ->where('djk.id_data_permohonan', $id);
				 
		return $this->db->get()->result();

	}

	function get_data_komoditi_permohonan($id) {
		$this->db->select('dkp.*')
				 ->from('data_komoditi_pemohon dkp')
				 ->join('data_permohonan dper', 'dper.id = dkp.id_data_permohonan')
 				 ->where('dkp.id_data_permohonan', $id);
				 
		return $this->db->get()->result();		
	}

	function update_ternak_pemohon($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('data_komoditi_pemohon', $data);
	}
	
	function update_data_permohonan($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('data_permohonan', $data);
		
	}

	function insert_data_keur($data) {
		return $this->db->insert('perintah_keur', $data);
	}

	function insert_data_surat_jalan($data) {
		return $this->db->insert('surat_jalan', $data);
	}

	function update_data_keur($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('perintah_keur', $data);
	}

	function update_data_surat_jalan($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('surat_jalan', $data);
	}

	
}