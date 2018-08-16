<?php
/*
 * views/email/email_invoice.php
 * ------------------------------
 * Invoice notification
 */

/*
 * Fields:
 * $namaLengkap		: Nama lengkap
 * $trainingDetail	: Detil training, boleh dalam HTML, akan di nl2br
 * $transferAmount	: Jumlah invoice, bersama mata uangnya. Contoh: 'Rp. 750.000'
 */
?>
<p>Dear <?php echo htmlspecialchars($namaLengkap); ?>,</p>
<p>Terima kasih atas ketertarikan Anda untuk ikut serta dalam pelatihan D-Talentsolution.id. Berikut adalah informasi pelatihan
	yang akan Anda ikuti:</p>
<p>
	<?php echo nl2br($trainingDetail); ?>
</p>
<p>
	Untuk dapat mengikuti pelatihan, mohon menyelesaikan pembayaran biaya pelatihan sebesar <?php echo $transferAmount; ?>,
	dengan transfer melalui rekening berikut:<br /><br />
		
	<strong>Bank Mandiri</strong><br>
	No. Rekening: 135-00-1590-9250 (a.n. Dash Indo Persada)<br><br>
	
</p>
<p>Setelah transfer harap melakukan konfirmasi pembayaran melalui email <a href="mailto:hello@d-talentsolution.id">hello@d-talentsolution.id</a>
	dengan <b>melampirkan bukti pembayaran dan menyertakan nomor invoice</b>. Harap diperhatikan bahwa kami akan memverifikasi
	pembayaran pada hari dan jam kerja (Senin-Jumat, 08.00-16.00 WIB).</p>
<p>Apabila ada pertanyaan silakan hubungi kami.</p>
<p>
	Salam hangat,<br /> <strong>D-Talentsolution.id.</strong>
</p>