<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>

<style type="text/css">
	.table .periode
	{
		width: 250px;
		color: #000;
	}

	h3
	{
		font-size: 1.8em;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="bg-talent" style="box-shadow: 1px 5px 20px lightgrey;">
			<?php
				if ($talent->foto_sampul != "") {
			?>
				<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_bg_profile/') . $talent->foto_sampul;?>');"></figure>
			<?php
				} else {
			?>
				<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/bg-default.jpg'); ?>');"></figure>
			<?php
				}
			?>
				<div class="profile-edit">
					<a href="<?php echo site_url('talent/profile/edit/');?>">
						<i class="fa fa-pen"></i>
					</a>
				</div>
			</div>

			<div class="profile">
				<div class="img-talent">
				<?php
					if ($talent->foto_profil != "") {
				?>
					<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $talent->foto_profil;?>');"></figure>
				<?php
					} else {
				?>
					<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/talent-default.png'); ?>');"></figure>
				<?php
					}
				?>
				</div>

				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
					<div class="card-body">
						<div style="padding: 10px;">
							<div class="text-center profile-attribute">
								<!-- Name | Age | City -->
								<span><?php echo $talent->nama; ?></span> |
								<span><?php echo countAge($talent->tanggal_lahir); ?> Tahun</span> |
								<span><?php echo displayGender($talent->jenis_kelamin); ?></span> |
								<span><?php echo displayMaritalStatus($talent->status_pernikahan); ?></span>
								<!-- <span><?php echo capitalizeEachWord($talent_location_city); ?></span> -->
							</div>
							<br>
							<div class="text-center">
								<?php echo $talent->tentang_saya; ?>
							</div>
							<?php
								if (!empty($talent->kemampuan)) {
							?>
								<div class="text-center job-interest label-colors">
									<?php echo displaySkills($talent->kemampuan)?>
								</div>
							<?php
								}
							?>

							<!-- contact -->
							<div class="contact-talent">
								<hr style="border: solid 1px lightgray">
								<div class="text-center">
									<span><i class="fa fa-envelope"></i> <?php echo $talent->email; ?></span>
									<span><i class="fa fa-phone"></i> <?php echo $talent->nomor_ponsel; ?></span>
									<span><i class="fa fa-home"></i> <?php echo capitalizeEachWord($talent_location_city); ?></span>
								</div>
								<hr style="border: solid 1px lightgray">
							</div>
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<a style="padding-top: 20px;" href="#!" class="button button1" data-toggle="modal" data-target=".modal-invite" data-id="<?php //echo $cv_work->id_talent_cv_work;?>" data-cv="invite"><h4><i class="fa fa-envelope"></i> INVITE</h4></a>
								</div>
								<div class="col-md-4"></div>
							</div>
							<br>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<br>
		<br>
		<!-- konten -->
		<div class="content">
			<div class="cv">
				<?php
					if($cv_works != null) {
				?>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-suitcase"></i> Pengalaman Kerja</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_works as $cv_work):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayCVWorkDate($cv_work->work_start, $cv_work->work_end); ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_work->position ." di ". $cv_work->company;
					    				if ($cv_work->description != "") {
					    					echo "<br>" . character_limiter($cv_work->description, 100);
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($cv_educations != null) {
				?>
				<br>
				<br>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-graduation-cap"></i> Pendidikan</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_educations as $cv_education):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo $cv_education->from_year. " - " .$cv_education->to_year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_education->school;
					    				if ($cv_education->field_of_study != "") {
					    					echo '<span class="space">|</span>' . $cv_education->field_of_study;
					    				}
					    				if ($cv_education->degree != "") {
					    					echo '<span class="space">('. $cv_education->degree.')</span>';
					    				}

					    				if ($cv_education->activity != "") {
					    					echo "<br>" . character_limiter($cv_education->activity, 100);
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($cv_achievements != null) {
				?>
				<br>
				<br>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-trophy"></i> Prestasi</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_achievements as $cv_achievement):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo displayMonthName($cv_achievement->month) ." ". $cv_achievement->year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_achievement->title;
					    				if ($cv_achievement->issuer != "") {
					    					echo '<span class="space">|</span>' . $cv_achievement->issuer;
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($cv_courses != null) {
				?>
				<br>
				<br>
				<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-certificate"></i> Pelatihan</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				    	<?php foreach ($cv_courses as $cv_course):?>
					    	<tr>
					    		<td class="periode">
					    			<?php echo $cv_course->year; ?>
					    		</td>
					    		<td>
					    			<?php
					    				echo $cv_course->title;
					    				if ($cv_course->organizer != "") {
					    					echo '<span class="space">|</span>' . $cv_course->organizer;
					    				}
					    			?>
					    		</td>
					    	</tr>
				    	<?php endforeach;?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>

				<?php
					if($result_character != null || $result_passion != null || $result_work_attitude != null || $result_soft_skill != null) {
				?>
				<br>
				<br>
				<div class="card online-test" style="box-shadow: 1px 5px 20px lightgrey;">
				  <div class="card-header">
				    <h3><i class="fa fa-file"></i> Tes Online</h3>
				  </div>
				  <div class="card-body">
				    <table class="table">
				<?php
					if($result_character != null) {
				?>
				    	<tr>
				    		<td class="periode">
				    			Tes Karakter
				    			<br>
				    			<?php
				    				echo displayDate($result_character->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo "- <b>" . $result_character_sub_title . "</b> -<br>";
				    				echo $result_character_detail;
				    			?>
				    		</td>
				    	</tr>
				<?php
					} 	//./character
				?>

				<?php
					if($result_passion != null) {
				?>
						<tr>
				    		<td class="periode">
				    			Tes Minat dan Bakat
				    			<br>
				    			<?php
				    				echo displayDate($result_passion->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo $result_passion_detail;
				    			?>
				    		</td>
				    	</tr>
				<?php
					} 	//./passion
				?>

				<?php
					if($result_work_attitude != null) {
				?>
						<tr>
				    		<td class="periode">
				    			Tes Work Attitude
				    			<br>
				    			<?php
				    				echo displayDate($result_work_attitude->test_date);
				    			?>
				    		</td>
				    		<td>
				    			<?php
				    				echo "- <b>" . $result_work_attitude_title . "</b> -<br><br>";
				    				echo $result_work_attitude_detail;
				    			?>
				    		</td>
				    	</tr>
				<?php
					} 	//./work attitude
				?>

				<?php
					if($result_soft_skill != null) {
				?>
					<?php
						foreach ($result_soft_skill as $item) 
						{ ?>
							<tr>
					    		<td class="periode">
					    			Tes Soft Skill
					    			<br>
					    			<?php
					    				echo displayDate($item['test_date']);
					    			?>
					    		</td>
					    		<td>
					    			<?php
					    				foreach($result_soft_skill as $item)
					    				{ ?>
					    					<table style="border: none;">
						    					<tr>
						    						<td>Pengambilan Keputusan</td>
						    						<td>:</td>
						    						<td><?php echo $item['pengambilan_keputusan']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Tanggung Jawab</td>
						    						<td>:</td>
						    						<td><?php echo $item['pengambilan_keputusan']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Integritas</td>
						    						<td>:</td>
						    						<td><?php echo $item['integritas']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Resiliensi</td>
						    						<td>:</td>
						    						<td><?php echo $item['resiliensi']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Keinginan Belajar</td>
						    						<td>:</td>
						    						<td><?php echo $item['keinginan_belajar']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Komunikasi</td>
						    						<td>:</td>
						    						<td><?php echo $item['komunikasi']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Sikap Positif</td>
						    						<td>:</td>
						    						<td><?php echo $item['sikap_positif']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Antusiasme</td>
						    						<td>:</td>
						    						<td><?php echo $item['antusiasme']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Kerja Tim</td>
						    						<td>:</td>
						    						<td><?php echo $item['kerja_tim']; ?></td>
						    					</tr>
						    					<tr>
						    						<td>Penyelesaian Masalah</td>
						    						<td>:</td>
						    						<td><?php echo $item['penyelesaian_masalah']; ?></td>
						    					</tr>
						    				</table>
					    		  <?php } ?>
					    			<a href="<?php echo site_url('Talent/show_result_soft_skill/'.$item['id_talent']);?>">
					    				<button style="width: 200px;" type="button" class="button button1"><i class="fa fa-eye"></i> Lihat Detail</button>
					    			</a>
					    		</td>
					    	</tr>	
				  <?php } 
					} 	//./work attitude
				?>

				    </table>
				  </div>
				</div>
				<?php
					} 	//./if
				?>
			</div>

		</div>
		
		<br>
		<br>
	</div>

</div>

<!-- modal delete -->
<div class="modal fade modal-invite" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-envelope"></i> Invitation</h4>
			</div>
			<form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('CompanyMember/invitation_message/');?>">
				<div class="modal-body">
                  	<div class="row">
	                    <div class="col-md-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control" id="name" name="invitation_from" placeholder="From" required data-error="Please enter your name">
	                        <div class="help-block with-errors"></div>
	                      </div>                                 
	                    </div>

	                    <div class="col-md-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control" id="name" name="invitation_subject" placeholder="Subject" required data-error="Please enter your name">
	                        <div class="help-block with-errors"></div>
	                      </div>                                 
	                    </div>

	                    <div class="col-md-12">
		                    <div class="form-group"> 
	                        	<textarea class="form-control" id="message" name="invitation_message" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
	                        	<div class="help-block with-errors"></div>
	                    	</div>
	                   	</div>
                   	</div>
                   	<div class="row">
                   		<div class="col-md-3">
                   			<input style="visibility: hidden;"  type="email" name="invitation_to" value="<?php echo $talent->email; ?>">
                   		</div>
                   		<div class="col-md-3">
                   			<input style="visibility: hidden;"  type="text" name="id_company" value="<?php echo $data_id_company['id_company']; ?>">
                   		</div>
                   		<div class="col-md-3">
                   			<input style="visibility: hidden;"  type="text" name="id_talent" value="<?php echo $talent->id_talent; ?>">
                   		</div>
                   	</div>
				</div>
				<div class="modal-footer" style="display: block; text-align: center;">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<button style="width: 100%;" type="button" class="button button2" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
						</div>
						<div class="col-md-4">
							<button style="width: 100%;" class="button button1" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<br><br>

<script type="text/javascript">
	// delete cv work
	$('.modal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var delete_target = button.data('id');
        var cv_type = button.data('cv');
        var route;
        switch(cv_type) {
		    case "work":
		        route = "<?php echo site_url('talent/cv-work-experience/delete/');?>";
		        break;
		    case "education":
		        route = "<?php echo site_url('talent/cv-education/delete/');?>";
		        break;
		    case "achievement":
		        route = "<?php echo site_url('talent/cv-achievement/delete/');?>";
		        break;
		    case "course":
		        route = "<?php echo site_url('talent/cv-course/delete/');?>";
		        break;
		}
		route = route + delete_target;
        $(this).find('a').attr('href', route);
    });
</script>
<!-- 
<div class="container">
	<br>
	<br>
	<a href="http://preview.uideck.com/items/mate/" target="_blank">http://preview.uideck.com/items/mate/</a>
</div> -->