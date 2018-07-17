<!DOCTYPE html>
<html>
	<head>
		<title>Company Log In | D-Talent</title>
		<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.js'); ?>"></script>
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/style.css'); ?>" rel="stylesheet">

		<style type="text/css">
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
		</style>
	</head>
	<body style="background: whitesmoke;">
		<div class="container">
			<div class="row" style="padding: 10px;">
				<br><br>
				<div class="col-lg-4">
				</div>

				<div class="col-lg-4" style="padding: 20px; background: white; border: solid 1px lightgray; border-radius: 5px; box-shadow: 5px 10px 12px lightgrey;">
					<div class="omb_login">	
						<div class="row omb_loginOr">
							<div class="col-md-12">
								<hr class="omb_hrOr">
								<span class="omb_spanOr"><b>Login</b></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">	
							    <form class="omb_loginForm" action="<?php echo site_url('AccountCompany/login_company_member'); ?>" autocomplete="on" method="POST">
							    	<?php 
										$this->load->library('form_validation');
										echo validation_errors(); 
									?>

									<p style="color:red;"><?php echo $this->session->flashdata('notification'); ?></p>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="email" class="form-control" name="company_email" placeholder="E-Mail" required value="<?php echo set_value('email'); ?>">
									</div>
									<span class="help-block"></span>
														
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input  type="password" class="form-control" name="password" placeholder="Password" required value="<?php echo set_value('password'); ?>">
									</div>
									<br>
									<div class="input-group" style="float: right;">
										<a href="#"><p>Forgot Password?</p></a>
									</div>
				                    
									<br><br>
									<button class="button button5" type="submit" name="login" value="1"><span class="glyphicon glyphicon-log-in"></span><strong> Log In </strong> </button>
									<br><br>
									<hr style="border: solid 1px lightgray">
									<p style="text-align: center; font-family: monospace">Belum Jadi Member? <a href="<?php echo site_url('AccountCompany/view_signup'); ?>">Sign Up</a></p>
									<br>
								</form>
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