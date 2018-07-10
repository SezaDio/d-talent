<?php
	$this->load->library('form_validation');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="background: whitesmoke; padding: 20px; width: 100%;">
			<div class="row">
				<div class="col-md-12">
					<form role="form" enctype="multipart/form-data" action="<?php echo site_url('company/updates/store');?>" method="POST" enctype="multipart/form-data">
						<!--Text Area Updates-->
						<div class="row">
							<div class="col-md-12">			
								<div class="form-group">
									<label>Judul *</label>
									<input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" required>
								</div>

								<div class="form-group image-updates">
									<label>Gambar</label>
									<div class="text-muted">Ukuran maks. 2 MB. Rasio gambar 3:2.</div>
									<div id="image_preview" class="thumbnail" style="margin-bottom: 10px;">
										<figure class="image-bg"></figure>
									</div>

									<input type="file" name="image" accept="image/*" id="image-browse">
								</div>

								<div class="form-group">
									<label>Konten</label>
									<div class='box-body pad'>
										<textarea style="padding: 20px; width: 100%;" placeholder="Artikel, Ide, atau Aktivitas . . ." required name="content" rows="5"><?php 
				                                echo set_value('content');
				                        ?></textarea>
				                        <br>                                 
									</div>
				                </div>

								<div class="form-group">
									<label>Publikasi</label>
									<br>
									<input type="checkbox" name="status" value="1" <?php echo set_value('status')==1 ? "checked" : ""; echo empty(set_value('status')) ? "checked" : "" ?> >
								</div>

							</div>
						</div>

						<!--Button Post-->
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-2" style="float: right;">
									<button type="submit" class="button button1"><i class="fa fa-send"></i>Post</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<hr style="border: solid 1px lightgray">
			<div class="row">
				<div class="col-md-12">
					<strong style="font-size: 1.5em;">Recent Updates</strong>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12" style="background: white; padding: 20px;">
					<div class="row">
						<div class="col-md-2" style="padding-left: 20px;">
							<img style="width: 100%; height: 100px;" class="img-fulid" src="<?php echo base_url('asset/img/upload_img_slider/empty.png')?>" alt="">
						</div>
						<div class="col-md-6" style="padding: 5px; margin-left: 20px;">
							<strong style="font-size: 1.5em;">PT Dash Indo Persada</strong>
							<p style="font-size: 1.1em; font-family: sans-serif;">Human Resource Development</p>
							<strong style="color: gray;"> Waktu Publish</strong>
						</div>
						<div class="col-md-3" >
							<button style="width: 130px; float: right;" type="submit" class="button button1"><i class="fa fa-pencil"></i>Edit</button>
						</div>
					</div>
					<hr style="border: solid 1px lightgray">
					<div class="row" style="padding: 20px;">
						<div class="col-md-12" style="background: whitesmoke; padding: 10px;">
							Konten
						</div>
					</div>
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