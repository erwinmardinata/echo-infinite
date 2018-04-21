<?php

class Mpermohonan extends CI_Model {
		
	function get_data() {

		$this->db->select('dper.*, SUM(djk.quota) total_ternak')
				 ->from("data_permohonan dper")
 				 ->join('data_jumlah_komoditi djk','djk.id_data_permohonan=dper.id')
 				 ->where('dper.id_user', $this->session->userdata('id'))
 				 ->group_by('dper.id')
				 ->order_by('dper.id', 'DESC');
				 
		return $this->db->get()->result();

	}

	function get_data_detail_permohonan($id) {

		$this->db->select('dper.*')
				 ->from("data_permohonan dper")
 				 ->where('dper.id_user', $this->session->userdata('id'))
 				 ->where('dper.id', $id)
				 ->order_by('dper.id', 'DESC');
				 
		return $this->db->get()->row();

	}

	function get_data_pemohon() {

		$this->db->where('id_user', $this->session->userdata('id'));
		return $this->db->get('data_pemohon')->row();
		
	}

	function get_data_ternak($id) {

		$this->db->select('djk.*, e.nama_entitas')
				 ->from('data_jumlah_komoditi djk')
				 ->join('entitas e', 'e.id = djk.id_entitas')
				 ->join('data_permohonan dper', 'dper.id=djk.id_data_permohonan')
 				 ->where('dper.id_user', $this->session->userdata('id'))
 				 ->where('djk.id_data_permohonan', $id);
				 
		return $this->db->get()->result();

	}

	function get_data_komoditi_permohonan($id) {
		$this->db->select('dkp.*')
				 ->from('data_komoditi_pemohon dkp')
				 ->join('data_permohonan dper', 'dper.id = dkp.id_data_permohonan')
 				 ->where('dper.id_user', $this->session->userdata('id'))
 				 ->where('dkp.id_data_permohonan', $id);
				 
		return $this->db->get()->result();		
	}

	function get_entitas() {
						 
		return $this->db->where('status', '1')
					    ->get('entitas')->result();
		
	}

	function get_ternak() {
						 
		return $this->db->where('sex', 'jantan')
						->get('ternak')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('data_permohonan')->row();
		
	}
	
	
	function insert_data_pemohon($data) {
		
		return $this->db->insert('data_pemohon', $data);
		
	}

	function update_data_pemohon($data, $id) {
		
		$this->db->where('id_user', $id);
		return $this->db->update('data_pemohon', $data);
		
	}

	function insert_data_permohonan($data) {

		return $this->db->insert('data_permohonan', $data);

	}
	
	function insert_data_jumlah_komoditi($data) {

		return $this->db->insert('data_jumlah_komoditi', $data);

	}
	
	function insert_data_komoditi_pemohon($data) {

		return $this->db->insert('data_komoditi_pemohon', $data);

	}
	
	function update_data($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
		
	}

	function update_data_permohonan($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('data_permohonan', $data);
		
	}

	function update_data_komoditi_pemohon($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('data_komoditi_pemohon', $data);
		
	}
		
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('user');
		
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
	

}