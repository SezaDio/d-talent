<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountCompany extends CI_Controller 
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
		$this->load->view('account/form_login_company');
	}

	//Masuk halaman signUp Talent
	public function view_signup()
	{
		$this->load->model('account/UserModel');
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();

		$this->load->view('account/form_signup_company', $data);
	}

	//Fungsi untuk onchange kota
   	public function lokasi_kabupaten_kota()
   	{
      	$this->load->model('account/UserModel');

      	header('Content-Type: application/json');
      	$id_provinsi = $this->input->post('id_provinsi');

      	$respObject = [];
      	if (!empty($id_provinsi)) 
      	{
      		$daftarKota = $this->UserModel->lokasi_kabupaten_kota($id_provinsi);
      		foreach ($daftarKota as $keyKota => $rowKota) 
      		{
      			$respObject[] = ['id' => $keyKota, 'name' => $rowKota['lokasi_nama']];
      		}
      	}

      	echo json_encode(array(
      		'status' => 'ok',
      		'kota' => $respObject
      	));
      	
   	}  

   	//Fungsi insert data Sign Up
   	function add_sign_up_company_check() 
   	{
   		$this->load->model('account/UserModel');
		$this->load->library('form_validation');

		//Ambil data member dari database tabel talent
		$dataMemberCompany = $this->UserModel->get_data_company();
		
		$tambah = $this->input->post('submit');

		if ($tambah == 1) 
		{
			$this->form_validation->set_rules('company_name', 'Nama', 'required');
			$this->form_validation->set_rules('company_email', 'E-Mail', 'required');
			$this->form_validation->set_rules('company_province', 'Provinsi', 'required');
			$this->form_validation->set_rules('company_city', 'Kota', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if (($this->form_validation->run() == TRUE))
			{
				$data_company_member=array(
					'company_name'=>$this->input->post('company_name'),
					'company_email'=>$this->input->post('company_email'),
					'company_city'=>$this->input->post('company_city'),
					'company_province'=>$this->input->post('company_province'),
					'password'=>md5($this->input->post('password')),
					'company_membership'=>1 // 1 -> Free | 2 -> Gold | 3 -> Platinum
				);

				$data['dataCompanyMember'] = $data_company_member;

				// Ambil input data email untuk pengecekan
				$email = $this->input->post('company_email');
				$statusDuplikat = 0;

				// looping pengecekan apakah ada duplikasi e-mail
				foreach ($dataMemberCompany as $dataEmail) 
				{
					if ($dataEmail['company_email'] == $email) 
					{
						$statusDuplikat = 1;
						break;
					}
					else
					{
						$statusDuplikat = 0;
					}
				}

				// Cek jika status duplikasi 1, redirect ke halaman sign up
				if ($statusDuplikat == 1) 
				{
					$this->session->set_flashdata('msg_gagal', 'Maaf, E-Mail sudah digunakan.');
					$this->load->view('account/form_signup_company', $data);
				}
				else // jika status duplikasi 0, insert data ke database
				{
					$this->db->insert('company', $data_company_member);
					$this->session->set_flashdata('msg_berhasil', 'Selamat Datang, Selamat bergabung');
					redirect(site_url('AccountCompany/index'));
				}
			}
		}
		else
		{
			$this->load->view('account/form_signup_company');
		}     
	} 

	//Fungsi login talent
	public function login_company_member()
	{
		$this->load->library('form_validation');
		$this->load->model('account/UserModel');

        $login = $this->input->post('login');

		//Baca inputan email dan password
		$company_email = $this->input->post('company_email', 'true');
		$company_password = $this->input->post('company_password','true');

		$temp_account = $this->UserModel->check_company_member_account($company_email, $company_password)->row();
		
		//Cek account
		$num_account = count($temp_account);

		$this->form_validation->set_rules('company_email','Email','required');
		$this->form_validation->set_rules('company_password','Password','required');
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
    									'id_company' => $temp_account->id_company,
    									'company_name' => $temp_account->company_name,
    									'company_email' => $temp_account->company_email,
    									'company_city' => $temp_account->company_city,
    									'company_province' => $temp_account->company_province,
    									'company_membership' => $temp_account->company_membership,
    									'is_logged_in' => true
    								);
    				$this->session->set_userdata($array_items);
    				
    				//Tampilkan halaman Company Member
    				redirect('CompanyMember/index');
    			}
    			else
    			{
    				//Jika akun tidak ditemukan, kembali ke halaman login
    				$this->session->set_flashdata('notification','Email dan Password tidak ditemukan');
        		    $this->load->view('account/form_login_company');
    			}
    		}
    	} 
    	else 
    	{   
		    $this->load->view('account/form_login_company');
		}
	}
	
	function logout_company(){
		$this->session->sess_destroy();
		redirect(site_url('AccountCompany'));
	}
}