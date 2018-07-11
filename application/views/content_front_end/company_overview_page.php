	<div class="row">
		
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="background: whitesmoke; padding: 20px; width: 100%;">
			<form method="post" action="<?php echo site_url('CompanyProfile/kirim_pesan_hubungi_kami/');?>">
				<!--Section Cover Company-->
				<div class="row">
					<div class="col-md-12">
						<figure class="image-bg" style="background-size: cover; background-position: center; width: 100%; height: 200px; background-repeat: no-repeat;background-image: url('<?php echo base_url('asset/img/upload_img_slider/empty.png')?>');"></figure>

						<div class="hover-show-div" style="padding: 6px; background-color: lightgray; right: 15px; top: 0; width: 30px; height: 30px;">
							<a href="#!" data-cv="company_cover_picture" data-target=".modal-delete" data-toggle="modal" style="color: black;"><strong><i class="fa fa-pen"></i></strong></a>
						</div>
					</div>
				</div>

				<hr style="border: solid 1px lightgray">
				<!--Section Company About Us-->
				<div class="row">
					<div class="col-md-12">
						<p style="font-size: 1.3em;"><strong>Company Name & Logo</strong></p>
						<div class="row">
							<div class="col-md-3" style="padding-top: 15px;">
								<img style="width: 100%; height: 200px;" class="img-fulid" src="<?php echo base_url('asset/img/upload_img_slider/empty.png')?>" alt="">
							</div>
							<div class="col-md-4" style="padding-top: 15px;">
								<label><strong>Company Name</strong></label>
								<input style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_name" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
								<br>
								<label><strong>Company Logo</strong></label>
								<input style="width: 100%; color: black;" type="file" required name="company_logo" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
							</div>
						</div>
					</div>
				</div>

				<hr style="border: solid 1px lightgray">
				<!--Section Company About Us-->
				<div class="row">
					<div class="col-md-12">
						<p style="font-size: 1.3em;"><strong>About Us (Company Description)</strong></p>
						<div class="form-group"> 
	                        <textarea style="border-color: black; background-color: white; color: black;" class="form-control" id="about_us" name="about_us_company" placeholder="Tell me about your company . . ." rows="8" data-error="Write your message" required></textarea>
	                        <div class="help-block with-errors"></div>
	                     </div>
					</div>
				</div>
				<hr style="border: solid 1px lightgray">
				<!--Section Company Detail-->
				<div class="row">
					<div class="col-md-12">
						<p style="font-size: 1.3em;"><strong>Company Details</strong></p><br>
						<div class="container">
							<div class="row">
				            	<div class="col-md-6">
				                    <div class="form-group">
										<label for="exampleInputEmail1">Office Address</label>
										<div class="row">
											<div class="col-md-8">
			                                	<input placeholder="Your Company Address . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_address" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
											</div>
										</div> 
				                    </div>
				                </div>

				                <div class="col-md-6">
				                	<div class="form-group">
										<label for="exampleInputEmail1">Industries</label>
										<div class="row">
											<div class="col-md-8">
												<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="company_industries" required class="form-control" id="kategori">
	                                                <option value="">-- Bidang Industri --</option>
	                                                <?php
	                                                    foreach ($bidang_usaha as $key=>$bidang) 
	                                                    {
	                                                      
	                                                        echo '<option value="'.$key.'">'.$bidang.'</option>';   
	                                                    }
	                                                ?>
	                                            </select>
											</div>
										</div> 
				                    </div>
				                </div>
				            </div>

				            <div class="row">
				            	<div class="col-md-6">
				                    <div class="form-group">
										<label for="exampleInputEmail1">Website URL</label>
										<div class="row">
											<div class="col-md-8">
			                                	<input name="company_website" placeholder="Your Company Website Address . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
											</div>
										</div> 
				                    </div>
				                </div>

				                <div class="col-md-6">
				                    <div class="form-group">
										<label for="exampleInputEmail1">Company Type</label>
										<div class="row">
											<div class="col-md-8">
			                                	<input placeholder="Your Company Type . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_type" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
											</div>
										</div> 
				                    </div>
				                </div>
				            </div>

				            <div class="row">
				            	<div class="col-md-6">
				                    <div class="form-group">
										<label for="exampleInputEmail1">Company E-mail</label>
										<div class="row">
											<div class="col-md-8">
			                                	<input placeholder="Your Company E-mail . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="email" required name="company_year" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
											</div>
										</div> 
				                    </div>
				                </div>
				                <div class="col-md-6">
				                    <div class="form-group">
										<label for="exampleInputEmail1">Year Founded</label>
										<div class="row">
											<div class="col-md-4">
			                                	<input placeholder="Year . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="number" required name="company_year" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
											</div>
										</div> 
				                    </div>
				                </div>
				            </div>

				            <div class="row">
				            	<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Company Specialties</label>
										<div class="row" style="padding-bottom: 10px;">
											<div class="col-md-8">
			                                	<input placeholder="Company Specialties . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_specialties" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
											</div>
											<div class="col-md-1">
												<button id="add_field" style="margin: unset; padding-left: 16px;" type="button" class="button button1"><i class="fa fa-plus"></i></button>
											</div>
										</div> 
										
										<div id="tambah_field"> </div>
				                    </div>
				                </div>
				            </div>
				        </div>
					</div>
				</div>
				<br><br>
				<!--Section Tombol Cancel dan Save-->
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-2">
						<a href="<?php echo site_url('CompanyMember/updates_page'); ?>" class="button button3"><i class="fa fa-cross"></i> Cancel</a>
					</div>
					<div class="col-md-2">
						<button value="1" class="button button1" type="submit"><i class="fa fa-save"></i> Save</button>
					</div>
					<div class="col-md-4"></div>
				</div>
			</form>
		</div>

		<div class="col-lg-1"></div>
	</div>
	<br><br>

	<!-- modal delete -->
	<div class="modal fade modal-delete" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document" style="margin-top: 250px;">
			<div class="modal-content">
				<div class="modal-header">
					<strong class="modal-title"><i class="fa fa-images"></i> Change Your Company Background Picture</strong>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" style="text-align: center;">
					<div class="custom-file" style="height: 28px;">
					  <input type="file" class="custom-file-input" id="customFile" style="opacity: 1;">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="button button3" data-dismiss="modal">Cancel</button>
					<a class="button button1"><i class="fa fa-save"></i> Save</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script type="text/javascript">
		var counter = 0;

			$('.modal-delete').on('show.bs.modal', function(event){
	        var button = $(event.relatedTarget);
	        var delete_target = button.data('id');
	        var cv_type = button.data('cv');
	        var route;
	        switch(cv_type) {
			    case "work":
			        route = "<?php echo site_url('talent/cv-work-experience/delete/');?>";
			        break;
			    case "education":
			        route = "<?php echo site_url('talent/cv-education/delete/');?>";
			        break;
			    case "achievement":
			        route = "<?php echo site_url('talent/cv-achievement/delete/');?>";
			        break;
			    case "course":
			        route = "<?php echo site_url('talent/cv-course/delete/');?>";
			        break;
			    case "company_cover_picture":
			        route = "<?php echo site_url('talent/cv-course/delete/');?>";
			        break;
			}
			route = route + delete_target;
	        $(this).find('a').attr('href', route);
	    });
		
        $('button#add_field').click(function(){
            counter += 1;
			var tambah_field = '';
			tambah_field += '<div class="row" id="field_'+counter+'">';
			
			tambah_field += '<div class="col-md-8"><input style="border-color: black; background-color: white; color: black;" class="form-control" id="field_' + counter + '" name="company_specialties[]' + '" type="text" placeholder="Company Specialties . . ." /><br /></div>';
            
			tambah_field += '<div class="col-md-1" style="text-align: center;">';
				tambah_field += '<button style="padding-left: 16px; height: 40px;" onclick="delete_field('+counter+')" type="button" class="button button3">';
					tambah_field += '<i class="fa fa-minus"></i>';
				tambah_field += '</button>';
			tambah_field += '</div>';
			
			tambah_field += '</div><br/>';
			$('#tambah_field').append(tambah_field);
        });

        function delete_field(z){
			document.getElementById('field_'+z+'').remove();
		}
	</script>
