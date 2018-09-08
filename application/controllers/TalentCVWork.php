<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentCVWork extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}

		$this->load->library('form_validation');
		$this->load->model('talent_models/TalentCVWorkModel');
	}

	public function index()
	{
		$data['page_title'] = "Add Work Experience";

		// get location's name
		$this->db->select('lokasi_ID, lokasi_nama');
		$this->db->from('inf_lokasi');
		$this->db->where('lokasi_kabupatenkota >', 0);
		$this->db->where('lokasi_kecamatan', 0);
		$this->db->where('lokasi_kelurahan', 0);

		$data['locations'] = $this->db->get()->result();

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_cv_work');
		$this->load->view('skin/talent/footer');
	}

	public function store()
	{
		$id_talent = $this->session->userdata('id_talent');
		// used for if form not valid
		$data['page_title'] = "Add Work Experience";

		$this->form_validation->set_rules('position', '"Position"', 'required');
		$this->form_validation->set_rules('company', '"Company"', 'required');
		$this->form_validation->set_rules('work_start', '"From"', 'required');
		$this->form_validation->set_rules('work_end', '"To"', 'required');

		if($this->form_validation->run() === FALSE) {
			// get location's name
			$this->db->select('lokasi_ID, lokasi_nama');
			$this->db->from('inf_lokasi');
			$this->db->where('lokasi_kabupatenkota >', 0);
			$this->db->where('lokasi_kecamatan', 0);
			$this->db->where('lokasi_kelurahan', 0);

			$data['locations'] = $this->db->get()->result();

			$this->load->view('skin/talent/header', $data);
			$this->load->view('talent/form_cv_work');
			$this->load->view('skin/talent/footer');
			// redirect('talent/cv-work-experience/create');
		}
		else {
			// save data to db
			$this->TalentCVWorkModel->create_talent_cv_work($id_talent);
			// add message to session
			$this->session->set_flashdata('msg_success', 'Add work experience success');

			// redirect to page ...
			redirect('talent');
		}
	}

	public function edit($id_talent_cv_work)
	{
		$id_talent = $this->session->userdata('id_talent');

		$data['page_title'] = "Edit Add Experience";
		$data['cv_work'] 	= $this->TalentCVWorkModel->edit_talent_cv_work($id_talent, $id_talent_cv_work);

		// get location's name
		$this->db->select('lokasi_ID, lokasi_nama');
		$this->db->from('inf_lokasi');
		$this->db->where('lokasi_kabupatenkota >', 0);
		$this->db->where('lokasi_kecamatan', 0);
		$this->db->where('lokasi_kelurahan', 0);

		$data['locations'] = $this->db->get()->result();

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_cv_work');
		$this->load->view('skin/talent/footer');
	}

	public function update($id_talent_cv_work)
	{
		$id_talent = $this->session->userdata('id_talent');

		// used for if form not valid
		$data['page_title'] = "Edit Add Experience";

		$this->form_validation->set_rules('position', '"Position"', 'required');
		$this->form_validation->set_rules('company', '"Company"', 'required');
		$this->form_validation->set_rules('work_start', '"From"', 'required');
		$this->form_validation->set_rules('work_end', '"To"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_talent_cv_work);
		}
		else {
			// update data to db
			$affected = $this->TalentCVWorkModel->update_talent_cv_work($id_talent, $id_talent_cv_work);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit add experience success');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit add experience failed');
			}
			// redirect to page ...
			redirect('talent');
		}
	}

	public function delete($id_talent_cv_work)
	{
		$id_talent = $this->session->userdata('id_talent');

		$query = $this->TalentCVWorkModel->delete($id_talent, $id_talent_cv_work);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Delete add experience success');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Delete add experience failed');
		}
		// redirect to page ...
		redirect('talent');
	}

}
