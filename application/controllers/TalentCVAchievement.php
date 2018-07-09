<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVAchievement extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
	}

	public function index()
	{
		$data['page_title'] = "Tambah Prestasi";
		
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVWorkModel');
		
		// get data for select
		$id_talent = $this->session->userdata('id_talent');
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_cv_achievement');
		$this->load->view('skin/talent/footer');
	}

	public function store()
	{
		$this->load->model('talent_models/TalentCVAchievementModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->library('form_validation');

		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Tambah Prestasi";

		$this->form_validation->set_rules('title', '"Judul Prestasi"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get data for select
			$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
			$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_cv_achievement');
			$this->load->view('skin/talent/footer');
		}
		else {
			// save data to db
			$this->TalentCVAchievementModel->create($id_talent);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Tambah prestasi berhasil');

			// redirect to page ...
			redirect('talent');
		}
	}

	public function edit($id_talent_cv_achievement)
	{
		$this->load->model('talent_models/TalentCVAchievementModel');

		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVWorkModel');
		
		$data['page_title'] = "Edit Prestasi";
		$data['cv_achievement'] = $this->TalentCVAchievementModel->edit($id_talent_cv_achievement);

		// get data for select
		$id_talent = $this->session->userdata('id_talent');
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_achievement');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_achievement)
	{
		$this->load->model('talent_models/TalentCVAchievementModel');
		$this->load->library('form_validation');

		// used for if form not valid
		$data['page_title'] = "Edit Prestasi";

		$this->form_validation->set_rules('title', '"Judul Prestasi"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get edit data
			$data['cv_achievement'] 	= $this->TalentCVAchievementModel->edit($id_talent_cv_achievement);
			
			// get data for select
			$id_talent = $this->session->userdata('id_talent');
			$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
			$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_edit_cv_achievement');
			$this->load->view('skin/talent/footer');
		}
		else {
			// update data to db
			$affected = $this->TalentCVAchievementModel->update($id_talent_cv_achievement);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit prestasi berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit prestasi gagal');
			}
			// redirect to page ...
			redirect('talent');
		}
	}

	public function delete($id_talent_cv_achievement)
	{
		$this->load->model('talent_models/TalentCVAchievementModel');
		$query = $this->TalentCVAchievementModel->delete($id_talent_cv_achievement);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus prestasi berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus prestasi gagal');
		}
		// redirect to page ...
		redirect('talent');
	}

}
