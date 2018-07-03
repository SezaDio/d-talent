<div class="container">

	<div class="bg-talent">
		<figure class="image-bg"></figure>
	</div>

	<div class="profile">
		<div class="img-talent">
			<figure class="image-bg"></figure>
		</div>

		<div class="card">
			<div class="text-center">
				Ahmad | 23 tahun | Semarang
				<div class="col-md-2 col-md-offset-2"><?php echo $talent->nama; ?></div>
				<div class="col-md-2"><?php echo $talent->tanggal_lahir; ?></div>
				<div class="col-md-2"><?php echo $talent->id_kota; ?></div>
			</div>
			<br>
			<div>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="text-center job-interest">
				<span class="label label-success">Web Developer</span>
				<span class="label label-success">Design UI/UX</span>
			</div>
		</div>

		<!-- kontak -->
		<div class="card contact-talent">
			<div class="text-center">
				<i class="fa fa-envelope"> ahmad@gmail.com</i>
				<i class="fa fa-phone"> 081533222000</i>
				<i class="fa fa-home"> Semarang</i>
			</div>
		</div>

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

			<?php
				$this->load->helper('custom');
			?>

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