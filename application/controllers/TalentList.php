<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TalentList extends CI_Controller {

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
		$base_url = site_url('TalentList');
		$uri_segment = 3;
		$limit_per_page = 10;
        $total_rows = $this->TalentModel->get_total();
        $start_index = ($this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 1) - 1;
        $start_index = $start_index * $limit_per_page;

		$data['talent_list'] = $this->TalentModel->get_all_talent($limit_per_page, $start_index);

		//$data['links'] = $this->custom_pagination($base_url, $uri_segment, $limit_per_page, $total_rows);
		
		$this->load->view('skin/front_end/header_company_page_topbar');
		$this->load->view('skin/front_end/navbar_company_page');
		$this->load->view('content_front_end/talent_list',$data);
		$this->load->view('skin/front_end/footer_company_page');
	}

		
	private function get_gender_list()
	{
		$gender = array(
						  '0'=>'Perempuan',
	                      '1'=>'Laki-laki'
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
						  '0'=>'Belum Menikah',
	                      '1'=>'Sudah Menikah'
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
		
		
		$data = '';
		$data .= 'jenis_kelamin LIKE "%'.$this->db->escape_like_str($gender).'%"';
		$data .= 'AND status_pernikahan LIKE "%'.$this->db->escape_like_str($marital).'%"';
		$data .= 'AND id_provinsi LIKE "%'.$this->db->escape_like_str($province).'%"';
		
		$this->db->select('talent.*, t_province.lokasi_nama AS province, t_city.lokasi_nama AS city');
		$this->db->from('talent');
		$this->db->where($data);
		$this->db->join('inf_lokasi t_province', 't_province.lokasi_ID = talent.id_provinsi', 'left');
		$this->db->join('inf_lokasi t_city', 't_city.lokasi_kode = talent.id_kota', 'left');
		
		
		$get_talent=$this->db->get();
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
		
	
}
