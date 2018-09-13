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
		$this->load->library('pagination');

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
		$data['active'] = 2;

		$this->load->library('pagination');
		$this->load->model('account/UserModel');
		$this->load->model('job_models/JobVacancyModel');
		$this->load->model('dashboard_models/DashboardModels');
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();
        $listVacancy = $this->DashboardModels->get_data_job_vacancy();
		$data['page_title'] = "Talent | Job List";

		// get job category list
		$data['job_category'] = $this->get_job_category_list();
		// get job type list
		$data['job_type'] 	  = $this->get_job_type_list();
		
		
		$base_url = site_url('job-vacancy/page');
		$uri_segment = 3;
		$limit_per_page = 10;
        $total_rows = $this->JobVacancyModel->get_total();
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

        // get job & company
		$data['jobs_list'] = $this->JobVacancyModel->get_all_jobs($limit_per_page, $start_index);
		$i=0;
		// get company name
		foreach ($data['jobs_list'] as $row_vacancy) 
		{
			$company_name[$i] = $row_vacancy->company_name;
			$i++;
		}
		/*foreach ($listVacancy as $row_vacancy) 
		{
			$get_name_company = $this->db->select('company_name')->where('id_company',$row_vacancy['id_company'])->get('company')->result();
			$company_name[$i] = $get_name_company[0]->company_name;
			$i++;
		}*/

		$data['company_name'] = $company_name;
		
		$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);
		
		
		$this->load->view('skin/talent/header',$data);
		$this->load->view('content_front_end/job_list',$data);
		$this->load->view('skin/talent/footer');
	}
	
	public function detail_job($id_job)
	{
		$data['active'] = 2;
		
		$this->load->model('account/UserModel');
		$this->load->model('job_models/JobVacancyModel');
		$data['page_title'] = "Talent";
		$data_job = $this->JobVacancyModel->select_by_id_job($id_job);
		$data_company = $this->JobVacancyModel->select_by_id_company($data_job['id_company']);
		$data['company_name'] = $data_company['company_name'];
		$data['company_cover'] = $data_company['company_cover'];
		$data['company_logo'] = $data_company['company_logo'];
		$data['job_title'] = $data_job['job_title'];
		$data['job_description'] = $data_job['job_description'];
		$data['province'] = $data_job['province'];
		$data['city'] = $data_job['city'];
		$data['job_date_start'] = $data_job['job_date_start'];
		$data['job_date_end'] = $data_job['job_date_end'];
		$data['job_required_skill'] = $data_job['job_required_skill'];
		
		// get job category
		$job_categories 	  = $this->get_job_category_list();
		$data['job_category'] = $job_categories[$data_job['job_category']];
		// get job type list
		$job_types 	  	  = $this->get_job_type_list();
		$data['job_type'] = $job_types[$data_job['job_type']];

		$this->load->view('skin/talent/header',$data);
		$this->load->view('content_front_end/jobs_page_detail', $data);
		$this->load->view('skin/talent/footer');
	}
	
	function search_job(){
		header('Access-Control-Allow-Origin: *');
        header('Content-type: text/xml');
		$description=$_POST['description'];
		$category=$_POST['category'];
		$type=$_POST['type'];
		$province=$_POST['province'];
		
		
		$data = '';
		$data .= 'job_category LIKE "%'.$this->db->escape_like_str($category).'%"';
		$data .= 'AND job_type LIKE "%'.$this->db->escape_like_str($type).'%"';
		$data .= 'AND job_title LIKE "%'.$this->db->escape_like_str($description).'%"';
		$data .= 'AND job_province_location_id LIKE "%'.$this->db->escape_like_str($province).'%"';
		
		$this->db->select('job_vacancy.*, company.*, t_province.lokasi_nama AS province, t_city.lokasi_nama AS city');
		$this->db->from('job_vacancy');
		$this->db->where($data);
		$this->db->join('inf_lokasi t_province', 't_province.lokasi_ID = job_vacancy.job_province_location_id', 'left');
		$this->db->join('inf_lokasi t_city', 't_city.lokasi_kode = job_vacancy.job_city_location_id', 'left');
		$this->db->join('company', 'company.id_company = job_vacancy.id_company', 'left');
		$this->db->order_by('publish_date', 'DESC');
		
		
		$get_job=$this->db->get();
		$this->load->helper('xml');
		$xml_out = '<jobs>';
		if ($get_job->num_rows()>0) {
            foreach ($get_job->result() as $row_job) {
				
				$get_name_company=$this->db->select('company_name')->where('id_company',$row_job->id_company)->get('company')->result();
				$get_logo_company=$this->db->select('company_logo')->where('id_company',$row_job->id_company)->get('company')->result();
				$job_category = $this->get_job_category_search($row_job->job_category);
                $xml_out .= '<job ';
                $xml_out .= 'id_job="' . xml_convert($row_job->id_job) . '" ';
                $xml_out .= 'id_company="' . xml_convert($row_job->id_company) . '" ';
                $xml_out .= 'company_name="' . $get_name_company[0]->company_name . '" ';
                $xml_out .= 'company_logo="' . $get_logo_company[0]->company_logo . '" ';
                $xml_out .= 'job_title="' . xml_convert($row_job->job_title) . '" ';
                $xml_out .= 'job_type="' . xml_convert($row_job->job_type) . '" ';
                $xml_out .= 'job_category="'.$job_category.'" ';
                $xml_out .= 'job_role="' . xml_convert($row_job->job_role) . '" ';
                $xml_out .= 'job_province_location_id="' . xml_convert($row_job->province) . '" ';
                $xml_out .= 'job_city_location_id="' . xml_convert($row_job->city) . '" ';
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
	
	// company job category list
	private function get_job_category_list()
	{
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
		return $job_category;
	}

	// company job type list
	private function get_job_type_list()
	{
		$job_type = array(
					  'jt-1'=>'Part Time',
	                  'jt-2'=>'Full Time',
	                  'jt-3'=>'Internship'
	                  );
		return $job_type;
	}
	
	private function get_job_category_search($category){
		$job_category = $this->get_job_category_list();
		foreach ($job_category as $key=>$name_category){
			if($key == $category){
				return $name_category;
				break;
			}
		}
	}
	
	private function custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows)
	{
        // pagination config
        $config['base_url'] = $base_url;
		$config["uri_segment"] = $uri_segment;
		$config['per_page'] = $limit_per_page;
		$config['total_rows'] = $total_rows;
		
		// custom paging configuration
        $config['num_links'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
         
        $config['full_tag_open'] = '<nav>';
        $config['full_tag_close'] = '</nav>';
         
        $config['first_link'] = FALSE;
         
        $config['last_link'] = FALSE;
         
        $config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left"></span>';
        $config['prev_tag_open'] = '<li class="prevlink">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '<span class="glyphicon glyphicon-chevron-right"></span>';
        $config['next_tag_open'] = '<li class="nextlink">';
        $config['next_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="curlink">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="numlink">';
        $config['num_tag_close'] = '</li>';
         
		$this->pagination->initialize($config);

		// build paging links
        return $this->pagination->create_links();
	}
}