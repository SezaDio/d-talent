<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>
<div class="row company-member">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<div class="row">
			<div class="col-md-12" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey;">
				<!--COver/background picture-->
				<div class="row">
					<?php
						if ($dataCompany->company_cover != "") {
					?>
					<div class="col-md-12" style="padding: 0;">

						<figure class="image-bg" style="background-size: cover; background-position: center; width: 100%; height: 200px; background-repeat: no-repeat; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$dataCompany->company_cover;?>');"></figure>

					</div>
					<?php
						}
					?>
				</div>
				<div class="row">
					<div class="col-md-12" style="background-color: white; padding: 30px;">
						<div class="row">
							<!--Company picture-->
							<div class="col-md-3" style="padding-top: 15px;">
								<figure class="image-bg" style="background-size: cover; background-position: center; width: 100%; height: 200px; background-repeat: no-repeat; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$dataCompany->company_logo;?>');"></figure>
							</div>

							<!--Nama, Bidang, dan tombol manage dan see jobs -->
							<div class="col-md-6" style="padding: 20px;">
								<p style="font-size: 1.8em; font-family: sans-serif;"><strong><?php echo $dataCompany->company_name ?></strong></p>
								<p style="font-size: 1.4em; font-family: sans-serif;"><?php echo ($dataCompany->company_industries!="" ? $bidang_usaha[$dataCompany->company_industries] : "") ?></p>
								<br>
								<div class="row">
									<div class="col-md-5">
										<a href="<?php echo site_url('CompanyMember/overview_page'); ?>" class="button button1"><i class="fa fa-edit"></i> Manage Page</a>
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
								<hr style="border: solid 1px black">
								<strong style="font-size: 1.2em;"><i class="fa fa-home" ></i> Office Address</strong><br>
								<p><?php echo ($dataCompany->company_address!="" ? $dataCompany->company_address : "") ?></p>
								<table class="table">
									<tr style="font-size: 1.2em;">
										<td style="padding-left: 0px;"><strong><i class="fa fa-industry"></i> Industry</strong></td>
										<td><strong><i class="fa fa-globe"></i> Website</strong></td>
										<td><strong><i class="fa fa-envelope"></i> E-mail</strong></td>
									</tr>
									<tr>
										<td style="padding-left: 0px;"><?php echo ($dataCompany->company_industries!="" ? $bidang_usaha[$dataCompany->company_industries] : "") ?></td>
										<td><?php echo ($dataCompany->company_website!="" ? $dataCompany->company_website : "") ?></td>
										<td><?php echo ($dataCompany->company_email!="" ? $dataCompany->company_email : "") ?></td>
									</tr>
									<tr style="font-size: 1.2em;">
										<td style="padding-left: 0px;"><strong><i class="fa fa-user"></i> Company Type</strong></td>
										<td><strong><i class="fa fa-list"></i> Specialties</strong></td>
										<td><strong><i class="fa fa-calendar"></i> Year Founded</strong></td>
									</tr>
									<tr>
										<td style="padding-left: 0px;"><?php echo ($dataCompany->company_type!="" ? $company_type[$dataCompany->company_type] : "") ?></td>
										<td>
											<?php
												if ($dataCompany->company_specialties != "") {
													$specialties = explode(',', $dataCompany->company_specialties);
													$count = count($specialties);
													for ($i=0; $i < $count; $i++) { 
														echo $specialties[$i];
														if ($i+1 != $count) {
															echo ", ";
														}
													}
												}
											?>
										</td>
										<td><?php echo ($dataCompany->company_year!="" ? $dataCompany->company_year : "") ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<!--About Us perusahaan-->
		<div class="row">
			<div class="col-md-12" style="padding: 30px; background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey;">
				<strong style="font-size: 1.2em"><i class="fa fa-info-circle"></i> About Us</strong>
				<hr style="border: solid 1px black">
				<div class="row">
					<div class="col-md-12" style="padding-bottom: 15px;">
						<?php echo ($dataCompany->company_description!="" ? $dataCompany->company_description : "") ?>
					</div>
				</div>
			</div>
		</div>
		<br>

		<!--Recent Updates perusahaan-->
		<div class="row">
			<?php
				if($company_updates != null) {
			?>
			<div class="col-md-12" style="padding: 30px; background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey;">
				<strong style="font-size: 1.2em"><i class="fa fa-list"></i> Recent Updates</strong>
				<hr style="border: solid 1px black">
				<div class="row">
					<!--Recent Updates Content-->
					<div class="col-md-12">
						<?php
							foreach ($company_updates as $company_update):
						?>
						<div class="col-md-12 item">
							<div class="row">
								<div class="col-md-2 image-wrapper">
									<figure class="image-bg img-fulid" style="height: 100%; background-image: url('<?php echo base_url('asset/img/upload_img_company_updates/') . $company_update->image;?>');"></figure>
								</div>

								<div class="col-md-6 item-attribute">
									<strong class="company-update-title">
										<a href="<?php echo site_url('company/updates/detail/') . $company_update->id_company_update;?>">
											<?php echo $company_update->title; ?>
										</a>
									</strong>
									<p class="company-name">
										<?php echo $dataCompany->company_name; ?>
									</p>
									<strong class="text-gray">
										<?php
											echo "<i class= fa fa-calendar-alt></i>".displayDate($company_update->created_at);
											echo '<span class="space">|</span>'. displayCompanyUpdateStatus($company_update->status);
										?>
									</strong>
								</div>
								<div class="col-md-3" >
									<!-- <a href="<?php echo site_url('company/updates/edit/') . $company_update->id_company_update;?>" class="button button1">
										<i class="fa fa-edit"></i> Edit
									</a>
									<a href="#!" class="button button3" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $company_update->id_company_update;?>">
										<i class="fa fa-trash"></i> Delete
									</a> -->
								</div>
							</div>
							<hr class="lightgray-line">
							<!--
							<div class="row" style="padding: 20px;">
								<div class="col-md-12 company-update-content">
									<?php //echo character_limiter($company_update->content, 100); ?>
								</div>
							</div> -->
						</div>
						<?php
							endforeach;
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="text-align: center;">
						<a href="<?php echo site_url('company/updates'); ?>" class="button button1" style="width: 180px;">
							View All
						</a>
					</div>
				</div>
			</div>

			<?php
				}
			?>
		</div>
		<br>
		<br>
	</div>

	<div class="col-lg-1"></div>	
</div>