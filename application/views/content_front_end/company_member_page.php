<div class="row">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<!--COver/background picture-->
		<div class="col-md-12" style="padding: 0;">

			<figure class="image-bg" style="background-size: cover; background-position: center; width: 100%; height: 200px; background-repeat: no-repeat; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$dataCompany->company_cover;?>');"></figure>

		</div>
		<br>
		<div class="col-md-12" style="background-color: whitesmoke;">
			<div class="row">
				<!--Company picture-->
				<div class="col-md-3" style="padding-top: 15px;">
					<figure class="image-bg" style="background-size: cover; background-position: center; width: 100%; height: 200px; background-repeat: no-repeat; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$dataCompany->company_logo;?>');"></figure>
				</div>

				<!--Nama, Bidang, dan tombol manage dan see jobs -->
				<div class="col-md-6" style="padding: 20px;">
					<p style="font-size: 1.8em; font-family: sans-serif;"><strong><?php echo $dataCompany->company_name ?></strong></p>
					<p style="font-size: 1.4em; font-family: sans-serif;">Human Resource Development</p>
					<br>
					<div class="row">
						<div class="col-md-5">
							<a href="<?php echo site_url('CompanyMember/updates_page'); ?>" class="button button1"><i class="fa fa-edit"></i> Manage Page</a>
						</div>
						<div class="col-md-5">
							<a href="<?php echo site_url('CompanyMember/jobs_page'); ?>">
								<button type="button" class="button button2"><i class="fa fa-suitcase"></i> See Jobs</button>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!--Biodata perusahaan-->
			<div class="row">
				<div class="col-md-12" style="padding-top: 10px">
					<hr style="border: solid 1px lightgray">
					<strong style="font-size: 1.2em;"><i class="fa fa-home" ></i> Office Address</strong><br>
					<p>Jalan Prof. Soedarto SH, Tembalang, Semarang 50211</p>
					<table class="table">
						<tr style="font-size: 1.2em;">
							<td style="padding-left: 0px;"><strong><i class="fa fa-industry"></i> Industry</strong></td>
							<td><strong><i class="fa fa-globe"></i> Website</strong></td>
							<td><strong><i class="fa fa-envelope"></i> E-mail</strong></td>
						</tr>
						<tr>
							<td style="padding-left: 0px;">HRD</td>
							<td>www.d-talent.com</td>
							<td>company.service@d-talent.id</td>
						</tr>
						<tr style="font-size: 1.2em;">
							<td style="padding-left: 0px;"><strong><i class="fa fa-user"></i> Company Type</strong></td>
							<td><strong><i class="fa fa-gear"></i> Specialties</strong></td>
							<td><strong><i class="fa fa-calendar"></i> Year Founded</strong></td>
						</tr>
						<tr>
							<td style="padding-left: 0px;">Public Company</td>
							<td>Talent Solution and Talent Service</td>
							<td>2018</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<br>
		<!--About Us perusahaan-->
		<div class="col-md-12" style="padding-top: 10px; background-color: whitesmoke;">
			<strong style="font-size: 1.2em"><i class="fa fa-pencil"></i> About Us</strong>
			<hr style="border: solid 1px lightgray">
			<div class="row">
				<div class="col-md-12" style="padding-bottom: 15px;">
					Lorem Ipsum . . .
				</div>
			</div>
		</div>
		<br>

		<!--Recent Updates perusahaan-->
		<div class="col-md-12" style="padding-top: 10px;">
			<strong style="font-size: 1.2em"><i class="fa fa-list"></i> Recent Updates</strong>
			<hr style="border: solid 1px lightgray">
			<!--Recent Updates Content-->
				<div class="col-md-12" style="background-color: whitesmoke;">
					<p>Content Recent Updates. Lorem Ipsum . . . </p>
				</div>
			
		</div>
		
	</div>

	<div class="col-lg-1"></div>	
</div>