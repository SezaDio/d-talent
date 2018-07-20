<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestSoftskill extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// check user auth
		$id_admin = $this->session->userdata('id_admin');
		if ($id_admin == "") {
			redirect( site_url('admin') );
		}

		$this->load->library('form_validation');
		$this->load->model('test_models/TestSoftskillModel');
	}

	public function index()
	{	
		$data['test_softskill'] = $this->TestSoftskillModel->get_all();
		$data['softskill_sub_category'] = $this->softskillSubCategory();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/kelola_test_softskill', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function create()
	{
		$data['softskill_sub_category'] = $this->softskillSubCategory();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/tambah_test_softskill', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	// softskill sub category list
	private function softskillSubCategory()
	{
		return array(
			'subc-1'  => 'Pengambilan Keputusan',
			'subc-2'  => 'Tanggungjawab',
			'subc-3'  => 'Integritas',
			'subc-4'  => 'Resiliensi',
			'subc-5'  => 'Keinginan untuk Belajar',
			'subc-6'  => 'Komunikasi',
			'subc-7'  => 'Sikap Positif',
			'subc-8'  => 'Antusiasme',
			'subc-9'  => 'Kerja Tim',
			'subc-10' => 'Penyelesaian Masalah',
			);
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
			$result = $this->TestSoftskillModel->insert_batch();

			if($result) {
				// add success message to session
				$this->session->set_flashdata('msg_success', 'Tambah soal berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Tambah soal gagal');
			}

			// redirect to index ...
			redirect('admin/test-softskill');
		}
	}

	public function edit($id_test_softskill)
	{
		$data['test'] = $this->TestSoftskillModel->find($id_test_softskill);
		$data['softskill_sub_category'] = $this->softskillSubCategory();

		$this->load->view('skin/admin/header_admin');
		$this->load->view('skin/admin/nav_kiri');
		$this->load->view('content_admin/edit_test_softskill', $data);
		$this->load->view('skin/admin/footer_admin');
	}

	public function update($id_test_softskill)
	{
		$this->form_validation->set_rules('category', '"Kategori"', 'required');
		$this->form_validation->set_rules('statement', '"Pernytaan"', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->edit($id_test_softskill);
		}
		else {
			// update data to db
			$affected = $this->TestSoftskillModel->update($id_test_softskill);
			
			if ($affected) {
				// add message to session
				$this->session->set_flashdata('msg_success', 'Edit soal berhasil');
			}
			else {
				// add message to session
				$this->session->set_flashdata('msg_error', 'Edit soal gagal');
			}
			// redirect to page ...
			redirect('admin/test-softskill');
		}
	}

	public function delete($id_test_softskill)
	{
		$query = $this->TestSoftskillModel->delete($id_test_softskill);

		if ($query) {
			// add message to session
			$this->session->set_flashdata('msg_success', 'Hapus soal berhasil');
		}
		else {
			// add message to session
			$this->session->set_flashdata('msg_error', 'Hapus soal gagal');
		}
		// redirect to page ...
		redirect('admin/test-softskill');
	}

}
