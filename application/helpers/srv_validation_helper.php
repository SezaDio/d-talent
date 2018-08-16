<?php

/**
 * Check for empty value(s) in an associative array
 * @param array $data [OUT] Associative array. FUnction will trim values inside the data.
 * @param array $optionalFields Array of optional field keys.
 * @return array Array of empty field(s) if any. If all values not empty, empty array returned.
 */
function srv_check_empty_fields(&$data, $optionalFields = []) {
	$errorCauses = [];
	
	foreach ($data as $keyField => $valField) {
		//-- Trim data
		$data[$keyField] = trim($valField);
	
		if (!in_array($keyField, $optionalFields)) {
			if (empty($data[$keyField])) {
				$errorCauses[] = $keyField;
				//break;
			}
		}
	}
	
	return $errorCauses;
}

/**
 * Fungsi validasi range tanggal event. Format kedua tanggal adalah dd-mm-yyyy
 * @param string $startDate
 * @param string $endDate
 * @return string|NULL Kembali NULL jika valid, atau pesan error
 * @author Nur Hardyanto
 */
function srv_validate_date($startDate, $endDate) {
	// Format tanggal adalah dd-mm-yyyy
	$patternFormatDateTime = '/^(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}$/';

	// Ambigous dd mm yyyy with mm dd yyyy? Read: http://php.net/manual/en/function.strtotime.php
	if ((preg_match($patternFormatDateTime, $startDate)) &&
			(preg_match($patternFormatDateTime, $endDate))) {
				if (strtotime($startDate) > strtotime($endDate)) {
					return "Range tanggal tidak valid.";
				} else {
					// Cek tanggal start
					list($startDay, $startMonth, $startYear) = explode("-", $startDate);
					if (!checkdate ($startMonth, $startDay, $startYear)) {
						return "Tanggal mulai tidak valid!";
					}
					// Cek tanggal selesai
					list($finishDay, $finishMonth, $finishYear) = explode("-", $endDate);
					if (!checkdate ($finishMonth, $finishDay, $finishYear)) {
						return "Tanggal selesai tidak valid!";
					}
				}
				return null;
			} else {
				return "Format tanggal tidak valid.";
			}
}

/**
 * Fungsi validasi range tanggal event, dalam format MySQL. Format kedua tanggal adalah yyyy-mm-dd
 * @param string $startDate
 * @param string $endDate
 * @return string|NULL Kembali NULL jika valid, atau pesan error
 * @author Nur Hardyanto
 */
function srv_validate_date_mysql($startDate, $endDate) {
	// Format tanggal adalah dd-mm-yyyy
	$patternFormatDateTime = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3(0|1))$/';

	$isValidStartDate = (preg_match($patternFormatDateTime, $startDate));
	$isValidEndDate = (preg_match($patternFormatDateTime, $endDate));
	if ($isValidStartDate && $isValidEndDate) {
		if (strtotime($startDate) > strtotime($endDate)) {
			return "Range tanggal tidak valid.";
		} else {
			// Cek tanggal start
			list($startYear, $startMonth, $startDay) = explode("-", $startDate);
			if (!checkdate ($startMonth, $startDay, $startYear)) {
				return "Tanggal mulai tidak valid!";
			}
			// Cek tanggal selesai
			list($finishYear, $finishMonth, $finishDay) = explode("-", $endDate);
			if (!checkdate ($finishMonth, $finishDay, $finishYear)) {
				return "Tanggal selesai tidak valid!";
			}
		}
		return null;
	} else {
		return "Format tanggal ".(!$isValidStartDate ? 'mulai' : 'selesai')." tidak valid.";
	}
}

/**
 * Cek format tanggal MySQL. Format: yyyy-mm-dd
 * @param string $dateInput String tanggal.
 * @return string|NULL Kembali NULL jika tidak ada masalah, atau string error jika
 * 	ada masalah/kesalahan
 */
function srv_check_dateformat_mysql($dateInput) {
	// Format tanggal adalah yyyy-mm-dd
	$patternFormatDateTime = '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3(0|1))$/';

	if (preg_match($patternFormatDateTime, $dateInput)) {
		// Cek tanggal
		list($startYear, $startMonth, $startDay) = explode("-", $dateInput);
		if (!checkdate ($startMonth, $startDay, $startYear)) {
			return "Invalid date value.";
		}
		return null;
	} else {
		return "Invalid date format.";
	}
}
/**
 * Validasi password admin dengan rule password admin.
 * @param string $adminPassw Password yang akan dicek
 * @return string|NULL Mengembalikan pesan error jika ada kesalahan, NULL jika tidak ada error.
 * @author Nur Hardyanto
 */
function srv_validate_passw_admin($adminPassw) {
	if (strlen($adminPassw) < 8) return "Password minimal 8 karakter!";

	$tmp = preg_replace("/[^a-z]/", "", $adminPassw);
	if (strlen($tmp) == 0) return "Password minimal mengandung 1 karakter lowercase!";

	$tmp = preg_replace("/[^A-Z]/", "", $adminPassw);
	if (strlen($tmp) == 0) return "Password minimal mengandung 1 karakter uppercase!";

	$tmp = preg_replace("/[^0-9]/", "", $adminPassw);
	if (strlen($tmp) == 0) return "Password minimal mengandung 1 angka (0-9)!";

	$tmp = preg_replace("/[A-Za-z0-9]/", "", $adminPassw);
	if (strlen($tmp) == 0) return "Password minimal mengandung 1 karakter bukan alfanumerik!";

	return null;
}

/**
 * Validasi password member dengan rule password member.
 * @param string $memberPassw Password yang akan dicek
 * @return string|NULL Mengembalikan pesan error jika ada kesalahan, NULL jika tidak ada error.
 * @author Nur Hardyanto
 */
function srv_validate_passw_member($memberPassw) {
	if (strlen($memberPassw) < 8) return "Password minimal 8 karakter!";
	// Tambah rule tambahan di sini...
	return null;
}

/**
 * Validasi alamat email
 * @param string $emailAddress Alamat email
 * @return boolean TRUE jika valid, FALSE jika tidak
 */
function srv_validate_email($emailAddress) {
	return filter_var($emailAddress, FILTER_VALIDATE_EMAIL);
}


/**
 * Validasi nomor KTP
 *
 * @param string $noKtp Nomor KTP 16 digit
 * @return boolean TRUE jika valid, sebaliknya FALSE
 */
function srv_validate_idnumber($noKtp) {
	if (!preg_match("/^[0-9]{16}$/", $noKtp)) {
		return false;
	}

	return true;
}
