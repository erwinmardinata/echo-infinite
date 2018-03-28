<?php

class Mslider extends CI_Model {
		
	function get_data() {
		
		$this->db->order_by('posisi', 'ASC');
		return $this->db->get('slider')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('slider')->row();
		
	}
	
	function insert_data($data) {
				
		return $this->db->insert('slider', $data);
		
	}
	
	function update_data($id, $data) {
				
		$this->db->where('id', $id);
		return $this->db->update('slider', $data);
		
	}
	
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('slider');
		
	}
	
}