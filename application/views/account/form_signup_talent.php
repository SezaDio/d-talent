<!DOCTYPE html>
<html>
	<head>
		<title>Talent Sign Up | D-Talent</title>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script type="text/javascript" src="<?php echo base_url('asset/js/jquery-3.2.0.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/bootstrap-datepicker.js'); ?>"></script>
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('asset/css/datepicker/datepicker3.css'); ?>" rel="stylesheet"/>
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
							<div class="col-md-12" style="text-align: center;">
								<b style="color: black;">Sign Up</b>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">	
							    <form class="omb_loginForm" action="<?php echo site_url('AccountTalent/add_sign_up_talent_check'); ?>" autocomplete="on" method="POST">
							    	<?php 
										$this->load->library('form_validation');
										echo validation_errors(); 
									?>

									<?php 
										if($this->session->flashdata('msg_berhasil')!='')
										{?>
	                                        <div class="alert alert-success alert-dismissable">
	                                            <i class="glyphicon glyphicon-ok"></i>
	                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                            <?php echo $this->session->flashdata('msg_berhasil');?> 
	                                        </div>
                                  <?php }
                                  		elseif ($this->session->flashdata('msg_gagal')!='')
                                  		{ ?>
                                    		 <div class="alert alert-warning alert-dismissable">
	                                            <i class="glyphicon glyphicon-remove"></i>
	                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                            <?php echo $this->session->flashdata('msg_gagal');?> 
	                                        </div>
	                              <?php } ?>
									
									<!--Nama-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" name="nama" placeholder="Nama Beserta Gelar (ex. John Doe, S.Kom)" required value="<?php echo set_value('nama'); ?>">
									</div>
									<br>

									<!--E-Mail-->
									<div class="input-group">
										<span class="input-group-addon glyphicon glyphicon-envelope"></span>
										<input type="email" class="form-control" name="email" placeholder="E-Mail" required value="<?php echo set_value('email'); ?>">
									</div>
									<br>

									<!--Telepon-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
										<input type="text" class="form-control" name="nomor_ponsel" placeholder="Nomor Ponsel" required value="<?php echo set_value('nomor_ponsel'); ?>">
									</div>
									<br>

									<!--Jenis Kelamin-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
										<select class="form-control" name="jenis_kelamin" required>
											<option value="1">Laki-laki</option>
											<option value="0">Perempuan</option>
										</select>
									</div>
									<br>

									<!--Tanggal Lahir-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input type="text" class="form-control" id="datetimepicker4" name="tanggal_lahir" placeholder="Tanggal Lahir" required value="<?php echo set_value('tanggal_lahir'); ?>">
									</div>
									<br>

									<!--Provinsi-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
										<select name="provinsi" onchange="ajax_post();" placeholder="Provinsi" required class="form-control" id="lokasi_provinsi" required>
				                            <option value="All">--Pilih Lokasi Provinsi--</option>
				                            <?php
				                                foreach ($lokasiProvinsi as $key=>$provinsi) 
				                                {
				                                  
				                                    echo '<option value="'.$key.'">'.$provinsi['lokasi_nama'].'</option>';   
				                                }
				                            ?>
				                        </select>
									</div>
									<br>

									<!--Kota-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
										<select name="kota" placeholder="Kota" required class="form-control" id="lokasi_kota" required>
				                            <option value="All">--Pilih Lokasi Kota--</option>
				                            <?php
				                                foreach ($lokasiKabupatenKota as $key=>$kota) 
				                                {
				                                  
				                                    echo '<option value="'.$key.'">'.$kota['lokasi_nama'].'</option>';   
				                                }
				                            ?>
				                        </select>
									</div>
									<br>

									<!--Status Pernikahan-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
										<select class="form-control" name="status_pernikahan" required>
											<option value="0">Belum menikah</option>
											<option value="1">Sudah menikah</option>
										</select>
									</div>
									<br>

									<!--Password-->
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input minlength="6" type="password" class="form-control" name="password" placeholder="Password (Min. 6 Karakter)" required value="<?php echo set_value('password'); ?>">
									</div>
									<br>

									<div class="input-group" style="float: right;">
										<a href="#"><p>Forgot Password?</p></a>
									</div>
				                    
									<br><br>
									<button class="button button5" type="submit" name="submit" value="1"><span class="glyphicon glyphicon-log-in"></span><strong> Join D-Talent </strong> </button>
									<br><br>
									<hr style="border: solid 1px lightgray">
									<p style="text-align: center;">Sudah Punya Akun? <a href="<?php echo site_url('AccountTalent/index'); ?>">Log In </a></p>
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

        <script type="text/javascript">
        	
            $(function () {
                $('#datetimepicker4').datepicker({
                	format: 'yyyy-mm-dd'
                });
            });

			function ajax_post()
			{
				var id_provinsi = document.getElementById("lokasi_provinsi").value;
				$.ajax({
					url: 'lokasi_kabupaten_kota',	
					type: 'POST',
					data: {id_provinsi:id_provinsi},
					success: function(respData){
								var cTotal = respData.kota.length;
								var ctr;

								// clear options
								$('#lokasi_kota').html('<option value="All">--Pilih Lokasi Kota--</option>');
								for ( ctr = 0; ctr < cTotal; ctr++) 
								{
									$('#lokasi_kota').append('<option value="'+respData.kota[ctr].id+'">'+respData.kota[ctr].name+'</option>');
								}
							}
				});
			}
        </script>

	</body> 
</html>