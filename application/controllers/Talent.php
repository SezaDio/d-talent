<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Talent extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$id_talent = $this->session->userdata('id_talent');

		if ($id_talent == null) {
			return redirect('AccountTalent');
		}

		$this->load->model('talent_models/TalentModel');
		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVAchievementModel');
		$this->load->model('talent_models/TalentCVCourseModel');

		$data['page_title'] = "Talent";
		$data['cv_works'] = $this->TalentCVWorkModel->get_talent_cv_work($id_talent);
		$data['cv_educations'] = $this->TalentCVEducationModel->get_all($id_talent);
		$data['cv_achievements'] = $this->TalentCVAchievementModel->get_all($id_talent);
		$data['cv_courses'] = $this->TalentCVCourseModel->get_all($id_talent);

		// get user data
		$data['talent'] 	= $this->TalentModel->find($id_talent);
		// $data['talent'] = $this->session->userdata();

		// get location name
		$this->db->select('lokasi_nama');
		$this->db->from('inf_lokasi');
		$this->db->where(array('lokasi_kode' => $data['talent']->id_kota));
		$data['talent_location_city'] = $this->db->get()->row()->lokasi_nama;

		// var_dump($data['talent']);
		// die();

		$this->load->view('skin/talent/header', $data);
		$this->load->view('talent/index');
		$this->load->view('skin/talent/footer');
	}

	public function updateAccount()
	{
		$id_talent = $this->session->userdata('id_talent');
		# code...
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

		// $foto_sampul_filename = "file_".time();

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

			// $this->load->library('upload', $config_foto_sampul);
			$this->upload->initialize($config_foto_sampul);
			// if uploaded, delete old file & use new file name
			if($this->upload->do_upload('foto_sampul')) {
				if (file_exists($upload_path . $foto_sampul_filename)) {
					unlink($upload_path . $foto_sampul_filename);
				}
				$upload_data_sampul = $this->upload->data();
				$foto_sampul_filename = $upload_data_sampul['file_name'];
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

			// $this->load->library('upload', $config_foto_profil);
			$this->upload->initialize($config_foto_profil);
			// if uploaded, delete old file & use new file name
			if($this->upload->do_upload('foto_profil')) {
				if (file_exists($upload_path . $foto_profil_filename)) {
					unlink($upload_path . $foto_profil_filename);
				}
				$upload_data_profil = $this->upload->data();
				$foto_profil_filename = $upload_data_profil['file_name'];
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
		redirect('talent/profile/edit');
	}
}
