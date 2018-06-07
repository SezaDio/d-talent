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

	//Masuk halaman signUp Talent
	public function view_signup()
	{
		$this->load->model('account/UserModel');
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();

		$this->load->view('account/form_signup_talent', $data);
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
   	function add_sign_up_talent_check() 
   	{
   		$this->load->model('account/UserModel');
		$this->load->library('form_validation');

		//Ambil data member dari database tabel talent
		$dataMemberTalent = $this->UserModel->get_data_talent();
		
		$tambah = $this->input->post('submit');

		if ($tambah == 1) 
		{
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'E-Mail', 'required');
			$this->form_validation->set_rules('nomor_ponsel', 'Nomor Ponsel', 'required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
			$this->form_validation->set_rules('kota', 'Kota', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if (($this->form_validation->run() == TRUE))
			{
				$data_talent_member=array(
					'nama'=>$this->input->post('nama'),
					'email'=>$this->input->post('email'),
					'nomor_ponsel'=>$this->input->post('nomor_ponsel'),
					'tanggal_lahir'=>$this->input->post('tanggal_lahir'),
					'id_kota'=>$this->input->post('kota'),
					'id_provinsi'=>$this->input->post('provinsi'),
					'password'=>md5($this->input->post('password')),
					'membership'=>1 // 1 -> Free | 2 -> Bronze | 3 -> Silver | 4 -> Gold | 5 -> Platinum
				);
				$data['dataTalentMember'] = $data_talent_member;

				// Ambil input data email untuk pengecekan
				$email = $this->input->post('email');
				$statusDuplikat = 0;

				// looping pengecekan apakah ada duplikasi e-mail
				foreach ($dataMemberTalent as $dataEmail) 
				{
					if ($dataEmail['email'] == $email) 
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
					$this->load->view('account/form_signup_talent', $data);
				}
				else // jika status duplikasi 0, insert data ke database
				{
					$this->db->insert('talent', $data_talent_member);
					$this->session->set_flashdata('msg_berhasil', 'Selamat Datang, Selamat berjuang');
					redirect('AccountTalent/view_signup');
				}
			}
		}
		else
		{
			$this->load->view('account/form_signup_talent');
		}     
	} 

	//Fungsi login talent
	public function login_talent_member()
	{
		$this->load->library('form_validation');
		$this->load->model('account/UserModel');

        $login = $this->input->post('login');

		//Baca inputan email dan password
		$email = $this->input->post('email', 'true');
		$password = $this->input->post('password','true');

		$temp_account = $this->UserModel->check_member_account($email, $password)->row();
		
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
    									'id_talent' => $temp_account->id_talent,
    									'nama' => $temp_account->nama,
    									'email' => $temp_account->email,
    									'nomor_ponsel' => $temp_account->nomor_ponsel,
    									'tanggal_lahir' => $temp_account->tanggal_lahir,
    									'id_kota' => $temp_account->id_kota,
    									'id_provinsi' => $temp_account->id_provinsi,
    									'membership' => $temp_account->membership,
    									'is_logged_in' => true
    								);
    				$this->session->set_userdata($array_items);
    				
    				//Tampilkan halaman My CV
    				$this->session->set_flashdata('notification','Selamat Datang');
        		    $this->load->view('account/form_login_talent');
    			}
    			else
    			{
    				//Jika akun tidak dittemukan, kembali ke halaman login
    				$this->session->set_flashdata('notification','Email dan Password tidak ditemukan');
        		    $this->load->view('account/form_login_talent');
    			}
    		}
    	} 
    	else 
    	{   
		    $this->load->view('account/form_login_talent');
		}
	}
	
	function logout_member(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
}