<?php
	$this->load->helper('custom');
?>

<div class="container">

	<div class="bg-talent">
		<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>');"></figure>
		<div class="profile-edit">
			<a href="<?php echo site_url('talent/profile/edit/');?>">
				<i class="fa fa-pencil"></i>
			</a>
		</div>
	</div>

	<div class="profile">
		<div class="img-talent">
			<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>');"></figure>
		</div>

		<div class="card">
			<div class="text-center profile-attribute">
				<!-- Ahmad | 23 tahun | Semarang -->
				<span><?php echo $talent->nama; ?></span> |
				<span><?php echo countAge($talent->tanggal_lahir); ?> Tahun</span> |
				<span><?php echo capitalizeEachWord($talent_location_city); ?></span>
			</div>
			<br>
			<div style="text-align: justify;">
				<?php echo $talent->tentang_saya; ?>
			</div>
			<div class="text-center job-interest label-colors">
				<?php echo displaySkills($talent->kemampuan)?>
			</div>
		</div>

		<!-- kontak -->
		<div class="contact-talent">
			<div class="text-center">
				<i class="fa fa-envelope"> <?php echo $talent->email; ?></i>
				<i class="fa fa-phone"> <?php echo $talent->nomor_ponsel; ?></i>
				<i class="fa fa-home"> <?php echo capitalizeEachWord($talent_location_city); ?></i>
			</div>
		</div>
		<br>
		<!-- konten -->
		<div class="content">
			<div class="cv-selection">
				<div class="center-block fit-content">
					<div class="dropdown">
					  <button id="cv" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
			<br>
			<br>

			<div class="cv">
				<?php
					if($cv_works != null) {
				?>
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Pengalaman Kerja</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table">
				    	<?php foreach ($cv_works as $cv_work):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayCVWorkDate($cv_work->work_start, $cv_work->work_end); ?>
					    		</td>
					    		<td>
					    			<?php echo $cv_work->position; ?>
					    			di
					    			<?php echo $cv_work->company; ?>
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
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Pengalaman Kerja</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table">
				    	<?php foreach ($cv_educations as $cv_education):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayCVEducationDate($cv_education->from_year, $cv_education->to_year); ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_education->school;
					    				if ($cv_education->field_of_study != "") {
					    					echo "<br>";
					    				}
					    				echo $cv_education->field_of_study;
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
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Pengalaman Kerja</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table">
				    	<?php foreach ($cv_achievements as $cv_achievement):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayMonthName($cv_achievement->month) ." ". displayYear($cv_achievement->year); ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_achievement->title;
					    				if ($cv_achievement->issuer != "") {
					    					echo " <b>.</b> ";
					    				}
					    				echo $cv_achievement->issuer;
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
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Pelatihan</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table">
				    	<?php foreach ($cv_courses as $cv_course):?>
					    	<tr>
					    		<td class="">
					    			<?php echo $cv_course->title; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo "";
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
				<button type="button" class="btn btn-talent" data-dismiss="modal">Cancel</button>
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

<div class="container">
	<br>
	<br>
	<a href="http://preview.uideck.com/items/mate/" target="_blank">http://preview.uideck.com/items/mate/</a>
</div>