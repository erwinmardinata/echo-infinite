<?php

class Mternak extends CI_Model {
		
	function get_data() {

		$this->db->select('t.*, e.nama_entitas')
				 ->from("ternak t")
 				 ->join('kecamatan kec','kec.id_kec=t.id_kecamatan')
 				 // ->join('kelurahan kel','kel.nama=t.desa')
 				 ->join('entitas e','e.id=t.id_entitas')
				 ->order_by('t.id', 'ASC');
				 // ->limit(20, 0);
		return $this->db->get()->result();
		
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('ternak')->row();
		
	}
	
	
	function insert_data() {
		
		$data = $this->input->post();
		
		return $this->db->insert('ternak', $data);
		
	}
	
	function update_data($data, $id) {
				
		$this->db->where('id', $id);
		return $this->db->update('ternak', $data);
		
	}
		
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('ternak');
		
	}

	function get_petugas() {
						 
		return $this->db->get('petugas')->result();
		
	}

	function get_entitas() {
						 
		return $this->db->get('entitas')->result();
		
	}

	function get_kecamatan() {
						 
		return $this->db->get('kecamatan')->result();
		
	}
	
	function get_desa($id) {
		
		$this->db->select('d.*')
				 ->from("kelurahan d")
 				 ->join('kecamatan k','k.id_kec=d.id_kec')
 				 ->where('k.id_kec', $id);
				 
		return $this->db->get()->result();
		
	}
		
	function set_noternak() {
		
		$cek = $this->get_data()->row();
		
		if(empty($cek)) {
			return "BSS-01-0001";
		} else {
			$no = explode("-", $cek->no_kartu_ternak);
			$norek = sprintf('%04s', $no[2]+1);
			
			return "BSS-01-".$norek;

		}
		
	} 
	
}