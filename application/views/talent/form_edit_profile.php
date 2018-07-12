<div class="container">
	<h3 class="page-title"><?php echo $page_title; ?></h3>

	<div class="cv col-md-8 col-md-offset-2">
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

					<div id="foto_sampul_preview" class="thumbnail fit-content" style="margin-bottom: 10px;">
						<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>');"></figure>
					</div>

					<input type="file" name="foto_sampul" accept="image/*" id="foto_sampul">
					<input type="hidden" name="old_foto_sampul" value="<?php echo $talent->foto_sampul;?>">
				</div>

				<div class="form-group">
					<label>Foto Profil</label>
					<p class="text-muted">Ukuran maks. 2 MB. Rasio gambar 1:1.</p>
						
					<div id="foto_profil_preview" class="thumbnail fit-content" style="margin-bottom: 10px; border-radius: 55px;">
						<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>');"></figure>
					</div>

					<input type="file" name="foto_profil" accept="image/*" id="foto_profil">
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
	<?php
		// display foto_sampul if not null
		if ($talent->foto_sampul != "") {
			echo "$('#foto_sampul_preview').show();";
		}
		// display foto_profil if not null
		if ($talent->foto_profil != "") {
			echo "$('#foto_profil_preview').show();";
		}
	?>

	$(function () {
		// preview image before upload
		function readURL(input, id_preview) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$(id_preview + ' figure').css('background-image', 'url('+e.target.result +')');
					$(id_preview).show();
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#foto_sampul").change(function() {
			readURL(this, "#foto_sampul_preview");
		});

		$("#foto_profil").change(function() {
			readURL(this, "#foto_profil_preview");
		});
    });
</script>