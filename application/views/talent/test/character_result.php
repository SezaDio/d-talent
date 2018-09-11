<div class="online-test">
	<div class="test-title">
		<h3 class="text-center">
			<b>CHARACTER TEST RESULT</b>
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
			<div class="text-justify">
	  	<?php
	  			echo "<p><b>". $result ." (". $sub_title .")</b></p>";
	  			echo "<div>". $result_detail ."</div>";
		?>
		  		<br>
		  	</div>
		<?php
	  		}
		?>
	</div>

	<hr class="bottom-line">

	<!-- page button -->
	<div class="test-footer text-center">
		<a href="<?php echo site_url('talent');?>"><button type="button" class="btn button1">Back to My CV</button></a>
	</div>

</div>
