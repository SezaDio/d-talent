<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));

		// check user's auth
		$id_talent = $this->session->userdata('id_talent');
		if ($id_talent == "") {
			redirect( site_url('talent/login') );
		}
	}

	public function index()
	{
		$id_talent = $this->session->userdata('id_talent');

		$this->load->model('talent_models/TalentModel');
		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVAchievementModel');
		$this->load->model('talent_models/TalentCVCourseModel');
		$this->load->helper('custom');

		$data['page_title'] = "Talent";

		// get user data
		$data['talent'] 	= $this->TalentModel->find($id_talent);

		// get location name
		$this->db->select('lokasi_nama');
		$this->db->from('inf_lokasi');
		$this->db->where(array('lokasi_kode' => $data['talent']->id_kota));
		$data['talent_location_city'] = $this->db->get()->row()->lokasi_nama;

		// cv
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);
		$data['cv_achievements'] = $this->TalentCVAchievementModel->get_all($id_talent);
		$data['cv_courses'] = $this->TalentCVCourseModel->get_all($id_talent);

		// online test
		$data['result_character'] = $this->TalentModel->findCharacterTest($id_talent);
		if ($data['result_character'] != null) {
			// use function from helper
			$response = detailCharacterResult($data['result_character']->result);
			$data['result_character_sub_title'] = $response['sub_title'];
			$data['result_character_detail'] = $response['result_detail'];
		}
		$data['result_passion'] = $this->TalentModel->findPassionTest($id_talent);
		if ($data['result_passion'] != null) {
			// use function from helper
			$data['result_passion_detail'] = detailPassionResult($data['result_passion']->result);
		}
		$data['result_work_attitude'] = $this->TalentModel->findWorkAttitudeTest($id_talent);
		if ($data['result_work_attitude'] != null) 
		{
			// use function from helper
			$response = detailWorkAttitudeResult($data['result_work_attitude']->result);
			$data['result_work_attitude_title'] = $response['sub_title'];
			$data['result_work_attitude_detail'] = $response['result_detail'];
		}
		$data['result_soft_skill'] = $this->TalentModel->get_soft_skill($id_talent);
		/*$data['result_soft_skill'] = $this->TalentModel->findSoftSkillTest($id_talent);
		if ($data['result_soft_skill'] != null) 
		{
			// use function from helper
			$response = detailSoftSkillResult($data['result_soft_skill']->result);
			$data['result_soft_skill_title'] = $response['sub_title'];
			$data['result_soft_skill_detail'] = $response['result_detail'];
		}*/

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/index');
		$this->load->view('skin/talent/footer');
	}

	//show result test soft skill page
	public function show_result_soft_skill($id_talent)
	{
		$this->load->model('talent_models/TalentModel');

		$data['result_soft_skill'] = $this->TalentModel->select_soft($id_talent)->row();
		$test_data = array(
				1 => $data['result_soft_skill']->pengambilan_keputusan,
				2 => $data['result_soft_skill']->tanggung_jawab,
				3 => $data['result_soft_skill']->integritas,
				4 => $data['result_soft_skill']->resiliensi,
				5 => $data['result_soft_skill']->keinginan_belajar,
				6 => $data['result_soft_skill']->komunikasi,
				7 => $data['result_soft_skill']->sikap_positif,
				8 => $data['result_soft_skill']->antusiasme,
				9 => $data['result_soft_skill']->kerja_tim,
				10 => $data['result_soft_skill']->penyelesaian_masalah
			);

		$this->load->helper('custom');
		// use function from helper
		$response = detailSoftSkillResult($test_data);

		$data['sub_title'] = $response['sub_title'];
		$data['result'] = $response['result_detail'];
		
		// redirect to page result soft skill
		$this->load->view('skin/talent/test_header');
		$this->load->view('talent/test/soft_skill_result', $data);
		$this->load->view('skin/talent/test_footer');
	}

	public function editAccount()
	{
		$this->load->model('talent_models/TalentModel');
		$this->load->model('account/UserModel');

		$id_talent = $this->session->userdata('id_talent');

		$data['page_title'] 	= "Edit Account";
		$data['talent'] 		= $this->TalentModel->find($id_talent);
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();
		$data['lokasiKabupatenKota'] = $this->UserModel->lokasi_kabupaten_kota($data['talent']->id_provinsi);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_account');
		$this->load->view('skin/talent/footer');
	}

	public function updateAccount()
	{
		$this->load->model('talent_models/TalentModel');
		$this->load->library('form_validation');
		
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('nama', '"Nama"', 'required');
		$this->form_validation->set_rules('email', '"Email"', 'required');
		$this->form_validation->set_rules('nomor_ponsel', '"Telepon"', 'required');
		$this->form_validation->set_rules('tanggal_lahir', '"Tanggal Lahir"', 'required');
		$this->form_validation->set_rules('id_kota', '"Lokasi Kota"', 'required');
		$this->form_validation->set_rules('id_provinsi', '"Lokasi Provinsi"', 'required');
		$this->form_validation->set_rules('jenis_kelamin', '"Jenis Kelamin"', 'required');
		$this->form_validation->set_rules('status_pernikahan', '"Status Pernikahan"', 'required');

		if($this->form_validation->run() != FALSE) {
			// update db
			$update = $this->TalentModel->updateAccount($id_talent);
			if ($update) {
				// message
				$this->session->set_flashdata('msg_success', 'Edit akun berhasil');
			}
			else{
				// message
				$this->session->set_flashdata('msg_error', 'Edit akun gagal');
			}
		}

		// redirect to page ...
		redirect('talent');
	}

	public function updatePassword()
	{
		$this->load->model('talent_models/TalentModel');
		$this->load->library('form_validation');
		
		$id_talent = $this->session->userdata('id_talent');

		$this->form_validation->set_rules('old_password', '"Password Lama"', 'required');
		$this->form_validation->set_rules('new_password', '"Password Baru"', 'required');

		if($this->form_validation->run() != FALSE) {

			$old_password = $this->input->post('old_password', 'true');
			$new_password = $this->input->post('new_password','true');
			// check old password
			$this->load->model('member_models/MemberModels');
			$idMember = $this->session->userdata('id_member');
			$loginData = $this->MemberModels->get_member_by_id($idMember);

			$checkData = $this->MemberModels->autentikasi($loginData->username, $old_password, false);
			// $temp_account = $this->TalentModel->checkPassword($id_talent, $old_password)->row();

			if ($checkData) {
				// update db
				// $update = $this->TalentModel->updatePassword($id_talent, $new_password);
				$update = $this->MemberModels->change_password($loginData->id_member, $new_password);
				if ($update) {
					// message
					$this->session->set_flashdata('msg_success', 'Ubah password berhasil');
				}
				else{
					// message
					$this->session->set_flashdata('msg_error', 'Ubah password gagal');
				}
			}
			else{
				// message
				$this->session->set_flashdata('msg_error', 'Password lama tidak valid');
			}
		}

		// redirect to page ...
		redirect('talent');
	}

	public function editProfile()
	{
		$this->load->model('talent_models/TalentModel');

		$id_talent = $this->session->userdata('id_talent');

		$data['page_title'] = "Edit Profil";
		$data['talent'] 	= $this->TalentModel->find($id_talent);

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/form_edit_profile');
		$this->load->view('skin/talent/footer');
	}

	public function updateProfile()
	{
		$this->load->model('talent_models/TalentModel');
		$this->load->library('upload');

		$id_talent = $this->session->userdata('id_talent');

		// default name: use old file name
		$foto_sampul_filename = $this->input->post('old_foto_sampul');
		$foto_profil_filename = $this->input->post('old_foto_profil');
		
		// upload images to path for foto_sampul
		if( !empty($_FILES['foto_sampul']['name']) ) {
			// get filename foto_sampul
			$foto_sampul_filename_new = $_FILES['foto_sampul']['name'];
			$upload_path = "asset/img/upload_img_talent_bg_profile/";
			$config_foto_sampul = array(
				'upload_path' => "./" . $upload_path,
				'allowed_types' => "jpg|png|jpeg",
				'overwrite' => FALSE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'file_name' => $foto_sampul_filename_new
			);

			$this->upload->initialize($config_foto_sampul);
			// if uploaded, delete old file & use new file name
			if($this->upload->do_upload('foto_sampul')) {
				if (file_exists($upload_path . $foto_sampul_filename)) {
					unlink($upload_path . $foto_sampul_filename);
				}
				$upload_data_sampul = $this->upload->data();
				$foto_sampul_filename = $upload_data_sampul['file_name'];
			}
			else
			{
				$this->session->set_flashdata('msg_error', 'Data profil gagal diubah, cek type file dan ukuran file yang anda upload');
				redirect('talent/profile/edit/');
			}
		}
		// upload images to path for foto_profil
		if( !empty($_FILES['foto_profil']['name']) ) {
			// get filename foto_profil
			$foto_profil_filename_new = $_FILES['foto_profil']['name'];
			$upload_path = "asset/img/upload_img_talent_profile/";
			$config_foto_profil = array(
				'upload_path' => "./" . $upload_path,
				'allowed_types' => "jpg|png|jpeg",
				'overwrite' => FALSE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'file_name' => $foto_profil_filename_new
			);

			$this->upload->initialize($config_foto_profil);
			// if uploaded, delete old file & use new file name
			if($this->upload->do_upload('foto_profil')) {
				if (file_exists($upload_path . $foto_profil_filename)) 
				{
					unlink($upload_path . $foto_profil_filename);
				}
				$upload_data_profil = $this->upload->data();
				$foto_profil_filename = $upload_data_profil['file_name'];
			}
			else
			{
				$this->session->set_flashdata('msg_error', 'Data profil gagal diubah, cek type file dan ukuran file yang anda upload');
				redirect('talent/profile/edit/');
			}
		}

		// update db
		$update = $this->TalentModel->updateProfile($id_talent, $foto_sampul_filename, $foto_profil_filename);
		if ($update) {
			// message
			$this->session->set_flashdata('msg_success', 'Edit profil berhasil');
		}
		else{
			// message
			$this->session->set_flashdata('msg_error', 'Edit profil gagal');
		}

		// redirect to page ...
		redirect('talent');
	}

	public function vacancyDetail()
	{
		$data['page_title'] = "Detail Lowongan";

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/vacancy-detail');
		$this->load->view('skin/talent/footer');
	}
}
