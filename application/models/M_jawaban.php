<?php

class M_jawaban extends CI_model
{

	public function input_jawaban($data)
	{
		$this->db->insert('tbl_answer', $data);
	}

	public function update_jawaban($data, $id_peserta)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->update('tbl_answer', $data);
	}

	public function cek_jawaban($id_peserta)
	{
		$this->db->where('id_peserta', $id_peserta);
		return $this->db->get('tbl_answer');
	}

	public function list_jawaban($id_pertanyaan)
	{
		$this->db->select('*');
		$this->db->from('tbl_question');
		$this->db->join('tbl_group_question', 'tbl_group_question.id_soal = tbl_question.id_soal', 'left');
		$this->db->where('tbl_question.id_pertanyaan', $id_pertanyaan);
		return $this->db->get();
	}
}
