<div class="online-test">
	<div class="test-title">
		<h3 class="text-center">
			<b>CHARACTER TEST</b>
		</h3>
	</div>
	<hr>
	<form action="<?php echo site_url('talent/test-character/submit'); ?>" method="post">
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
				$test = $test_character;
				$total_page = ceil($total_records / 2);	// 2 item per page
				// $total_page = 1 + ($total_records / 2);	// 2 item per page + 1 instruction page

				for ($i=0; $i<$total_records; $i++) {
					if ($i % 2 == 1) {	// if $i is odd => new page (pagination)
						$page++;
						echo '<div class="test page-'. $page .'">';
						
						echo '<div class="radio-validation">'.
								'<p><span class="number">'.($no+1).' .</span>'. $test[$no]->question .'</p>'.
								'<div><label>'.
									'<input type="radio" name="answer['.$no.']" value="a" required>'.
									'<span>'. $test[$no]->option_a .'</span>'.
								'</label></div>'.
								'<div><label>'.
									'<input type="radio" name="answer['.$no.']" value="b">'.
									'<span>'. $test[$no]->option_b .'</span>'.
								'</label></div>'.
							'</div>';
						$no++;
						echo '<div class="radio-validation">'.
								'<p><span class="number">'.($no+1).' .</span>'. $test[$no]->question .'</p>'.
								'<div><label>'.
									'<input type="radio" name="answer['.$no.']" value="a" required>'.
									'<span>'. $test[$no]->option_a .'</span>'.
								'</label></div>'.
								'<div><label>'.
									'<input type="radio" name="answer['.$no.']" value="b">'.
									'<span>'. $test[$no]->option_b .'</span>'.
								'</label></div>'.
							'</div>';
						$no++;

						echo '</div>';	// ./div (pagination)
					}
				}
			?>
		</div>
		
		<hr class="bottom-line">

		<!-- page button -->
		<div class="test-footer">
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

		<!-- submit button -->
		<!-- <div class="btn-submit-wrapper">
			<input type="submit" value="Submit" class="button button1 btn-submit">
		</div> -->

		<!-- pagination -->
		<!-- <div class="pagination-wrapper">
			<nav aria-label="Page navigation">
			  <ul class="pagination">
			    <li>
			      <a href="#!" aria-label="Previous" class="prev">
			        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
			      </a>
			    </li>
				<li>
			      <a href="#!" aria-label="Next" class="next">
			        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
			      </a>
			    </li>
			  </ul>
			</nav>
		
			<div class="page-text">Page <span id="page-text">1</span> / <?php echo $total_page; ?></div>
		</div> -->
	</form>
</div>
