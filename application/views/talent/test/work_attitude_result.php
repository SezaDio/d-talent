<div style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center"><strong><u>Hasil Tes Work Attitude</u></strong></h3><br>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2"> </div>
			
			<div class="col-md-8" style="height: 400px; background-color: white; border: solid 1px lightgray; box-shadow: 0px 0px 15px lightgrey;"> 
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
					    		unset($_SESSION['msg_success']);
						?>
								<div class="text-justify">
					  	<?php
						  			echo "<br><h4 style='text-align: center;'><b>".$sub_title."</b></h4><br>";
						  			echo "<div>". $result_detail ."</div>"; ?>

						  		</div>
					  <?php } ?>
						
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div style="text-align: center;">
							<a href="<?php echo site_url('talent');?>"><button type="button" class="button button1">Back to My CV</button></a>
						</div>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>

			<div class="col-md-2"> </div>

		</div>
	</div>
</div><br>
