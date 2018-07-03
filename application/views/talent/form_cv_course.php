<div class="container">

	<div class="cv col-md-6 col-md-offset-3" style="min-height: 62vh;">
		<div class="card">
			<form action="<?php echo site_url('talent/cv-course/store'); ?>" method="post">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}
               	?>

				<div class="form-group">
					<label>Nama Pelatihan *</label>
					<input type="text" name="title" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Berkaitan dengan</label>
					<!-- (Pendidikan & Pengalaman Kerja) -->
					<select name="associated_with" id="associated_with" class="form-control">
						<option value="">-</option>
						<!-- cv_educations -->
						<?php
							foreach ($cv_educations as $key => $cv_education) {
						?>
								<option value="<?php echo $cv_education->id_talent_cv_education; ?>" data-cv="education">
									<?php
										echo $cv_education->school;
										if ($cv_education->field_of_study != "") {
											echo ", ";
										}
										echo $cv_education->field_of_study;
									?>
								</option>
						<?php
							}
						?>

						<!-- cv_works -->
						<?php
							foreach ($cv_works as $key => $cv_work) {
						?>
								<option value="<?php echo $cv_work->id_talent_cv_work; ?>" data-cv="work">
									<?php echo $cv_work->position; ?>
					    			di
					    			<?php echo $cv_work->company; ?>
								</option>
						<?php
							}
						?>
					</select>
					<input type="hidden" name="associated_education" id="associated_education">
					<input type="hidden" name="associated_work" id="associated_work">
				</div>

				<br>
				<div class="form-group">
					<div class="col-md-4 col-md-offset-2">
						<a href="<?php echo site_url('talent'); ?>" class="button button2">Kembali</a>
					</div>
					<div class="col-md-4">
						<input type="submit" value="Simpan" class="button button1" style="margin-left: 15px;">
					</div>
				</div>

			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(function () {
        // select associated
        $('#associated_with').change(function() {
        	var id = $(this).val();
        	var cv = $(this).find(':selected').data('cv');
        	if (cv == "education") {
        		$('#associated_education').val(id);
        		$('#associated_work').val("");
        	}
        	else if(cv == "work") {
        		$('#associated_education').val("");
        		$('#associated_work').val(id);
        	}
        	else {
        		$('#associated_education').val("");
        		$('#associated_work').val("");
        	}
        });
    });
</script>