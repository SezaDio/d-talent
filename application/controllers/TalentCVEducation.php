<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVEducation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}

		$this->load->library('form_validation');
		$this->load->model('talent_models/TalentCVEducationModel');
	}

	public function index()
	{
		$data['page_title'] = "Add Education";

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_cv_education');
		$this->load->view('skin/talent/footer');
	}

	public function store()
	{
		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Add Education";

		$this->form_validation->set_rules('school', '"School"', 'required');
		$this->form_validation->set_rules('from_year', '"From"', 'required');
		$this->form_validation->set_rules('to_year', '"To"', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_cv_education');
			$this->load->view('skin/talent/footer');
		}
		else {
			// save data to db
			$this->TalentCVEducationModel->create($id_talent);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Add education success');

			// redirect to page ...
			redirect('talent');
		}
	}

	public function edit($id_talent_cv_education)
	{
		$id_talent = $this->session->userdata('id_talent');

		$data['page_title'] = "Edit Education";
		$data['cv_education'] 	= $this->TalentCVEducationModel->edit($id_talent, $id_talent_cv_education);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_education');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_education)
	{
		$id_talent = $this->session->userdata('id_talent');
	
		// used for if form not valid
		$data['page_title'] = "Edit Education";

		$this->form_validation->set_rules('school', '"School"', 'required');
		$this->form_validation->set_rules('from_year', '"From"', 'required');
		$this->form_validation->set_rules('to_year', '"To"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_talent_cv_education);
		}
		else {
			// update data to db
			$affected = $this->TalentCVEducationModel->update($id_talent, $id_talent_cv_education);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit education success');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit education failed');
			}
			// redirect to page ...
			redirect('talent');
		}
	}

	public function delete($id_talent_cv_education)
	{
		$id_talent = $this->session->userdata('id_talent');

		$query = $this->TalentCVEducationModel->delete($id_talent, $id_talent_cv_education);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Delete education success');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Delete education failed');
		}
		// redirect to page ...
		redirect('talent');
	}

}
