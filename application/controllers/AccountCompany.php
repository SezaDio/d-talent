<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountCompany extends CI_Controller 
{
	const FLDATA_RESENDVERIFICATION = 'resend_verification_email';
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
    			// redirect to function if form not valid
				$this->index();
    			// redirect(site_url(''));
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
    				redirect('company');
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

	/**
	 * Fungsi dari DTalent lama	 
	 */
	
	public function register() {				
		$this->data['formData'] = [];
		
		$this->data['errorMessages'] = "";
		$this->data['successMessages'] = "";
		
		$submitResult = $this->_web_register_submit($this->data['formData'], $this->data['errorMessages']);
		if (!empty($this->data['formData'])) {							
			foreach ($this->data['formData'] as $dataKey => $dataValue) {
				$this->data[$dataKey] = $dataValue;
			}
			if ($submitResult) {				
				$this->session->set_flashdata('msg_berhasil', "Registrasi berhasil. Silakan cek folder inbox/spam/junk ". "e-mail Anda (".$this->data['formData']['company_email'].") untuk verifikasi alamat e-mail Anda.");
				redirect(site_url('AccountCompany/login'));
			}
		}
				
		$this->load->model('account/UserModel');
		if (isset($this->data['errorMessages'])) {
			$this->session->set_flashdata('msg_gagal', $this->data['errorMessages']);
		}
		
		$data['lokasiProvinsi'] = $this->UserModel->lokasi_provinsi();

		$this->load->view('account/form_signup_company', $data);
		
	}
	
	public function kota_check($str){
		if ($str == "All") {
			$this->form_validation->set_message('kota_check', 'Please choose kota and provinsi');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	private function _web_register_submit(&$submittedData, &$errorMessages) {
		$submittedData = [];
		$errorMessages = "";
		
		$submitTag = $this->input->post(WEB_SUBMIT_TAG);
		if (!empty($submitTag)) {			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('company_name', 'Nama', 'required');
			$this->form_validation->set_rules('company_email', 'E-Mail', 'required');
			$this->form_validation->set_rules('company_province', 'Provinsi', 'required|callback_kota_check');
			$this->form_validation->set_rules('company_city', 'Kota', 'required|callback_kota_check');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == FALSE) {				
				$errorMessages = "Data yang Anda isikan belum valid:<br>\n".
						validation_errors("<div>- ","</div>");
				return false;
			} else {
				$this->db->trans_begin();
				$nowDateTime = date('Y-m-d H:i:s');
				
				//-- Load required helpers
				$this->load->helper('srv_misc');
				$this->load->model('preferences_model');
				
				$submittedData['company_name'] = $this->input->post('company_name');
				$submittedData['company_email'] = $this->input->post('company_email');
				$submittedData['company_province'] = $this->input->post('company_province');
				$submittedData['company_city'] = $this->input->post('company_city');				
				$userSecretWord = $this->input->post('password');
												
				$this->load->model('member_models/MemberModels');
				//-- Check if email/username is registered...
				$existingMember = $this->MemberModels->get_member_by_username($submittedData['company_email']);				
				if (!empty($existingMember)) {
					$errorMessages = "Akun dengan email '".$submittedData['company_email']."' telah terdaftar. Silakan gunakan e-mail lain.";
					return false;
				}
				
				$newMemberData = [
					'username' => $submittedData['company_email'],
					'password' => $userSecretWord,
					'fullname' => $submittedData['company_name'],
					'level' => 'user',
					'status' => SRV_STATUS_ACCEPTED
				];
				
				$newCompanyData = [
					'company_name' => $submittedData['company_name'],
					'company_email' => $submittedData['company_email'],
					'company_province' => $submittedData['company_province'],
					'company_city' => $submittedData['company_city'],	
					'company_membership'=>1 // 1 -> Free | 2 -> Gold | 3 -> Platinum				
				];
				$newIdMember = $this->MemberModels->create_member_company($newMemberData, $newCompanyData);

				if (!$newIdMember) {
					$errorMessages = "Terjadi kesalahan internal. Silakan coba lagi atau hubungi administrator.";
					return false;
				}
				
				//-- Register new email
				$emailDest = $submittedData['company_email'];
				
				$emailToken = srv_generate_unique_token(32, null);
				$saveResult = $this->preferences_model->save_email([
						'id_member' => $newIdMember,
						'email' => $emailDest,
						'status' => SRV_STATUS_PENDING,
						'token' => $emailToken,
						'date_last_attempt' => $nowDateTime
				]);
				
				if (!$saveResult) {
					$this->db->trans_rollback();
					$errorMessages = "Internal error: Query failed. Please try again or contact administrator.";
					return false;
				}
				
				//-- Send registration email // di comment, nunggu setting password email //
				
				// Proses kirim e-mail notifikasi...
				$this->load->model('email_model');
				$emailSubject = "[D-Talent] Registrasi Member dtalent.id";
				
				$encEmail = base64_encode($emailDest);
				$accessLink = site_url('/AccountCompany/verify/'.$emailToken.'?em='.$encEmail);
				
				$loginSecretCensor = srv_censor_password($userSecretWord);
				$contentFields = array(
						'pageTitle' => $emailSubject,
						'pageContent' => '',
						'namaLengkap' => $submittedData['company_name'],
						'loginUserName' => $submittedData['company_email'], // Username is their email
						'loginSecret' => $loginSecretCensor,
						'loginEmail' => $emailDest,
						'verifyLink' => $accessLink
				);
				$bodyContent = $this->load->view('email/email_register_talent', $contentFields, true);
				$contentFields['pageContent'] = $bodyContent;
				$emailContent = $this->load->view('skin/email/template_default', $contentFields, true);
				
				$this->email_model->set_config( 0 ); // Kirim pakai e-mail default				

				$sendResult = $this->email_model->web_send_email($emailDest, $emailSubject, $emailContent, 'REGISTER-MEMBER-PREMIUM');
				
				if (!$sendResult) {
					$this->db->trans_rollback();
					$this->email_model->save_email_log();
					$errorMessages = "Internal error: Cannot send e-mail. Please try again or contact administrator.";
					return false;
				}
				
				//-- Flush the queries
				$this->db->trans_commit();
				
			} // End if validation success
			
		} // End if submit
		
		return true;
	}

	public function login() {
		// Cek session yang ada dulu...
		if ($sessType = $this->session->userdata(MY_Loader::SESS_TYPE)) {
			if ($sessType == MY_Loader::SESS_TYPE_COMPANY) {	
				echo "sampai sini";			
				$this->output->set_header("Location: ".site_url('company'));
				// redirect(site_url('talent'));
			} else {
				// Tidak dikenali...?
				$this->logout_company();
			}
			return;
		}
		
		$this->data['errorMessages'] = "";
		$this->data['successMessages'] = [];
		
		$submitTag = $this->input->post(WEB_SUBMIT_TAG);
		
		if (!empty($submitTag)) {
			$userEmail = trim($this->input->post('company_email'));
			$userPassw = $this->input->post('company_password');
			
			$this->load->model('member_models/MemberModels');
			$loginResult = $this->MemberModels->autentikasi($userEmail, $userPassw, true);
			// var_dump($loginResult);die;
			$this->data['formUserName'] = $userEmail;
			
			if (!$loginResult) {
				$this->data['errorMessages'] = 'Email atau password salah.';
			} else {
				$sessionType = null;
				if ($loginResult->role == 'company') {					
					//-- Check the email
					$this->load->model('preferences_model');
					$this->load->model('account/UserModel');
					
					$companyData = $this->UserModel->get_company_by_idmember($loginResult->id_member);
					$currentEmail = $this->preferences_model->read_current_email([
							'id_member' => $loginResult->id_member,
							'email' => $companyData->company_email
					]);
					
					//-- The account is not activated yet?
					if ($currentEmail->status != SRV_STATUS_ACCEPTED) {

						$this->session->set_flashdata($this::FLDATA_RESENDVERIFICATION, $companyData->company_email);
						
						$nextUrl = site_url('/AccountCompany/resend?ref=login');
						redirect($nextUrl, 'location');
						return;
					}
					
					$sessionType = MY_Loader::SESS_TYPE_COMPANY;
					
				} else {
					//-- Unknown user role?					
					$this->data['errorMessages'] = 'Invalid user role. Please contact administrator.';
					$this->session->set_flashdata('notification',$this->data['errorMessages']);
					redirect(site_url('AccountCompany'));				
				}
				
				//-- If no account error found, save the session and redirect to correct page
				$nextUrl = $this->input->get('next');
				
				//-- Write session data
				$this->session->set_userdata(MY_Loader::SESS_TYPE, $sessionType);
				
				//Jika akun ditemukan, set session
				$array_items = array(
										'role' => $loginResult->role,
    									'id_company' => $companyData->id_company,
    									'company_name' => $companyData->company_name,
    									'company_email' => $companyData->company_email,
    									'company_city' => $companyData->company_city,
    									'company_province' => $companyData->company_province,
    									'company_membership' => $companyData->company_membership,
    									'is_logged_in' => true
    								);
				$this->session->set_userdata($array_items);

				//Tampilkan halaman Company Member
				redirect('company');

				return;
			}
		}
		if (isset($this->data['errorMessages'])) {
			$this->session->set_flashdata('notification',$this->data['errorMessages']);
		}
		
		$this->load->view('account/form_login_company');
	}

	public function verify($emailToken = null) {
		$data['fatalError'] = null;
	
		if ($emailToken == null) {
			$data['fatalError'] = "Invalid URL. Mohon periksa alamat URL, pastikan lengkap.";
		}
		$base64code = $this->input->get('em');
		$decodedEmail = base64_decode($base64code);
	
		if (!$decodedEmail) {
			$data['fatalError'] = "Invalid URL. Mohon periksa alamat URL, pastikan lengkap.";
		}
	
		//-- Ambil informasi
		$this->load->model('preferences_model');
		$emailData = $this->preferences_model->read_current_email([
				'email' => $decodedEmail,
				'token' => $emailToken
		]);
	
		if ($emailData) {
			//-- Ambil info member
			$this->load->model("member_models/MemberModels");
			$userData = $this->MemberModels->get_member_by_id($emailData->id_member);
			if (!$userData) {
				die("Database error happened. Please contact administrator."); return;
			}
	
			//-- Ambil info member
			if ($userData->role == 'company') {
				$this->load->model('account/UserModel');
				$this->data['role'] = $userData->role;
				//-- TODO: Update flag session jika user ybs sedang login...
	
			} else {
				$errorMessage = "Akun tidak dikenali. Silakan hubungi customer service."; return false;
			}
				
			if (empty($errorMessage)) {
				//-- Gunakan tanggal verifikasi paling lama
				if ($emailData->status != SRV_STATUS_ACCEPTED) {
					$dateNow = date('Y-m-d H:i:s');
					$this->preferences_model->update_emaildata($emailData->id_email, [
							'date_verified' => $dateNow,
							'status' => SRV_STATUS_ACCEPTED
					]);
						
					$logInfo = array(
							'id_email'=> $emailData->id_email,
							'email' => $decodedEmail
					);
					//$this->audit_model->report_audit('verify-email', MY_Loader::SESS_TYPE_MEMBER,
					//		$emailData->id_member, $userData->username,
					//		null, null, json_encode($logInfo));
				}
					
				$data['submitInfo'] = "E-mail berhasil diverifikasi. Silakan login kembali ke halaman member Anda.";
			}
		} else {
			$data['fatalError'] = "Invalid URL. Mohon periksa alamat URL, pastikan lengkap.";
		}
	
		//-- Tampilkan view
		$this->data['hideNav'] = true;
		$this->data['hideTopbar'] = true;
		$this->data['hideCopyrightFooter'] = true;
		
		$this->data['errorMessages'] = [];
		$this->data['successMessages'] = [];
		
		if (!empty($data['fatalError'])) $this->data['errorMessages'][] = $data['fatalError'];
		if (!empty($data['submitInfo'])) $this->data['successMessages'][] = $data['submitInfo'];
		
		$this->data['showScrollTopNav'] = false;
		$this->data['pageTitle'] = "E-mail Verification";
		$this->load->view('account/email_verification', $this->data);
	}

	public function resend() {
		$this->data['errorMessages'] = [];
		$this->data['successMessages'] = [];
		
		$failedEmailLogin = $this->session->flashdata($this::FLDATA_RESENDVERIFICATION);
		if (!empty($failedEmailLogin)) {
			$this->data['acc_email'] = $failedEmailLogin;
			$this->data['errorMessages'][] = "E-mail '".$failedEmailLogin."' belum diverifikasi.";
			$this->data['errorMessages'][] = "Silakan verifikasikan alamat e-mail terlebih dahulu dengan ".
				"mengikuti link yang Anda terima melalui e-mail Anda. Untuk mengirimkan ulang, silakan isi form berikut.";
		}
		
		$submitTag = $this->input->post(WEB_SUBMIT_TAG);
		if (!empty($submitTag)) {
			$emailAddr = trim($this->input->post('acc_email'));
			
			$this->data['acc_email'] = $emailAddr;
			
			$errorMessage = null;
			// comment fungsi resend, setting pass email
			$submitResult = $this->_resend_verification($emailAddr, $errorMessage);
			// $submitResult=TRUE;
			
			if ($submitResult) {
				$this->data['successMessages'][] = "E-mail verifikasi telah dikirimkan. Silakan cek folder inbox/spam/junk e-mail Anda.";
				$this->data['hideForm'] = true;
			} else {
				$this->data['errorMessages'][] = $errorMessage;
			}
		}
		
		$this->load->view('account/resend_verification', $this->data);
	}

	/**
	 * Do resend verification email
	 * @param string $emailAddress E-mail address to verify
	 * @param string $errorMessage [OUT] Error message
	 * @return boolean TRUE if process succeed, or FALSE on failure
	 * @uses srv_verification_helper
	 */
	private function _resend_verification($emailAddress, &$errorMessage) {
		$errorMessage = null;
		
		$this->load->helper('srv_validation');
		
		//-- Get e-mail owner
		if (empty($emailAddress)) {
			$errorMessage = "The e-mail field cannot be empty.";
			return false;
		} else if (!srv_validate_email($emailAddress)) {
			$errorMessage = "Invalid e-mail address format.";
			return false;
		}
		
		//-- Member username is their email
		$this->load->model('member_models/MemberModels');
		$loginData = $this->MemberModels->get_member_by_username($emailAddress);
		if (!$loginData) {
			$errorMessage = "Specified e-mail or username cannot be found. Please recheck or contact support.";
			return false;
		}
		
		//-- Call the routine function
		$this->load->helper('srv_verification');
		$sendResult = srv_send_verification_email($loginData->id_member, $emailAddress, $errorMessage, false);
		return $sendResult;
	}
}