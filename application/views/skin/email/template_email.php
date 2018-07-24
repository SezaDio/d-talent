<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $subject; ?></title>
	</head>
	<body>
			<table style="width: 100%; background-color: #f3f3f3; border-collapse: collapse; font-size: 16px; font-weight: 400; line-height: 1.3;">
				<tr style="vertical-align: top;">
					<td align="center" style="border-collapse: collapse; font-size: 16px; font-weight: 400; line-height: 1.3;">
						<table style="border-top: 6px solid black; max-width: 600px; min-width: auto; width: 100% !important; border-collapse: collapse; font-size: 16px; font-weight: 400; line-height: 1.3; width: 600px; background-color: black; color: white;" align="center" cellpadding="0" cellspacing="0" border="0">
							<!--Header-->
							<tr style="background-color: white;">
								<td style="text-align: center;">
									<img style="padding: 10px;  height: 24px" src="<?php echo base_url('asset/img/logo.png'); ?>" alt="boloku.id">
									<hr style="border: solid 1px lightgray; width: 500px;">
								</td>
							</tr>

							<!--Content-->
							<tr style="background-color: white;">
								<td style="color: black;"> <?php //echo $content; ?>
									<table style="padding: 10px; width: 100%; padding: 50px; padding-top: 10px;">
										<tr>
											<td style="width: 130px;">From</td>
											<td>:</td>
											<td><strong>HRD PT Dash Indo Persada</strong></td>
										</tr>
										<tr>
											<td colspan="3"><br></td>
										</tr>
										<tr>
											<td colspan="3">
												<small>
													<label>Sekretariat :</label>
													<p>Gedung PKM Lama Universitas Diponegoro<br>Jln. Prof. Soedarto, SH Kampus UNDIP Tembalang 50275<br>Semarang</p>
												</small>
											</td>
										</tr>
										<tr>
											<td><br></td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: center;">
												<a href="<?php echo $link_confirm_decline; ?>" style="text-decoration-line: none;">
													<button style="background-color: white; color: black; width: 150px; height: 40px; border: solid 2px black; border-radius: 5px; font-size: 1em;"><strong>Decline</strong></button>
												</a>
											
												<a href="<?php echo $link_confirm_accept; ?>" style="text-decoration-line: none;">
													<button style="background-color: black; color: white; width: 150px; height: 40px; border: none;border-radius: 5px; font-size: 1em;"><strong>Accept</strong></button>
												</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>

							<tr>
								<td>
									
								</td>
							</tr>

							<!--Footer-->
							<tr style="text-align: center;">
								<td>
									<small><label>Ikuti kami :</label></small><br>
									<a href="https://boloku.id/">
										<img style="width: 32px; height: 32px;" src="<?php echo base_url('asset/img/website-icon.png'); ?>" alt="Website"></a>
									
									<a href="#">
										<img style="width: 32px; height: 32px;" src="<?php echo base_url('asset/img/email-icon.png'); ?>" alt="E-Mail"></a>
									
									<a href="https://www.facebook.com/bolokuu.id/">
										<img style="width: 32px; height: 32px;" src="<?php echo base_url('asset/img/facebook-icon.png'); ?>" alt="Facebook"></a>
									
									<a href="https://instagram.com/boloku_id">
										<img style="width: 32px; height: 32px;" src="<?php echo base_url('asset/img/instagram-icon.png'); ?>" alt="Instagram"></a>
									
									<a href="https://line.me/ti/p/%40evv0880o">
										<img style="width: 32px; height: 32px;" src="<?php echo base_url('asset/img/line-icon.png'); ?>" alt="Line"></a>
									
									<a href="https://twitter.com/boloku_id">
										<img style="width: 32px; height: 32px;" src="<?php echo base_url('asset/img/twitter-icon.png'); ?>" alt="Twitter"></a>
								</td>
							</tr>
							<tr>
								<td style="text-align: center;">
									<hr style="border: solid 1px white; width: 500px;">
									<small>
										<label>Sekretariat :</label>
										<p>Ruko Mulawarman Selatan Raya No. 118 A, Tembalang<br>Semarang</p>
									</small>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
	</body>
</html>
