<!DOCTYPE html>
<html>
	<head>
		<title>Verification | D-Talent</title>
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
						<span class="omb_spanOr">Verification</span>
					</div>
				</div>

				<div class="row omb_row-sm-offset-3">
					<div class="col-xs-12 col-sm-6">	
									<div class="login-main template-form">
				<h4>
					<i class="fa fa-envelope"></i> Email Verification
				</h4>
				<hr />
				<div class="template-space"></div>
<div class="alert alert-danger" <?php if (empty($errorMessages)) echo 'style="display:none;"';?>>
<?php foreach ($errorMessages as $itemError) { //-------- ?>
	<div><i class="fa fa-exclamation-triangle"></i> <?php echo $itemError; ?></div>
<?php } //------ End foreach --------- ?>
</div>

<div class="alert alert-success" <?php if (empty($successMessages)) echo 'style="display:none;"';?>>
<?php foreach ($successMessages as $itemMessage) { //-------- ?>
	<div><i class="fa fa-check-circle"></i> <?php echo $itemMessage; ?></div>
<?php } //------ End foreach --------- ?>
</div>
				<hr />
				<a href="<?php echo site_url('/CompanyProfile'); ?>"><i class="fa fa-home"></i> Beranda</a> |
				<a href="<?php echo site_url('/talent/login'); ?>"><i class="fa fa-lock"></i> Login</a>
			</div>
					</div>
		    	</div> 	
			</div>
        </div>
	</body>
</html>