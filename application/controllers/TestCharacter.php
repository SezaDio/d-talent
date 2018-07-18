<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCharacter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// check user auth
		$id_admin = $this->session->userdata('id_admin');
		if ($id_admin == "") {
			redirect( site_url('admin') );
		}

		$this->load->library('form_validation');
		$this->load->model('test_models/TestCharacterModel');
	}

	public function index()
	{	
		$data['test_character'] = $this->TestCharacterModel->get_all();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_test_character', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	/*public function create()
	{
		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_test_character');
		$this->load->view('skin/admin/footer_admin');
	}*/

	public function store()
	{
		$this->form_validation->set_rules('question', '"Soal"', 'required');
		$this->form_validation->set_rules('option_a', '"Pilihan A"', 'required');
		$this->form_validation->set_rules('option_b', '"Pilihan B"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->index();
		}
		else {
			// insert data to db
			$result = $this->TestCharacterModel->store();

			if($result) {
				// add success message to session
				$this->session->set_flashdata('msg_success', 'Tambah soal berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Tambah soal gagal');
			}

			// redirect to index ...
			redirect('admin/test-character');
		}
	}

	public function edit($id_test_character)
	{
		$data['test'] = $this->TestCharacterModel->find($id_test_character);

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_test_character', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function update($id_test_character)
	{
		$this->form_validation->set_rules('question', '"Soal"', 'required');
		$this->form_validation->set_rules('option_a', '"Pilihan A"', 'required');
		$this->form_validation->set_rules('option_b', '"Pilihan B"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_test_character);
		}
		else {
			// update data to db
			$affected = $this->TestCharacterModel->update($id_test_character);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit soal berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit soal gagal');
			}
			// redirect to page ...
			redirect('admin/test-character');
		}
	}

	public function delete($id_test_character)
	{
		$query = $this->TestCharacterModel->delete($id_test_character);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus soal berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus soal gagal');
		}
		// redirect to page ...
		redirect('admin/test-character');
	}

}
