<?php
	// $this->load->helper('text');
	$this->load->helper('custom');
?>

<div class="container" style="padding-top: 30px; padding-bottom: 50px;">

	<div class="bg-company">
		<figure class="image-bg" style="background-color: #ccc"></figure>
	</div>
	
	<!-- konten -->
	<div class="content">
		<div class="company-profile card">
			<div class="card-body">
				<div class="fit-content col-xs-4 col-md-2">
					<figure class="image-bg"></figure>
				</div>
				<div class="fit-content col-xs-8 col-md-10">
					<h3 class="vacancy-title"><?php echo $company_job->job_title; ?></h3>
					<p class="company-name"><?php echo $company_name; ?></p>
					<div class="vacancy-attribute hidden-xs">
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
						<?php echo $company_job->job_description; ?>
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
						<?php echo displayRequiredSkills($company_job->job_required_skill); ?>
					</ol>
				</div>
			</div>

		</div>
		<br>

	</div>

</div>
