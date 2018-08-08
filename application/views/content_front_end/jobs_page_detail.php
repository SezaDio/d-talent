<?php
	$this->load->helper('custom');
?>

<div class="container" style="padding-top: 30px; padding-bottom: 50px;">

	<div class="bg-company">
		<?php if($company_cover != "") {?>
		<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_company/').$company_cover;?>');"></figure>
		<?php } else{ ?>
		<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/bg-default.jpg'); ?>');"></figure>
		<?php }?>
	</div>
	
	<!-- konten -->
	<div class="content">
		<div class="company-profile card">
			<div class="card-body row">
				<div class="fit-content col-xs-4 col-md-2">
					<?php if($company_logo != "") {?>
					<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_company/').$company_logo;?>');"></figure>
					<?php } else{ ?>
					<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/company-default.png'); ?>');"></figure>
					<?php }?>
				</div>
				<div class="fit-content col-xs-8 col-md-10">
					<h3 class="vacancy-title"><?php echo $job_title; ?></h3>
					<p class="company-name"><?php echo $company_name; ?></p>
					<div class="vacancy-attribute hidden-xs">
						<span><i class="fa fa-map-marker-alt"></i>
							<?php echo capitalizeEachWord($city) .", ". $province; ?>
						</span>
						<span><i class="fa fa-tag"></i>
							<?php echo $job_category; ?>
						</span>
						<span><i class="fa fa-calendar-alt"></i>
							<?php echo displayApplyDate($job_date_start, $job_date_end); ?>
						</span>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="vacancy-attribute visible-xs col-xs-12">
					<span><i class="fa fa-map-marker-alt"></i>
						<?php echo capitalizeEachWord($company_job->city) .", ". $company_job->province; ?>
					</span>
					<span><i class="fa fa-tag"></i>
						<?php echo $job_category; ?>
					</span>
					<span><i class="fa fa-calendar-alt"></i>
						<?php echo displayApplyDate($company_job->job_date_start, $company_job->job_date_end); ?>
					</span>
				</div>
			</div>
		</div>
		
		<br>
		<br>
		
		<div class="job-vacancy">
			<div class="card">
				<div class="card-header">
					<h4>Deskripsi Pekerjaan</h4>
				</div>
				<div class="card-body">
					<p>
						<?php echo $job_description; ?>
					</p>
				</div>
			</div>

			<br>
			<br>

			<div class="card">
				<div class="card-header">
					<h4>Persyaratan</h4>
				</div>
				<div class="card-body">
					<ol class="requirement">
						<?php echo displayRequiredSkills($job_required_skill); ?>
					</ol>
				</div>
			</div>

		</div>
		
		<br>
		<br>

		<div>
			<a href="<?php echo site_url('JobVacancy/job_list'); ?>" class="button button1" style="width: 130px;color:white">Kembali</a>
		</div>

		<br>

	</div>

</div>
