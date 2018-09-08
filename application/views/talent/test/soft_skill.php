<div class="online-test soft-skill" style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center"><strong><u>Soft Skill Test</u></strong></h3>
		<div class="card center-block" style="box-shadow: 1px 5px 20px lightgrey;">
			<form action="<?php echo site_url('talent/test-soft-skill/submit'); ?>" method="post">
				<div class="card-body">
					<div class="test page-1">
						<br>
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
						<br>
						<p class="text-center">
							<b>Test Instruction</b>
						</p>
						<br>
						<p>
							Anda akan mendapatkan 40 pernyataan yang terdiri dari 20 pernyataan <b>Tes Intrapersonal Skill</b> dan 20 pernyataan <b>Tes Interpersonal Skill</b>. Terdapat 5 pilihan jawaban pada setiap soal yaitu <b>Sangat Sesuai</b>, <b>Sesuai</b>, <b>Netral</b>, <b>Tidak Sesuai</b>, dan <b>Sangat Tidak Sesuai</b>. Pilihlah jawaban yang paling mendekati diri Anda. Tidak ada pilihan yang benar dan salah.
						</p>
					</div>

					<?php
						$page = 1;	// page number
						$no = 0;	// question number, start from 0 (array's index)
						$test = $test_soft_skill;
						$total_page = 1 + ($total_records / 2);	// 2 item per page + 1 instruction page

						for ($i=1; $i<$total_records; $i++) 
						{
							if ($i % 2 == 1) 
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
								echo '</div>';	// ./div (pagination)
							}
						}
					?>	
				</div>
				
				<!-- submit button -->
				<div class="btn-submit-wrapper">
					<input type="submit" value="Submit" class="button button1 btn-submit">
				</div>

				<!-- pagination -->
				<div class="pagination-wrapper">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li>
					      <a href="#!" aria-label="Previous" class="prev">
					        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
					      </a>
					    </li>
					<?php
						for ($i=1; $i<=$total_page; $i++) {
							// generate page links
							// echo '<li><a href="#!" class="page-number number-'.$i.'">'.$i.'</a></li>';
							echo '<li class="page-number number-'.$i.'"><a href="#!">'.$i.'</a></li>';
						}
					?>
						<li>
					      <a href="#!" aria-label="Next" class="next">
					        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
					      </a>
					    </li>
					  </ul>
					</nav>

					<div class="page-text">Page <span id="page-text">1</span> / <?php echo $total_page; ?></div>
				</div>
				
			</form>

		</div>
	</div>
</div>
