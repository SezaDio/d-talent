<?php
	$this->load->library('form_validation');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
			<div class="row">
				<div class="col-md-12">
					<form role="form" enctype="multipart/form-data" action="<?php echo site_url('company/updates/update/' . $company_update->id_company_update);?>" method="POST" enctype="multipart/form-data">
						<!--Text Area Updates-->
						<div class="row">
							<div class="col-md-12">			
								<div class="form-group">
									<label><strong>Judul *</strong></label>
									<input type="text" name="title" class="form-control" value="<?php echo $company_update->title; ?>" required>
								</div>

								<div class="form-group">
									<label><strong>Konten *</strong></label>
									<div class='box-body pad'>
										<textarea style="padding: 20px; width: 100%;" placeholder="Artikel, Ide, atau Aktivitas . . ." required name="content" rows="5"><?php 
				                            echo $company_update->content;
				                        ?></textarea>
				                        <br>                                 
									</div>
				                </div>

								<div class="form-group image-updates">
									<label><strong>Gambar *</strong></label>
									<div id="image_preview" class="thumbnail" style="margin-bottom: 10px;">
										<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_company_updates/') . $company_update->image;?>')";></figure>
									</div>
									<label id="bb" style="border-radius: 5px; padding: 10px; background-color: black; color: white;">
										<i class="fa fa-image"></i> Browse Picture
										<input style="display: none;" type="file" name="image" accept="image/*" id="image-browse">
									</label>
									<div class="text-muted">*Ukuran maks. 2 MB. Rasio gambar 3:2.</div>
									<input type="hidden" name="old_image" value="<?php echo $company_update->image; ?>">
								</div>

								<div class="form-group" style="visibility: hidden;">
									<label>Publikasi</label>
									<input type="checkbox" name="status" value="1" <?php echo $company_update->status==1 ? "checked" : ""; ?> >
								</div>

							</div>
						</div>

						<!--Button Post-->
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-3" style="float: right;">
									<a href="<?php echo site_url('company/updates'); ?>" class="button button2">Kembali</a>
								</div>
								<div class="col-md-3" style="float: right;">
									<button type="submit" class="button button1"><i class="fa fa-send"></i>Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>

		<div class="col-lg-1"></div>	
	</div>
	<br><br>
</div>

<script type="text/javascript">
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

		$("#image-browse").change(function() {
			readURL(this, "#image_preview");
		});

    });
</script>