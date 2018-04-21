<?php

class Mpegawai extends CI_Model {
		
	function get_data() {

		$this->db->order_by('id', 'ASC');
		return $this->db->get('pegawai')->result();
		
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('pegawai')->row();
		
	}
	
	
	function insert_data($data) {
		
		return $this->db->insert('pegawai', $data);
		
	}
	
	function update_data($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('pegawai', $data);
		
	}
		
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('pegawai');
		
	}
	
	function cek_email($email) {
		
		$this->db->where('email', $email);
		return $this->db->get('pegawai')->row();
	}
	
}