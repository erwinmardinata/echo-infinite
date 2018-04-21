<?php

class Mpetugas_pemeriksa extends CI_Model {
		
	function get_data() {

		$this->db->select('pm.*, p.nama, p.jenis_kelamin, p.alamat')
				 ->from("petugas_pemeriksa pm")
 				 ->join('pegawai p','p.id=pm.id_pegawai')
				 ->order_by('pm.id', 'DESC');
				 
		return $this->db->get()->result();

		// $this->db->order_by('id', 'ASC');
		// return $this->db->get('petugas_pemeriksa')->result();
			
	}

	function get_pegawai() {

		$this->db->order_by('id', 'ASC');
		return $this->db->get('pegawai')->result();
			
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('petugas_pemeriksa')->row();
		
	}
	
	
	function insert_data($data) {
		
		return $this->db->insert('petugas_pemeriksa', $data);
		
	}
	
	function update_data($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('petugas_pemeriksa', $data);
		
	}
		
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('petugas_pemeriksa');
		
	}
	
	function cek_email($email) {
		
		$this->db->where('email', $email);
		return $this->db->get('petugas_pemeriksa')->row();
	}
	
}