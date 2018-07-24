<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestWorkAttitude extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// check user auth
		$id_admin = $this->session->userdata('id_admin');
		if ($id_admin == "") {
			redirect( site_url('admin') );
		}

		$this->load->library('form_validation');
		$this->load->model('test_models/TestWorkAttitudeModel');
	}

	public function index()
	{	
		$data['test_work_attitude'] = $this->TestWorkAttitudeModel->get_all();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_test_work_attitude', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function create()
	{
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_test_work_attitude');
		$this->load->view('skin/admin/footer_admin');
	}

	public function store()
	{
		$this->form_validation->set_rules('statement[]', '"Pernyataan"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->create();
		}
		else {
			// insert data to db
			$result = $this->TestWorkAttitudeModel->insert_batch();

			if($result) {
				// add success message to session
				$this->session->set_flashdata('msg_success', 'Tambah soal berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Tambah soal gagal');
			}

			// redirect to index ...
			redirect('admin/test-work-attitude');
		}
	}

	public function edit($id_test_work_attitude)
	{
		$data['test'] = $this->TestWorkAttitudeModel->find($id_test_work_attitude);

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_test_work_attitude', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function update($id_test_work_attitude)
	{
		$this->form_validation->set_rules('statement', '"Pernyataan"', 'required');

		if($this->form_validation->run() === FALSE) 
		{
			// redirect to function
			$this->edit($id_test_work_attitude);
		}
		else 
		{
			// update data to db
			$affected = $this->TestWorkAttitudeModel->update($id_test_work_attitude);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit soal berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit soal gagal');
			}
			// redirect to page ...
			redirect('admin/test-work-attitude');
		}
	}

	public function delete($id_test_work_attitude)
	{
		$query = $this->TestWorkAttitudeModel->delete($id_test_work_attitude);

		if ($query) 
		{
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus soal berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus soal gagal');
		}
		// redirect to page ...
		redirect('admin/test-work-attitude');
	}

}
