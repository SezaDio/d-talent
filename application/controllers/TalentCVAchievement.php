<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVAchievement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}

		$this->load->library('form_validation');
		$this->load->model('talent_models/TalentCVAchievementModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVWorkModel');
	}

	public function index()
	{
		$data['active'] = 1;

		$data['page_title'] = "Add Achievement";
		
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
		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Add Achievement";

		$this->form_validation->set_rules('title', '"Achievement Title"', 'required');
		$this->form_validation->set_rules('month', '"Month"', 'required');
		$this->form_validation->set_rules('year', '"Year"', 'required');

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
			$this->session->set_flashdata('msg_success', 'Add achievement success');

			// redirect to page ...
			redirect('talent');
		}
	}

	public function edit($id_talent_cv_achievement)
	{
		$data['active'] = 1;
		
		$id_talent = $this->session->userdata('id_talent');
		
		$data['page_title'] = "Edit Achievement";
		$data['cv_achievement'] = $this->TalentCVAchievementModel->edit($id_talent, $id_talent_cv_achievement);

		// get data for select
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_achievement');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_achievement)
	{
		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Edit Achievement";

		$this->form_validation->set_rules('title', '"Achievement Title"', 'required');
		$this->form_validation->set_rules('month', '"Month"', 'required');
		$this->form_validation->set_rules('year', '"Year"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_talent_cv_achievement);
		}
		else {
			// update data to db
			$affected = $this->TalentCVAchievementModel->update($id_talent, $id_talent_cv_achievement);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit achievement success');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit achievement failed');
			}
			// redirect to page ...
			redirect('talent');
		}
	}

	public function delete($id_talent_cv_achievement)
	{
		$id_talent = $this->session->userdata('id_talent');

		$query = $this->TalentCVAchievementModel->delete($id_talent, $id_talent_cv_achievement);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Delete achievement success');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Delete achievement failed');
		}
		// redirect to page ...
		redirect('talent');
	}

}
