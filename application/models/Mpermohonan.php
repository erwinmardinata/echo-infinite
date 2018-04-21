<?php  

class Mpermohonan extends CI_Model {
	
	function get_data() {
				
		$this->db->order_by('id', 'ASC');
		return $this->db->get('content')->result();
		
	}
	
	function get_slider() {
		
		$this->db->order_by('posisi', 'ASC');
		return $this->db->get('slider')->result();
		
	}
		
	
}