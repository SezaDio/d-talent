<?php
/*
 * Template invoice lunas. (7 Mei 2017, by Nur Hardyanto)
 * Fields:
 * - $namaLengkap: Nama lengkap member
 * - $txtIdInvoice: ID invoice
 * - $transactionDetail: Transaction information, can be HTML, will be nl2br'ed
 * - $invoiceLink: Full URL of invoice URL
 */
?>
<p>Yth. <?php if (!empty($namaLengkap)) echo htmlspecialchars($namaLengkap);
				else echo "member"; ?>,</p>
	
<p>Bersama email ini kami sampaikan bahwa kami telah menerima pembayaran untuk invoice #<?php echo $txtIdInvoice; ?> dengan
	rincian sebagai berikut:</p>

<p><?php echo nl2br($transactionDetail); ?></p>

<p>Riwayat transaksi selengkapnya dapat Anda lihat di halaman invoice.</p>

<div style="font-size:16px;margin:30px 0;">
	<a href="<?php echo ($invoiceLink); ?>" style="background-color: #000000;color:#fff;padding:12px;text-decoration:none;border-radius:2px;"
		target="_blank" title="Lihat invoice">
		Lihat Invoice</a>
</div>

<p>Informasi selanjutnya mengenai teknis pelatihan, dsb akan diberitahukan pada e-mail yang terpisah. Apabila ada pertanyaan silakan
	diajukan melalui e-mail <a href="mailto:hello@d-talentsolution.id">hello@d-talentsolution.id</a> atau sosial media D-Talent.</p>
	
<p>Regards,<br /> <strong>D-Talentsolution.id</strong></p>
