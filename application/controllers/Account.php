<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
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
		$this->load->view('account/form_login');
	}

	//Memeriksa keberadaan akun 
	public function login()
	{
		$this->load->library('form_validation');
		$this->load->model('account/userModel');

		//Baca inputan username dan password
		$username = $this->input->post('username', 'true');
		$password = md5($this->input->post('password','true'));

		$temp_account = $this->userModel->check_user_account($username, $password)->row();

		//Cek account
		$num_account = count($temp_account);

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('account/form_login');
		}
		else
		{
			if($num_account > 0)
			{
				//Jika akun ditemukan, set session
				$array_items = array(
									'id_admin' => $temp_account->id_admin,
									'username' => $temp_account->username,
									'nama_admin' => $temp_account->nama_admin,
									'status_admin' => $temp_account->status_admin,
									'path_foto' => $temp_account->path_foto,
									'admin_logged_in' => true
								);
				$this->session->set_userdata($array_items);

				redirect(site_url('AdminDashboard'));
			}
			else
			{
				//Jika akun tidak dittemukan, kembali ke halaman login
				$this->session->set_flashdata('notification','Username dan Password tidak ditemukan');

				redirect(site_url('account'));
			}
		}

	}

	//Menampilkan halaman sukses login
	public function halaman_sukses()
	{
		$logged_in = $this->session->userdata('logged_in');
		if(!$logged_in)
		{
			redirect(site_url('account'));
		}

		$this->load->view('skin/admin/welcome');
	}

	//Keluar dari sistem
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('account'));
	}
	
	public function login_member()
	{
		$this->load->library('form_validation');
		$this->load->model('account/userModel');
        $login = $this->input->post('submit');
		//Baca inputan username dan password
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