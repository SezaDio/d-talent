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
		//Data Job Categoru Perusahaan
		$job_category = array(
							  'jc-1'=>'Software Engineering',
                              'jc-2'=>'Data Science',
                              'jc-3'=>'Design',
                              'jc-4'=>'Operations',
                              'jc-5'=>'Marketing',
                              'jc-6'=>'Product Management',
                              'jc-7'=>'Bussiness Development',
                              'jc-8'=>'Engineering',
                              'jc-9'=>'Management',
                              'jc-10'=>'Finance',
                              'jc-11'=>'Human Resource',
                              'jc-12'=>'Media & Communication',
                              'jc-13'=>'Consulting',
                              'jc-14'=>'Other'
                              );
		$data['job_category']= $job_category;

		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('content_front_end/job_list_page_talent_view', $data);
		$this->load->view('skin/front_end/footer_company_page');
	}
}