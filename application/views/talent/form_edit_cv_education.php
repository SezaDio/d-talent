<?php
	$this->load->helper('custom');
?>
<div class="container">
	

	<div class="cv col-md-8 col-md-offset-2">
		<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
			<h3 class="page-title" style="margin-bottom: unset; text-align: center; padding-top: 20px;"><?php echo $page_title; ?></h3>
			<form action="<?php echo site_url('talent/cv-education/update/' .  $cv_education->id_talent_cv_education); ?>" method="post">
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
					<label>School *</label>
					<input type="text" name="school" class="form-control" required value="<?php echo $cv_education->school; ?>">
				</div>

				<div class="form-group">
					<label>Degree</label>
					<select name="degree" class="form-control">
						<option value="">-- Education --</option>
						<option value="SMP" <?php echo ($cv_education->degree=="SMP"? "selected":"");?> >SMP</option>';  
						<option value="SMA" <?php echo ($cv_education->degree=="SMA"? "selected":"");?> >SMA</option>';  
						<option value="Diploma I" <?php echo ($cv_education->degree=="Diploma I"? "selected":"");?> >Diploma I</option>';  
						<option value="Diploma II" <?php echo ($cv_education->degree=="Diploma II"? "selected":"");?> >Diploma II</option>';  
						<option value="Diploma III" <?php echo ($cv_education->degree=="Diploma III"? "selected":"");?> >Diploma III</option>';  
						<option value="Diploma IV/ Sarjana" <?php echo ($cv_education->degree=="Diploma IV/ Sarjana"? "selected":"");?> >Diploma IV/ Sarjana</option>';  
						<option value="Magister" <?php echo ($cv_education->degree=="Magister"? "selected":"");?> >Magister</option>';  
						<option value="Doktor" <?php echo ($cv_education->degree=="Doktor"? "selected":"");?> >Doktor</option>';  
					</select>
				</div>

				<div class="form-group">
					<label>Field of Study</label>
					<input type="text" name="field_of_study" class="form-control" value="<?php echo $cv_education->field_of_study; ?>">
				</div>

				<div class="form-group">
					<label>>Activities and Socials</label>
					<p class="text-muted">Example: Volley, Computer</p>
					<textarea name="activity" class="form-control"><?php echo $cv_education->activity; ?></textarea>
				</div>

				<div class="row form-group">
					<div class="col-md-6">
						<label>From *</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control datepicker" name="from_year" value="<?php echo $cv_education->from_year; ?>" required>
						</div>
					</div>
					<div class="col-md-6">
						<label>To *</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="text" class="form-control datepicker" name="to_year" value="<?php echo $cv_education->to_year; ?>" required>
						</div>
					</div>
					<div class="col-md-12">
						<p class="text-danger" id="date-error"></p>
					</div>
				</div>
				
				<br>
				<div class="form-group">
					<div class="col-md-4 col-md-offset-2">
						<input type="submit" value="Save" class="button button1">
					</div>
					<div class="col-md-4">
						<a href="<?php echo site_url('talent'); ?>" class="button button2">Back to My CV</a>
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

        	$('#date-error').text('');	// clean message
        	if (to_year != '' && to_year < from_year) {
        		e.preventDefault();
        		$('#date-error').text('End year should not less than start year');
        		// scroll
				$('html, body').animate({
			        scrollTop: $("input[name=to_year]").offset().top - 35
			    }, 200);
        	}
        });
    });
</script>