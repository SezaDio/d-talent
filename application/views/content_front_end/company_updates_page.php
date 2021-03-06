<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>
<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="padding: 20px; width: 100%;">
			<div class="row">
				<div class="col-md-12 add-company-updates" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
					<form role="form" enctype="multipart/form-data" action="<?php echo site_url('company/updates/store');?>" method="POST" enctype="multipart/form-data">
						<!--Text Area Updates-->
						<div class="row">
							<div class="col-md-12">			
								<div class="form-group">
									<input type="text" placeholder="Judul . . ." name="title" class="form-control" value="<?php echo set_value('title'); ?>" required>
								</div>

								<div class="form-group">
									<div class='box-body pad'>
										<textarea style="padding: 20px; width: 100%;" placeholder="Share Artikel, Ide, atau Aktivitas . . ." required name="content" rows="5"><?php 
				                                echo set_value('content');
				                        ?></textarea>
				                        <br>                                 
									</div>
				                </div>

								<div class="form-group image-updates">
									<div id="image_preview" class="thumbnail" style="margin-bottom: 10px;">
										<figure class="image-bg"></figure>
									</div>
									<label id="bb" style="border-radius: 5px; padding: 10px; background-color: black; color: white;">
										<i class="fa fa-image"></i> Browse Picture
										<input style="display: none;" type="file" name="image" accept="image/*" id="image-browse">
									</label>
									<div class="text-muted">*Ukuran maks. 2 MB. Rasio gambar 3:2.</div>
								</div>

								<div class="form-group" style="display: none;">
									<label>Publikasi</label>
									<br>
									<input type="checkbox" name="status" value="1" <?php echo set_value('status')==1 ? "checked" : ""; echo empty(set_value('status')) ? "checked" : "" ?> >
								</div>
							</div>
						</div>

						<!--Button Post-->
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-3" style="float: right;">
									<button type="submit" class="button button1"><i class="fa fa-paper-plane"></i> Post</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
					<div class="row">
						<div class="col-md-12">
							<strong style="font-size: 1.5em;">Recent Updates</strong>
							<hr style="border: solid 1px black;">
						</div>
					</div>
					
					<div class="row company-updates">
						<?php
							if($company_updates != null) {
								foreach ($company_updates as $company_update):
						?>
						<div class="col-md-12 item">
							<div class="row">
								<div class="col-md-2 image-wrapper">
									<figure class="image-bg img-fluid" style="height: 100%; background-image: url('<?php echo base_url('asset/img/upload_img_company_updates/') . $company_update->image;?>');"></figure>
								</div>

								<div class="col-md-6 item-attribute">
									<strong class="company-update-title">
										<a href="<?php echo site_url('company/updates/detail/') . $company_update->id_company_update;?>">
											<?php echo $company_update->title; ?>
										</a>
									</strong>
									<p class="company-name">
										<?php echo $company_name; ?>
									</p>
									<strong class="text-gray">
										<?php
											echo displayDate($company_update->created_at);
											echo '<span class="space">|</span>'. displayCompanyUpdateStatus($company_update->status);
										?>
									</strong>
								</div>
								<div class="col-md-3" style="padding: 10px;">
									<div class="row">
										<div class="col-md-6" style="text-align: center;">
											<a href="<?php echo site_url('company/updates/edit/') . $company_update->id_company_update;?>" style="color: black;">
												<div style="width: 100px;" class="badge badge-dark"><i class="fa fa-edit"></i> Edit </div>
											</a>
										</div>
										<div class="col-md-6" style="text-align: center;">
											<a style="color: red;" href="#!" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $company_update->id_company_update;?>">
												<div style="width: 100px;" class="badge badge-danger"><i class="fa fa-trash"></i> Delete </div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<hr class="lightgray-line">
							<!--
							<div class="row" style="padding: 20px;">
								<div class="col-md-12 company-update-content">
									<?php //echo character_limiter($company_update->content, 250); ?>
								</div>
							</div> -->
						</div>
						<?php
								endforeach;
							}
						?>
					</div>
				</div>
			</div>

		<!-- Pagination -->
		<?php if (isset($links)) { ?>
			<br>
			<div class="pagination">
            	<?php echo $links ?>
            </div>
        <?php } ?>
            
		</div>

		<div class="col-lg-1"></div>	
	</div>
	<br><br>
</div>

<!-- modal delete -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Artikel</h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="button button2" data-dismiss="modal">Cancel</button>
				<a class="button button3">Delete</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	// delete cv work
	$('.modal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var delete_target = button.data('id');
		var route = "<?php echo site_url('company/updates/delete/');?>" + delete_target;
        $(this).find('a').attr('href', route);
    });

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