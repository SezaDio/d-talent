<div class="container">
	

	<div class="cv col-md-8 col-md-offset-2">
		<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
			<h3 class="page-title" style="margin-bottom: unset; text-align: center; padding-top: 20px;"><?php echo $page_title; ?></h3>
			<form action="<?php echo site_url('talent/cv-education/store'); ?>" method="post">
				<hr style="margin-bottom: 15px; border: solid 1px black;">
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
					<input type="text" name="school" class="form-control" required value="<?php echo set_value('school'); ?>">
				</div>

				<div class="form-group">
					<label>Gelar/ derajat</label>
					<select name="degree" class="form-control" >
						<option value="">-- Education --</option>
						<option value="SMP" <?php echo (set_value('degree')=="SMP"? "selected":"");?> >SMP</option>';  
						<option value="SMA" <?php echo (set_value('degree')=="SMA"? "selected":"");?> >SMA</option>';  
						<option value="Diploma I" <?php echo (set_value('degree')=="Diploma I"? "selected":"");?> >Diploma I</option>';  
						<option value="Diploma II" <?php echo (set_value('degree')=="Diploma II"? "selected":"");?> >Diploma II</option>';  
						<option value="Diploma III" <?php echo (set_value('degree')=="Diploma III"? "selected":"");?> >Diploma III</option>';  
						<option value="Diploma IV/ Sarjana" <?php echo (set_value('degree')=="Diploma IV/ Sarjana"? "selected":"");?> >Diploma IV/ Sarjana</option>';  
						<option value="Magister" <?php echo (set_value('degree')=="Magister"? "selected":"");?> >Magister</option>';  
						<option value="Doktor" <?php echo (set_value('degree')=="Doktor"? "selected":"");?> >Doktor</option>';  
					</select>
				</div>

				<div class="form-group">
					<label>Bidang studi</label>
					<input type="text" name="field_of_study" class="form-control" value="<?php echo set_value('field_of_study'); ?>">
				</div>

				<div class="form-group">
					<label>Aktivitas dan sosial</label>
					<p class="text-muted">Contoh: Pengurus OSIS, Anggota ekskul voli</p>
					<textarea name="activity" class="form-control"><?php echo set_value('activity'); ?></textarea>
				</div>

				<div class="row form-group">
					<div class="col-md-6">
						<label>Dari</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control datepicker" name="from_year" value="<?php echo set_value('from_year'); ?>">
						</div>
					</div>
					<div class="col-md-6">
						<label>Hingga</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control datepicker" name="to_year" value="<?php echo set_value('to_year'); ?>">
						</div>
					</div>
					<div class="col-md-12">
						<p class="text-danger" id="date-error"></p>
					</div>
				</div>
				
				<br>
				<div class="form-group">
					<div class="col-md-4 col-md-offset-2">
						<input type="submit" value="Simpan" class="button button1">
					</div>
					<div class="col-md-4">
						<a href="<?php echo site_url('talent'); ?>" class="button button2">Kembali</a>
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