<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestPassion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// check user auth
		$id_admin = $this->session->userdata('id_admin');
		if ($id_admin == "") {
			redirect( site_url('admin') );
		}

		$this->load->library('form_validation');
		$this->load->model('test_models/TestPassionModel');
	}

	public function index()
	{	
		$data['test_passion'] = $this->TestPassionModel->get_all();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_test_passion', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function create()
	{
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_test_passion');
		$this->load->view('skin/admin/footer_admin');
	}

	public function store()
	{
		$this->form_validation->set_rules('category[]', '"Kategori"', 'required');
		$this->form_validation->set_rules('statement[]', '"Pernytaan"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->create();
		}
		else {
			// insert data to db
			$result = $this->TestPassionModel->insert_batch();

			if($result) {
				// add success message to session
				$this->session->set_flashdata('msg_success', 'Tambah soal berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Tambah soal gagal');
			}

			// redirect to index ...
			redirect('admin/test-passion-interest');
		}
	}

	public function edit($id_test_passion)
	{
		$data['test'] = $this->TestPassionModel->find($id_test_passion);

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_test_passion', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function update($id_test_passion)
	{
		$this->form_validation->set_rules('category', '"Kategori"', 'required');
		$this->form_validation->set_rules('statement', '"Pernytaan"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_test_passion);
		}
		else {
			// update data to db
			$affected = $this->TestPassionModel->update($id_test_passion);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit soal berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit soal gagal');
			}
			// redirect to page ...
			redirect('admin/test-passion-interest');
		}
	}

	public function delete($id_test_passion)
	{
		$query = $this->TestPassionModel->delete($id_test_passion);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus soal berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus soal gagal');
		}
		// redirect to page ...
		redirect('admin/test-passion-interest');
	}

}
