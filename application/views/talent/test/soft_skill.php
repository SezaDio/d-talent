<div class="online-test soft-skill">
	<div class="test-title">
		<h3 class="text-center">
			<b>SOFT SKILL TEST</b>
		</h3>
	</div>
	<hr>
	<form action="<?php echo site_url('talent/test-soft-skill/submit'); ?>" method="post">
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
				$page = 0;	// page number
				$no = 0;	// question number, start from 0 (array's index)
				$test = $test_soft_skill;
				$total_page = ceil($total_records / 2);	// 2 item per page

				for ($i=0; $i<$total_records; $i++) 
				{
					if ($i % 2 == 0) 
					{	// if $no is odd => new page (pagination)
						$page++;
						echo '<div class="test page-'. $page .'">';
							echo '<br>';
							$category = lcfirst($test[$no]->sub_category);
							echo '<div class="radio-validation">'.
									'<p><span class="number">'.($no+1).' .</span>'. $test[$no]->statement .'</p>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Sangat Sesuai" required>'.
											'<span>Sangat Sesuai</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Sesuai" required>'.
											'<span>Sesuai</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Netral" required>'.
											'<span>Netral</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Tidak Sesuai" required>'.
											'<span>Tidak Sesuai</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Sangat Tidak Sesuai" required>'.
											'<span>Sangat Tidak Sesuai</span>'.
										'</label>
									</div>'.
								'</div>';
							$no++;
							if (isset($test[$no])) {
							$category = lcfirst($test[$no]->sub_category);
							echo '<div class="radio-validation">'.
									'<p><span class="number">'.($no+1).' .</span>'. $test[$no]->statement .'</p>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Sangat Sesuai" required>'.
											'<span>Sangat Sesuai</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Sesuai" required>'.
											'<span>Sesuai</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Netral" required>'.
											'<span>Netral</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Tidak Sesuai" required>'.
											'<span>Tidak Sesuai</span>'.
										'</label>
									</div>'.
									'<div>
										<label>'.
											'<input type="radio" name="'.$category.'['.$no.']" value="Sangat Tidak Sesuai" required>'.
											'<span>Sangat Tidak Sesuai</span>'.
										'</label>
									</div>'.
								'</div>';
							$no++;
							}
						echo '</div>';	// ./div (page test-)
					}
				}
			?>	
		</div>
		
		<hr class="bottom-line">

		<!-- page button -->
		<div class="test-footer clearfix">
			<a href="#!" aria-label="Previous" class="prev btn btn-default pull-left">
		        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
		        Back
		    </a>

		    <a href="#!" aria-label="Next" class="next btn btn-default pull-right">
		        Next
		        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
		    </a>

			<!-- submit button -->
			<input type="submit" value="Submit" class="btn btn-submit button1 pull-right">
		    
		    <div class="page-text text-center">Page <span id="page-text">1</span> from <?php echo $total_page; ?></div>
		</div>
	</form>

</div>
