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
         $data['listCompany'] = $this->DashboardModels->get_data_company_member();
            
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
         $data['listTalent'] = $this->DashboardModels->get_data_talent_member();
            
         $this->load->view('skin/admin/header_admin');
         $this->load->view('skin/admin/nav_kiri');
         $this->load->view('content_admin/list_talent', $data);
         $this->load->view('skin/admin/footer_admin');
      }
   }

   //Fungsi untuk delete ajax company member
   public function delete_company_member()
   {
      $id_company = $_POST['id_company'];
      $this->load->model('dashboard_models/DashboardModels');
      $this->DashboardModels->delete_company_member($id_company);
   }

   //Fungsi untuk delete ajax talent member
   public function delete_talent_member()
   {
      $id_talent = $_POST['id_talent'];
      $this->load->model('dashboard_models/DashboardModels');
      $this->DashboardModels->delete_talent_member($id_talent);
   }

}