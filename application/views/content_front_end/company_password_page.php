<div class="container" style="min-height: 450px;">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10" style="padding: 20px; width: 100%;">
			<div class="row">
				<div class="col-md-12 add-company-updates" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
				
					<strong style="font-size: 1.3em;">Ubah Password</strong>
					<hr style="border: solid 1px black;">
					<br>

					<form role="form" action="<?php echo site_url('CompanyMember/updatePassword');?>" method="POST">
						<?php
							$this->load->library('form_validation');
		                	if (validation_errors() != "") {
			                	echo '<div class="alert alert-danger alert-dismissable">';
			                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
								echo validation_errors();
								echo '</div>';
		                	}
		               	?>
						<!--Text Area Updates-->
						<div class="row">
							<div class="col-md-12">			
								<div class="form-group">
									<input type="password" placeholder="Password Lama" name="old_password" class="form-control" required>
								</div>

								<div class="form-group">
									<input type="text" placeholder="Password Baru" name="new_password" class="form-control" required>
				                </div>

							</div>
						</div>

						<!--Button Post-->
						<div class="row">
							<div class="col-md-3">
								<button type="submit" class="button button1"><i class="fa fa-paper-plane"></i> Simpan</button>
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