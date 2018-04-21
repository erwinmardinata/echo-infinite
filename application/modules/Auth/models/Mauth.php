<?php

class Mauth extends CI_Model {
		
	function get_data() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('user')->result();
		
	}
	
	function cek_email($email) {
		
		$this->db->where('email', $email);
		return $this->db->get('user')->row();
		
	}
	
	function insert_data($data) {
				
		return $this->db->insert('user', $data);
		
	}
	
	function update_data($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
		
	}
		
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('user');
		
	}
	
}