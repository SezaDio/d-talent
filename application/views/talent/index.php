<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="bg-talent" style="box-shadow: 1px 5px 20px lightgrey;">
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
				<div class="profile-edit">
					<a href="<?php echo site_url('talent/profile/edit/');?>">
						<i class="fa fa-pen"></i>
					</a>
				</div>
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

				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
					<div class="card-body">
						<div style="padding: 10px;">
							<div class="text-center profile-attribute">
								<!-- Name | Age | City -->
								<span><?php echo $talent->nama; ?></span> |
								<span><?php echo countAge($talent->tanggal_lahir); ?> Tahun</span> |
								<span><?php echo displayGender($talent->jenis_kelamin); ?></span> |
								<span><?php echo displayMaritalStatus($talent->status_pernikahan); ?></span>
								<!-- <span><?php echo capitalizeEachWord($talent_location_city); ?></span> -->
							</div>
							<br>
							<div class="text-center">
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
									<span><i class="fa fa-envelope"></i> <?php echo $talent->email; ?></span>
									<span><i class="fa fa-phone"></i> <?php echo $talent->nomor_ponsel; ?></span>
									<span><i class="fa fa-home"></i> <?php echo capitalizeEachWord($talent_location_city); ?></span>
								</div>
								<hr style="border: solid 1px lightgray">
							</div>
							<br>

							<div class="center-block fit-content">
								<div class="dropdown">
								  <button class="button button2" style="border: solid 2px black;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    CV Section
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" aria-labelledby="cv">
								    <li><a href="<?php echo site_url('talent/cv-work-experience/create');?>"><i class="fa fa-suitcase"></i> Work Experience</a></li>
								    <li><a href="<?php echo site_url('talent/cv-education/create');?>"><i class="fa fa-graduation-cap"></i> Education</a></li>
								    <li><a href="<?php echo site_url('talent/cv-achievement/create');?>"><i class="fa fa-trophy"></i> Achievement</a></li>
								    <li><a href="<?php echo site_url('talent/cv-course/create');?>"><i class="fa fa-certificate"></i> Course</a></li>
								  </ul>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<br>
		<br>
		<!-- konten -->
		<div class="content">
			<div class="cv">
				<?php
					if($cv_works != null) {
				?>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-suitcase"></i> Work Experience</h3>
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
					    		<td class="action">
					    			<a href="<?php echo site_url('talent/cv-work-experience/edit/') . $cv_work->id_talent_cv_work;?>" class="text-primary"><i class="fa fa-edit"></i></a>
					    			<a href="#!" class="text-danger" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $cv_work->id_talent_cv_work;?>" data-cv="work"><i class="fa fa-trash"></i></a>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($cv_educations != null) {
				?>
				<br>
				<br>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-graduation-cap"></i> Education</h3>
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
					    		<td class="action">
					    			<a href="<?php echo site_url('talent/cv-education/edit/') . $cv_education->id_talent_cv_education;?>" class="text-primary"><i class="fa fa-edit"></i></a>
					    			<a href="#!" class="text-danger" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $cv_education->id_talent_cv_education;?>" data-cv="education"><i class="fa fa-trash"></i></a>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($cv_achievements != null) {
				?>
				<br>
				<br>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-trophy"></i> Achievement</h3>
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
					    		<td class="action">
					    			<a href="<?php echo site_url('talent/cv-achievement/edit/') . $cv_achievement->id_talent_cv_achievement;?>" class="text-primary"><i class="fa fa-edit"></i></a>
					    			<a href="#!" class="text-danger" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $cv_achievement->id_talent_cv_achievement;?>" data-cv="achievement"><i class="fa fa-trash"></i></a>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($cv_courses != null) {
				?>
				<br>
				<br>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-certificate"></i> Course</h3>
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
					    		<td class="action">
					    			<a href="<?php echo site_url('talent/cv-course/edit/') . $cv_course->id_talent_cv_course;?>" class="text-primary"><i class="fa fa-edit"></i></a>
					    			<a href="#!" class="text-danger" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $cv_course->id_talent_cv_course;?>" data-cv="course"><i class="fa fa-trash"></i></a>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($result_character != null || $result_passion != null || $result_work_attitude != null || $result_soft_skill != null) {
				?>
				<br>
				<br>
				<div class="card online-test" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-file"></i> Online Test</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				<?php
					if($result_character != null) {
				?>
				    	<tr>
				    		<td class="periode">
				    			Character Test
				    			<br>
				    			<?php
				    				echo displayDate($result_character->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo "- <b>" . $result_character_sub_title . "</b> -<br>";
				    				echo $result_character_detail;
				    			?>
				    		</td>
				    	</tr>
				<?php
					} 	//./character
				?>

				<?php
					if($result_passion != null) {
				?>
						<tr>
				    		<td class="periode">
				    			Passion and Interest Test
				    			<br>
				    			<?php
				    				echo displayDate($result_passion->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo $result_passion_detail;
				    			?>
				    		</td>
				    	</tr>
				<?php
					} 	//./passion
				?>

				<?php
					if($result_work_attitude != null) {
				?>
						<tr>
				    		<td class="periode">
				    			Work Attitude Test
				    			<br>
				    			<?php
				    				echo displayDate($result_work_attitude->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo "- <b>" . $result_work_attitude_title . "</b> -<br><br>";
				    				echo $result_work_attitude_detail;
				    			?>
				    		</td>
				    	</tr>
				<?php
					} 	//./work attitude
				?>

				<?php
					if($result_soft_skill != null) {
				?>
					<?php
						foreach ($result_soft_skill as $item) 
						{ ?>
							<tr>
					    		<td class="periode">
					    			Soft Skill Test
					    			<br>
					    			<?php
					    				echo displayDate($item['test_date']);
					    			?>
					    		</td>
					    		<td>
					    			<?php
					    				foreach($result_soft_skill as $item)
					    				{ ?>
					    					<table style="border: none;">
						    					<tr>
						    						<td>Decision Making</td>
						    						<td>:</td>
						    						<td><?php echo $item['pengambilan_keputusan']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Responsibility</td>
						    						<td>:</td>
						    						<td><?php echo $item['pengambilan_keputusan']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Integrity</td>
						    						<td>:</td>
						    						<td><?php echo $item['integritas']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Resilience</td>
						    						<td>:</td>
						    						<td><?php echo $item['resiliensi']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Learning</td>
						    						<td>:</td>
						    						<td><?php echo $item['keinginan_belajar']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Communication</td>
						    						<td>:</td>
						    						<td><?php echo $item['komunikasi']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Good Attitude</td>
						    						<td>:</td>
						    						<td><?php echo $item['sikap_positif']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Antusiasm</td>
						    						<td>:</td>
						    						<td><?php echo $item['antusiasme']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Team Work</td>
						    						<td>:</td>
						    						<td><?php echo $item['kerja_tim']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Problem Solving</td>
						    						<td>:</td>
						    						<td><?php echo $item['penyelesaian_masalah']; ?></td>
						    					</tr>
						    				</table>
					    		  <?php } ?>
					    			<a href="<?php echo site_url('Talent/show_result_soft_skill/'.$item['id_talent']);?>">
					    				<button style="width: 200px;" type="button" class="button button1"><i class="fa fa-eye"></i> View Detail</button>
					    			</a>
					    		</td>
					    	</tr>	
				  <?php } 
					} 	//./work attitude
				?>

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
<div class="modal fade modal-delete" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-outline-danger">Delete</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	// delete cv work
	$('.modal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var delete_target = button.data('id');
        var cv_type = button.data('cv');
        var route;
        switch(cv_type) {
		    case "work":
		        route = "<?php echo site_url('talent/cv-work-experience/delete/');?>";
		        break;
		    case "education":
		        route = "<?php echo site_url('talent/cv-education/delete/');?>";
		        break;
		    case "achievement":
		        route = "<?php echo site_url('talent/cv-achievement/delete/');?>";
		        break;
		    case "course":
		        route = "<?php echo site_url('talent/cv-course/delete/');?>";
		        break;
		}
		route = route + delete_target;
        $(this).find('a').attr('href', route);
    });
</script>