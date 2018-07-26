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

	// display access denied view
	public function accessDenied()
	{
		$this->load->view('skin/talent/test_header');
		$this->load->view('talent/test/access_denied');
		$this->load->view('skin/talent/test_footer');
	}

	// display character test view
	public function showCharacter()
	{
		$id_talent = $this->session->userdata('id_talent');
		$query = $this->db->get_where('result_character', ['id_talent'=>$id_talent]);
		if ($query->num_rows() > 0) {
			redirect('talent/test/access-denied');
		}

		$this->load->model('test_models/TestCharacterModel');
		$data['test_character'] = $this->TestCharacterModel->get_all();
		$data['total_records'] = count($data['test_character']);

		$this->load->view('skin/talent/test_header');
		$this->load->view('talent/test/character', $data);
		$this->load->view('skin/talent/test_footer');
	}

	// scoring character test
	public function submitCharacter()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('answer[]', '', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('msg_error', 'Terdapat pertanyaan yang belum dijawab');
			// redirect to function
			$this->showCharacter();
		}
		else {
			// get test's result
			$answers = $this->input->post('answer[]');

			$test_result = $this->calculateCharacterResult($answers);

			// insert data to db
			$insert_data = array(
				'id_talent' => $id_talent,
				'result'    => $test_result
			);
			$query = $this->db->insert('result_character', $insert_data);

			if($query) {
				$this->load->helper('custom');
				// use function from helper
				$response = detailCharacterResult($test_result);
	  			$data['result'] = $test_result;
	  			$data['sub_title'] = $response['sub_title'];
				// get result detail
	  			$data['result_detail'] = $response['result_detail'];

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Kirim tes berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Kirim tes gagal');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header');
			$this->load->view('talent/test/character_result', $data);
			$this->load->view('skin/talent/test_footer');
		}
	}

	// calculate character test's result
	private function calculateCharacterResult($answers)
	{
		$no = 0;
		// character test's score
		$E_score = 0;
		$I_score = 0;
		$S_score = 0;
		$N_score = 0;
		$T_score = 0;
		$F_score = 0;
		$J_score = 0;
		$P_score = 0;

		foreach ($answers as $key => $value) {
			$no = $key + 1;
			// count E & I
			if ($no % 7 == 1) {
				if ($value == "a") {
					$E_score++;
				}
				else{
					$I_score++;
				}
			}
			// count S & N
			elseif ($no % 7 == 2 || $no % 7 == 3) {
				if ($value == "a") {
					$S_score++;
				}
				else{
					$N_score++;
				}
			}
			// count T & F
			elseif ($no % 7 == 4 || $no % 7 == 5) {
				if ($value == "a") {
					$T_score++;
				}
				else{
					$F_score++;
				}
			}
			// count J & P
			elseif ($no % 7 == 6 || $no % 7 == 0) {
				if ($value == "a") {
					$J_score++;
				}
				else{
					$P_score++;
				}
			}
		}

		if ($E_score > $I_score) {
			$result = "E";
		}
		else{
			$result = "I";
		}

		if ($S_score > $N_score) {
			$result = $result . "S";
		}
		else{
			$result = $result . "N";
		}

		if ($T_score > $F_score) {
			$result = $result . "T";
		}
		else{
			$result = $result . "F";
		}

		if ($J_score > $P_score) {
			$result = $result . "J";
		}
		else{
			$result = $result . "P";
		}

		return $result;
	}


	// display passion test view
	public function showPassion()
	{
		$id_talent = $this->session->userdata('id_talent');
		$query = $this->db->get_where('result_passion', ['id_talent'=>$id_talent]);
		if ($query->num_rows() > 0) {
			redirect('talent/test/access-denied');
		}

		$this->load->model('test_models/TestPassionModel');
		$data['test_passion'] = $this->TestPassionModel->get_all();
		$data['total_records'] = count($data['test_passion']);

		$this->load->view('skin/talent/test_header');
		$this->load->view('talent/test/passion', $data);
		$this->load->view('skin/talent/test_footer');
	}

	// scoring character test
	public function submitPassion()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('realistis[]', '', 'required');
		$this->form_validation->set_rules('investigasi[]', '', 'required');
		$this->form_validation->set_rules('artistik[]', '', 'required');
		$this->form_validation->set_rules('sosial[]', '', 'required');
		$this->form_validation->set_rules('enterpreuner[]', '', 'required');
		$this->form_validation->set_rules('konvensional[]', '', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('msg_error', 'Terdapat pertanyaan yang belum dijawab');
			// redirect to function
			$this->showPassion();
		}
		else {
			// get test's result
			$realistis    = $this->input->post('realistis[]');
			$investigasi  = $this->input->post('investigasi[]');
			$artistik 	  = $this->input->post('artistik[]');
			$sosial 	  = $this->input->post('sosial[]');
			$enterpreuner = $this->input->post('enterpreuner[]');
			$konvensional = $this->input->post('konvensional[]');

			// sum all array values
			$array_result['realistis']    = array_sum($realistis);
			$array_result['investigasi']  = array_sum($investigasi);
			$array_result['artistik'] 	  = array_sum($artistik);
			$array_result['sosial'] 	  = array_sum($sosial);
			$array_result['enterpreuner'] = array_sum($enterpreuner);
			$array_result['konvensional'] = array_sum($konvensional);

			// get array key that has max value
			$test_result = array_keys($array_result, max($array_result));
			$test_result = ucfirst($test_result[0]);

			// insert data to db
			$insert_data = array(
				'id_talent' => $id_talent,
				'result'    => $test_result
			);
			$query = $this->db->insert('result_passion', $insert_data);

			if($query) {
				$this->load->helper('custom');
				// use function from helper
	  			$data['result_detail'] = detailPassionResult($test_result);

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Kirim tes berhasil');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Kirim tes gagal');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header');
			$this->load->view('talent/test/passion_result', $data);
			$this->load->view('skin/talent/test_footer');
		}
	}

}
