<div style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center">Hasil Tes Karakter</h3>
		<div class="card center-block" style="width: 70%;">
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
				?>
					<div class="text-justify">
			  	<?php
			  			echo "<p><b>". $result ." (". $sub_title .")</b></p>";
			  			echo "<div>". $result_detail ."</div>";
			  		}
				?>
					</div>
				</div>
			</div>
			
			<div class="pull-right">
				<a href="<?php echo site_url('talent');?>" class="btn btn-default">My CV</a>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
