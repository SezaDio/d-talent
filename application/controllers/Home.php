<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Home extends CI_Controller {
	public function _construct() {
		parent::_construct ();
		$this->load->helper ( 'url' );
		$this->load->helper ( 'form' );
		$this->load->library ( 'input' );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'session' );
	}
	public function index() {
		$this->load->helper ( 'url' );
		$this->load->library ( 'pagination' );
		$this->load->model ( 'companyprof_models/CompanyProfModels' );
		$this->load->model ( 'dashboard_models/DashboardModels' );
		
		$data ['listTestimoni'] = $this->CompanyProfModels->get_testimoni ();
		$data ['listSlider'] = $this->CompanyProfModels->get_slider ();
		$data ['listSliderSmall'] = $this->CompanyProfModels->get_slider_small ();
		
		$data ['jum_job_vacancy'] = $this->DashboardModels->get_jumlah_job_vacancy ();
		$data ['jum_company_member'] = $this->DashboardModels->get_jumlah_company_member ();
		$data ['jum_talent_member'] = $this->DashboardModels->get_jumlah_talent_member ();
		
		$this->load->view ( 'skin/front_end/header_company' );
		$this->load->view ( 'skin/front_end/konten', $data );
		$this->load->view ( 'skin/front_end/footer_company' );
	}
}
