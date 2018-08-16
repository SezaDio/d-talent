<?php
/*
 * views/skin/email/template_default.php
 * --------------------------------------
 * Default email template
 */

?>
<!doctype HTML>
<html>
	<head>
		<title><?php if (isset($pageTitle)) echo htmlspecialchars($pageTitle);
			else echo 'D-Talent'; ?></title>
	</head>
	<body>
		<?php
			echo $pageContent;
		?>
		<small><b>PT Dash Indo Persada</b><br> Alamat kantor: Pudakpayung<br />
		Kabupaten Semarang, Jawa Tengah<br>
	<br>Website: <a href='http://d-talentsolution.id/?utm_campaign=email&amp;utm_source=email&amp;utm_medium=emailfooter&amp;ref=email'>d-talentsolution.id</a><br>
		E-mail: <a href='mailto:hello@d-talentsolution.id'>hello@d-talentsolution.id</a><br>
		Facebook: <a href='http://www.facebook.com/dtalent.solution'>facebook.com/dtalent.solution</a><br>
		Twitter: <a href='http://www.twitter.com/dtalent_id'>@dtalent_id</a><br>
		Instagram: <a href='http://www.instagram.com/dtalent_id'>dtalent_id</a><br>
		Linked In: <a href='https://www.linkedin.com/company/d-talent'>linkedin.com/company/d-talent</a>
		</small>
	</body>
</html>