<div class="row">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<br>
		<div class="col-md-12" style="background-color: whitesmoke;">
			<div class="row">
				<!--Jobs Caategory section-->
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3" style="text-align: center; padding: 5px;">
						<input type="text" id="valCategory2" value="" style="display:none">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="Category" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span id="valCategory">Job Category</span>
								</button>
								<div class="dropdown-menu" aria-labelledby="Category">
									<p class="dropdown-item" onclick="category('Information Technology')">Information Technology</p>
									<p class="dropdown-item" onclick="category('Marketing')">Marketing</p>
									<p class="dropdown-item" onclick="category('Human Resource Development')">Human Resource Development</p>
								</div>
							</div>
						</div>
						<div class="col-md-3" style="text-align: center; padding: 5px;">
						<input type="text" id="valType2" value="" style="display:none">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="Type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span id="valType">Job Type</span>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<p class="dropdown-item" onclick="type('Full Time')">Full Time</p>
									<p class="dropdown-item" onclick="type('Part Time')">Part Time</p>
									<p class="dropdown-item" onclick="type('Internship')">Internship</p>
								</div>
							</div>
						</div>
						<div class="col-md-3" style="text-align: center; padding: 5px;">
						<input type="text" id="valBidIndustri2" value="" style="display:none">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="BidIndustri" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span id="valBidIndustri">Bidang Industri</span>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<p class="dropdown-item" onclick="bidindustri('all')">Semua Industri</p>
									<p class="dropdown-item" onclick="bidindustri('Arsitek')">Arsitek</p>
									<p class="dropdown-item" onclick="bidindustri('Industri Kimia')">Industri Kimia</p>
									<p class="dropdown-item" onclick="bidindustri('Elektronik')">Elektronik</p>
								</div>
							</div>
						</div>
						<div class="col-md-3" style="text-align: center; padding: 5px;">
							<div class="input-group">
								<input style=" border-color: black; background-color: white; color: black;" type="text" class="form-control" name="text" placeholder="Search Job . . ." required id="valDescription">
								<span class="input-group-addon" style="background-color: black; color: white;" onclick="search_job()"><i class="fa fa-search"></i></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div class="col-md-12" id="job_all">
				<!--Show Jobs list-->
				<div class="row">
					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;"><strong style="padding-top: 5px; font-size: 1.3em;">People Partner Analyst</strong></div>
							<small style="font-size: 1em;"><b>PT Dash Indo Persada</b></small>
							<p style="font-size: 1em;">Semarang, Jawa Tengah</p>
							<hr style="border: solid 1px lightgray;">
							<div style="padding-bottom: 10px;">
								<small style="font-size: 1em;">Category : </small>
								<span class="badge badge-dark">Information Technology</span>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;"><strong style="padding-top: 5px; font-size: 1.3em;">People Partner Analyst</strong></div>
							<small style="font-size: 1em;"><b>PT Dash Indo Persada</b></small>
							<p style="font-size: 1em;">Semarang, Jawa Tengah</p>
							<hr style="border: solid 1px lightgray;">
							<div style="padding-bottom: 10px;">
								<small style="font-size: 1em;">Category : </small>
								<span class="badge badge-dark">Information Technology</span>
							</div>
						</div>
					</div>

					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;"><strong style="padding-top: 5px; font-size: 1.3em;">People Partner Analyst</strong></div>
							<small style="font-size: 1em;"><b>PT Dash Indo Persada</b></small>
							<p style="font-size: 1em;">Semarang, Jawa Tengah</p>
							<hr style="border: solid 1px lightgray;">
							<div style="padding-bottom: 10px;">
								<small style="font-size: 1em;">Category : </small>
								<span class="badge badge-dark">Information Technology</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12" id="job_search" style="display:none">
			</div>
			<br>
		</div>
	</div>

	<div class="col-lg-1"></div>
</div>
<br>
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
	  
	  
	function category(x) {
	  document.getElementById("valCategory").innerHTML = ""+x+"";
	  document.getElementById("valCategory2").value = ""+x+"";
	}
	function type(y) {
	  document.getElementById("valType").innerHTML = ""+y+"";
	  document.getElementById("valType2").value = ""+y+"";
	}
	function bidindustri(z) {
	  document.getElementById("valBidIndustri").innerHTML = ""+z+"";
	  document.getElementById("valBidIndustri2").value = ""+z+"";
	}
	
	//fungsi search
	function search_job(){
		var description = document.getElementById("valDescription").value;
		var category = document.getElementById("valCategory2").value;
		var type = document.getElementById("valType2").value;		
		var bidindustri = document.getElementById("valBidIndustri2").value;		
		alert(category);
		alert(type);
		alert(bidindustri);
		document.getElementById("job_all").style.display = "none";
		document.getElementById("job_search").style.display = "block";
		$.post('<?php echo site_url('JobVacancy/search_job/'); ?>', {description:description,category:category,type:type}, function(dataJob){
			var xml = parseXml(dataJob);
			var getJob = xml.documentElement.getElementsByTagName("job");
			var div_job_search = '';
			div_job_search += '<div class="row">';
			for (var i = 0; i < getJob.length; i++) {
				var id_job = getJob[i].getAttribute("id_job");
				var id_company = getJob[i].getAttribute("id_company");
				var job_title = getJob[i].getAttribute("job_title");
				var job_category = getJob[i].getAttribute("job_category");
				var job_city_location_id = getJob[i].getAttribute("job_city_location_id");
				var job_province_location_id = getJob[i].getAttribute("job_province_location_id");
				
				div_job_search += '<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">';
					div_job_search += '<div class="col-md-12" style="background-color: white;">';
						div_job_search += '<div style="padding-top: 10px;  padding-bottom: 10px;">';
							div_job_search += '<strong style="padding-top: 5px;font-size: 1.3em;">';
								div_job_search += ''+job_title+'';
							div_job_search += '</strong>';
						div_job_search += '</div>';
						div_job_search += '<small style="font-size: 1em;"><b>'+id_company+'</b></small>';
						div_job_search += '<p style="font-size: 1em;">'+job_city_location_id+', '+job_province_location_id+'</p>';
						div_job_search += '<hr style="border: solid 1px lightgray;">';
						div_job_search += '<div style="padding-bottom: 10px;">';
							div_job_search += '<small style="font-size: 1em;">Category : </small>';
							div_job_search += '<span class="badge badge-dark">'+job_category+'</span>';
						div_job_search += '</div>';
					div_job_search += '</div>';
				div_job_search += '</div>';
				
				
				
					
			}
			div_job_search += '</div>';
			document.getElementById("job_search").innerHTML = div_job_search;
		},"text");
	}
</script>