<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>

<div class="container">

	<div class="bg-talent">
		<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>');"></figure>
		<div class="profile-edit">
			<a href="<?php echo site_url('talent/profile/edit/');?>">
				<i class="fa fa-pen"></i>
			</a>
		</div>
	</div>

	<div class="profile">
		<div class="img-talent">
			<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>');"></figure>
		</div>

		<div class="card">
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
						<div class="text-center">
							<span><i class="fa fa-envelope"></i> <?php echo $talent->email; ?></span>
							<span><i class="fa fa-phone"></i> <?php echo $talent->nomor_ponsel; ?></span>
							<span><i class="fa fa-home"></i> <?php echo capitalizeEachWord($talent_location_city); ?></span>
						</div>
					</div>
					<br>

					<div class="center-block fit-content">
						<div class="dropdown">
						  <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    CV Section
						    <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" aria-labelledby="cv">
						    <li><a href="<?php echo site_url('talent/cv-work-experience/create');?>">Pengalaman Kerja</a></li>
						    <li><a href="<?php echo site_url('talent/cv-education/create');?>">Pendidikan</a></li>
						    <li><a href="<?php echo site_url('talent/cv-achievement/create');?>">Prestasi</a></li>
						    <li><a href="<?php echo site_url('talent/cv-course/create');?>">Pelatihan</a></li>
						  </ul>
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
				<div class="card">
				  <div class="card-header">
				    <h3>Pengalaman Kerja</h3>
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
				<div class="card">
				  <div class="card-header">
				    <h3>Pendidikan</h3>
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
				<div class="card">
				  <div class="card-header">
				    <h3>Prestasi</h3>
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
				<div class="card">
				  <div class="card-header">
				    <h3>Pelatihan</h3>
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
					if($result_character != null) {
				?>
				<br>
				<br>
				<div class="card online-test">
				  <div class="card-header">
				    <h3>Tes Online</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<tr>
				    		<td class="periode">
				    			Tes Karakter
				    			<br>
				    			<?php
				    				echo displayDate($result_character->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo "- " . $result_character_sub_title . " -<br>";
				    				echo $result_character_detail;
				    			?>
				    		</td>
				    	</tr>
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
				<h4 class="modal-title">Hapus</h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin?</p>
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
<!-- 
<div class="container">
	<br>
	<br>
	<a href="http://preview.uideck.com/items/mate/" target="_blank">http://preview.uideck.com/items/mate/</a>
</div> -->