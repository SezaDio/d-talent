<div class="container">

	<div class="cv col-md-6 col-md-offset-3" style="min-height: 62vh;">
		<div class="card">
			<form action="<?php echo site_url('talent/profile/update'); ?>" method="post" enctype="multipart/form-data">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}
               	?>

				<div class="form-group">
					<label>Foto Sampul</label>
					<p class="text-muted">Ukuran maks. 2 MB. Rasio gambar 5:1.</p>
					<?php
						if ($talent->foto_sampul != "") {
					?>
						<div class="thumbnail fit-content" style="margin-bottom: 10px;">
							<!-- <img src="<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>" style="height: 150px; width: 750px;"> -->
							<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>'); height: 95px; width: 490px;"></figure>
						</div>
					<?php
						}
					?>
					<input type="file" name="foto_sampul" accept="image/*">
					<input type="hidden" name="old_foto_sampul" value="<?php echo $talent->foto_sampul;?>">
				</div>

				<div class="form-group">
					<label>Foto Profil</label>
					<p class="text-muted">Ukuran maks. 2 MB. Rasio gambar 1:1.</p>
					<?php
						if ($talent->foto_profil != "") {
					?>
						<div class="thumbnail fit-content" style="margin-bottom: 10px; border-radius: 55px;">
							<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>'); height: 100px; width: 100px; border-radius: 55px;"></figure>
						</div>
					<?php
						}
					?>
					<input type="file" name="foto_profil" accept="image/*">
					<input type="hidden" name="old_foto_profil" value="<?php echo $talent->foto_profil;?>">
				</div>

				<div class="form-group">
					<label>Tentang Saya</label>
					<textarea class="form-control" name="tentang_saya" rows="5"><?php echo $talent->tentang_saya; ?></textarea>
				</div>

				<div class="form-group">
					<label>Kemampuan</label>
					<p class="text-muted">Contoh: Ms. Word, Desain. Pisahkan dengan tanda koma.</p>
					<textarea class="form-control" name="kemampuan" rows="5"><?php echo $talent->kemampuan; ?></textarea>
				</div>

				<br>
				<div class="form-group">
					<div class="col-md-4 col-md-offset-2">
						<a href="<?php echo site_url('talent'); ?>" class="button button2">Kembali</a>
					</div>
					<div class="col-md-4">
						<input type="submit" value="Simpan" class="button button1">
					</div>
				</div>

			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(function () {
        
    });
</script>