<!DOCTYPE html>
<html>
	<head>
		<title>Login Administrator | D-Talent</title>
		<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.js'); ?>"></script>
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/style.css'); ?>" rel="stylesheet">
	</head>
	<body>
		<div class="container">
		    <div class="omb_login">	
				<div class="row omb_row-sm-offset-3 omb_loginOr">
					<div class="col-xs-12 col-sm-6">
						<hr class="omb_hrOr">
						<span class="omb_spanOr">Login</span>
					</div>
				</div>

				<div class="row omb_row-sm-offset-3">
					<div class="col-xs-12 col-sm-6">	
					    <form class="omb_loginForm" action="<?php echo site_url('Account/login'); ?>" autocomplete="on" method="POST">
					    	<?php 
								$this->load->library('form_validation');
								echo validation_errors(); 
							?>

							<p style="color:red; font-family: Comic Sans Ms;"><?php echo $this->session->flashdata('notification'); ?></p>
							
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control" name="username" placeholder="username" required value="<?php echo set_value('username'); ?>">
							</div>
							<span class="help-block"></span>
												
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input  type="password" class="form-control" name="password" placeholder="Password" required value="<?php echo set_value('password'); ?>">
							</div>
		                    <span class="help-block"><hr class="omb_hrOr"></span>

							<button class="btn btn-lg btn-primary btn-block" type="submit" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
						</form>
					</div>
		    	</div> 	
			</div>
        </div>
	</body>
</html>