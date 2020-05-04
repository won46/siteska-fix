<?php

class M_vacancy extends CI_model {

	public function data_vacancy(){
		return $this->db->get('tbl_vacancy');
		
	}

	public function cek_vacancy($id_lab){
		$this->db->where('id_lab', $id_lab);
		return $this->db->get('tbl_vacancy');
		
	}
	
	public function input_vacancy($data){
		$this->db->insert('tbl_vacancy', $data);
		
	}

	public function update_vacancy($data, $id_lab){
		$this->db->where('id_lab', $id_lab);
		$this->db->update('tbl_vacancy', $data);
		
	}
	
	public function delete_vacancy($id_lab){
		$this->db->where('id_lab', $id_lab);
		$this->db->delete('tbl_vacancy');
		
	}
	
}
