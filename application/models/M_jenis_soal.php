<?php

class M_jenis_soal extends CI_model
{

	public function data_jenis_soal()
	{
		return $this->db->get('tbl_group_question');
	}

	public function input_jenis_soal($data)
	{
		$this->db->insert('tbl_group_question', $data);
	}

	public function update_jenis_soal($data, $id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		$this->db->update('tbl_group_question', $data);
	}

	public function delete_jenis_soal($id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		$this->db->delete('tbl_group_question');
	}

	public function nama_soal($id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		return $this->db->get('tbl_group_question');
	}
}
