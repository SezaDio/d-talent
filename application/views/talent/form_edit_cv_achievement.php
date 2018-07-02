<?php
	$this->load->helper('custom');
?>
<div class="container">

	<div class="cv col-md-6 col-md-offset-3">
		<div class="card">
			<form action="<?php echo site_url('talent/cv-achievement/update/' .  $cv_achievement->id_talent_cv_achievement); ?>" method="post">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}
               	?>

				<div class="form-group">
					<label>Judul Prestasi *</label>
					<input type="text" name="title" class="form-control" required value="<?php echo $cv_achievement->title; ?>">
				</div>

				<div class="form-group">
					<label>Berkaitan dengan</label>
					<!-- (Pendidikan & Pengalaman Kerja) -->
					<select name="associated_with" id="associated_with" class="form-control">
						<option value="">-</option>
						<!-- cv_educations -->
						<?php
							$associated_education = $cv_achievement->associated_education;
							foreach ($cv_educations as $key => $cv_education) {
								$id_talent_cv_education = $cv_education->id_talent_cv_education;
						?>
								<option value="<?php echo $id_talent_cv_education; ?>" data-cv="education" <?php echo $id_talent_cv_education==$associated_education ? "selected" : "";?> >
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
							$associated_work = $cv_achievement->associated_work;
							foreach ($cv_works as $key => $cv_work) {
								$id_talent_cv_work = $cv_work->id_talent_cv_work;
						?>
								<option value="<?php echo $id_talent_cv_work; ?>" data-cv="work" <?php echo $id_talent_cv_work==$associated_work ? "selected" : "";?> >
									<?php echo $cv_work->position; ?>
					    			di
					    			<?php echo $cv_work->company; ?>
								</option>
						<?php
							}
						?>
					</select>
					<input type="hidden" name="associated_education" id="associated_education" value="<?php echo $cv_achievement->associated_education; ?>">
					<input type="hidden" name="associated_work" id="associated_work" value="<?php echo $cv_achievement->associated_work; ?>">
				</div>

				<div class="form-group">
					<label>Pemberi penghargaan</label>
					<input type="text" name="issuer" class="form-control" value="<?php echo $cv_achievement->issuer; ?>">
				</div>

				<div class="row form-group">
					<div class="col-md-6">
						<label>Bulan</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control monthpicker" name="month" value="<?php echo displayMonth($cv_achievement->month); ?>">
						</div>
					</div>
					<div class="col-md-6">
						<label>Tahun</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control yearpicker" name="year" value="<?php echo displayYear($cv_achievement->year); ?>">
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="description" rows="5" class="form-control"><?php echo $cv_achievement->description; ?></textarea>
				</div>

				<br>

				<div class="form-group text-center">
					<a href="<?php echo site_url('talent'); ?>" class="btn btn-talent">Kembali</a>
					<input type="submit" value="Simpan" class="btn btn-talent" style="margin-left: 15px;">
				</div>

			</form>

		</div>
	</div>

</div>

<script type="text/javascript">
	$(function () {
        $('.monthpicker').datepicker({
        	format: 'mm',
        	minViewMode: 'months',
        	maxViewMode: 'months',
        });
        $('.yearpicker').datepicker({
        	format: 'yyyy',
        	minViewMode: 'years',
        	maxViewMode: 'decades',
        });

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