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

   //show vacancy list on administrator page
   function vacancy_list()
   { 
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('dashboard_models/DashboardModels');
         $data['listVacancy'] = $this->DashboardModels->get_data_job_vacancy();
         $data['type_list'] = $this->get_job_type_list();
         $data['category_list'] = $this->get_job_category_list();

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