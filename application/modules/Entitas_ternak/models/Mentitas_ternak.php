<?php

class Mentitas_ternak extends CI_Model {
		
	function get_data() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('entitas')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('entitas')->row();
		
	}
	
	
	function insert_data() {
		
		$data = $this->input->post();
		
		return $this->db->insert('entitas', $data);
		
	}
	
	function update_data($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('entitas', $data);
		
	}
		
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('entitas');
		
	}
	
}