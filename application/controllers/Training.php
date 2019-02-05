<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('input');
		$this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{	
		$this->load->view('skin/front_end/header_company');
		//$this->load->view('skin/front_end/konten',$data);
		//echo "[Content]";
		$this->load->view('skin/front_end/footer_company');
	}
	
	public function courses()
	{
		$this->load->view('skin/front_end/header_company');
		//$this->load->view('skin/front_end/konten',$data);
		//echo "[Content]";
		$this->load->view('skin/front_end/footer_company');
	}
	
	
	public function invoice($idCourse = null) {
		if (!$this->load->check_session_talent()) return;
	
		if ($idCourse === null) {
			show_404();
			return;
		}
	
		$this->load->model('enrollment_model');
		$enrollmentData = $this->enrollment_model->get_course_enrollment($this->data['sessMemberId'], $idCourse);
	
		if (!$enrollmentData) {
			show_404();
			return;
		}
	
		$this->load->model('invoice_model');
		$invoiceData = $this->invoice_model->get_invoice_by_id($enrollmentData->id_invoice);
	
		if (!$invoiceData) {
			show_404();
			return;
		}
	
		redirect(site_url('/payment/invoice/'.$invoiceData->unique), 'location');
	}
	
	private function _check_course_availability($courseData, $talentData, &$errorMessage) {
		if (empty($talentData)) {
			$errorMessage = 'Talent data cannot be found.';
			return false;
		}
	
		if (empty($courseData)) {
			$errorMessage = 'The course data is not found.';
			return false;
		}
	
		$errorMessage = null;
	
		//-- Check if the course is available for enroll
		if (!($courseData->flags & 1) || (($courseData->course_fee < 500) && !empty($courseData->course_fee))) {
			$errorMessage = 'The course is not available for enroll.';
			return false;
		}
	
		if (empty($talentData->id_number) || empty($talentData->current_address)) {
			$errorMessage = 'Mohon melengkapi biodata Anda dulu di menu My Profile sebelum Anda dapat mendaftar pelatihan.';
			return false;
		}
	
		$this->load->model('enrollment_model');
		$checkData = $this->enrollment_model->get_course_enrollment($talentData->id_member, $courseData->id_course);
	
		if ($checkData) {
			$errorMessage = 'Anda sudah terdaftar pada pelatihan ini.';
			return false;
		}
		return true;
	}
	
	public function enroll($courseId = null) {
		if (!$this->load->check_session_talent()) return;
	
		$this->load->model('course_model');
		$this->load->model('member_model');
		$this->load->model('talent_model');
		$this->load->model('facility_model');
		$this->load->helper('layout');
	
		$this->data['loginData'] = $this->member_model->get_member_by_id($this->data['sessMemberId']);
		$this->data['talentData'] = $this->talent_model->get_talent_by_idmember($this->data['sessMemberId']);
		$this->data['courseData'] = $this->course_model->get_course_by_id($courseId);
	
		//-- Check loggedin member
		if (empty($this->data['loginData'])) {
			show_404(); return;
		}
	
		$errorMessage = null;
		if (!$this->_check_course_availability($this->data['courseData'], $this->data['talentData'], $errorMessage)) {
			$this->data['fatalErrors'] = [ $errorMessage ];
		} else {
			$this->data['listIncludedFacility'] = $this->facility_model->get_course_facilities($courseId, ['included' => true]);
			$this->data['listAdditionalFacility'] = $this->facility_model->get_course_facilities($courseId, ['included' => false]);
				
			$listSchedule = $this->course_model->get_course_schedule(
					$courseId, [
							'after' => 'now',
							'status' => SRV_STATUS_ACCEPTED
					], false);
				
			$this->data['listCourseSchedule'] = [];
			foreach ($listSchedule as $itemSchedule) {
				$unixDateStart = strtotime($itemSchedule->date_start);
				$unixDateEnd = strtotime($itemSchedule->date_end);
	
				$optionLabel = $this->load->tanggal_indonesia($unixDateStart, false, true);
				$optionLabel .= ' - '.$this->load->tanggal_indonesia($unixDateEnd, false, true);
				$this->data['listCourseSchedule'][$itemSchedule->id_schedule] = $optionLabel;
			}
		}
	
		$this->data['pageTitle'] = 'Enroll Course';
		$this->data['selectedMenuId'] = 3;
		$this->load->template_talent('member/talent/courses/enroll_course', $this->data);
	}
	
	public function modal($modalName = null) {
		if (!$this->load->check_session_talent(false)) {
			echo "Session expired. Please relogin.";
			return;
		}
	
		if ($modalName == 'enrollment.confirm') {
			$this->load->helper('layout');
				
			$courseId = $this->input->post('id_course');
			$scheduleId = $this->input->post('course_schedule');
			$invoiceTotal = ($this->input->post('invoice_total'));
				
			//if (empty($invoiceTotal)) {
			//	show_error("Incomplete data specified.");
			//	return;
			//}
				
			$this->data['invoiceTotal'] = intval($invoiceTotal);
				
			$this->load->model('course_model');
			$this->load->model('member_model');
			$this->load->model('talent_model');
			$this->load->model('facility_model');
			$this->load->model('invoice_model');
			$this->load->helper('layout');
				
			$this->data['loginData'] = $this->member_model->get_member_by_id($this->data['sessMemberId']);
			$this->data['talentData'] = $this->talent_model->get_talent_by_idmember($this->data['sessMemberId']);
			$this->data['courseData'] = $this->course_model->get_course_by_id($courseId);
				
			$errorMessage = null;
			if (!$this->_check_course_availability($this->data['courseData'], $this->data['talentData'], $errorMessage)) {
				show_error($errorMessage);
				return;
			} else {
				$this->data['scheduleData'] = $this->course_model->get_schedule_by_id($scheduleId, $courseId);
				if (!$this->data['scheduleData']) {
					show_error("Invalid schedule data");
					return;
				}
	
				$unixDateStart = strtotime($this->data['scheduleData']->date_start);
				$unixDateEnd = strtotime($this->data['scheduleData']->date_end);
	
				$optionLabel = $this->load->tanggal_indonesia($unixDateStart, false, true);
				$optionLabel .= ' - '.$this->load->tanggal_indonesia($unixDateEnd, false, true);
	
				$this->data['scheduleDateLabel'] = $optionLabel;
				$this->data['scheduleLocationLabel'] = $this->data['scheduleData']->location_desc;
	
				//-- Available methods
				$this->data['availableMethods'] = $this->invoice_model->get_invoice_channels();
				foreach ($this->data['availableMethods'] as $keyMethod => $itemMethod) {
					if (empty($itemMethod['available'])) {
						unset($this->data['availableMethods'][$keyMethod]);
					}
				}
			}
			$this->load->view('member/talent/modal/confirm_enrollment', $this->data);
		}
	}
	
	public function checkout() {
		if (!$this->load->check_session_talent()) return;
	
		$todayDateTime = date('Y-m-d H:i:s');
	
		$courseId = $this->input->post('id_course');
		$scheduleId = $this->input->post('course_schedule');
		$purchasedCourseFacilities = ($this->input->post('course_facilities'));
	
		$paymentMethod = $this->input->post('payment_method');
	
		if (empty($purchasedCourseFacilities)) $purchasedCourseFacilities = [];
	
		//-- Submit enrollment data and generate the invoice
		$this->load->model('course_model');
		$this->load->model('member_model');
		$this->load->model('talent_model');
		$this->load->model('facility_model');
		$this->load->helper('layout');
			
		$this->data['loginData'] = $this->member_model->get_member_by_id($this->data['sessMemberId']);
		$this->data['talentData'] = $this->talent_model->get_talent_by_idmember($this->data['sessMemberId']);
		$this->data['courseData'] = $this->course_model->get_course_by_id($courseId);
			
		$errorMessage = null;
		if (!$this->_check_course_availability($this->data['courseData'], $this->data['talentData'], $errorMessage)) {
			die($errorMessage);
			return;
		} else {
			$this->data['scheduleData'] = $this->course_model->get_schedule_by_id($scheduleId, $courseId);
			if (!$this->data['scheduleData']) {
				die("Invalid schedule data");
				return;
			}
	
			if (!is_array($purchasedCourseFacilities)) {
				die("Invalid input format");
				return;
			}
				
			//-- Schedule data
			$unixDateStart = strtotime($this->data['scheduleData']->date_start);
			$unixDateEnd = strtotime($this->data['scheduleData']->date_end);
	
			$optionLabel = $this->load->tanggal_indonesia($unixDateStart, false, true);
			$optionLabel .= ' - '.$this->load->tanggal_indonesia($unixDateEnd, false, true);
	
			//-- Course facilities
			$listIncludedFacility = $this->facility_model->get_course_facilities($courseId, ['included' => true]);
			$listAdditionalFacility = $this->facility_model->get_course_facilities($courseId, ['included' => false]);
				
			//-- Schedule location
			$this->data['scheduleLocationLabel'] = $this->data['scheduleData']->location_desc;
				
			$payTotal = intval($this->data['courseData']->course_fee);
				
			$this->load->model('location_model');
				
			$provinceName = $this->location_model->get_province_by_id($this->data['talentData']->current_province);
			$cityName = $this->location_model->get_city_label_by_id(
					$this->data['talentData']->current_province,
					$this->data['talentData']->current_city);
				
			$invoicedTo = [
					'id_member'	=> $this->data['loginData']->id_member,
					'name'		=> $this->data['loginData']->fullname,
					'idnumber'	=> $this->data['talentData']->id_number,
					'address'	=> $this->data['talentData']->current_address,
					'province'	=> strtoupper($provinceName),
					'city'		=> strtoupper($cityName),
					'zipcode'	=> $this->data['talentData']->current_zipcode,
					'email'		=> $this->data['talentData']->email
			];
				
			$availableFacilityIds = [];
			$additionalFacilities = [];
			foreach ($listAdditionalFacility as $additionalItem) {
				$availableFacilityIds[$additionalItem->id_facility] = $additionalItem;
			}
				
			foreach ($purchasedCourseFacilities as $purchasedItemId) {
				if (!key_exists($purchasedItemId, $availableFacilityIds)) {
					//-- Not available, will be ignored...
				} else {
					$payTotal += intval($availableFacilityIds[$purchasedItemId]->fee);
						
					$additionalFacilities[] = [
							'type' => 'facility',
							'handle_id' => $availableFacilityIds[$purchasedItemId]->id_facility,
							'label' => $availableFacilityIds[$purchasedItemId]->name,
							'price' => intval($availableFacilityIds[$purchasedItemId]->fee)
					];
				}
	
			}
			$includedFacilities = [];
			foreach ($listIncludedFacility as $includedItem) {
				$includedFacilities[] = [
						'type' => 'facility',
						'handle_id' => $includedItem->id_facility,
						'label' => $includedItem->name,
						'price'  => 0
				];
	
			}
			$basketItems = [];
			$basketItems[] = [
					'type' => 'course',
					'handle_id' => $this->data['courseData']->id_course,
					'label' => 'Pelatihan '.$this->data['courseData']->name.' ('.$this->data['courseData']->course_duration.' hari)',
					'subitems' => $includedFacilities,
					'price'  => intval($this->data['courseData']->course_fee)
			];
				
			//-- Additional item
			foreach ($additionalFacilities as $purchasedAddOn) {
				$basketItems[] = $purchasedAddOn;
			}
				
			$invoicePurchaseData = [
					'ver' => '1.0',
					'invoiceto' => $invoicedTo,
					'basket' => $basketItems
			];
				
			$isFree = ($payTotal == 0);
				
			//-- Verify payment method
			$this->load->model('invoice_model');
			$invoiceChannel = null;
			if (!$isFree) {
				$availableMethods = $this->invoice_model->get_invoice_channels();
				if (!key_exists($paymentMethod, $availableMethods)) {
					die("Unknown payment method channel: ".$paymentMethod);
					return;
				} else if (empty($availableMethods[$paymentMethod]['available'])) {
					die("Selected payment method channel (".$paymentMethod.") currently unavailable.");
					return;
				}
	
				$invoiceChannel = $paymentMethod;
			}
				
			$this->load->helper('srv_misc');
			$newUnique = srv_generate_unique_token(32);
			$invoiceData = [
					'unique' => $newUnique,
					'id_member' => $this->data['loginData']->id_member,
					'purchase_data' => json_encode($invoicePurchaseData),
					'total' => $payTotal,
					'channel' => $invoiceChannel,
					'date_created' => $todayDateTime,
					'status' => SRV_STATUS_PENDING
			];
				
			$newInvoiceId = null;
				
			if (!$isFree) {
				$newInvoiceId = $this->invoice_model->save_invoice_by_id($invoiceData, -1);
			}
			if (!$isFree && !$newInvoiceId) {
				die("Query failed");
			} else {
				$defaultEnrollStatus = SRV_STATUS_PENDING;
				if ($isFree) $defaultEnrollStatus = SRV_STATUS_ACCEPTED;
	
				//-- Enroll to the course
				$enrollStatus = $this->enrollment_model->enroll_course($this->data['courseData']->id_course,
						$this->data['loginData']->id_member, $this->data['scheduleData']->id_schedule,
						$newInvoiceId, $defaultEnrollStatus);
	
				if ($defaultEnrollStatus != SRV_STATUS_ACCEPTED) {
					//-- Sending confirmation email
					$transferAmount = 'Rp. '.number_format($payTotal, 0, ',', '.');
					$trainingDetail  = '<b>Pelatihan</b>: '.$this->data['courseData']->name.PHP_EOL;
					$trainingDetail .= '<b>Durasi</b>: '.$this->data['courseData']->course_duration.' hari'.PHP_EOL;
					$trainingDetail .= '<b>Jadwal</b>: '.$optionLabel.PHP_EOL;
					$trainingDetail .= '<b>Nomor invoice</b>: #'.$newInvoiceId.PHP_EOL;
					$trainingDetail .= PHP_EOL.'<a href="http://d-talentsolution.id/payment/invoice/'.$newUnique.'?ref=email" '.
							'target="_blank">Lihat Invoice Pembayaran</a>'.PHP_EOL;
						
					//----- Send e-mail
					$this->load->model('email_model');
					$emailDest = $this->data['talentData']->email;
					$emailSubject = "[D-Talent] Course Enrollment Confirmation";
						
					$contentFields = array(
							'pageTitle' => $emailSubject,
							'pageContent' => '',
							'namaLengkap' => $this->data['loginData']->fullname,
							'trainingDetail' => $trainingDetail,
							'transferAmount' => $transferAmount
					);
					$bodyContent = $this->load->view('email/email_invoice', $contentFields, true);
					$contentFields['pageContent'] = $bodyContent;
					$emailContent = $this->load->view('skin/email/template_default', $contentFields, true);
						
					$this->email_model->set_config( 0 );
					$berhasil = $this->email_model->web_send_email($emailDest, $emailSubject, $emailContent, 'ENROLL-COURSE');
						
					if (($invoiceChannel == 'bank-transfer') || ($invoiceChannel == 'credit-card')) {
						redirect(site_url('/payment/gw/'.$newUnique.'?ref=checkout'), 'location');
						return;
					}
						
					redirect(site_url('/payment/invoice/'.$newUnique.'?ref=checkout'), 'location');
						
				} else { // Free course, send enrollment notification
					$schedulePlace = $this->data['scheduleData']->location_desc;
					$enrollmentDetail = '';
					$enrollmentDetail .= '<b>Durasi</b>: '.$this->data['courseData']->course_duration.' hari'.PHP_EOL;
					$enrollmentDetail .= '<b>Jadwal</b>: '.$optionLabel.PHP_EOL;
					$enrollmentDetail .= '<b>Tempat</b>: '.$schedulePlace.PHP_EOL;
						
					//----- Send e-mail
					$this->load->model('email_model');
					$emailDest = $this->data['talentData']->email;
						
					$emailSubject = "[D-Talent] Course Enrollment Notification";
					$courseLabel = "Pelatihan ".$this->data['courseData']->name;
						
					$contentFields = array(
							'pageTitle' => $emailSubject,
							'pageContent' => '',
							'namaLengkap' => $this->data['loginData']->fullname,
							'txtCourse' => $courseLabel,
							'enrollmentDetail' => $enrollmentDetail
					);
						
					$emailTag = 'ENROLL-NOTIF';
					$emailRedactionFile = 'email/enrollment/email_enroll_notification';
						
					$bodyContent = $this->load->view($emailRedactionFile, $contentFields, true);
					$contentFields['pageContent'] = $bodyContent;
					$emailContent = $this->load->view('skin/email/template_default', $contentFields, true);
						
					$this->email_model->set_config( 0 );
					$sendResult = $this->email_model->web_send_email($emailDest, $emailSubject, $emailContent, $emailTag);
						
					redirect(site_url('/members/talent/courses?ref=checkout'), 'location');
				}
	
			} // End if invoice created
				
		} // End if course available
	
		return;
	} // End function
}