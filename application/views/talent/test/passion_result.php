<div class="test-result" style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center">Hasil Tes Minat dan Bakat</h3>
		<div class="card center-block" style="box-shadow: 1px 5px 20px lightgrey;">
			<div class="card-body">
				<div class="test">
				<?php
			    	if($this->session->has_userdata('msg_error')) {
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
			    	if($this->session->has_userdata('msg_success')) {
			    		unset($_SESSION['msg_success']);
				?>
					<div class="text-justify">
			  	<?php
			  			echo "<div>". $result_detail ."</div>";
			  		}
				?>
					</div>
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
	</div>
</div>
