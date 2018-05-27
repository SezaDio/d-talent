<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyProfile extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function home()
	{	
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->model('companyprof_models/CompanyProfModels');
		$data['listTestimoni'] = $this->CompanyProfModels->get_testimoni();
		$this->load->view('skin/front_end/index');
		
	}
	
	
}