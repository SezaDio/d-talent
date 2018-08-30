<?php

/**
 * Proses kirim e-mail verifikasi.
 * @param int $idMember ID member
 * @param string $emailAddr Alamat e-mail yang akan diverifikasi
 * @param string $errorMessage [OUT] Pesan kesalahan
 * @param bool $createNew [Optional] Buat record baru jika tidak ditemukan. Default: FALSE
 * @return boolean TRUE jika sukses, FALSE jika gagal.
 */
function srv_send_verification_email($idMember, $emailAddr, &$errorMessage, $createNew = false) {
	$CI =& get_instance();
	
	$errorMessage = null;
	 
	if (empty($emailAddr)) {
		$errorMessage = "Alamat e-mail belum terdata. Silakan lengkapi data Anda terlebih dahulu.";
		return false;
	}
	 
	$userData = $CI->MemberModels->get_member_by_id($idMember);
	if (!$userData) {
		$errorMessage = "Username tidak terdaftar."; return false;
	}
	 
	//-- Ambil info member
	$memberRoleId = 0;
	$emailMember = null;
	$userFullname = null;

	if ($userData->role == 'talent') {
		$memberRoleId = MY_Loader::SESS_TYPE_TALENT;
		$CI->load->model('account/UserModel');
		$userDetail = $CI->UserModel->get_talent_by_idmember($userData->id_member);
		$emailMember = $userDetail->email;
		$userFullname = $userData->fullname;
			
	} else if($userData->role == 'company'){
		$memberRoleId = MY_Loader::SESS_TYPE_COMPANY;
		$CI->load->model('account/UserModel');
		$userDetail = $CI->UserModel->get_company_by_idmember($userData->id_member);
		$emailMember = $userDetail->company_email;
		$userFullname = $userData->fullname;
	} else {
		$errorMessage = "Akun tidak dikenali. Silakan hubungi customer service."; return false;
	}
	 
	//-- Informasi e-mail
	$CI->load->model('preferences_model');
	
	$accessKey = null;
	$emailRecord = $CI->preferences_model->get_email_data($idMember, $emailAddr);
	if (!$emailRecord && !$createNew) {
		$errorMessage = "E-mail record is not found."; return false;
	} else if (!$emailRecord) {
		//-- Register new email
		$CI->load->helper('srv_misc');
		$emailToken = srv_generate_unique_token(32, null);
		$saveResult = $CI->preferences_model->save_email([
				'id_member' => $idMember,
				'email' => $emailAddr,
				'status' => SRV_STATUS_PENDING,
				'token' => $emailToken
		]);
		
		if (!$saveResult) {
			$errorMessage = "Internal error: Query failed. Please try again or contact administrator."; return false;
		}
		$accessKey = $emailToken;
		
		$emailRecord = $CI->preferences_model->get_email_data($idMember, $emailAddr);
		
	} else if ($emailRecord->status == SRV_STATUS_ACCEPTED) {
		$errorMessage = "E-mail has been verified."; return false;
		
	} else {
		$accessKey = $emailRecord->token;
	}
	 
	//-- Request verifikasi hanya dapat dilakukan 5 menit sekali.
	$validMinute = SRV_EMAILVERIFY_SENDLIMIT;
	if (!empty($emailRecord->date_last_attempt)) {
		$timeDiff = strtotime('now') - strtotime($emailRecord->date_last_attempt);
		if ($timeDiff < ($validMinute * 60)) {
			$errorMessage = "Anda hanya dapat mengirimkan e-mail verifikasi setiap {$validMinute} menit sekali.".
					" Mohon tunggu, kemudian coba lagi."; return false;
		}
	}
	 
	$CI->db->trans_begin();
	 
	//-- Kirim e-mail
	$CI->load->model('email_model');
	 
	$encEmail = base64_encode($emailAddr);
	if ($userData->role == 'talent') {
		$accessLink = site_url('/AccountTalent/verify/'.$accessKey.'?em='.$encEmail);
	}else if($userData->role == 'company'){
		$accessLink = site_url('/AccountCompany/verify/'.$accessKey.'?em='.$encEmail);
	}
	
	$emailSubject = "[D-Talent] Verifikasi dan Konfirmasi E-mail";

	$contentFields = array(
			'pageTitle' => $emailSubject,
			'pageContent' => '',
			'namaLengkap' => $userFullname,
			'loginEmail' => $emailAddr,
			'verifyLink' => $accessLink,
			''
	);
	$bodyContent = $CI->load->view('email/email_verification', $contentFields, true);
	$contentFields['pageContent'] = $bodyContent;
	$emailContent = $CI->load->view('skin/email/template_default', $contentFields, true);

	$sendResult = $CI->email_model->web_send_email($emailAddr, $emailSubject, $emailContent, 'EMAIL-VERIFICATION', false);
	if ($sendResult) {
		$dateNow = date('Y-m-d H:i:s');
		$CI->preferences_model->update_emaildata($emailRecord->id_email, ['date_last_attempt' => $dateNow]);

		$CI->db->trans_commit();
		$CI->email_model->save_email_log();
		//$CI->audit_model->report_audit($CI::EMAILVERIFY_LOGTAG, $memberRoleId,
		//		$userData->id_member, $userFullname);
		return true;
	} else { // Jika gagal kirim email maka dirollback
		$CI->db->trans_rollback();
		$CI->email_model->save_email_log();
		$errorMessage = "Gagal mengirim e-mail. Silakan coba lagi.";
	}
	return false;
}