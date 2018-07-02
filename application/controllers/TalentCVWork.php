<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVWork extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		// $this->load->model('talent_models/TalentCVWorkModel');
		// // $this->load->helper('url');
		// // $this->load->helper('form');
		// $this->load->library('input');
		// $this->load->library('form_validation');
		// $this->load->library('session');

	}

	public function index()
	{
		$data['page_title'] = "Tambah Pengalaman Kerja";

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_cv_work');
		$this->load->view('skin/talent/footer');
	}

	public function store()
	{
		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->library('form_validation');

		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Tambah Pengalaman Kerja";

		$this->form_validation->set_rules('position', '"Jabatan"', 'required');
		$this->form_validation->set_rules('company', '"Perusahaan"', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_cv_work');
			$this->load->view('skin/talent/footer');
			// redirect('talent/cv-work-experience/create');
		}
		else {
			// save data to db
			$this->TalentCVWorkModel->create_talent_cv_work($id_talent);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Tambah pengalaman kerja berhasil');

			// redirect to page ...
			redirect('talent/cv-work-experience/create');
			// redirect('talent');
		}
	}

	public function edit($id_talent_cv_work)
	{
		$this->load->model('talent_models/TalentCVWorkModel');

		$data['page_title'] = "Edit Pengalaman Kerja";
		$data['cv_work'] 	= $this->TalentCVWorkModel->edit_talent_cv_work($id_talent_cv_work);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_work');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_work)
	{
		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->library('form_validation');

		// used for if form not valid
		$data['page_title'] = "Edit Pengalaman Kerja";

		$this->form_validation->set_rules('position', '"Jabatan"', 'required');
		$this->form_validation->set_rules('company', '"Perusahaan"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get edit data
			$data['cv_work'] 	= $this->TalentCVWorkModel->edit_talent_cv_work($id_talent_cv_work);
			
			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_edit_cv_work');
			$this->load->view('skin/talent/footer');
		}
		else {
			// update data to db
			$affected = $this->TalentCVWorkModel->update_talent_cv_work($id_talent_cv_work);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit pengalaman kerja berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit pengalaman kerja gagal');
			}
			// redirect to page ...
			redirect('talent/cv-work-experience/edit/' . $id_talent_cv_work);
		}
	}

	public function delete($id_talent_cv_work)
	{
		$this->load->model('talent_models/TalentCVWorkModel');
		$query = $this->TalentCVWorkModel->delete($id_talent_cv_work);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus pengalaman kerja berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus pengalaman kerja gagal');
		}
		// redirect to page ...
		redirect('talent');
	}

}
