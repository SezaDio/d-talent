<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>

		<div class="col-lg-10" style="background-color: white; padding: 20px; border: solid 1px lightgray; box-shadow: 5px 10px 12px lightgrey;">
			<p style="font-size: 1.5em; text-align: center;"><strong>Add Job</strong></p>
			<hr style="border: solid 1px lightgray;">
			<form method="post" action="<?php echo site_url('CompanyMember/add_jobs_page/');?>">

				<?php 
					$this->load->library('form_validation');
					echo validation_errors(); 
				?>

				<?php 
					if($this->session->flashdata('msg_berhasil')!='')
					{?>
                        <div class="alert alert-success alert-dismissable">
                            <i class="glyphicon glyphicon-ok"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('msg_berhasil');?> 
                        </div>
              <?php }
              		elseif ($this->session->flashdata('msg_gagal')!='')
              		{ ?>
                		 <div class="alert alert-warning alert-dismissable">
                            <i class="glyphicon glyphicon-remove"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('msg_gagal');?> 
                        </div>
              <?php } ?>

              	<!--Job Title-->
				<div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Title</strong></label>
					<div class="row">
						<div class="col-md-8">
                        	<input placeholder="" style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_title" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
						</div>
					</div> 
                </div>

                <!--Job Type-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Type</strong></label>
					<div class="row">
						<div class="col-md-8">
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="job_type" required class="form-control" id="kategori">
                                <option value="">-- Job Type --</option>
                                <?php
                                    foreach ($job_type as $key=>$type) 
                                    {
                                      
                                        echo '<option value="'.$key.'">'.$type.'</option>';   
                                    }
                                ?>
                            </select>
						</div>
					</div> 
                </div>

                <!--Role (Posisi)-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Role (Posisi)</strong></label>
					<div class="row">
						<div class="col-md-8">
                        	<input placeholder="" style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_role" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
						</div>
					</div> 
                </div>

                <!--Job Category-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Category</strong></label>
					<div class="row">
						<div class="col-md-8">
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="job_category" required class="form-control" id="kategori">
                                <option value="">-- Job Category --</option>
                                <?php
                                    foreach ($job_category as $key=>$category) 
                                    {
                                      
                                        echo '<option value="'.$key.'">'.$category.'</option>';   
                                    }
                                ?>
                            </select>
						</div>
					</div> 
                </div>

                <!--Job Category-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Location</strong></label>
					<div class="row">
						<div class="col-md-6">
							<label>Provinsi</label>
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="provinsi" onchange="ajax_post();" id="lokasi_provinsi" required class="form-control">
                                <option value="All">--Pilih Lokasi Provinsi--</option>
	                            <?php
	                                foreach ($lokasiProvinsi as $key=>$provinsi) 
	                                {
	                                  
	                                    echo '<option value="'.$key.'">'.$provinsi['lokasi_nama'].'</option>';   
	                                }
	                            ?>
                            </select>
						</div>
						<div class="col-md-6">
							<label>Kabupaten/Kota</label>
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;"name="kota" id="lokasi_kota" required class="form-control">
                                <option value="All">--Pilih Lokasi Kota--</option>
	                            <?php
	                                foreach ($lokasiKabupatenKota as $key=>$kota) 
	                                {
	                                  
	                                    echo '<option value="'.$key.'">'.$kota['lokasi_nama'].'</option>';   
	                                }
	                            ?>
                            </select>
						</div>
					</div> 
                </div>

                <!--Waktu Pendaftaran-->
                <label for="exampleInputEmail1"><strong>Waktu Pendaftaran</strong></label>
                <div class="row">
                	<div class="col-md-6">
                		<div class="form-group">
							<label for="exampleInputEmail1">Mulai</label>
							<div class="row">
								<div class="col-md-8">
		                        	<input id="datetimepicker4" placeholder="Tanggal Mulai . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_start_date" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
								</div>
							</div> 
		                </div>
                	</div>
                	<div class="col-md-6">
                		<div class="form-group">
							<label for="exampleInputEmail1">Tutup</label>
							<div class="row">
								<div class="col-md-8">
		                        	<input id="datetimepicker5" placeholder="Tanggal Tutup . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_end_date" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
								</div>
							</div> 
		                </div>
                	</div>
                </div>

                <!--Job Description-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Description</strong></label>
					<div class="row">
						<div class="col-md-12">
                        	<textarea style="border-color: black; background-color: white; color: black;" class="form-control" id="about_us" name="job_description" placeholder="Describe the job description, requirement, etc . . ." rows="8" data-error="Write your message" required></textarea>
						</div>
					</div> 
                </div>

                <!--Required Skills-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Required Skills</strong></label>
					<div class="row" style="padding-bottom: 10px;">
						<div class="col-md-8">
                        	<input placeholder="" style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_skills" class="form-control" value="<?php //echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
						</div>
						<div class="col-md-1">
							<button id="add_field" style="margin: unset; padding-left: 16px;" type="button" class="button button1"><i class="fa fa-plus"></i></button>
						</div>
					</div> 
					
					<div id="tambah_field"> </div>
                </div>
                <hr style="border: solid 1px lightgray;"><br>

				<!--Section Tombol Cancel dan Save-->
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-2">
						<a href="<?php echo site_url('CompanyMember/updates_page'); ?>" class="button button3"><i class="fa fa-cross"></i> Cancel</a>
					</div>
					<div class="col-md-2">
						<button value="1" class="button button1" type="submit"><i class="fa fa-save"></i> Save</button>
					</div>
					<div class="col-md-4"></div>
				</div>

			</form>
		</div>
		
		<div class="col-lg-1"></div>
	</div><br><br>
</div>

	<script type="text/javascript">
		var counter = 0;
		
		$(function () {
            $('#datetimepicker4').datepicker({
            	format: 'yyyy-mm-dd'
            });

            $('#datetimepicker5').datepicker({
            	format: 'yyyy-mm-dd'
            });
        });

		function ajax_post()
		{
			var id_provinsi = document.getElementById("lokasi_provinsi").value;
			$.ajax({
				url: '../AccountTalent/lokasi_kabupaten_kota',	
				type: 'POST',
				data: {id_provinsi:id_provinsi},
				success: function(respData){
							var cTotal = respData.kota.length;
							var ctr;

							// clear options
							$('#lokasi_kota').html('<option value="All">--Pilih Lokasi Kota--</option>');
							for ( ctr = 0; ctr < cTotal; ctr++) 
							{
								$('#lokasi_kota').append('<option value="'+respData.kota[ctr].id+'">'+respData.kota[ctr].name+'</option>');
							}
						}
			});
		}

        $('button#add_field').click(function(){
            counter += 1;
			var tambah_field = '';
			tambah_field += '<div class="row" id="field_'+counter+'">';
			
			tambah_field += '<div class="col-md-8"><input style="border-color: black; background-color: white; color: black;" class="form-control" id="field_' + counter + '" name="job_skills[]' + '" type="text" placeholder="Company Specialties . . ." /><br /></div>';
            
			tambah_field += '<div class="col-md-1" style="text-align: center;">';
				tambah_field += '<button style="padding-left: 16px; height: 40px;" onclick="delete_field('+counter+')" type="button" class="button button3">';
					tambah_field += '<i class="fa fa-minus"></i>';
				tambah_field += '</button>';
			tambah_field += '</div>';
			
			tambah_field += '</div>';
			$('#tambah_field').append(tambah_field);
        });

        function delete_field(z){
			document.getElementById('field_'+z+'').remove();
		}
	</script>