<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVEducation extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
	}

	public function index()
	{
		$data['page_title'] = "Tambah Pendidikan";

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_cv_education');
		$this->load->view('skin/talent/footer');
	}

	public function store()
	{
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->library('form_validation');

		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Tambah Pendidikan";

		$this->form_validation->set_rules('school', '"Sekolah"', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_cv_education');
			$this->load->view('skin/talent/footer');
		}
		else {
			// save data to db
			$this->TalentCVEducationModel->create($id_talent);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Tambah pendidikan berhasil');

			// redirect to page ...
			redirect('talent');
		}
	}

	public function edit($id_talent_cv_education)
	{
		$this->load->model('talent_models/TalentCVEducationModel');

		$data['page_title'] = "Edit Pendidikan";
		$data['cv_education'] 	= $this->TalentCVEducationModel->edit($id_talent_cv_education);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_education');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_education)
	{
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->library('form_validation');

		// used for if form not valid
		$data['page_title'] = "Edit Pendidikan";

		$this->form_validation->set_rules('school', '"Sekolah"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get edit data
			$data['cv_education'] 	= $this->TalentCVEducationModel->edit($id_talent_cv_education);
			
			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_edit_cv_education');
			$this->load->view('skin/talent/footer');
		}
		else {
			// update data to db
			$affected = $this->TalentCVEducationModel->update($id_talent_cv_education);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit pendidikan berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit pendidikan gagal');
			}
			// redirect to page ...
			redirect('talent' . $id_talent_cv_education);
		}
	}

	public function delete($id_talent_cv_education)
	{
		$this->load->model('talent_models/TalentCVEducationModel');
		$query = $this->TalentCVEducationModel->delete($id_talent_cv_education);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus pendidikan berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus pendidikan gagal');
		}
		// redirect to page ...
		redirect('talent');
	}

}
