<?php

class M_nilai extends CI_model
{

	public function cek_nilai($id_peserta, $id_soal)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->where('id_soal ', $id_soal);
		return $this->db->get('tbl_score');
	}

	public function update_nilai($id_peserta, $id_soal, $nilai)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->where('id_soal ', $id_soal);
		$this->db->update('tbl_score', $nilai);
	}

	public function input_nilai($data)
	{
		$this->db->insert('tbl_score', $data);
	}

	public function peserta_nilai($id_peserta)
	{
		$this->db->select('*');
		$this->db->from('tbl_score');
		$this->db->join('tbl_group_question', 'tbl_group_question.id_soal = tbl_score.id_soal', 'left');
		$this->db->order_by('tbl_score.id_soal', 'ASC');
		$this->db->where('tbl_score.id_peserta', $id_peserta);
		return $this->db->get();
	}

	public function data_nilai($id_lab)
	{
		$sts = "Selesai";
		$this->db->select('*');
		$this->db->from('tbl_applicant');
		$this->db->join('tbl_answer', 'tbl_answer.id_peserta = tbl_applicant.id_peserta', 'left');
		$this->db->where('tbl_answer.status_jawaban', $sts);
		$this->db->where('tbl_applicant.id_lab', $id_lab);
		return $this->db->get();
	}
}
