<div class="online-test">
	<div class="test-title">
		<h3 class="text-center">
			<b>SOFT SKILL TEST RESULT</b>
		</h3>
	</div>
	<hr>
	<div>
		<?php
	    	if($this->session->has_userdata('msg_error')) {
		?>
		    <div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->msg_error; ?>
			</div>
	  	<?php
	  		}
		?>
		
		<?php
	    	if($this->session->has_userdata('msg_success')) {
	    		unset($_SESSION['msg_success']);
		?>				
			<br><br>
			<div class="row">
				<div class="col-md-6 soft-skill-subtitle" style="">
					<div class="clearfix" style="background-color: black; border: solid 2px black;">
						<div class="col-md-12" style="padding: unset; text-align: center; color: white;">
		    				<h3><b>INTRAPERSONAL SKILL</b></h3>
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
			 	<div class="col-md-6 soft-skill-subtitle" style="">
			 		<div class="clearfix" style="background-color: white; border: solid 2px black;">
				 		<div class="col-md-12" style="text-align: center;">
		    				<h3><b>INTERPERSONAL SKILL</b></h3>
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
			<br>
		<?php
	    	}
		?>	
	</div>

	<hr>
</div>