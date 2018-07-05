<?php
	$this->load->helper('custom');
?>
<div class="container">
	<h3 class="page-title"><?php echo $page_title; ?></h3>

	<div class="cv col-md-8 col-md-offset-2">
		<div class="card">
			<form action="<?php echo site_url('talent/cv-education/update/' .  $cv_education->id_talent_cv_education); ?>" method="post">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}
               	?>

				<div class="form-group">
					<label>Sekolah *</label>
					<input type="text" name="school" class="form-control" required value="<?php echo $cv_education->school; ?>">
				</div>

				<div class="form-group">
					<label>Gelar/ derajat</label>
					<p class="text-muted">Contoh: SD, SMP</p>
					<input type="text" name="degree" class="form-control" value="<?php echo $cv_education->degree; ?>">
				</div>

				<div class="form-group">
					<label>Bidang studi</label>
					<input type="text" name="field_of_study" class="form-control" value="<?php echo $cv_education->field_of_study; ?>">
				</div>

				<div class="form-group">
					<label>Kelas/ tingkat</label>
					<input type="text" name="grade" class="form-control" value="<?php echo $cv_education->grade; ?>">
				</div>

				<div class="form-group">
					<label>Aktivitas dan sosial</label>
					<textarea name="activity" class="form-control"><?php echo $cv_education->activity; ?></textarea>
				</div>

				<div class="row form-group">
					<div class="col-md-6">
							<label>Dari</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="from_year" value="<?php echo displayYear($cv_education->from_year); ?>">
							</div>
					</div>
					<div class="col-md-6">
							<label>Hingga</label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="to_year" value="<?php echo displayYear($cv_education->to_year); ?>">
							</div>
					</div>
					<div class="col-md-12">
						<p class="text-danger" id="date-error"></p>
					</div>
				</div>
				
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="description" rows="5" class="form-control"><?php echo $cv_education->description; ?></textarea>
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
        $('.datepicker').datepicker({
        	format: 'yyyy',
        	minViewMode: 'years',
        	maxViewMode: 'decades',
        });
        // validate cv start & end date
        $('form').on('submit', function(e) {
        	var from_year = $('input[name="from_year"]').val();
        	var to_year   = $('input[name="to_year"]').val();
        	
        	// console.log(from_year);
        	// console.log(to_year);

        	$('#date-error').text('');	// delete message
        	if (to_year != '' && to_year < from_year) {
        		e.preventDefault();
        		$('#date-error').text('Tahun akhir tidak boleh lebih kecil dari tahun awal');
        		// scroll
				$('html, body').animate({
			        scrollTop: $("input[name=to_year]").offset().top - 35
			    }, 200);
        	}
        });
    });
</script>