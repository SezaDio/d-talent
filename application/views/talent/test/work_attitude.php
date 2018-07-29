<div style="padding-top: 15px; padding-bottom: 15px;">
	<div class="container">
		<h3 class="text-center"><strong><u>Tes Work Attitude</u></strong></h3>
		<div class="row" style="padding: 10px;">
			<div class="col-md-2"></div>
			<div class="col-md-8" style="height: 450px; background-color: white; border: solid 1px lightgray; box-shadow: 0px 0px 15px lightgrey;">
				<form action="<?php echo site_url('talent/test-work-attitude/submit'); ?>" method="post">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
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
											Soal psikotes sikap kerja terdapat 30 soal menggunakan skala likert dengan lima pilihan jawaban, <b>sangat sesuai</b>, <b>sesuai</b>, <b>netral</b>, <b>tidak sesuai</b>, dan <b>sangat tidak sesuai</b>. Tidak ada batas waktu dalam pengerjaan.
										</p>
										<br>
										<p>
											Psikotes ini bertujuan untuk melihat sikap kerja Anda di perusahaan tempat Anda bekerja. <b>Bacalah setiap kalimat pernyataan dengan teliti</b>. Tugas Anda adalah memilih salah satu jawaban yang paling sesuai dengan keadaan diri Anda. Tidak ada jawaban yang benar dan salah.
										</p>
									</div>

									<?php
										$page = 1;	// page number
										$no = 0;	// question number, start from 0 (array's index)
										$test = $test_work_attitude;
										$total_page = 1 + ($total_records / 2);	// 2 item per page + 1 instruction page

										for ($i=1; $i<$total_records; $i++) 
										{
											if ($i % 2 == 1) 
											{	// if $no is odd => new page (pagination)
												$page++;
												echo '<div class="test page-'. $page .'">';
													echo '<br>';
													echo '<div class="radio-validation">'.
															'<p><span class="number">'.($no+1).' .</span>'. $test[$no]->statement .'</p>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Sangat Sesuai" required>'.
																	'<span>Sangat Sesuai</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Sesuai" required>'.
																	'<span>Sesuai</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Netral" required>'.
																	'<span>Netral</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Tidak Sesuai" required>'.
																	'<span>Tidak Sesuai</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Sangat Tidak Sesuai" required>'.
																	'<span>Sangat Tidak Sesuai</span>'.
																'</label>
															</div>'.
														'</div>';
													$no++;
													echo '<div class="radio-validation">'.
															'<p><span class="number">'.($no+1).' .</span>'. $test[$no]->statement .'</p>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Sangat Sesuai" required>'.
																	'<span>Sangat Sesuai</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Sesuai" required>'.
																	'<span>Sesuai</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Netral" required>'.
																	'<span>Netral</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Tidak Sesuai" required>'.
																	'<span>Tidak Sesuai</span>'.
																'</label>
															</div>'.
															'<div>
																<label>'.
																	'<input type="radio" name="answer['.$no.']" value="Sangat Tidak Sesuai" required>'.
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
							</div>
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4" style="text-align: center;">
									<!-- pagination -->
									<nav aria-label="Page navigation">
									  <ul class="pagination justify-content-center">
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
								<div class="col-md-4"></div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12" style="float: right;">
								<!-- submit button -->
								<div class="btn-submit-wrapper">
									<input type="submit" value="Selesai" class="button button1">
								</div>
							</div>
						</div>
					</div>


				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>
