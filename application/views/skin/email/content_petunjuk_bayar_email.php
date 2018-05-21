<table style="padding-left: 20px; padding-right: 20px;">
	<!--Kode Pembayaran-->
	<tr>
		<td colspan="2" style="text-align: center; padding-left: 15px; padding-right: 15px; padding-bottom: 15px; padding-top: 30px;">
			<p>Kode Pembayaran Anda</p>
	      	<strong style="color: #f44a56; font-size: x-large;"><?php echo $kirim_email['paymentcode']; ?></strong>
		</td>
	</tr>

	<!--Keterangan Total Harga dan Nomor Invoice-->
	<tr>
	    <td> <strong>Total Harga</strong> </td>
	    <td> <strong>Rp <?php echo number_format($kirim_email['amount']); ?>.00</strong> </td>
	</tr>
	<tr>
	    <td> <strong>Nomor Invoice</strong> </td>
	    <td> <strong> <?php echo $kirim_email['transidmerchant']; ?></strong> </td>
	</tr>
	<tr>
	    <td> <strong>Batas Akhir Pembayaran</strong> </td>
	    <td> 
          <strong style="color: red;"> 
                <?php
                    $tanggal_pesan = $kirim_email['payment_date_time'];
                    $tanggal = date ('d F Y | H:i:s', strtotime($tanggal_pesan.'+3 hours')); 
                    echo $tanggal." WIB";
                ?>
          </strong>  
        </td>
	</tr>

	<!--Keterangan Cara pembayaran-->
	<?php 
        if ($kirim_email['payment_channel'] == 35) 
        { ?>
            <tr>
            	<td colspan="2" style="padding-top: 10px;">
            		<strong style="color: #f44a56;">Cara membayar melalui gerai ALFA Group</strong>
            	</td>
            </tr>
            <tr>
            	<td colspan="2">
		            <ol style="margin-left: -20px;" type="number">
		              <li style="padding-bottom: 5px;"> 
		                  Catat kode pembayaran di atas dan datang ke gerai Alfamart, Alfa Midi, Alfa Express, Lawson atau DAN+DAN terdekat. 
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Beritahukan ke kasir bahwa anda ingin melakukan pembayaran DOKU.
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Jika kasir tidak mengetahui mengenai pembayaran DOKU, informasikan ke kasir untuk membuka terminal e-transaction, pilih "<b style="color: #f44a56;">2</b>", lalu "<b style="color: #f44a56;">2</b>", lalu "<b style="color: #f44a56;">2</b>" yang akan menampilkan pilihan DOKU.  
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Kasir akan menanyakan kode pembayaran. Berikan kode pembayaran anda <strong style="color: #f44a56;"><?php echo $data_doku->paymentcode; ?></strong>. Kasir akan menginformasikan nominal yang harus dibayarkan.
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Lakukan pembayaran ke kasir sesuai dengan nominal yang disebutkan. Pembayaran dapat menggunakan uang tunai ayau non tunai. 
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Terima struk sebagai bukti bahwa pembayaran telah sudah sukses dilakukan. Notifikasi pembayaran akan langsung diterima oleh Merchant. 
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Selesai.
		              </li>
		            </ol>
            	</td>
            </tr>
  <?php } 
        elseif ($kirim_email['payment_channel'] == 36) 
        { ?>
            <tr>
            	<td colspan="2" style="padding-top: 10px;">
            		<strong style="color: #f44a56;">Cara membayar melalui ATM Transfer</strong>
            	</td>
            </tr>
            <tr>
            	<td colspan="2">
		            <ol style="margin-left: -20px;" type="number">
		              <li style="padding-bottom: 5px;"> 
		                  Masukkan PIN. 
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Pilih "Transfer". Apabila menggunakan ATM BCA, pilih "Transaksi lainnya" lalu "Transfer".
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Pilih "Ke Rek Bank Lain".
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Masukkan Kode Bank Permata (013) diikuti 16 digit kode bayar <strong style="color: #f44a56;"><?php echo $kirim_email['paymentcode']; ?></strong> sebagai rekening tujuan, kemudian tekan "Benar". 
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Masukkan Jumlah pembayaran sebesar Rp <?php echo number_format($kirim_email['amount']); ?> (Jumlah yang ditransfer harus sama persis, tidak boleh lebih dan kurang). Jumlah nominal yang tidak sesuai dengan tagihan akan menyebabkan transaksi gagal.
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Muncul Layar Konfirmasi Transfer yang berisi nomor rekening tujuan Bank Permata dan Nama beserta jumlah yang dibayar, jika sudah benar, Tekan "Benar".
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Selesai.
		              </li>
		            </ol>
		            <br>
		            <strong style="color: #f44a56;">Cara membayar melalui Internet Banking</strong><br>
		            <p style="color: blue;"><strong>*Keterangan:</strong> Pembayaran tidak bisa dilakukan di Internet Banking BCA (KlikBCA)</p>
		            
		            <ol style="margin-left: -20px;" type="number">
		              <li style="padding-bottom: 5px;"> 
		                  Login ke dalam akun Internet Banking.
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Pilih "Transfer" dan pilih "Bank Lainnya". Pilih Bank Permata (013) sebagai rekening tujuan.
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Masukkan jumlah pembayaran sebesar Rp <?php echo number_format($kirim_email['amount']); ?>.
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Isi nomor rekening tujuan dengan 16 digit kode pembayaran <strong style="color: #f44a56;"><?php echo $kirim_email['paymentcode']; ?></strong>. 
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Muncul layar konfirmasi Transfer yang berisi nomor rekening tujuan Bank Permata dan Nama beserta jumlah yang dibayar. Jika sudah benar, tekan "Benar".
		              </li>
		              <li style="padding-bottom: 5px;">
		                  Selesai.
		              </li>
		            </ol>
            	</td>
            </tr>
  <?php } ?>
</table>