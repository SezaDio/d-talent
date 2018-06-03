<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountTalent extends CI_Controller 
{
	public function _construct()
	{
		parent::_construct();
		$this->load->model('account/userModel');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	// Menampilkan halaman login
	public function index()
	{
		$this->load->view('account/form_login_talent');
	}

	//Fungsi login talent
	public function login_talent_member()
	{
		$this->load->library('form_validation');
		$this->load->model('account/userModel');

        $login = $this->input->post('submit');

		//Baca inputan email dan password
		$email = $this->input->post('email', 'true');
		$password = $this->input->post('password','true');

		$temp_account = $this->userModel->check_member_account($email, $password)->row();
		
		//Cek account
		$num_account = count($temp_account);

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		if($login==1)
		{
    		if($this->form_validation->run() == FALSE)
    		{
    			
    			redirect(site_url());
    		}
    		else
    		{
    			if($num_account > 0)
    			{
    				//Jika akun ditemukan, set session
    				$array_items = array(
    									'id_member' => $temp_account->id_member,
    									'username' => $temp_account->username,
    									'nama_member' => $temp_account->nama_member,
    									'path_foto' => $temp_account->path_foto,
    									'is_logged_in' => true
    								);
    				$this->session->set_userdata($array_items);
    				redirect(site_url());
    			}
    			else
    			{
    				//Jika akun tidak dittemukan, kembali ke halaman login
    				$this->session->set_flashdata('notification','Email dan Password tidak ditemukan');
        		    $this->load->view('skin/front_end/header_front_end');
        		    $this->load->view('content_front_end/login_member');
                    $this->load->view('skin/front_end/footer_front_end');
    			}
    		}
    	} 
    	else 
    	{   
		    $this->load->view('skin/front_end/header_front_end');
		    $this->load->view('content_front_end/login_member');
            $this->load->view('skin/front_end/footer_front_end');
		    
		}

	}
	
	function logout_member(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
}