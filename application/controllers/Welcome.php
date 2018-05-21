<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}
	
	public function index()
	{
		$this->load->helper('url');
		$this->load->model('youth_models/YouthModels');
		$data['listSlider'] = $this->YouthModels->get_data_slider();
		$this->load->view('skin/front_end/welcome',$data);
	}
	
	public function tambah_pepak()//$id_produk
	{
		$data_pepak=array(
			'jawa'=>$_POST['jawa'],
			'indonesia'=>$_POST['indonesia'],
			'deskripsi_jawa'=>$_POST['deskripsi'],
			'status'=>2
		);
		$this->db->insert('pepak', $data_pepak);

	}
}
