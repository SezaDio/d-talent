<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaCompanyTalent extends CI_Controller {

   public function _construct()
   {
      parent::_construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('input');
      $this->load->library('form_validation');
      $this->load->library('session');

   }

   function company_list()
   { 
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('dashboard_models/DashboardModels');
         $data['listCompany'] = $this->DashboardModels->get_jumlah_company_member();
            
         $this->load->view('skin/admin/header_admin');
         $this->load->view('skin/admin/nav_kiri');
         $this->load->view('content_admin/list_company', $data);
         $this->load->view('skin/admin/footer_admin');
      }
   }

   function talent_list()
   { 
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('dashboard_models/DashboardModels');
         $data['listTalent'] = $this->DashboardModels->get_jumlah_talent_member();
            
         $this->load->view('skin/admin/header_admin');
         $this->load->view('skin/admin/nav_kiri');
         $this->load->view('content_admin/list_talent', $data);
         $this->load->view('skin/admin/footer_admin');
      }
   }

   //Fungsi untuk delete ajax artikel
   public function delete_pesan()
   {
      $id_pesan = $_POST['id_pesan'];
      $this->load->model('contactUs_models/ContactUsModels');
      $this->ContactUsModels->delete_pesan($id_pesan);
   }
}