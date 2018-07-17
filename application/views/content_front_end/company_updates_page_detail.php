<?php
	$this->load->helper('custom');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="background: whitesmoke; padding: 20px; width: 100%;">
			<div class="row">
				<div class="col-md-12">
					<h3><?php echo $company_update->title; ?></h3>
					<br>
					<div class="company-update-image">
						<img src="<?php echo base_url('asset/img/upload_img_company_updates/') . $company_update->image;?>" alt="">
					</div>
					<br>
					<div>
						<p class="company-update-attribute">
							<?php
								echo '<span><i class="fa fa-building"></i> ' . $company_name . '</span>';
								echo '<span><i class="fa fa-calendar-alt"></i> '. displayDate($company_update->created_at) . '</span>';
								echo '<span><i class="fa fa-tag"></i> '. displayCompanyUpdateStatus($company_update->status) . '</span>';
							?>
						</p>
					</div>
					<div>
						<?php echo $company_update->content; ?>
					</div>
					
				</div>
			</div>
			
			<br>
			<br>

			<div>
				<a href="<?php echo site_url('company/updates'); ?>" class="button button1" style="width: 130px;">Kembali</a>
			</div>
		</div>

		<div class="col-lg-1"></div>	
	</div>
	<br><br>
</div>
