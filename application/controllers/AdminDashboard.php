<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

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
		if($this->session->userdata('admin_logged_in')){
		$this->load->helper('url');
		$this->load->model('dashboard_models/DashboardModels');

		//$data['jum_approve_event'] = $this->DashboardModels->get_jumlah_approved_event();
		//$data['jum_pending_event'] = $this->DashboardModels->get_jumlah_pending_event();
		//$data['jum_pending_pepak'] = $this->DashboardModels->get_jumlah_pending_pepak();
		$data['jum_pesan'] = $this->DashboardModels->get_jumlah_pesan();
		//$data['daftar_event_terdekat'] = $this->DashboardModels->get_data_coming_terdekat();

		$this->load->view('skin/admin/welcome', $data);
		} else {
			redirect(site_url('Account'));
		}
	}

	/*Delete Data Coming + data news dan testimoni dari halaman Lihat Detail
	public function delete_event($id_coming)
	{
		$this->load->model('coming_models/ComingModels');
		$this->load->model('news_models/NewsModels');

		$this->ComingModels->delete_coming($id_coming);
		$this->NewsModels->delete_news($id_coming);

		$this->index();
	}

	public function get_data_jumlah_member()
	{
		$this->load->model('dashboard_models/DashboardModels');

		$data['jumlah_member']=$this->DashboardModels->get_data_jumlah_member();

		foreach ($data['jumlah_member'] as $key=>$data_jumlah_member) 
		{
			$data_jumlah['data'][] = intval($data_jumlah_member);
			$data_minggu['data'][] = strval($key);
		}

		$rslt = array();
		array_push($rslt, $data_minggu);
		array_push($rslt, $data_jumlah);

		print json_encode($rslt);

	} */

}
