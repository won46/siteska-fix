<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vacancy extends CI_Controller {

	function __construct() {
		parent::__construct();
		if(!$this->session->userdata('level_admin'))
		{
			redirect('access_denied');
		}
	}

	public function index()
	{
		$data ['title'] 	= "Formasi Lab";
		$data ['page'] 		= "vacancy";

		$id_admin		= $this->session->userdata('id_admin');
		$data ['user']	= $this->M_panitia->get_panitia($id_admin)->result();

		$data ['vacancy'] = $this->M_vacancy->data_vacancy()->result();
		$data ['jenis_soal'] = $this->M_jenis_soal->data_jenis_soal()->result();
		
		$this->load->view('v_admin/v_app', $data);
	}

	public function input()
	{
		$nama_lab 			= ucwords($this->input->post('nama_lab'));
		$jumlah_formasi 	= $this->input->post('jumlah_formasi');
		
		$config['upload_path']          = './uploads/pengumuman/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2048;
		
		$this->upload->initialize($config); 

		if ( ! $this->upload->do_upload('lampiran')){
                    
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('warning', $error);
                    redirect('vacancy');
        }else{
        	
        	$lampiran = $this->upload->data('file_name');
			$data = array(
				'nama_lab'  => $nama_lab,
				'jumlah_formasi' 	=> $jumlah_formasi,
				'lampiran' => $lampiran
				);

			$simpan = $this->M_vacancy->input_vacancy($data);

			if (!$simpan) {
				$this->session->set_flashdata('success', 'Data Formasi Laboratorium Berhasil Disimpan.');
			} else{
				$this->session->set_flashdata('warning', 'Data Gagal Disimpan');
			}
			redirect('vacancy');

        }
	}

	public function edit($id_lab)
	{
		$nama_lab 			= ucwords($this->input->post('nama_lab'));
		$jumlah_formasi 	= $this->input->post('jumlah_formasi');
		$lokasi_file		= $_FILES['lampiran']['tmp_name'];

		if ($lokasi_file == "") {
			
			$data = array(
				'nama_lab'  => $nama_lab,
				'jumlah_formasi' 	=> $jumlah_formasi
				);

			$simpan = $this->M_vacancy->update_vacancy($data, $id_lab);

			if (!$simpan) {
				$this->session->set_flashdata('info', 'Data Formasi '.$nama_lab.' Berhasil Diperbarui.');
			} else{
				$this->session->set_flashdata('warning', 'Data Gagal Diperbarui');
			}
			redirect('vacancy');
		
		}else{

			$config['upload_path']          = './uploads/pengumuman/';
			$config['allowed_types']        = 'pdf';
			$config['max_size']             = 2048;
			
			$this->upload->initialize($config); 

			if ( ! $this->upload->do_upload('lampiran')){
	                    
	                    $error = $this->upload->display_errors();
	                    $this->session->set_flashdata('warning', $error);
	                    redirect('vacancy');
	        }else{
	        	
	        	$lampiran = $this->upload->data('file_name');
				$data = array(
					'nama_lab'  => $nama_lab,
					'jumlah_formasi' 	=> $jumlah_formasi,
					'lampiran' => $lampiran
					);

				$simpan = $this->M_vacancy->update_vacancy($data, $id_lab);

				if (!$simpan) {
					$this->session->set_flashdata('info', 'Data Formasi '.$nama_lab.' Berhasil Diperbarui.');
				} else{
					$this->session->set_flashdata('warning', 'Data Gagal Diperbarui');
				}
				redirect('vacancy');

	        }

		}
	}

	public function delete($id_lab)
	{
		$simpan = $this->M_vacancy->delete_vacancy($id_lab);

		if (!$simpan) {
			$this->session->set_flashdata('danger', 'Data Berhasil Dihapus.');
		} else{
			$this->session->set_flashdata('warning', 'Data Gagal Dihapus');
		}
		redirect('vacancy');
	}

	public function download($nama){
		$nama_files = $nama; 
		$download = 'uploads/pengumuman/';
		if (!file_exists($download.$nama_files)) {
		  $error =  "<h3>Access forbidden!</h3>
		      <p> Anda tidak diperbolehkan mendownload file ini.</p>";
		  $this->session->set_flashdata('warning', $error);
		  redirect('vacancy');
		}else{

		header("Content-Type: octet/stream");
  		header("Content-Disposition: attachment; filename=\"".$nama_files."\"");
  		$fp = fopen($download.$nama_files, "r");
  		$data = fread($fp, filesize($download.$nama_files));
  		fclose($fp);
  		print $data;
  		}
	}
}
