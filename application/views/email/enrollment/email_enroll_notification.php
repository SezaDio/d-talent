<?php
/*
 * views/email/enrollment/email_enroll_notification.php
 * -----------------------------------------------------
 * Member enrollment notification
 * 
 * $namaLengkap	: Nama lengkap member
 * $txtCourse	: Label pelatihan. Misal: Pelatihan Customer Service
 * $enrollmentDetail	: Informasi enrollment. Akan di nl2br
 */

?>
<p>Yth. <?php if (!empty($namaLengkap)) echo htmlspecialchars($namaLengkap);
				else echo "member"; ?>,</p>
	
<p>Bersama email ini kami sampaikan bahwa Anda telah terdaftar pada <b><?php echo htmlspecialchars($txtCourse); ?></b> dengan
	rincian sebagai berikut:</p>

<p><?php echo nl2br($enrollmentDetail); ?></p>

<p>Perlu kami informasikan bahwa waktu dan tempat dapat berubah sewaktu-waktu. Informasi selanjutnya mengenai teknis pelatihan,
	dsb akan diberitahukan pada e-mail yang terpisah. Apabila ada pertanyaan silakan diajukan melalui e-mail
	<a href="mailto:hello@d-talentsolution.id">hello@d-talentsolution.id</a> atau sosial media D-Talent.</p>
	
<p>Regards,<br /> <strong>D-Talentsolution.id</strong></p>
