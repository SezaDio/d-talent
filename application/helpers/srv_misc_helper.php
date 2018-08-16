<?php

/**
 * Generate slug untuk URL
 * @param string $linkTitle Teks judul
 * @return string
 */
function srv_slugify($linkTitle) {
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $linkTitle);

	// trim
	$text = trim($text, '-');

	// transliterate
	//$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// lowercase
	$text = strtolower($text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	if (empty($text)) {
		return md5(date('Ymd-His').rand(1,1000).rand(1,1000));
	}

	return $text;
}

/**
 * Sensor password. Misal: abcdefg disensor jadi abc***g
 * @param string $secretWord
 * @return string
 */
function srv_censor_password($secretWord) {
	$passLen = strlen($secretWord);
	$censoredWord = $secretWord;
	$censorStart = 0;

	if ($passLen > 7) $censorStart = 3;
	else if ($passLen > 3) $censorStart = 1;
	else if ($passLen > 0) $censorStart = 0;

	$ctr = $censorStart;
	$passLenEnd = ($passLen > 5 ? $passLen-1 : $passLen);
	while ($ctr < $passLenEnd) $censoredWord[$ctr++] = '*';
	return $censoredWord;
}

/**
 * Sensor email. Misal: abcdefg@email.com disensor jadi abc***g@email.com
 * @param string $emailAddr Alamatt e-mail
 * @return string
 */
function srv_censor_email($emailAddr) {
	$emailDomain = strstr($emailAddr, '@');
	$censoredUser = strstr($emailAddr, '@', true);
	$censoredUser = srv_censor_password($censoredUser);

	$censoredEmail = $censoredUser.$emailDomain;
	return $censoredEmail;
}

/**
 * Generate token (v.beta)
 * @param number $tokenLength Panjang token (minimal 24)
 * @param number $salt. Optional salt. Default: rand()
 * @return string Token output
 */
function srv_generate_unique_token($tokenLength = 32, $salt = null) {
	if ($tokenLength < 24) return null;

	$prefix = ($salt ? $salt : rand());
	$tokenSalt = md5(uniqid($prefix, true));
	$outputToken = substr($tokenSalt, 1, $tokenLength - 10);

	$outputToken = $outputToken.date('miHds');
	return $outputToken;
}

/**
 * Validasi dan format nomor HP
 * @param string $rawPhoneNumber Nomor telepon/HP.
 * @return string Nomor HP dengan format 08xxx....., NULL jika tidak valid.
 */
function srv_reformat_phonenumber($rawPhoneNumber) {
	$curPhone = $rawPhoneNumber;

	$curPhone = str_replace(' ', '', $curPhone); // Hilangkan spasi...
	$curPhone = str_replace('-', '', $curPhone); // Hilangkan dash...

	if (substr($curPhone, 0, 2) == '62') { // Hilangkan kode negara
		$curPhone = substr($curPhone, 2, strlen($curPhone)-2);
	} else if (substr($curPhone, 0, 3) == '+62') {
		$curPhone = substr($curPhone, 3, strlen($curPhone)-3);
	} else if (substr($curPhone, 0, 1) == '0') {
		$curPhone = substr($curPhone, 1, strlen($curPhone)-1);
	}

	if (!preg_match("/^8[0-9]+$/", $curPhone)) { // Periksa karakter...
		return null;
	}

	$curPhone = '0'.$curPhone; //-- 087xxxxx
	return $curPhone;
}

