<?php

class Mcontent extends CI_Model {
		
	function get_data() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('content')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('content')->row();
		
	}
	
	function insert_data() {
		
		$data = $this->input->post();
		
		return $this->db->insert('content', $data);
		
	}
	
	function update_data() {
		
		$data = $this->input->post();
		
		$this->db->where('id', $data['id']);
		return $this->db->update('content', $data);
		
	}
	
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('content');
		
	}
	
}