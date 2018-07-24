<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentTest extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// check user auth
		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}

		$this->load->library('form_validation');
	}

	public function showCharacter()
	{	
		$this->load->model('test_models/TestCharacterModel');
		$data['test_character'] = $this->TestCharacterModel->get_all();
		$data['total_records'] = count($data['test_character']);

		$this->load->view('skin/talent/test_header');
		$this->load->view('talent/test/character', $data);
		$this->load->view('skin/talent/test_footer');
	}

	public function submitCharacter()
	{
		$this->form_validation->set_rules('answer[]', '', 'required');

		if($this->form_validation->run() === FALSE) {
			// redirect to function
			$this->showCharacter();
		}
		else {
			$this->load->model('talent_models/TalentTestModel');
			// insert data to db
			$result = $this->TalentTestModel->store_character();

			if($result) {
				// add success message to session
				$this->session->set_flashdata('msg_success', 'Kirim tes berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Kirim tes gagal');
			}

			// redirect to index ...
			$this->load->view('talent/test/character-result', $data);
			// redirect('talent/test-character/result');
		}
	}

}
