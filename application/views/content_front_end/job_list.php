<style type="text/css">
	.page-title{
		padding-left: 15px;
		padding-right: 15px;
		font-size: 25px;
		margin-bottom: 10px;
		color: #5f5f5f;
	}
	.page-title .list-line{
		margin-top: 20px;
	}
	.list-line{
		margin-top: 0px;
		margin-bottom: 0px;
		border-top-color: lightgray;
	}
	.image-bg{
		background-size: contain;
	}
	.company-name{
		font-size: 25px;
	}
	.job-category{
		color: #777;
	}
	.job-title{
		font-size: 20px;
	}
	.apply-date > div:first-child{
		background-color: #000;
		color: #fff;
		font-weight: bold;
		padding: 7px 10px;
	}
	.apply-date > div:last-child{
		font-size: 14px;
		font-weight: bold;
		border-left: 1px solid lightgray;
		border-right: 1px solid lightgray;
		border-bottom: 1px solid lightgray;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
		padding: 20px 10px;
	}
	.apply-date span{
		font-size: 20px;
	}
	.vacancy{
		padding-top: 30px;
		padding-bottom: 30px;
	}

	#job_search h5{
		font-size: 20px;
	}

	/* Pagination */
	.pagination{
		margin-top: 70px;
		padding-right: 15px;
	}
	.pagination li{
	    border: 1px solid lightgray;
	    background-color: #fff;
	    float: left;
	}
	.pagination li:nth-child(n+2){
		margin-left: -1px;
	}
	.pagination li a{
	    padding: 5px 15px;
	    color: #000;
	    display: inline-block;
	}
	.pagination .curlink{
	    padding: 5px 15px;
	    color: #fff;
	    background-color: #000;
	    border-color: #000;
	}
	.pagination li:first-child{
		border-top-left-radius: 4px;
		border-bottom-left-radius: 4px;
	}
	.pagination li:last-child{
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
	}

</style>
<div class="row">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<br>
		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1" style="padding: 30px; background-color: white; box-shadow: 1px 3px 10px lightgrey;">
				<div class="row">
					<!--Jobs Category section-->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3" style="text-align: center; padding: 5px;">
								<select style="width: 100%; height: 50px; border: 1px solid black; background-color: white; color: black;" id="valCategory">
									<option value="">-- Job Category --</option>
	                                <?php
	                                    foreach ($job_category as $key=>$category) 
	                                    { ?>
	                                        <option value="<?php echo $key;?>"><?php echo $category;?></option>';   
	                                    <?php } ?>
								</select>
							</div>
							<div class="col-md-3" style="text-align: center; padding: 5px;">
								<select style="width: 100%; height: 50px; border: 1px solid black; background-color: white; color: black;" id="valType">
									<option value="">-- Job Type --</option>
	                                <?php
	                                    foreach ($job_type as $key=>$type) 
	                                    { ?>
	                                        <option value="<?php echo $key;?>"><?php echo $type;?></option>';   
	                                    <?php } ?>
								</select>
							</div>
							<div class="col-md-3" style="text-align: center; padding: 5px;">
								<select style="width: 100%; height: 50px; border: 1px solid black; background-color: white; color: black;" id="valProvince">
									<option value="">-- Location Province --</option>
	                                <?php
	                                    foreach ($lokasiProvinsi as $key=>$provinsi) 
	                                    { ?>
	                                        <option value="<?php echo $provinsi['lokasi_ID'];?>"><?php echo $provinsi['lokasi_nama'];?></option>';   
	                                    <?php } ?>
								</select>
							</div>
							<div class="col-md-3" style="text-align: center; padding: 5px;">
								<div class="input-group">
									<input style="height: 100%; border: 1px solid black; background-color: white; color: black;" type="text" class="form-control" name="text" placeholder="Search Job . . ." required id="valDescription">
									<span class="input-group-addon" style="background-color: black; color: white;" onclick="search_job()"><i class="fa fa-search"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-sm-12 col-md-10 col-md-offset-1" style="padding: 30px; min-height: 500px; background-color: white; box-shadow: 1px 3px 10px lightgrey; margin-top: 20px;">
				<div class="page-title">
					List Vacancy
					<hr class="list-line">
				</div>
				

				<div class="col-md-12" id="job_all">
					<!--Show Jobs list-->
					<?php
						if($jobs_list != null) {
							$i=0;
							foreach ($jobs_list as $job){
					?>
						<div class="row vacancy">
							<div class="col-md-3">
								<?php if($job->company_logo != "") {?>
								<figure class="image-bg" style="height: 130px; background-image: url('<?php echo base_url('asset/img/upload_img_company/').$job->company_logo;?>');"></figure>
								<?php } else{ ?>
								<figure class="image-bg" style="height: 130px; background-image: url('<?php echo base_url('asset/img/company-default.png'); ?>');"></figure>
								<?php }?>
							</div>
							<div class="col-md-6" style="padding-left: 35px; padding-right: 35px;">
								<h3 class="company-name"><?php echo $job->company_name; ?></h3>
								<div class="job-category">Category: <?php echo $job_category[$job->job_category]; ?></div>
								<br>
								<a class="job-title" href="<?php echo site_url('JobVacancy/detail_job/'. $job->id_job);?>"><b><?php echo $job->job_title; ?></b></a>
							</div>
							<div class="col-md-3">
								<div class="text-center apply-date">
									<div>Apply Date</div>
									<div>
										<?php
										echo "<span>".date("j",strtotime($job->job_date_start))."</span> ".
										date("F", strtotime($job->job_date_end))." - ".
										"<span>".date("j", strtotime($job->job_date_end))."</span> ".
										date("F", strtotime($job->job_date_end));
										?>
									</div>
								</div>
							</div>

						</div>
						<hr class="list-line">

						<?php $i++;} } ?>
						
				</div>
				<div class="col-md-12" id="job_search" style="display:none; margin-top: 30px;">
				</div>

				<div class="clearfix"></div>
				
			<!-- Pagination -->
			<?php if (isset($links)) { ?>

				<div class="clearfix">
					<div class="pagination pull-right">
		            	<?php echo $links ?>
		            </div>
	            </div>

	        <?php } ?>

			</div>
		</div>
	</div>

	<div class="col-lg-1"></div>
