<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Template Company Profile/css/bootstrap.min.css')?>">
<!-- summernote -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/plugins/summernote/dist/summernote-bs4.css')?>">
<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>

		<div class="col-lg-10" style="background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
			<p style="font-size: 1.5em; text-align: center;"><strong><i class="fa fa-plus"></i> Add Vacancy</strong></p>
			<hr style="border: solid 1px black;">
			<form method="post" action="<?php echo site_url('company/job-vacancy/store');?>">

				<?php 
					$this->load->library('form_validation');
					echo validation_errors(); 
				?>

              	<!--Job Title-->
				<div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Title</strong></label>
					<div class="row">
						<div class="col-md-12">
                        	<input placeholder="" style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_title" class="form-control" value="<?php echo set_value('job_title'); ?>">
						</div>
					</div> 
                </div>

                <!--Job Type-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Type</strong></label>
					<div class="row">
						<div class="col-md-12">
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="job_type" required class="form-control" id="kategori">
                                <option value="">-- Job Type --</option>
                                <?php
                                    foreach ($job_type as $key=>$type) 
                                    {
                                      
                                        echo '<option value="'.$key.'"'. (set_value('job_type')==$key? "selected" : "") .'>'.$type.'</option>';   
                                    }
                                ?>
                            </select>
						</div>
					</div> 
                </div>

                <!--Role (Posisi)-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Role (Position)</strong></label>
					<div class="row">
						<div class="col-md-12">
                        	<input placeholder="Example : Staff, Manager, etc . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_role" class="form-control" value="<?php echo set_value('job_role'); ?>">
						</div>
					</div> 
                </div>

                <!--Job Category-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Category</strong></label>
					<div class="row">
						<div class="col-md-12">
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="job_category" required class="form-control" id="kategori">
                                <option value="">-- Job Category --</option>
                                <?php
                                    foreach ($job_category as $key=>$category) 
                                    {
                                      
                                        echo '<option value="'.$key.'"'. (set_value('job_category')==$key? "selected" : "") .'>'.$category.'</option>';   
                                    }
                                ?>
                            </select>
						</div>
					</div> 
                </div>

                <!--Job Location-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Job Placement</strong></label>
					<div class="row">
						<div class="col-md-6">
							<label>Province</label>
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="job_province_location_id" onchange="ajax_post();" id="lokasi_provinsi" required class="form-control">
                                <option value="All">--Choose Province--</option>
	                            <?php
	                                foreach ($lokasiProvinsi as $key=>$provinsi) 
	                                {
	                                    echo '<option value="'.$provinsi['lokasi_ID'].'" data-id-provinsi="'.$key.'">'.$provinsi['lokasi_nama'].'</option>';   
	                                }
	                            ?>
                            </select>
						</div>
						<div class="col-md-6">
							<label>City</label>
                        	<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;" name="job_city_location_id" id="lokasi_kota" required class="form-control">
                                <option value="All">--Choose City--</option>
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
                <label for="exampleInputEmail1"><strong>Registration Periode</strong></label>
                <div class="row">
                	<div class="col-md-6">
                		<div class="form-group">
							<label for="exampleInputEmail1">Start</label>
							<div class="row">
								<div class="col-md-8">
		                        	<input id="datetimepicker4" placeholder="Start Date . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_date_start" class="form-control" value="<?php echo set_value('job_date_start'); ?>">
								</div>
							</div> 
		                </div>
                	</div>
                	<div class="col-md-6">
                		<div class="form-group">
							<label for="exampleInputEmail1">End</label>
							<div class="row">
								<div class="col-md-8">
		                        	<input id="datetimepicker5" placeholder="End Date . . ." style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_date_end" class="form-control" value="<?php echo set_value('job_date_end'); ?>">
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
                        	<textarea  id="summernote" name="job_description" required><?php echo set_value('job_description'); ?></textarea>
						</div>
					</div> 
                </div>

                <!--Required Skills-->
                <div class="form-group">
					<label for="exampleInputEmail1"><strong>Required Skills</strong></label>
					<div class="row" style="padding-bottom: 10px;">
						<div class="col-md-8">
                        	<input placeholder="" style="width: 100%; border-color: black; background-color: white; color: black;" type="text" required name="job_required_skill[]" class="form-control" value="">
						</div>
						<div class="col-md-1">
							<button id="add_field" style="margin: unset; padding-left: 16px;" type="button" class="button button1"><i class="fa fa-plus"></i></button>
						</div>
					</div> 
					
					<div id="tambah_field"> </div>
                </div>
                <hr style="border: solid 1px black;"><br>

				<!--Section Tombol Cancel dan Save-->
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-2">
						<a href="<?php echo site_url('company/job-vacancy'); ?>" class="button button3"><i class="fa fa-cross"></i> Cancel</a>
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
			// get id provinsi from data attribute on option
			var id_provinsi = $('option:selected', '#lokasi_provinsi').data('id-provinsi');
			$.ajax({
				url: '<?php echo site_url('AccountTalent/lokasi_kabupaten_kota')?>',	
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
			
			tambah_field += '<div class="col-md-8"><input style="border-color: black; background-color: white; color: black;" class="form-control" id="field_' + counter + '" name="job_required_skill[]' + '" type="text" /><br /></div>';
            
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

		// validate form
        $('form').on('submit', function(e) {
        	var job_date_start  = $('input[name="job_date_start"]').val();
        	var job_date_end 	= $('input[name="job_date_end"]').val();
        	
        	if (job_date_end < job_date_start) {
        		e.preventDefault();
        		alert('Tanggal akhir tidak boleh lebih kecil dari tanggal awal');
        		// scroll
				$('html, body').animate({
			        scrollTop: $("input[name=job_date_end]").offset().top - 155
			    }, 200);
        	}
        });
	</script>