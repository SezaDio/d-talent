<div class="container">

	<div class="cv col-md-8 col-md-offset-2">
		<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
			<h3 class="page-title" style="margin-bottom: unset; text-align: center; padding-top: 20px;"><?php echo $page_title; ?></h3>
			<form action="<?php echo site_url('talent/profile/update'); ?>" method="post" enctype="multipart/form-data">
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
					<label>Background Image</label>
					<p class="text-muted">Max size 2 MB. Image ratio 5:1.</p>
					<div class="row">
						<div class="col-md-12">
							<div id="foto_sampul_preview" class="thumbnail fit-content" style="margin-bottom: 10px;">
								<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>');"></figure>
							</div>
						</div>
					</div>

					<input type="file" name="foto_sampul" accept="image/*" id="foto_sampul">
					<p style="margin-bottom: 0px;"><strong>Atau</strong> pilih salah satu warna background berikut</p>
					<ul class="choose-color">
						<li class="black"></li>
						<li class="white"></li>
					</ul>
					<input type="hidden" name="def_foto_sampul" value="" id="def_foto_sampul">
					<input type="hidden" name="old_foto_sampul" value="<?php echo $talent->foto_sampul;?>">
				</div>
				<hr style="margin-bottom: 15px; margin-top: 15px; border: solid 1px lightgrey;">
				<div class="form-group">
					<label>Profile Image</label>
					<p class="text-muted">Max size 2 MB. Image ratio 1:1.</p>
						
					<div id="foto_profil_preview" class="thumbnail fit-content" style="margin-bottom: 10px; border-radius: 55px;">
						<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>');"></figure>
					</div>

					<input type="file" name="foto_profil" accept="image/*" id="foto_profil">
					<input type="hidden" name="old_foto_profil" value="<?php echo $talent->foto_profil;?>">
				</div>
				<hr style="margin-bottom: 15px; margin-top: 15px; border: solid 1px lightgrey;">
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="tentang_saya" rows="5"><?php echo $talent->tentang_saya; ?></textarea>
				</div>
				<hr style="margin-bottom: 15px; margin-top: 15px; border: solid 1px lightgrey;">
				<div class="form-group">
					<label>Skills</label>
					<p class="text-muted">Example: Ms. Word, Design. Separate with comma.</p>
					<textarea class="form-control" name="kemampuan" rows="5"><?php echo $talent->kemampuan; ?></textarea>
				</div>
				<hr style="margin-bottom: 15px; margin-top: 15px; border: solid 1px lightgrey;">
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
				$('#def_foto_sampul').val('');
				var reader = new FileReader();

				reader.onload = function(e) {
					console.log(e.target.result);
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

		$(".black").click(function(){			
			$('#foto_sampul_preview figure').css('background-image', 'url(../../../asset/img/upload_img_talent_bg_profile/black.jpg)');
			$('#def_foto_sampul').val('black.jpg');
			var el = $('#foto_sampul');
			el.wrap('<form>').closest('form').get(0).reset();
   			el.unwrap();
		});
		$(".white").click(function(){			
			$('#foto_sampul_preview figure').css('background-image', 'url(../../../asset/img/upload_img_talent_bg_profile/white.jpg)');
			$('#def_foto_sampul').val('white.jpg');
			var el = $('#foto_sampul');
			el.wrap('<form>').closest('form').get(0).reset();
   			el.unwrap();
		});
    });
</script>