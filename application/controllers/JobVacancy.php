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
	
	public function job_list()
	{
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('content_front_end/job_list');
		$this->load->view('skin/front_end/footer_company_page');
	}
	
	function search_job(){
		header('Access-Control-Allow-Origin: *');
        header('Content-type: text/xml');
		$description=$_POST['description'];
		$category=$_POST['category'];
		$type=$_POST['type'];
		
		
		$data = '';
		$data .= 'job_category LIKE "%'.$this->db->escape_like_str($category).'%"';
		$data .= 'AND job_type LIKE "%'.$this->db->escape_like_str($type).'%"';
		$data .= 'AND job_description LIKE "%'.$this->db->escape_like_str($description).'%"';
		$get_job=$this->db->where($data)->get('job_vacancy');
		$this->load->helper('xml');
		$xml_out = '<jobs>';
		if ($get_job->num_rows()>0) {
            foreach ($get_job->result() as $row_job) {
				/*$tanggal = date("j", strtotime($row_event->tgl_mulai));
	            $bulan = date("M", strtotime($row_event->tgl_mulai));
				$deskripsi=strip_tags($row_event->deskripsi_coming);
				$deskripsi=substr($deskripsi,0,400);
					*/			
                $xml_out .= '<job ';
                $xml_out .= 'id_job="' . xml_convert($row_job->id_job) . '" ';
                $xml_out .= 'id_company="' . xml_convert($row_job->id_company) . '" ';
                $xml_out .= 'job_title="' . xml_convert($row_job->job_title) . '" ';
                $xml_out .= 'job_type="' . xml_convert($row_job->job_type) . '" ';
                $xml_out .= 'job_category="' . xml_convert($row_job->job_category) . '" ';
                $xml_out .= 'job_role="' . xml_convert($row_job->job_role) . '" ';
                $xml_out .= 'job_province_location_id="' . xml_convert($row_job->job_province_location_id) . '" ';
                $xml_out .= 'job_city_location_id="' . xml_convert($row_job->job_city_location_id) . '" ';
                $xml_out .= 'job_date_start="' . xml_convert($row_job->job_date_start) . '" ';
                $xml_out .= 'job_date_end="' . xml_convert($row_job->job_date_end) . '" ';
                $xml_out .= 'job_description="' . xml_convert($row_job->job_description) . '" ';
                $xml_out .= 'job_required_skill="' . xml_convert($row_job->job_required_skill) . '" ';
                $xml_out .= 'publish_date="' . xml_convert($row_job->publish_date) . '" ';
                
                $xml_out .= '/>';
            }
        }
		$xml_out .= '</jobs>';
		
        echo $xml_out;
	}
}