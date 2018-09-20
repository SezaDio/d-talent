<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
			<form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('CompanyMember/update_data_company/');?>">
				<input type="hidden" required name="id_company" class="form-control" value="<?php echo htmlspecialchars($dataCompany->id_company); ?>">
				<!--Section Cover Company-->
				<div class="row">
					<div class="col-md-12">
						<p style="font-size: 1.3em;"><strong>Company Background Picture</strong></p>
						<?php if($dataCoverCompany->company_cover != "") {?>
						<figure class="image-bg" style="height: 200px; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$dataCoverCompany->company_cover;?>');"></figure>
						<?php } else{ ?>
						<figure class="image-bg" style="height: 200px; background-image: url('<?php echo base_url('asset/img/bg-default.jpg'); ?>');"></figure>
						<?php }?>

						<div class="hover-show-div" style="padding: 6px; background-color: lightgray; right: 15px; top: 34px; width: 30px; height: 30px;">
							<a href="#!" data-target=".modal-cover-company" data-toggle="modal" style="color: black;"><strong><i class="fa fa-pen"></i></strong></a>
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
								<?php if($dataLogoCompany->company_logo != "") {?>
								<figure class="image-bg" style="height: 170px; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$dataLogoCompany->company_logo;?>');"></figure>
								<?php } else{ ?>
								<figure class="image-bg" style="height: 170px; background-image: url('<?php echo base_url('asset/img/company-default.png'); ?>');"></figure>
								<?php }?>

								<div class="hover-show-div" style="padding: 6px; background-color: lightgray; right: 15px; top: 15px; width: 30px; height: 30px;">
									<a href="#!" data-target=".modal-logo-company" data-toggle="modal" style="color: black;"><strong><i class="fa fa-pen"></i></strong></a>
								</div>
							</div>

							<div class="col-md-9" style="padding-top: 15px;">
								<div class="row">
									<div class="col-md-6">
					                    <div class="form-group">
											<label for="exampleInputEmail1">Company Name</label>
											<div class="row">
												<div class="col-md-12">
				                                	<input style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_name" class="form-control" value="<?php echo htmlspecialchars($dataCompany->company_name); ?>">
												</div>
											</div> 
					                    </div>
					                </div>
				                </div>
								<div class="row">
									<div class="col-md-6">
					                    <div class="form-group">
											<label for="exampleInputEmail1">Year Founded</label>
											<div class="row">
												<div class="col-md-4">
				                                	<input placeholder="Year . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="number" required name="company_year" class="form-control" value="<?php echo htmlspecialchars($dataCompany->company_year); ?>">
												</div>
											</div> 
					                    </div>
					                </div>
								</div>
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
	                        <textarea style="border-color: black; background-color: white; color: black;" class="form-control" id="about_us" name="company_description" placeholder="Tell me about your company . . ." rows="8" data-error="Write your message" required><?php echo htmlspecialchars($dataCompany->company_description); ?></textarea>
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
											<div class="col-md-12">
			                                	<input placeholder="Your Company Address . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_address" class="form-control" value="<?php echo htmlspecialchars($dataCompany->company_address); ?>">
											</div>
										</div> 
				                    </div>
				                </div>

				                <div class="col-md-6">
				                	<div class="form-group">
										<label for="exampleInputEmail1">Industries</label>
										<div class="row">
											<div class="col-md-12">
												<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="company_industries" required class="form-control" id="kategori">
	                                                <option value="">--Choose Your Industries--</option>
	                                                <?php
	                                                    foreach ($bidang_usaha as $key=>$bu) 
	                                                    {
	                                                        if ($key == $dataCompany->company_industries){
	                                                            echo '<option value="'.$key.'" selected>'.$bu.'</option>';
	                                                        }
	                                                        else
	                                                        {
	                                                            echo '<option value="'.$key.'">'.$bu.'</option>';   
	                                                        }
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
											<div class="col-md-12">
			                                	<input name="company_website" placeholder="Your Company Website Address . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required class="form-control" value="<?php echo htmlspecialchars($dataCompany->company_website); ?>">
											</div>
										</div> 
				                    </div>
				                </div>

				                <div class="col-md-6">
				                    <div class="form-group">
										<label for="exampleInputEmail1">Field</label>
										<div class="row">
											<div class="col-md-12">
												<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="company_type" required class="form-control" id="kategori">
	                                                <option value="">--Company Field--</option>
	                                                <?php
	                                                    foreach ($company_type as $key=>$ct) 
	                                                    {
	                                                        if ($key == $dataCompany->company_type)
	                                                        {
	                                                            echo '<option value="'.$key.'" selected>'.$ct.'</option>';
	                                                        }
	                                                        else
	                                                        {
	                                                            echo '<option value="'.$key.'">'.$ct.'</option>';   
	                                                        }
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
										<label for="exampleInputEmail1">Company E-mail</label>
										<div class="row">
											<div class="col-md-12">
			                                	<input placeholder="Your Company E-mail . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="email" required name="company_email" class="form-control" value="<?php echo htmlspecialchars($dataCompany->company_email); ?>">
											</div>
										</div> 
				                    </div>
				                </div>

				                <?php
				                	$company_specialties = $dataCompany->company_specialties;
				                	$company_specialties = explode(",",$company_specialties);
				                	$length = count($company_specialties);
				                ?>

				                <div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Company Specialties</label>

										<?php
											
							  				foreach ($company_specialties as $key => $value) 
							  				{
							  					if (empty($value))
							  					{ ?>
													<div class="row" style="padding-bottom: 10px;">
														<div class="col-md-10">
						                                	<input placeholder="Company Specialties . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_specialties[]" class="form-control" value="<?php //echo htmlspecialchars($company_specialties[0]); ?>">
														</div>
														<div class="col-md-1">
															<button id="add_field" style="margin: unset; padding-left: 16px;" type="button" class="button button1"><i class="fa fa-plus"></i></button>
														</div>
													</div> 
													
													<div id="tambah_field"> </div>
										  <?php }
							  					else 
							  			  	 	{ 
							  			  	 		
					  			  	 				if ($key == 0) 
					  			  	 				{ ?>
					  			  	 					<div class="row" style="padding-bottom: 10px;">
															<div class="col-md-10">
							                                	<input placeholder="Company Specialties . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_specialties[]" class="form-control" value="<?php echo htmlspecialchars($value); ?>">
															</div>
															<div class="col-md-1">
																<button id="add_field" style="margin: unset; padding-left: 16px;" type="button" class="button button1"><i class="fa fa-plus"></i></button>
															</div>
														</div>

														<div id="tambah_field"> </div>
					  			  	 		  <?php } 
					  			  	 				else 
					  			  	 				{ ?>
					  			  	 					<div class="row" style="padding-bottom: 10px;">
															<div class="col-md-10">
							                                	<input placeholder="Company Specialties . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="company_specialties[]" class="form-control" value="<?php echo htmlspecialchars($value); ?>">
															</div>
															<div class="col-md-1">
																<button id="add_field" style="margin: unset; padding-left: 16px;" type="button" class="button button3 required_skill"><i class="fa fa-minus"></i></button>
															</div>
														</div>
					  			  	 		  <?php } ?>
								  			  	 		
							  			  	  <?php 
							  					}
							  				 } 
							  			?>

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
						<a href="<?php echo site_url('CompanyMember/index'); ?>" class="button button3"><i class="fa fa-cross"></i> Cancel</a>
					</div>
					<div class="col-md-2">
						<button value="1" name="save" class="button button1" type="submit"><i class="fa fa-save"></i> Save</button>
					</div>
					<div class="col-md-4"></div>
				</div>
			</form>
		</div>

		<div class="col-lg-1"></div>
	</div>
</div>
	<br><br>

	<!-- modal Update Cover Picture -->
	<div class="modal fade modal-cover-company" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('CompanyMember/update_company_cover/');?>">
					<div class="modal-header">
						<strong class="modal-title"><i class="fa fa-images"></i> Change Your Company Background Picture</strong>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body" style="text-align: center;">
						<div class="custom-file" style="height: 28px;">
						  <input name="filefoto" required type="file" class="custom-file-input" id="customFile" style="opacity: 1;">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="button button3" data-dismiss="modal">Cancel</button>
						<button class="button button1" type="submit" name="save"><i class="fa fa-save"></i> Save</button>
					</div>
				</form>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- modal Update Logo Picture -->
	<div class="modal fade modal-logo-company" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('CompanyMember/update_company_logo/');?>">
					<div class="modal-header">
						<strong class="modal-title"><i class="fa fa-images"></i> Change Your Company Logo</strong>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body" style="text-align: center;">
						<div class="custom-file" style="height: 28px;">
						  <input name="company_logo" required type="file" class="custom-file-input" id="customFile" style="opacity: 1;">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="button button3" data-dismiss="modal">Cancel</button>
						<button class="button button1" type="submit" name="save"><i class="fa fa-save"></i> Save</button>
					</div>
				</form>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script type="text/javascript">
		var counter = 0;

		$('.modal-cover-company').on('show.bs.modal');

		$('.modal-logo-company').on('show.bs.modal');
		
        $('button#add_field').click(function(){
            counter += 1;
			var tambah_field = '';
			tambah_field += '<div class="row" id="field_'+counter+'">';
			
			tambah_field += '<div class="col-md-10"><input style="border-color: black; background-color: white; color: black;" class="form-control" id="field_' + counter + '" name="company_specialties[]' + '" type="text" placeholder="Company Specialties . . ." /><br /></div>';
            
			tambah_field += '<div class="col-md-1" style="text-align: center;">';
				tambah_field += '<button style="padding-left: 16px; height: 40px;" onclick="delete_field('+counter+')" type="button" class="button button3">';
					tambah_field += '<i class="fa fa-minus"></i>';
				tambah_field += '</button>';
			tambah_field += '</div>';
			
			tambah_field += '</div><br/>';
			$('#tambah_field').append(tambah_field);
        });

        // delete company specialties which generated by plus button
        function delete_field(z){
			document.getElementById('field_'+z+'').remove();
		}

		// delete company specialties which generated first
		$('.required_skill').on('click', function(){
			$(this).parent().parent().remove();
		});
	</script>
