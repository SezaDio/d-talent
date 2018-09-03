<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVCourse extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}

		$this->load->library('form_validation');
		$this->load->model('talent_models/TalentCVCourseModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVWorkModel');
	}

	public function index()
	{
		$data['page_title'] = "Tambah Pelatihan";
		
		// get data for select
		$id_talent = $this->session->userdata('id_talent');
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_cv_course');
		$this->load->view('skin/talent/footer');
	}

	public function store()
	{
		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Tambah Pelatihan";

		$this->form_validation->set_rules('title', '"Nama Pelatihan"', 'required');
		$this->form_validation->set_rules('year', '"Tahun"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get data for select
			$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
			$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_cv_course');
			$this->load->view('skin/talent/footer');
		}
		else {
			// save data to db
			$this->TalentCVCourseModel->create($id_talent);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Tambah pelatihan berhasil');

			// redirect to page ...
			redirect('talent');
		}
	}

	public function edit($id_talent_cv_course)
	{
		$id_talent = $this->session->userdata('id_talent');
		
		$data['page_title'] = "Edit Pelatihan";
		$data['cv_course'] = $this->TalentCVCourseModel->edit($id_talent, $id_talent_cv_course);

		// get data for select
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_course');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_course)
	{
		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Edit Pelatihan";

		$this->form_validation->set_rules('title', '"Nama Pelatihan"', 'required');
		$this->form_validation->set_rules('year', '"Tahun"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_talent_cv_course);
		}
		else {
			// update data to db
			$affected = $this->TalentCVCourseModel->update($id_talent, $id_talent_cv_course);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit pelatihan berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit pelatihan gagal');
			}
			// redirect to page ...
			redirect('talent');
		}
	}

	public function delete($id_talent_cv_course)
	{
		$id_talent = $this->session->userdata('id_talent');

		$query = $this->TalentCVCourseModel->delete($id_talent, $id_talent_cv_course);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus pelatihan berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus pelatihan gagal');
		}
		// redirect to page ...
		redirect('talent');
	}

}
