<div style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center">Tes Karakter</h3>
		<div class="card center-block">
			<form action="<?php echo site_url('talent/test-character/submit'); ?>" method="post">
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
							<b>Instruksi Tes</b>
						</p>
						<br>
						<p>
							Di dalam lembar soal terdapat pertanyaan dan dua pilihan jawaban. Pilih jawaban yang paling menggambarkan kondisi Anda, <b>tidak ada jawaban yang benar dan salah</b>.
						</p>
					</div>

				<?php
					$page = 1;	// page number
					$no = 0;	// question number, start from 0 (array's index)
					$test = $test_character;
					$total_page = 1 + ($total_records / 2);	// 2 item per page + 1 instruction page

					for ($i=1; $i<$total_records; $i++) {
						if ($i % 2 == 1) {	// if $no is odd => new page (pagination)
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

				<!-- submit button -->
				<div class="btn-submit-wrapper">
					<input type="submit" value="Selesai" class="btn btn-default btn-submit">
				</div>

				<!-- pagination -->
				<div class="pagination-wrapper">
					<nav aria-label="Page navigation">
					  <ul class="pagination center-block">
					    <li>
					      <a href="#" aria-label="Previous" class="prev">
					        <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
					      </a>
					    </li>
					<?php
						for ($i=1; $i<=$total_page; $i++) {
							// generate page links
							echo '<li><a href="#!" class="page-number">'.$i.'</a></li>';
						}
					?>
						<li>
					      <a href="#" aria-label="Next" class="next">
					        <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
					      </a>
					    </li>
					  </ul>
					</nav>
				</div>
			</form>

		</div>
	</div>
</div>
