<div class="row">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<br>
		<div class="col-md-12" style="background-color: whitesmoke;">
			<div class="row">
				<!--Company picture-->
				<div class="col-md-3" style="padding-top: 15px;">
					<img style="width: 100%; height: 200px;" class="img-fulid" src="<?php echo base_url('asset/img/upload_img_slider/empty.png')?>" alt="">
				</div>

				<!--Nama, Bidang, dan tombol manage dan see jobs -->
				<div class="col-md-6" style="padding: 20px;">
					<p style="font-size: 1.8em; font-family: sans-serif;"><strong>PT Name</strong></p>
					<p style="font-size: 1.4em; font-family: sans-serif;">HRD Belum dinamis</p>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div class="row">
				<!--Jobs Caategory section-->
				<div class="col-md-12" style="padding-top: 13px;">
					<div class="row">
						<div class="col-md-2" style="text-align: center; padding: 5px;">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Job Category
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<?php
                                        foreach ($job_category as $key=>$category) 
                                        {
                                          
                                            echo '<p class="dropdown-item" value="'.$key.'">'.$category.'</p>';   
                                        }
                                    ?>
								</div>
							</div>
						</div>
						<div class="col-md-7"></div>
						<div class="col-md-3" style="text-align: center; padding: 5px;">
							<div class="input-group">
								<span class="input-group-addon" style="background-color: black; color: white;"><i class="fa fa-search"></i></span>
								<input style=" border-color: black; background-color: white; color: black;" type="text" class="form-control" name="email" placeholder="Search Job . . ." required>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div class="col-md-12">
				<!--Show Jobs list-->
				<div class="row">
					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;">
								<strong style="padding-top: 5px; font-size: 1.3em;">People Partner Analyst</strong>
							</div>
							<div class="row">
								<div class="col-md-8">
									<small style="font-size: 1em;"><b>PT Dash Indo Persada</b></small>
									<p style="font-size: 1em;">Semarang, Jawa Tengah</p>
								</div>
								<div class="col-md-4" style="height: 65px;">
									<div style="padding: 5px; text-align: center; border-radius: 5px; border: solid 1px black; background-color: black; opacity: 0.8; color: white;">
										<small style="font-size: 1em;"><b>Batas Pendaftaran</b></small>
										<hr style="border: solid 1px lightgray; margin-top: 0px; margin-bottom: 0px;">
										<small style="font-size: 1em;">06 Juli - 14 Juli 2018</small>
									</div>
								</div>
							</div>
							<hr style="border: solid 1px lightgray; margin-top: 0px;">
							<div class="row" style="padding-bottom: 10px;">
								<div class="col-md-6">
									<small style="font-size: 1em;">Category : </small>
									<span class="badge badge-dark">Information Technology</span>
								</div>
								<div class="col-md-6">
									<small style="font-size: 1em;">Total Applicant : </small>
									<span class="badge badge-dark">1000</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;">
								<strong style="padding-top: 5px; font-size: 1.3em;">People Partner Analyst</strong>
							</div>
							<div class="row">
								<div class="col-md-8">
									<small style="font-size: 1em;"><b>PT Dash Indo Persada</b></small>
									<p style="font-size: 1em;">Semarang, Jawa Tengah</p>
								</div>
								<div class="col-md-4" style="height: 65px;">
									<div style="padding: 5px; text-align: center; border-radius: 5px; border: solid 1px black; background-color: black; opacity: 0.8; color: white;">
										<small style="font-size: 1em;"><b>Batas Pendaftaran</b></small>
										<hr style="border: solid 1px lightgray; margin-top: 0px; margin-bottom: 0px;">
										<small style="font-size: 1em;">06 Juli - 14 Juli 2018</small>
									</div>
								</div>
							</div>
							<hr style="border: solid 1px lightgray; margin-top: 0px;">
							<div class="row" style="padding-bottom: 10px;">
								<div class="col-md-6">
									<small style="font-size: 1em;">Category : </small>
									<span class="badge badge-dark">Information Technology</span>
								</div>
								<div class="col-md-6">
									<small style="font-size: 1em;">Total Applicant : </small>
									<span class="badge badge-dark">1000</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;">
								<strong style="padding-top: 5px; font-size: 1.3em;">People Partner Analyst</strong>
							</div>
							<div class="row">
								<div class="col-md-8">
									<small style="font-size: 1em;"><b>PT Dash Indo Persada</b></small>
									<p style="font-size: 1em;">Semarang, Jawa Tengah</p>
								</div>
								<div class="col-md-4" style="height: 65px;">
									<div style="padding: 5px; text-align: center; border-radius: 5px; border: solid 1px black; background-color: black; opacity: 0.8; color: white;">
										<small style="font-size: 1em;"><b>Batas Pendaftaran</b></small>
										<hr style="border: solid 1px lightgray; margin-top: 0px; margin-bottom: 0px;">
										<small style="font-size: 1em;">06 Juli - 14 Juli 2018</small>
									</div>
								</div>
							</div>
							<hr style="border: solid 1px lightgray; margin-top: 0px;">
							<div class="row" style="padding-bottom: 10px;">
								<div class="col-md-6">
									<small style="font-size: 1em;">Category : </small>
									<span class="badge badge-dark">Information Technology</span>
								</div>
								<div class="col-md-6">
									<small style="font-size: 1em;">Total Applicant : </small>
									<span class="badge badge-dark">1000</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="col-lg-1"></div>
</div>
<br>