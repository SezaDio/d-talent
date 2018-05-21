<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Sukses Login</title>
	</head>
	<body>
		<h1>Anda berhasil login</h1><br/>
		<p>Hai, <?php echo $this->session->userdata('username'); ?></p><br/><br/>
		<a href="<?php echo site_url('account/logout'); ?>"> Keluar </a>
	</body>
</html>