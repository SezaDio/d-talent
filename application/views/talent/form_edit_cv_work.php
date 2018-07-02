<?php
	$this->load->helper('custom');
	// $this->load->library('form_validation');	==> loaded on talent header
?>
<div class="container">

	<div class="cv col-md-6 col-md-offset-3">
		<div class="card">
			<form action="<?php echo site_url('talent/cv-work-experience/update/' .  $cv_work->id_talent_cv_work); ?>" method="post" enctype="multipart/form-data">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}

                	// if($this->session->has_userdata('msg_success')) {
					?>
                        <!-- <div class="alert alert-success alert-dismissable">
                            <i class="glyphicon glyphicon-ok"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                            <?php 
                            	// echo $this->session->msg_success;
                            ?> 
                        <!-- </div> -->
              	<?php
              		// }
				?>

				<div class="form-group">
					<label>Jabatan *</label>
					<input type="text" name="position" class="form-control" value="<?php echo $cv_work->position; ?>" required>
				</div>

				<div class="form-group">
					<label>Perusahaan *</label>
					<input type="text" name="company" class="form-control" value="<?php echo $cv_work->company; ?>" required>
				</div>

				<div class="form-group">
					<label>Lokasi</label>
					<input type="text" name="location" class="form-control" value="<?php echo $cv_work->location; ?>">
				</div>

				<div class="row form-group">
					<div class="col-md-6">
							<label>Dari</label>
							<p class="text-muted"><i>Format: tahun-bulan</i></p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="work_start" value="<?php echo displayMonthYear($cv_work->work_start); ?>">
							</div>
					</div>
					<div class="col-md-6">
							<label>Hingga</label>
							<p class="text-muted"><i>Format: tahun-bulan</i></p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="work_end" value="<?php echo displayMonthYear($cv_work->work_end); ?>">
							</div>
					</div>
					<div class="col-md-12">
						<p class="text-danger" id="date-error"></p>
					</div>
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="description" rows="5" class="form-control"><?php echo $cv_work->description; ?></textarea>
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
        $('.datepicker').datepicker({
        	format: 'yyyy-mm',
        	minViewMode: 'months',
        	maxViewMode: 'decades',
        });
        // validate cv work start & end date
        $('form').on('submit', function(e) {
        	var work_start  = $('input[name="work_start"]').val();
        	var work_end 	= $('input[name="work_end"]').val();
        	
        	// console.log(work_start);
        	// console.log(work_end);

        	$('#date-error').text('');	// delete message
        	if (work_end != '' && work_end < work_start) {
        		e.preventDefault();
        		$('#date-error').text('Tanggal akhir tidak boleh lebih kecil dari tanggal awal');
        		// scroll
				$('html, body').animate({
			        scrollTop: $("input[name=work_end]").offset().top - 35
			    }, 200);
        	}
        });
    });
</script>