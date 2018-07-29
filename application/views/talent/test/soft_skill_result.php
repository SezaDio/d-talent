<div style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center"><strong><u>Hasil Tes Soft Skill</u></strong></h3><br>
		<div class="row" style="padding: 10px;">
			<div class="col-md-1"> </div>
			
			<div class="col-md-10"> 
				<div class="row">
					<div class="col-md-12">
						
						<?php
					    	if($this->session->has_userdata('msg_error')) 
					    	{
						?>
							    <div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<?php echo $this->session->msg_error; ?>
								</div>
								<br>
					  	<?php
					  		}
						?>
						<?php
					    	if($this->session->has_userdata('msg_success')) 
					    	{
					    		unset($_SESSION['msg_success']); ?>
								
					    		<br><br>
								<div class="row">
									<div class="col-md-6" style="min-height: 745px; background-color: white; border: solid 1px lightgray; box-shadow: 0px 0px 15px lightgrey;">
										<div class="row" style="background-color: black; border: solid 2px black;">
											<div class="col-md-12" style="padding: unset; text-align: center; color: white;">
							    				<p><b><h3>INTRAPERSONAL SKILL</h3></b></p>
							    			</div>
							    		</div>
								  <?php for ($index = 1; $index <= 5; $index++) 
										{ ?>
											<div class="row">
												<div class="col-md-12">
										  			<br><p><b><?php echo $sub_title[$index]; ?></b></p>
										  			<hr style="border: solid 1px gray; margin-bottom: unset; margin-top: unset;">
										  			<p><?php echo $result[$index]; ?></p>
										  		</div>
										  	</div>
								  <?php } ?>
								 	</div>
								 	<div class="col-md-6" style="min-height: 745px; background-color: white; border: solid 1px lightgray; box-shadow: 0px 0px 15px lightgrey;">
								 		<div class="row" style="background-color: white; border: solid 2px black;">
									 		<div class="col-md-12" style="text-align: center;">
							    				<p><b><h3>INTERPERSONAL SKILL</h3></b></p>
							    			</div>
							    		</div>
								  		<?php for ($index = 6; $index <= 10; $index++) 
										{ ?>
											<div class="row">
												<div class="col-md-12">
										  			<br><p><b><?php echo $sub_title[$index]; ?></b></p>
										  			<hr style="border: solid 1px gray; margin-bottom: unset; margin-top: unset;">
										  			<p><?php echo $result[$index]; ?></p>
										  		</div>
										  	</div>
								  <?php } ?>
								 	</div>
								</div>
					  <?php } ?>
						
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<br>
						<div style="text-align: center;">
							<a href="<?php echo site_url('talent');?>"><button type="button" class="button button1">Back to My CV</button></a>
						</div>
						<br>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>

			<div class="col-md-1"> </div>

		</div>
	</div>
</div><br>
