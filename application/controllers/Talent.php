<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent extends CI_Controller {

	public function index()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVAchievementModel');

		$data['page_title'] = "Talent";
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);
		$data['cv_achievements'] = $this->TalentCVAchievementModel->get_all($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/index');
		$this->load->view('skin/talent/footer');
	}
}