</div>
<script>
	function parseXml(str) {
		  if (window.ActiveXObject) {
			var doc = new ActiveXObject('Microsoft.XMLDOM');
			doc.loadXML(str);
			return doc;
		  } else if (window.DOMParser) {
			return (new DOMParser).parseFromString(str, 'text/xml');
		  }
	  }
	  
	  
	
	//fungsi search
	function search_job(){
		var description = document.getElementById("valDescription").value;
		var category = $('#valCategory').val();
		var type = $('#valType').val();
		var province = $('#valProvince').val();
		var base_url = "<?php echo site_url(''); ?>";
		
		document.getElementById("job_all").style.display = "none";
		document.getElementById("job_search").style.display = "block";
		$.post('<?php echo site_url('JobVacancy/search_job/'); ?>', {description:description,category:category,type:type,province:province}, function(dataJob){
			var xml = parseXml(dataJob);
			var getJob = xml.documentElement.getElementsByTagName("job");
			var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			var div_job_search = '';
			div_job_search += '<div class="row">';
			if(getJob.length==0){
				div_job_search += '<div class="col-md-2"></div>';
				div_job_search += '<div class="col-md-8">';
					div_job_search += '<h5 style=" text-align: center;">Job Vacancy Not Available</h5>';
				div_job_search += '</div>';
				div_job_search += '<div class="col-md-2"></div>';
			} else {
				for (var i = 0; i < getJob.length; i++) {
					var id_job = getJob[i].getAttribute("id_job");
					var id_company = getJob[i].getAttribute("id_company");
					var company_name = getJob[i].getAttribute("company_name");
					var job_title = getJob[i].getAttribute("job_title");
					var job_category = getJob[i].getAttribute("job_category");
					var job_city_location_id = getJob[i].getAttribute("job_city_location_id");
					var job_province_location_id = getJob[i].getAttribute("job_province_location_id");
					var date_start = new Date(""+getJob[i].getAttribute("job_date_start")+"");
					var date_end = new Date(""+getJob[i].getAttribute("job_date_end")+"");
					var d_start = date_start.getDate();
					var d_end = date_end.getDate();
					var month_start = months[date_start.getMonth()];
					var month_end = months[date_end.getMonth()];
					var year_start = date_start.getFullYear();
					var year_end = date_end.getFullYear();
							
					div_job_search += '<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">';
						div_job_search += '<div class="col-md-12" style="background-color: white;">';
							div_job_search += '<div style="padding-top: 10px;  padding-bottom: 10px;">';
								div_job_search += '<strong style="padding-top: 5px;font-size: 1.3em;">';
									div_job_search += '<a href="'+base_url+'JobVacancy/detail_job/'+id_job+'">'+job_title+'</a>';
								div_job_search += '</strong>';
							div_job_search += '</div>';
							div_job_search += '<div class="row">';
								div_job_search += '<div class="col-md-8">';
									div_job_search += '<small style="font-size: 1em;"><b>'+company_name+'</b></small>';
									div_job_search += '<p style="font-size: 1em;">'+titleCase(job_city_location_id)+', '+job_province_location_id+'</p>';
								div_job_search += '</div>';
								div_job_search += '<div class="col-md-4" style="height: 65px;">';
									div_job_search += '<div style="padding: 5px; text-align: center; border-radius: 5px; border: solid 1px black; background-color: black; opacity: 0.8; color: white;">';
										div_job_search += '<small><b>Batas Pendaftaran</b></small>';
										div_job_search += '<hr style="border: solid 1px lightgray; margin-top: 0px; margin-bottom: 0px;">';
										div_job_search += '<small style="font-size: 1em;">';
											div_job_search += ''+d_start+' '+month_start+' - '+d_end+' '+month_end+' '+year_end+'';
										div_job_search += '</small>';
									div_job_search += '</div>';
								div_job_search += '</div>';
							div_job_search += '</div>';
							div_job_search += '<hr style="border: solid 1px lightgray;">';
							div_job_search += '<div style="padding-bottom: 10px;">';
								div_job_search += '<small style="font-size: 1em;">Category : </small>';
								div_job_search += '<span class="badge badge-dark">'+job_category+'</span>';
							div_job_search += '</div>';
						div_job_search += '</div>';
					div_job_search += '</div>';
				}
			}
			div_job_search += '</div>';
			document.getElementById("job_search").innerHTML = div_job_search;
		},"text");
	}
	
	function titleCase(str) {
	  return str.split(' ').map(function(val){ 
		return val.charAt(0).toUpperCase() + val.substr(1).toLowerCase();
	  }).join(' ');
	}
</script>