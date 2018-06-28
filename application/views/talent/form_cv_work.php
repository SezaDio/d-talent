<div class="container">

	<div class="cv col-md-6 col-md-offset-3">
		<div class="card">
			<form action="<?php echo site_url('talent/cv-work-experience/store'); ?>" method="post" enctype="multipart/form-data">
				<?php 
					$this->load->library('form_validation');
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
						echo validation_errors();
						echo '</div';
                	}

                	if($this->session->has_userdata('msg_success'))
					{?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="glyphicon glyphicon-ok"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->msg_success;?> 
                        </div>
              	<?php }
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
					<input type="text" name="location" class="form-control" value="<?php echo set_value('location'); ?>">
				</div>

				<div class="form-group">
					<label>Dari</label>
					<p class="text-muted"><i>Format: tahun-bulan</i></p>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" class="form-control datepicker" name="work_start" value="<?php echo set_value('work_start'); ?>">
					</div>
				</div>

				<div class="form-group">
					<label>Hingga</label>
					<p class="text-muted"><i>Format: tahun-bulan</i></p>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" class="form-control datepicker" name="work_end" value="<?php echo set_value('work_end'); ?>">
					</div>
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="description" rows="5" class="form-control"><?php echo set_value('description'); ?></textarea>
				</div>

				<div class="form-group">
					<label>Gambar</label>
					<input type="file" name="image">
				</div>


				<div class="form-group">
					<input type="submit" value="Simpan">
				</div>

			</form>
		</div>
	</div>

</div>