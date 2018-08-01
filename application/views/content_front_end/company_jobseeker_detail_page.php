<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>

<div class="container">
	<div class="bg-talent">
	<?php
		if ($talent->foto_sampul != "") {
	?>
		<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>');"></figure>
	<?php
		} else {
	?>
		<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/bg-default.jpg'); ?>');"></figure>
	<?php
		}
	?>
	</div>

	<div class="profile">
		<div class="img-talent">
		<?php
			if ($talent->foto_profil != "") {
		?>
			<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>');"></figure>
		<?php
			} else {
		?>
			<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/talent-default.png'); ?>');"></figure>
		<?php
			}
		?>
		</div>

		<div class="card">
			<div class="card-body">
				<div style="padding: 10px;">
					<div class="text-center profile-attribute">
						<!-- Name | Age | City -->
						<span class="space"><i class="fa fa-user"></i> <?php echo $talent->nama; ?></span> |
						<span class="space"><i class="fa fa-birthday-cake"></i> <?php echo countAge($talent->tanggal_lahir); ?> Tahun</span> |
						<span class="space">
							<?php 
								if ($talent->jenis_kelamin == 1)
								{ ?>
									<i class="fa fa-mars"></i>
						  <?php } 
						  		else 
						  		{ ?>
						  			<i class="fa fa-venus"></i>
						  <?php } ?>
							
								<?php echo displayGender($talent->jenis_kelamin); ?>	
						</span> |
						<span class="space"><?php echo displayMaritalStatus($talent->status_pernikahan); ?></span>
						<!-- <span><?php echo capitalizeEachWord($talent_location_city); ?></span> -->
					</div>
					<br>
					<div class="text-justify">
						<?php echo $talent->tentang_saya; ?>
					</div>
					<?php
						if (!empty($talent->kemampuan)) {
					?>
						<div class="text-center job-interest label-colors">
							<?php echo displaySkills($talent->kemampuan)?>
						</div>
					<?php
						}
					?>

					<!-- contact -->
					<div class="contact-talent">
						<hr style="border: solid 1px lightgray">
						<div class="text-center">
							<span class="space"><i class="fa fa-envelope"></i> <?php echo $talent->email; ?></span>
							<span class="space"><i class="fa fa-phone"></i> <?php echo $talent->nomor_ponsel; ?></span>
							<span class="space"><i class="fa fa-home"></i> <?php echo capitalizeEachWord($talent_location_city); ?></span>
						</div>
						<hr style="border: solid 1px lightgray">
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<a style="padding-top: 20px;" href="#!" class="button button1" data-toggle="modal" data-target=".modal-invite" data-id="<?php //echo $cv_work->id_talent_cv_work;?>" data-cv="invite"><h4><i class="fa fa-envelope"></i> INVITE</h4></a>
						</div>
						<div class="col-md-4"></div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<!-- konten -->
		<div class="content">
			<div class="cv">

				<!--Section Detail Talent Page (Work Experience)-->
				<?php
					if($cv_works != null) {
				?>
				<div class="card">
				  <div class="card-header">
				    <h3><i class="fa fa-suitcase"></i> Pengalaman Kerja</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_works as $cv_work):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayCVWorkDate($cv_work->work_start, $cv_work->work_end); ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_work->position ." di ". $cv_work->company;
					    				if ($cv_work->description != "") {
					    					echo "<br>" . character_limiter($cv_work->description, 100);
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<!--Section Detail Talent Page (Education)-->
				<?php
					if($cv_educations != null) {
				?>
				<br>
				<br>
				<div class="card">
				  <div class="card-header">
				    <h3><i class="fa fa-graduation-cap"></i> Pendidikan</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_educations as $cv_education):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo $cv_education->from_year. " - " .$cv_education->to_year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_education->school;
					    				if ($cv_education->field_of_study != "") {
					    					echo '<span class="space">|</span>' . $cv_education->field_of_study;
					    				}
					    				if ($cv_education->degree != "") {
					    					echo '<span class="space">('. $cv_education->degree.')</span>';
					    				}

					    				if ($cv_education->activity != "") {
					    					echo "<br>" . character_limiter($cv_education->activity, 100);
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<!--Section Detail Talent Page (Achivement)-->
				<?php
					if($cv_achievements != null) {
				?>
				<br>
				<br>
				<div class="card">
				  <div class="card-header">
				    <h3><i class="fa fa-trophy"></i> Prestasi</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_achievements as $cv_achievement):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayMonthName($cv_achievement->month) ." ". $cv_achievement->year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_achievement->title;
					    				if ($cv_achievement->issuer != "") {
					    					echo '<span class="space">|</span>' . $cv_achievement->issuer;
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<!--Section Detail Talent Page (Course)-->
				<?php
					if($cv_courses != null) {
				?>
				<br>
				<br>
				<div class="card">
				  <div class="card-header">
				    <h3><i class="fa fa-certificate"></i> Pelatihan</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_courses as $cv_course):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo $cv_course->year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_course->title;
					    				if ($cv_course->organizer != "") {
					    					echo '<span class="space">|</span>' . $cv_course->organizer;
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<!--Section Detail Talent Page (Online Test Result)-->
				<?php
					if($cv_courses != null) {
				?>
				<br>
				<br>
				<div class="card">
				  <div class="card-header">
				    <h3><i class="fa fa-pen"></i> Tes Online</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_courses as $cv_course):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo $cv_course->year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_course->title;
					    				if ($cv_course->organizer != "") {
					    					echo '<span class="space">|</span>' . $cv_course->organizer;
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>
			</div>

		</div>
	</div>

</div>

<!-- modal delete -->
<div class="modal fade modal-invite" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-envelope"></i> Invitation</h4>
			</div>
			<form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('CompanyMember/invitation_message/');?>">
				<div class="modal-body">
                  	<div class="row">
	                    <div class="col-md-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control" id="name" name="invitation_from" placeholder="From" required data-error="Please enter your name">
	                        <div class="help-block with-errors"></div>
	                      </div>                                 
	                    </div>

	                    <div class="col-md-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control" id="name" name="invitation_subject" placeholder="Subject" required data-error="Please enter your name">
	                        <div class="help-block with-errors"></div>
	                      </div>                                 
	                    </div>

	                    <div class="col-md-12">
		                    <div class="form-group"> 
	                        	<textarea class="form-control" id="message" name="invitation_message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
	                        	<div class="help-block with-errors"></div>
	                    	</div>
	                   	</div>
                   	</div>
                   	<div class="row">
                   		<div class="col-md-3">
                   			<input style="visibility: hidden;"  type="email" name="invitation_to" value="<?php echo $talent->email; ?>">
                   		</div>
                   		<div class="col-md-3">
                   			<input style="visibility: hidden;"  type="text" name="id_company" value="<?php echo $data_id_company['id_company']; ?>">
                   		</div>
                   		<div class="col-md-3">
                   			<input style="visibility: hidden;"  type="text" name="id_talent" value="<?php echo $talent->id_talent; ?>">
                   		</div>
                   	</div>
				</div>
				<div class="modal-footer" style="display: block; text-align: center;">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<button style="width: 100%;" type="button" class="button button2" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
						</div>
						<div class="col-md-4">
							<button style="width: 100%;" class="button button1" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<br><br>

<script type="text/javascript">
	// delete cv work
	$('.modal-invite').on('show.bs.modal');
</script>