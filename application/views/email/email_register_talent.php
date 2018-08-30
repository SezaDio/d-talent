<?php
/*
 * Template daftar member talent. (16 April 2018, by Nur Hardyanto)
 * Fields:
 * - $namaLengkap: Nama lengkap pendaftar
 * - $loginUserName: Info username login
 * - $loginSecret: Info password login
 */
	 
?>
<p>Dear <?php echo htmlspecialchars($namaLengkap); ?>,</p>

<p>Terima kasih atas ketertarikan Anda untuk bergabung bersama dtalent.id. Berikut adalah informasi login yang Anda gunakan
	untuk login ke website <a href="https://dtalent.id/talent/login?ref=email" target="_blank">dtalent.id</a>:<br />
	
<b>Username</b>: <?php echo htmlspecialchars($loginUserName); ?><br />
<b>Password</b>: <?php echo htmlspecialchars($loginSecret); ?>
</p>
<p>Sebelum Anda dapat login dan menggunakan akun Anda, mohon verifikasikan alamat e-mail Anda (<?php echo htmlspecialchars($loginEmail)?>)
	terlebih dahulu dengan klik link berikut:</p>
<div style="font-size:16px;margin:30px 0;">
	<a href="<?php echo ($verifyLink); ?>" style="background-color: #000000;color:#fff;padding:12px;text-decoration:none;border-radius:2px;"
		target="_blank" title="Verify e-mail address">
		Verifikasikan Alamat E-mail</a>
</div>

<p>Apabila ada pertanyaan atau kesulitan, silakan hubungi kami.</p>
<p>
	Regards,<br /> <strong>dtalent.id</strong>
</p>