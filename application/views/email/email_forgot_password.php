<?php
/*
 * Template verifikasi e-mail member. (16 April 2017, by Nur Hardyanto)
 * Fields:
 * - $namaLengkap: Nama lengkap member
 * - $loginEmail: Informasi alamat e-mail
 * - $verifyLink: Link absolute untuk recover (Misal: https://career.undip.ac.id/xyzabc)
 */
?>
<p>Yth. <?php if (!empty($namaLengkap)) echo htmlspecialchars($namaLengkap);
				else echo "member"; ?>,</p>
	
<p>Anda menerima e-mail ini karena sistem menerima permintaan reset password atas akun dengan username <?php echo htmlspecialchars($loginEmail)?>. Silakan ikuti link di bawah untuk set ulang password akun UCC Anda:	
</p>

<div style="font-size:16px;margin:30px 0;">
	<a href="<?php echo ($verifyLink); ?>" style="background-color: #000000;color:#fff;padding:12px;text-decoration:none;border-radius:2px;"
		target="_blank" title="Verify e-mail address">
		Change Password</a>
</div>

<p>Jika Anda menerima e-mail ini karena kesalahan,
	silakan abaikan e-mail ini. Terima kasih.</p>
	
<p>Regards,<br /> <strong>D-Talent.id</strong></p>