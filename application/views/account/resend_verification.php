<?php
/*
 * views/member/resend_verification.php
 * -------------------------------------
 * Form resend verification email
 */

	if (!isset($formAction)) $formAction = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Resend Verification | D-Talent</title>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.js'); ?>"></script>
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/style.css'); ?>" rel="stylesheet">

		<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Poppins');
	    	body{
	    		font-family: 'Poppins', sans-serif;
	    	}

	    	.button {
			    background-color: #4CAF50;
			    border: none;
			    border-radius: 8px;
			    width: 100%;
			    color: white;
			    padding: 16px 32px;
			    text-align: center;
			    text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    -webkit-transition-duration: 0.4s;
			    transition-duration: 0.4s;
			    cursor: pointer;
			}

			.button5 {
			    background-color: black;
			    color: white;
			    border: 2px solid #555555;
			}

			.button5:hover {
			    background-color: white;
			    color: black;
			}
			.omb_login .omb_loginOr .omb_spanOr{
				width: 10em;
				left: 32%;
			}
		</style>
	</head>
	<body style="background: whitesmoke;">
		<div class="container">
			<div class="row" style="padding: 10px;">
				<br><br>
				<div class="col-lg-4">
				</div>

				<div class="col-lg-4" style="padding: 20px; background: white; border: solid 1px lightgray; border-radius: 5px; box-shadow: 5px 10px 12px lightgrey;">
					<div class="row">
						<div class="col-md-12" style="text-align: center;">
							<img src="<?php echo base_url('asset/img/logo1.png');?>" style="background-size: cover; background-position: center; width: 220px; height: 62px; background-repeat: no-repeat;"/>
						</div>
					</div>
					<div class="omb_login">	
						<div class="row omb_loginOr">
							<div class="col-md-12">
								<hr class="omb_hrOr">
								<span class="omb_spanOr"><b>Resend Verification E-mail</b></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12" style="margin-top: 20px;">	
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
								<?php if (empty($hideForm)) { //----------- FORM SHOWN ---------- ?>
									<form action="<?php echo htmlspecialchars($formAction); ?>" method="POST">
										<div class="form-group">
											<label for="acc_email">E-mail</label> <input id="acc_email" name="acc_email" placeholder="email@company.com"
												type="email" class="form-control" required value="<?php echo htmlspecialchars(@$acc_email); ?>" />
										</div>
										<hr />
										<button type="submit" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Kirim Ulang</button>
										
										<input type="hidden" name="<?php echo WEB_SUBMIT_TAG; ?>" value="dts_resendverification" />
									</form>
								<?php } //----------- END IF FORM SHOWN ----------------- ?>
								<hr />
								<a href="<?php echo site_url('/CompanyProfile'); ?>" class="btn btn-link"><i class="fa fa-home"></i> Beranda</a>
							</div>
				    	</div> 	
					</div>
				</div>

				<div class="col-lg-4">
				</div>
			</div>
        </div>
	</body>
</html>