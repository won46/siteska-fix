<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_nilai extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('level_admin'))
		{
			redirect('access_denied');
		}
	}

	public function formasi($id_lab)
	{
		$data ['title'] 	= "Data Nilai";
		$data ['page'] 		= "data_nilai";

		$id_admin		= $this->session->userdata('id_admin');
		$data ['user']	= $this->M_panitia->get_panitia($id_admin)->result();

		//Side Menu
		$data ['vacancy'] = $this->M_vacancy->data_vacancy()->result();
		$data ['jenis_soal'] 	= $this->M_jenis_soal->data_jenis_soal()->result();

		// Nama Formasi Lab
		$data ['cek_lab'] = $this->M_vacancy->cek_vacancy($id_lab)->result();
		
		// Data Nilai
		$data ['data_nilai'] = $this->M_nilai->data_nilai($id_lab)->result();

		$this->load->view('v_admin/v_app', $data);
	}

}