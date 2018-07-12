<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobVacancy extends CI_Controller 
{
	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	// Menampilkan halaman see jobs ketika talent klik lihat pekerjaan pada halaman company page 
	public function index()
	{
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('content_front_end/job_list_page_talent_view');
		$this->load->view('skin/front_end/footer_company_page');
	}
	
	public function job_list()
	{
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('content_front_end/job_list');
		$this->load->view('skin/front_end/footer_company_page');
	}
}