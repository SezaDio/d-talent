<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentList extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		// check user's auth
		$id_company = $this->session->userdata('id_company');
		if ($id_company == "") {
			redirect( site_url('AccountCompany') );
		}
	}

	public function index()
	{
		$data['active'] = 3;

		$this->load->library('pagination');
		$id_talent = $this->session->userdata('id_talent');

		$this->load->model('talent_models/TalentModel');
		$this->load->model('talent_models/TalentCVWorkModel');
		$this->load->model('talent_models/TalentCVEducationModel');
		$this->load->model('talent_models/TalentCVAchievementModel');
		$this->load->model('talent_models/TalentCVCourseModel');
		$this->load->model('account/UserModel');
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();
		$this->load->helper('custom');

		$data['page_title'] = "Talent";
		// get gender list
		$data['gender_list'] = $this->get_gender_list();
		// get martial list
		$data['marital_list'] = $this->get_marital_list();

		
		//////////////////////////////////////////////////
		$base_url = site_url('talent-list/page');
		$uri_segment = 3;
		$limit_per_page = 10;
        $total_rows = $this->TalentModel->get_total();
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

		$data['talent_list'] = $this->TalentModel->get_all_talent($limit_per_page, $start_index);

		$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);
		
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page', $data);
		$this->load->view('content_front_end/talent_list',$data);
		$this->load->view('skin/front_end/footer_company_page');
	}

	function detail_talent($id_talent)
	{	
		$data['active'] = 3;

		$id_company = $this->session->userdata('id_company');

		if ($id_company == null) {
			return redirect('AccountCompany');
		}

		$data['data_id_company'] = array(
							'id_company' => $id_company
							);
		
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
		
		$this->load->view('skin/front_end/header_company_page_topbar', $data);
		$this->load->view('skin/front_end/navbar_company_page', $data);
		$this->load->view('content_front_end/detail_talent');
		$this->load->view('skin/front_end/footer_company_page');
	}
	
	
	private function get_gender_list()
	{
		$gender = array(
						  '0'=>'Female',
	                      '1'=>'Male'
	                      );
		return $gender;
	}	
	
	private function get_gender_search($x){
		$gender_list = $this->get_gender_list();
		foreach ($gender_list as $key=>$gender){
			if($key == $x){
				return $gender;
				break;
			}
		}
	}
	
	private function get_marital_list()
	{
		$marital = array(
						  '0'=>'Unmarried',
	                      '1'=>'Married'
	                      );
		return $marital;
	}	
	
	private function get_marital_search($x){
		$marital_list = $this->get_marital_list();
		foreach ($marital_list as $key=>$marital){
			if($key == $x){
				return $marital;
				break;
			}
		}
	}
		
		
	function talent_search(){
		header('Access-Control-Allow-Origin: *');
        header('Content-type: text/xml');
		$gender=$_POST['gender'];
		$marital=$_POST['marital'];
		$province=$_POST['province'];
		$education=$_POST['education'];
		$instansi=$_POST['instansi'];
		
		
		$data = '';
		$data .= 'jenis_kelamin LIKE "%'.$gender.'%"';
		$data .= ' AND status_pernikahan LIKE "%'.$marital.'%"';
		$data .= ' AND id_provinsi LIKE "%'.$province.'%"';
		if($education != ""){
			$data .= ' AND degree LIKE "%'.$this->db->escape_like_str($education).'%"';
		}
		if($instansi != ""){
			$data .= 'AND name_school LIKE "%'.$this->db->escape_like_str($instansi).'%"';
		}
		$data_select = '';
		$data_select .= 'talent.*, t_province.lokasi_nama AS province, t_city.lokasi_nama AS city';
		if(($education != "")||($instansi != "")){
			$data_select .= ', education.degree AS degree, education.school AS name_school';
		}
		$this->db->select($data_select);
		$this->db->from('talent');
		if(($education != "")||($instansi != "")){
			$this->db->join('talent_cv_education education', 'education.id_talent = talent.id_talent', 'left');
		}
		$this->db->where($data);
		$this->db->join('inf_lokasi t_province', 't_province.lokasi_kode = talent.id_provinsi', 'left');
		$this->db->join('inf_lokasi t_city', 't_city.lokasi_kode = talent.id_kota', 'left');
		
		
		$get_talent=$this->db->get();
		//print_r($get_talent->result());
		$this->load->helper('xml');
		$xml_out = '<talents>';
		if ($get_talent->num_rows()>0) {
            foreach ($get_talent->result() as $row_talent) {
				
				
				$gender = $this->get_gender_search($row_talent->jenis_kelamin);
				$marital = $this->get_marital_search($row_talent->status_pernikahan);
				
                $xml_out .= '<talent ';
                $xml_out .= 'id_talent="' . xml_convert($row_talent->id_talent) . '" ';
                $xml_out .= 'nama="' . xml_convert($row_talent->nama) . '" ';
                $xml_out .= 'email="' . xml_convert($row_talent->email) . '" ';
                $xml_out .= 'nomor_ponsel="' . xml_convert($row_talent->nomor_ponsel) . '" ';
                $xml_out .= 'tanggal_lahir="' . xml_convert($row_talent->tanggal_lahir) . '" ';
                if($education != ""){
					$xml_out .= 'degree="' . xml_convert($row_talent->degree) . '" ';
				}
				if($instansi != ""){
					$xml_out .= 'name_school="' . xml_convert($row_talent->name_school) . '" ';
				}
                $xml_out .= 'jenis_kelamin="' . $gender . '" ';
                $xml_out .= 'status_pernikahan="' . $marital . '" ';
                $xml_out .= 'provinsi="' . xml_convert($row_talent->province) . '" ';
                $xml_out .= 'kota="' . xml_convert($row_talent->city) . '" ';
                $xml_out .= 'foto_sampul="' . xml_convert($row_talent->foto_sampul) . '" ';
                $xml_out .= 'foto_profil="' . xml_convert($row_talent->foto_profil) . '" ';
                
                $xml_out .= '/>';
            }
        }
		$xml_out .= '</talents>';
		
        echo $xml_out;
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
         
        $config['full_tag_open'] = '<nav class="fit-content">';
        $config['full_tag_close'] = '</nav>';
         
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<li class="firstlink">';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<li class="lastlink">';
        $config['last_tag_close'] = '</li>';
         
        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<li class="prevlink">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = 'Next Page';
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
