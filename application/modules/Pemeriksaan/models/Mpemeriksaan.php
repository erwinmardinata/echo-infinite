<?php

class MPemeriksaan extends CI_Model {
		
	function get_data() {

		$this->db->order_by('id', 'ASC');
		return $this->db->get('data_permohonan')->result();
		
		
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

	function get_petugas_pemeriksa() {
		$this->db->select('ppem.*, peg.nama')
				 ->from('petugas_pemeriksa ppem')
				 ->join('pegawai peg', 'peg.id = ppem.id_pegawai');
				 
		return $this->db->get()->result();				
	}

	function cek_petugas_pemeriksa_ternak($id) {
		$this->db->where('id_data_permohonan', $id);
		return $this->db->get('petugas_pemeriksa_ternak')->result();
	}

	function update_ternak_pemohon($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('data_komoditi_pemohon', $data);
	}

	function insert_data_pemeriksa_ternak($data) {

		return $this->db->insert('petugas_pemeriksa_ternak', $data);

	}

	
}