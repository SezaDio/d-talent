<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Sukses Login</title>
	</head>
	<body>
		<h1>Login Success</h1><br/>
		<p>Hi, <?php echo $this->session->userdata('username'); ?></p><br/><br/>
		<a href="<?php echo site_url('account/logout'); ?>"> Logout </a>
	</body>
</html>