<?php
	$this->load->helper('custom');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
			<div class="row">
				<div class="col-md-12">
					<h4 style="font-size: 1.8em;"><?php echo $company_update->title; ?></h4>
					<hr style="border: solid 1px black;">
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
					<hr style="border: solid 1px black;">
					<div>
						<?php echo $company_update->content; ?>
					</div>
					
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4" style="text-align: center;">
					<a href="<?php echo site_url('company/updates'); ?>" class="button button1" style="width: 200px;">
						<i class="fa fa-long-arrow-alt-left"> Kembali </i>
					</a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>

		<div class="col-lg-1"></div>	
	</div>
	<br><br>
</div>
