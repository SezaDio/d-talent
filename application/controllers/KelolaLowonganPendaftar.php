<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaLowonganPendaftar extends CI_Controller {

   public function _construct()
   {
      parent::_construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('input');
      $this->load->library('form_validation');
      $this->load->library('session');
   }

   function vacancy_list()
   { 
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('dashboard_models/DashboardModels');
         $data['listVacancy'] = $this->DashboardModels->get_data_job_vacancy();
            
         $this->load->view('skin/admin/header_admin');
         $this->load->view('skin/admin/nav_kiri');
         $this->load->view('content_admin/list_vacancy', $data);
         $this->load->view('skin/admin/footer_admin');
      }
   }

   //Fungsi untuk delete ajax talent member
   public function delete_list_vacancy()
   {
      $id_job = $_POST['id_job'];
      $this->load->model('dashboard_models/DashboardModels');
      $this->DashboardModels->delete_list_vacancy($id_job);
   }

}