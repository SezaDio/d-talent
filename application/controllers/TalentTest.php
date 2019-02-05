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
		$data['test_type'] = 'access_denied';
		
		$this->load->view('skin/talent/test_header', $data);
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
		$data['test_type'] = 'character';

		$this->load->view('skin/talent/test_header', $data);
		$this->load->view('talent/test/character');
		$this->load->view('skin/talent/test_footer');
	}

	// scoring character test
	public function submitCharacter()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('answer[]', '', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('msg_error', 'All questions are required');
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
				$data['test_type'] = 'result';

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Submit test success');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Submit test failed');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header', $data);
			$this->load->view('talent/test/character_result');
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
		$data['test_type'] = 'passion';

		$this->load->view('skin/talent/test_header', $data);
		$this->load->view('talent/test/passion');
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
			$this->session->set_flashdata('msg_error', 'All questions are required');
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
				$data['test_type'] = 'result';

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Submit test success');
			}
			else {
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Submit test failed');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header', $data);
			$this->load->view('talent/test/passion_result');
			$this->load->view('skin/talent/test_footer');
		}
	}

	// display work attitude test view
	public function showWorkAttitude()
	{
		$id_talent = $this->session->userdata('id_talent');
		$query = $this->db->get_where('result_work_attitude', ['id_talent'=>$id_talent]);
		if ($query->num_rows() > 0) {
			redirect('talent/test/access-denied');
		}

		$this->load->model('test_models/TestWorkAttitudeModel');
		$data['test_work_attitude'] = $this->TestWorkAttitudeModel->get_all();
		$data['total_records'] = count($data['test_work_attitude']);
		$data['test_type'] = 'work_attitude';

		$this->load->view('skin/talent/test_header', $data);
		$this->load->view('talent/test/work_attitude');
		$this->load->view('skin/talent/test_footer');
	}

	// scoring work attitude test
	public function submitWorkAttitude()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('answer[]', '', 'required');

		if ($this->form_validation->run() === FALSE) 
		{
			$this->session->set_flashdata('msg_error', 'All questions are required');
			// redirect to function
			$this->showWorkAttitude();
		}
		else {
			// get test's result
			$answers = $this->input->post('answer[]');

			$test_result = $this->calculateWorkAttitudeResult($answers);

			// insert data to db
			$insert_data = array(
				'id_talent' => $id_talent,
				'result'    => $test_result
			);
			$query = $this->db->insert('result_work_attitude', $insert_data);

			if ($query) 
			{
				$this->load->helper('custom');
				// use function from helper
				$response = detailWorkAttitudeResult($test_result);
	  			$data['result'] = $test_result;
	  			$data['sub_title'] = $response['sub_title'];
				// get result detail
	  			$data['result_detail'] = $response['result_detail'];
				$data['test_type'] = 'result';

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Submit test success');
			}
			else 
			{
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Submit test failed');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header', $data);
			$this->load->view('talent/test/work_attitude_result');
			$this->load->view('skin/talent/test_footer');
		}
	}

	// calculate character test's result
	private function calculateWorkAttitudeResult($answers)
	{
		$no = 0;
		// character test's score
		$ss_score = 0;
		$s_score = 0;
		$n_score = 0;
		$ts_score = 0;
		$sts_score = 0;

		foreach ($answers as $key => $value) 
		{
			$no = $key + 1;

			//Count answer (Sangat Sesuai)
			if ($value == "Sangat Sesuai") 
			{
				$ss_score++;
			}
			elseif ($value == "Sesuai") 
			{
				$s_score++;
			}
			elseif ($value == "Netral") 
			{
				$n_score++;
			}
			elseif ($value == "Tidak Sesuai") 
			{
				$ts_score++;
			}
			elseif ($value == "Sangat Tidak Sesuai") 
			{
				$sts_score++;
			}
		}

		//Menghitung nilai tiap kategori
		$ss_score  = $ss_score*5;
		$s_score   = $s_score*4;
		$n_score   = $n_score*3;
		$ts_score  = $ts_score*2;
		$sts_score = $sts_score*1;

		//Mengambil nilai yang paling besar
		$result_max = max($ss_score, $s_score, $n_score, $ts_score, $sts_score);

		//Kategori hasil nilai terbesar
		if ($result_max >= 30 AND $result_max <= 70) 
		{
			$result = "Rendah";
		}
		elseif ($result_max > 70 AND $result_max <= 110) 
		{
			$result = "Sedang";
		}
		elseif ($result_max > 110 AND $result_max <= 150) 
		{
			$result = "Baik";
		}

		return $result;
	}

	// display soft skill test view
	public function showSoftSkill()
	{
		$id_talent = $this->session->userdata('id_talent');
		$query = $this->db->get_where('result_soft_skill', ['id_talent'=>$id_talent]);
		if ($query->num_rows() > 0) {
			redirect('talent/test/access-denied');
		}

		$this->load->model('test_models/TestSoftskillModel');
		$data['test_soft_skill'] = $this->TestSoftskillModel->get_all();
		$data['total_records'] = count($data['test_soft_skill']);
		$data['test_type'] = 'soft_skill';

		$this->load->view('skin/talent/test_header', $data);
		$this->load->view('talent/test/soft_skill');
		$this->load->view('skin/talent/test_footer');
	}

	// scoring soft skill test
	public function submitSoftSkill()
	{
		$id_talent = $this->session->userdata('id_talent');

		$pengambilan_keputusan_skor = 0;
		$tanggung_jawab_skor		= 0;
		$integritas_skor			= 0;
		$resiliensi_skor			= 0;
		$keinginan_belajar_skor		= 0;
		$komunikasi_skor			= 0;
		$sikap_positif_skor			= 0;
		$antusiasme_skor			= 0;
		$kerja_tim_skor				= 0;
		$penyelesaian_masalah_skor	= 0;

		$this->form_validation->set_rules('subc-1[]', '', 'required');
		$this->form_validation->set_rules('subc-2[]', '', 'required');
		$this->form_validation->set_rules('subc-3[]', '', 'required');
		$this->form_validation->set_rules('subc-4[]', '', 'required');
		$this->form_validation->set_rules('subc-5[]', '', 'required');
		$this->form_validation->set_rules('subc-6[]', '', 'required');
		$this->form_validation->set_rules('subc-7[]', '', 'required');
		$this->form_validation->set_rules('subc-8[]', '', 'required');
		$this->form_validation->set_rules('subc-9[]', '', 'required');
		$this->form_validation->set_rules('subc-10[]', '', 'required');

		if($this->form_validation->run() === FALSE) 
		{
			$this->session->set_flashdata('msg_error', 'All questions are required');
			// redirect to function
			$this->showPassion();
		}
		else 
		{
			// get test's result intrapersonal
			$pengambilan_keputusan    = $this->input->post('subc-1[]');
			$tanggung_jawab    		  = $this->input->post('subc-2[]');
			$integritas    			  = $this->input->post('subc-3[]');
			$resiliensi    			  = $this->input->post('subc-4[]');
			$keinginan_belajar    	  = $this->input->post('subc-5[]');

			// get test's result interpersonal
			$komunikasi    			  = $this->input->post('subc-6[]');
			$sikap_positif    		  = $this->input->post('subc-7[]');
			$antusiasme    			  = $this->input->post('subc-8[]');
			$kerja_tim    			  = $this->input->post('subc-9[]');
			$penyelesaian_masalah     = $this->input->post('subc-10[]');

			//Count value every category (Pengambilan Keputusan)
			foreach ($pengambilan_keputusan as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$pengambilan_keputusan_skor = $pengambilan_keputusan_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$pengambilan_keputusan_skor = $pengambilan_keputusan_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$pengambilan_keputusan_skor = $pengambilan_keputusan_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$pengambilan_keputusan_skor = $pengambilan_keputusan_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$pengambilan_keputusan_skor = $pengambilan_keputusan_skor + 1;
				}
			}

			//Count value every category (Tanggung Jawab)
			foreach ($tanggung_jawab as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$tanggung_jawab_skor = $tanggung_jawab_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$tanggung_jawab_skor = $tanggung_jawab_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$tanggung_jawab_skor = $tanggung_jawab_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$tanggung_jawab_skor = $tanggung_jawab_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$tanggung_jawab_skor = $tanggung_jawab_skor + 1;
				}
			}

			//Count value every category (Integritas)
			foreach ($integritas as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$integritas_skor = $integritas_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$integritas_skor = $integritas_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$integritas_skor = $integritas_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$integritas_skor = $integritas_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$integritas_skor = $integritas_skor + 1;
				}
			}

			//Count value every category (Resiliensi)
			foreach ($resiliensi as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$resiliensi_skor = $resiliensi_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$resiliensi_skor = $resiliensi_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$resiliensi_skor = $resiliensi_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$resiliensi_skor = $resiliensi_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$resiliensi_skor = $resiliensi_skor + 1;
				}
			}

			//Count value every category (Keinginan Belajar)
			foreach ($keinginan_belajar as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$keinginan_belajar_skor = $keinginan_belajar_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$keinginan_belajar_skor = $keinginan_belajar_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$keinginan_belajar_skor = $keinginan_belajar_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$keinginan_belajar_skor = $keinginan_belajar_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$keinginan_belajar_skor = $keinginan_belajar_skor + 1;
				}
			}

			//Count value every category (Komunikasi)
			foreach ($komunikasi as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$komunikasi_skor = $komunikasi_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$komunikasi_skor = $komunikasi_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$komunikasi_skor = $komunikasi_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$komunikasi_skor = $komunikasi_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$komunikasi_skor = $komunikasi_skor + 1;
				}
			}

			//Count value every category (Sikap Positif)
			foreach ($sikap_positif as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$sikap_positif_skor = $sikap_positif_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$sikap_positif_skor = $sikap_positif_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$sikap_positif_skor = $sikap_positif_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$sikap_positif_skor = $sikap_positif_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$sikap_positif_skor = $sikap_positif_skor + 1;
				}
			}

			//Count value every category (Antusiasme)
			foreach ($antusiasme as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$antusiasme_skor = $antusiasme_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$antusiasme_skor = $antusiasme_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$antusiasme_skor = $antusiasme_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$antusiasme_skor = $antusiasme_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$antusiasme_skor = $antusiasme_skor + 1;
				}
			}

			//Count value every category (Kerja Tim)
			foreach ($kerja_tim as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$kerja_tim_skor = $kerja_tim_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$kerja_tim_skor = $kerja_tim_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$kerja_tim_skor = $kerja_tim_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$kerja_tim_skor = $kerja_tim_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$kerja_tim_skor = $kerja_tim_skor + 1;
				}
			}

			//Count value every category (Penyelesaian Masalah)
			foreach ($penyelesaian_masalah as $key => $value) 
			{
				$no = $key + 1;

				//Count Answer
				if ($value == "Sangat Sesuai") 
				{
					$penyelesaian_masalah_skor = $penyelesaian_masalah_skor + 5;
				}
				elseif ($value == "Sesuai")
				{
					$penyelesaian_masalah_skor = $penyelesaian_masalah_skor + 4;
				}
				elseif ($value == "Netral")
				{
					$penyelesaian_masalah_skor = $penyelesaian_masalah_skor + 3;
				}
				elseif ($value == "Tidak Sesuai")
				{
					$penyelesaian_masalah_skor = $penyelesaian_masalah_skor + 2;
				}
				elseif ($value == "Sangat Tidak Sesuai")
				{
					$penyelesaian_masalah_skor = $penyelesaian_masalah_skor + 1;
				}
			}

			//Simpan score ke array
			$result_score = array(
							1  => $pengambilan_keputusan_skor,
							2  => $tanggung_jawab_skor,
							3  => $integritas_skor,
							4  => $resiliensi_skor,
							5  => $keinginan_belajar_skor,
							6  => $komunikasi_skor,
							7  => $sikap_positif_skor,
							8  => $antusiasme_skor,
							9  => $kerja_tim_skor,
							10 => $penyelesaian_masalah_skor 
							);

			//convert every category score into character value
			$no = 0;
			foreach ($result_score as $key => $value) 
			{
				$no++;
				if ($value >= 4 AND $value <= 9) 
				{
					$char_result[$no] = "Dasar";
				}
				elseif ($value > 9 AND $value <= 15)
				{
					$char_result[$no] = "Menengah";
				}
				elseif ($value > 15 AND $value <= 20)
				{
					$char_result[$no] = "Tinggi";
				}
			}

			// insert result data to database
			$insert_data = array(
				'id_talent' => $id_talent,
				'pengambilan_keputusan' => $char_result[1],
				'tanggung_jawab' => $char_result[2],
				'integritas' => $char_result[3],
				'resiliensi' => $char_result[4],
				'keinginan_belajar' => $char_result[5],
				'komunikasi' => $char_result[6],
				'sikap_positif' => $char_result[7],
				'antusiasme' => $char_result[8],
				'kerja_tim' => $char_result[9],
				'penyelesaian_masalah' => $char_result[10]
			);
			$query = $this->db->insert('result_soft_skill', $insert_data);

			//Show result page 
			if($query) 
			{
				$this->load->helper('custom');
				// use function from helper
	  			$response = detailSoftSkillResult($char_result);

	  			$data['sub_title'] = $response['sub_title'];
	  			$data['result'] = $response['result_detail'];
				$data['test_type'] = 'result';

				// add success message to session
				$this->session->set_flashdata('msg_success', 'Submit test success');
			}
			else 
			{
				// add failed message to session
				$this->session->set_flashdata('msg_error', 'Submit test failed');
			}

			// redirect to index ...
			$this->load->view('skin/talent/test_header', $data);
			$this->load->view('talent/test/soft_skill_result');
			$this->load->view('skin/talent/test_footer');
		}
	}
}
