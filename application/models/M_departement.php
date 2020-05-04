<?php

class M_departement extends CI_model
{

	public function getDepartement()
	{
		return $this->db->get('tbl_departement');
	}

	public function input($data)
	{
		$this->db->insert('tbl_departement', $data);
	}

	public function updateDepartement($data, $id_dept)
	{
		$this->db->where('id', $id_dept);
		$this->db->update('tbl_departement', $data);
	}

	public function deleteDepartement($id_dept)
	{
		$this->db->where('id', $id_dept);
		$this->db->delete('tbl_departement');
	}

	public function getDepartementById($id_dept)
	{
		$this->db->where('id', $id_dept);
		return $this->db->get('tbl_departement');
	}
}
