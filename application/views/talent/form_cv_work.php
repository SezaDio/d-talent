<?php
	// $this->load->library('form_validation');	==> loaded on talent header
?>
<div class="container">
	<h3 class="page-title"><?php echo $page_title; ?></h3>

	<div class="cv col-md-8 col-md-offset-2">
		<div class="card">
			<form action="<?php echo site_url('talent/cv-work-experience/store'); ?>" method="post">
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
					<input type="text" name="position" class="form-control" value="<?php echo set_value('position'); ?>" required>
				</div>

				<div class="form-group">
					<label>Perusahaan *</label>
					<input type="text" name="company" class="form-control" value="<?php echo set_value('company'); ?>" required>
				</div>

				<div class="form-group">
					<label>Lokasi</label>
					<div class="clearfix">
						<select name="id_location" class="form-control selectpicker" data-live-search="true" data-size="7">
							<option value="">-</option>
							<?php
								foreach ($locations as $location) {
							?>
								<option value="<?php echo $location->lokasi_ID; ?>"><?php echo $location->lokasi_nama; ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-6">
							<label>Dari</label>
							<p class="text-muted"><i>Format: tahun-bulan</i></p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="work_start" value="<?php echo set_value('work_start'); ?>">
							</div>
					</div>
					<div class="col-md-6">
							<label>Hingga</label>
							<p class="text-muted"><i>Format: tahun-bulan</i></p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="text" class="form-control datepicker" name="work_end" value="<?php echo set_value('work_end'); ?>">
							</div>
					</div>
					<div class="col-md-12">
						<p class="text-danger" id="date-error"></p>
					</div>
				</div>
				
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="description" rows="5" class="form-control"><?php echo set_value('description'); ?></textarea>
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

        // close bs select dropdown on change
        $('.selectpicker').on('changed.bs.select', function() {
        	$('.bootstrap-select.show').removeClass('show');
        	$('.bootstrap-select.open').removeClass('open');
        	$('.dropdown-menu.show').removeClass('show');
        	$('.dropdown-toggle').attr('aria-expanded', 'false');
        });
    });
</script>