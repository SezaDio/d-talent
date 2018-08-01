<!DOCTYPE html>
<html>
	<head>
		<title>Talent Log In | D-Talent</title>

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
								<span class="omb_spanOr"><b>Login</b></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">	
							    <form class="omb_loginForm" action="<?php echo site_url('AccountTalent/login_talent_member'); ?>" autocomplete="on" method="POST">
							    	<?php 
										$this->load->library('form_validation');
										echo validation_errors(); 
									?>

									<p style="color:red;"><?php echo $this->session->flashdata('notification'); ?></p>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="email" class="form-control" name="email" placeholder="E-Mail" required value="<?php echo set_value('email'); ?>">
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
									<p style="text-align: center;">Belum Jadi Member? <a href="<?php echo site_url('AccountTalent/view_signup'); ?>">Sign Up</a></p>
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