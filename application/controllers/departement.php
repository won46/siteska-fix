<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departement extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level_admin')) {
			redirect('access_denied');
		}
	}

	public function index()
	{
		$data['title'] 	= "Departement";
		$data['page'] 		= "departement";

		$id_admin		= $this->session->userdata('id_admin');
		$data['user']	= $this->M_panitia->get_panitia($id_admin)->result();

		$data['vacancy'] = $this->M_vacancy->data_vacancy()->result();
		$data['jenis_soal'] = $this->M_jenis_soal->data_jenis_soal()->result();
		$data['dept'] = $this->M_departement->getDepartement()->result();

		$this->load->view('v_admin/v_app', $data);
	}

	public function input()
	{
		$dept = $this->input->post('dept');

		$data = [
			'dept' => $dept,
		];

		$save = $this->M_departement->input($data);

		if (!$save) {
			$this->session->set_flashdata('success', 'Data Pertanyaan Berhasil Disimpan.');
		} else {
			$this->session->set_flashdata('warning', 'Data Gagal Disimpan');
		}
		redirect('departement');
	}

	public function edit($id_dept)
	{
		$dept			= $this->input->post('dept');

		$data = [
			'dept' => $dept
		];

		$update = $this->M_departement->updateDepartement($data, $id_dept);

		if (!$update) {
			$this->session->set_flashdata('info', 'Data Panitia Berhasil Diperbarui.');
		} else {
			$this->session->set_flashdata('warning', 'Data Gagal Disimpan');
		}
		redirect('departement');
	}

	public function delete($id_dept)
	{
		$delete = $this->M_departement->deleteDepartement($id_dept);

		if (!$delete) {
			$this->session->set_flashdata('danger', 'Data Berhasil Dihapus.');
		} else {
			$this->session->set_flashdata('warning', 'Data Gagal Dihapus');
		}
		redirect('departement');
	}
}
