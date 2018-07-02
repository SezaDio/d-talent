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
		$data['listSlider'] = $this->CompanyProfModels->get_slider();
		$data['frontSlider'] = $this->db->select_max('id_slider')->get('slider')->row();
		$this->load->view('skin/front_end/header_company');
		$this->load->view('skin/front_end/konten',$data);
		$this->load->view('skin/front_end/footer_company');
	}

   // Function for insert contact us data to database
   function kirim_pesan_hubungi_kami() 
   {
      $this->load->model('contactUs_models/ContactUsModels');
      $this->load->library('form_validation');
      $tambah = $this->input->post('submit');
      if ($tambah == 1) 
      {
         $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('subject', 'Subject', 'required');
         $this->form_validation->set_rules('pesan', 'Pesan', 'required');

         if (($this->form_validation->run() == TRUE))
         {
            $data_pesan=array(
               'nama_lengkap'=>$this->input->post('nama_lengkap'),
               'email'=>$this->input->post('email'),
               'subject'=>$this->input->post('subject'),
               'pesan'=>$this->input->post('pesan')
            );
            $data['dataPesan'] = $data_pesan;
            
            $this->db->insert('hubungi_kami', $data_pesan);

            $this->session->set_flashdata('msg_berhasil', 'Pesan telah terkirim.');
            redirect(site_url('CompanyProfile/home'));
         }
         else
         {
            $this->session->set_flashdata('msg_gagal', 'Pesan gagal terkirim');
            $this->kirim_pesan_hubungi_kami();
         }
      }
      else
      {
         redirect(site_url('home'));
      }
   }	
	
}