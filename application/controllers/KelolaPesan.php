<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPesan extends CI_Controller {

   public function _construct()
   {
      parent::_construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('input');
      $this->load->library('form_validation');
      $this->load->library('session');

   }

   function index()
   { 
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('contactUs_models/ContactUsModels');
         $data['listPesan'] = $this->ContactUsModels->get_data_pesan();
            
         $this->load->view('skin/admin/header_admin');
         $this->load->view('skin/admin/nav_kiri');
         $this->load->view('content_admin/kelola_message', $data);
         $this->load->view('skin/admin/footer_admin');
      }
   }

   public function contact_us()
   {
      $data['active']=5;

      $this->load->view('skin/front_end/header_front_end',$data);
      $this->load->view('content_front_end/contact_us_page', $data);
      $this->load->view('skin/front_end/footer_front_end');
   }

   //fungsi kirim pesan hubungi kami
   function kirim_pesan_hubungi_kami() 
   {
      $this->load->model('contactUs_models/ContactUsModels');
      $this->load->library('form_validation');
      $tambah = $this->input->post('submit');
      if ($tambah == 1) 
      {
         $this->form_validation->set_rules('nama_lengkap', 'Nama', 'required');
         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('telepon', 'Telepon', 'required');
         $this->form_validation->set_rules('subject', 'Subject', 'required');
         $this->form_validation->set_rules('pesan', 'Pesan', 'required');

         //value id_koridor berisi beberapa data, sehingga dilakukan split dengan explode
         if (($this->form_validation->run() == TRUE))
         {
            $data_pesan=array(
               'nama_lengkap'=>$this->input->post('nama_lengkap'),
               'email'=>$this->input->post('email'),
               'telepon'=>$this->input->post('telepon'),
               'subject'=>$this->input->post('subject'),
               'pesan'=>$this->input->post('pesan')
            );
            $data['dataPesan'] = $data_pesan;
            
            $this->db->insert('hubungi_kami', $data_pesan);

            $this->session->set_flashdata('msg_berhasil', 'Pesan telah terkirim, mohon tunggu balasan dari kami melalui email anda.');
            redirect(site_url('contact_us'));
         }
         else
         {
            $this->session->set_flashdata('msg_gagal', 'Pesan gagal terkirim');
            $this->kirim_pesan_hubungi_kami();
         }
      }
      else
      {
         $data['active']=4;
         $this->load->view('skin/front_end/header_front_end');
         $this->load->view('content_front_end/contact_us_page');
         $this->load->view('skin/front_end/footer_front_end');
      }
   }

   function kelola_message()
   { 
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('contactUs_models/ContactUsModels');
         $data['listPesan'] = $this->ContactUsModels->get_data_pesan();
            
         $this->load->view('skin/admin/header_admin');
         $this->load->view('skin/admin/nav_kiri');
         $this->load->view('content_admin/kelola_message', $data);
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

   function balas_pesan($id_pesan)
   {	
      if($this->session->userdata('admin_logged_in'))
      {
         $this->load->model('contactUs_models/ContactUsModels');
         $data['pesan'] = $this->ContactUsModels->select_data_pesan_byId($id_pesan)->row();

         //update status baca jika pesan belum pernah dibaca
         if ($data['pesan']->status == 0)
         {
            $data_pesan=array(
                        'status'=>1
                        );

            $this->db->update('hubungi_kami', $data_pesan, array('id_pesan'=>$id_pesan));

            $this->load->view('skin/admin/header_admin');
            $this->load->view('skin/admin/nav_kiri');
            $this->load->view('content_admin/balas_pesan', $data);
            $this->load->view('skin/admin/footer_admin');
         }
         else
         {
            $this->load->view('skin/admin/header_admin');
            $this->load->view('skin/admin/nav_kiri');
            $this->load->view('content_admin/balas_pesan', $data);
            $this->load->view('skin/admin/footer_admin');
         }
	   } 
      else 
      {
		   redirect(site_url('Account'));
	   }
   }

   //Setujui coming
   public function kirim_pesan()
   {
      $sub_setuju = "boloku.id";
      $email = $this->input->post('email');
      $msg = $this->input->post('isi_pesan');
      $this->kirim_email($sub_setuju, $msg, $email);
   }

   //kirim email
   function kirim_email($sub, $msg, $email) {
      $config['protocol'] = 'smtp';
      $config['smtp_host'] = 'mail.boloku.id'; //change this
      $config['smtp_port'] = '465';
      $config['smtp_user'] = 'info@boloku.id'; //change this
      $config['smtp_pass'] = 'cz431081994'; //change this
      $config['mailtype'] = 'html';
      $config['charset'] = 'iso-8859-1';
      $config['smtp_crypto'] = 'ssl';
      $config['wordwrap'] = TRUE;
      $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
      $this->load->library('email'); // load email library
      $this->email->initialize($config);
      $this->email->from('info@boloku.id', 'boloku.id');
      $this->email->to($email);
      $this->email->subject($sub);
      $this->email->message($msg);
      if ($this->email->send()){
         $this->session->set_flashdata('msg_berhasil', 'Pesan balasan telah terkirim.');
         redirect('FrontControl_ContactUs/kelola_message');}
      else{
         show_error($this->email->print_debugger());}
    }
}