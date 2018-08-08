<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="row">
				<div class="col-md-2" style="text-align: center; padding: 5px;">
					<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;border-radius:5px" id="valGender">
						<option value="">-- Gender --</option>
						<?php
							foreach ($gender_list as $key=>$gender) 
							{ ?>
								<option value="<?php echo $key;?>"><?php echo $gender;?></option>';   
							<?php } ?>
					</select>
				</div>
				<div class="col-md-2" style="text-align: center; padding: 5px;">
					<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;border-radius:5px" id="valMarital">
						<option value="">-- Marital --</option>
						<?php
							foreach ($marital_list as $key=>$marital) 
							{ ?>
								<option value="<?php echo $key;?>"><?php echo $marital;?></option>';   
							<?php } ?>
					</select>
				</div>
				<div class="col-md-3" style="text-align: center; padding: 5px;">
					<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;border-radius:5px" id="valProvince">
						<option value="">-- Location Province --</option>
						<?php
							foreach ($lokasiProvinsi as $key=>$provinsi) 
							{ ?>
								<option value="<?php echo $provinsi['lokasi_propinsi'];?>"><?php echo $provinsi['lokasi_nama'];?></option>';   
							<?php } ?>
					</select>
				</div>
				<div class="col-md-2" style="text-align: center; padding: 5px;">
					<select style="width: 100%; height: 50px; border-color: black; background-color: white; color: black;border-radius:5px" id="valEducation">
						<option value="">-- Education --</option>
						<option value="SMP">SMP</option>';  
						<option value="SMA">SMA</option>';  
						<option value="Diploma I">Diploma I</option>';  
						<option value="Diploma II">Diploma II</option>';  
						<option value="Diploma III">Diploma III</option>';  
						<option value="Diploma IV/ Sarjana">Diploma IV/ Sarjana</option>';  
						<option value="Magister">Magister</option>';  
						<option value="Doktor">Doktor</option>';  
					</select>
				</div>
				<div class="col-md-3" style="text-align: center; padding: 5px;">
					<div class="input-group">
						<input style="height: 100%; border-color: black; background-color: white; color: black;" type="text" class="form-control" name="text" placeholder="Search Instansi . . ." required id="valInstansi">
						<span class="input-group-addon" style="background-color: black; color: white;" onclick="search_talent()"><i class="fa fa-search"></i></span>
					</div>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div  id="talent-list">
			<div class="row">
				<?php foreach ($talent_list as $talent){?>
				<div class="col-md-4">
					<div class="bg-talent" style="height:100px background-color: white; box-shadow: 1px 5px 20px lightgrey;">
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

						<div class="card" style="height: 270px; background-color: white; box-shadow: 1px 5px 20px lightgrey;">
							<div class="card-body">
								<div style="padding: 10px;">
									<div class="text-center profile-attribute">
										<!-- Name | Age | City -->
										<a href="<?php echo base_url('TalentList/detail_talent/'.$talent->id_talent)?>"><span><?php echo $talent->nama; ?></span> </a>
										<br>
										<span><?php echo countAge($talent->tanggal_lahir); ?> Tahun</span> |
										<span><?php echo displayGender($talent->jenis_kelamin); ?></span> |
										<span><?php echo displayMaritalStatus($talent->status_pernikahan); ?></span>
									</div>
									<br>
									<!-- contact -->
									<div class="contact-talent">
										<div class="text-center">
											<span><i class="fa fa-envelope"></i> <?php echo $talent->email; ?></span> | 
											<span><i class="fa fa-phone"></i> <?php echo $talent->nomor_ponsel; ?></span>
											<br>
											<span><i class="fa fa-home"></i> <?php echo ucwords(strtolower($talent->city));?></span>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<?php } ?>
				</div>
				<div class="col-md-12">
				<?php if (isset($links)) { ?>
					<br>
					<br>
					<div class="pagination">
						<?php echo $links ?>
					</div>
					<br>
				<?php } ?>
				</div>
			</div>
			<div id="talent-search" style="display:none">
			
			</div>
			<!-- Pagination -->
		
		</div>
	</div>
</div>


<script type="text/javascript">
	function parseXml(str) {
		  if (window.ActiveXObject) {
			var doc = new ActiveXObject('Microsoft.XMLDOM');
			doc.loadXML(str);
			return doc;
		  } else if (window.DOMParser) {
			return (new DOMParser).parseFromString(str, 'text/xml');
		  }
	  }
	
	function search_talent(){
		
		
		var gender = $('#valGender').val();
		var marital = $('#valMarital').val();
		var province = $('#valProvince').val();
		var education = $('#valEducation').val();
		var instansi = $('#valInstansi').val();
		var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
		
		document.getElementById("talent-list").style.display = "none";
		document.getElementById("talent-search").style.display = "block";
		$.post('<?php echo site_url('TalentList/talent_search/'); ?>', {gender:gender,marital:marital,province:province,education:education,instansi:instansi}, function(dataTalent){
			
			var xml = parseXml(dataTalent);
			var getTalent = xml.documentElement.getElementsByTagName("talent");
			var div_talent_search = '';
			div_talent_search += '<div class="row">';
			for (var i = 0; i < getTalent.length; i++) {
				var id_talent = getTalent[i].getAttribute("id_talent");
				var nama = getTalent[i].getAttribute("nama");
				var email = getTalent[i].getAttribute("email");
				var nomor_ponsel = getTalent[i].getAttribute("nomor_ponsel");
				var tanggal_lahir = getTalent[i].getAttribute("tanggal_lahir");
				var jenis_kelamin = getTalent[i].getAttribute("jenis_kelamin");
				var status_pernikahan = getTalent[i].getAttribute("status_pernikahan");
				var provinsi = getTalent[i].getAttribute("provinsi");
				var kota = getTalent[i].getAttribute("kota");
				var foto_sampul = getTalent[i].getAttribute("foto_sampul");
				var foto_profil = getTalent[i].getAttribute("foto_profil");
				var umur = ageYear(tanggal_lahir);
				if(foto_sampul===""){
					var sampul = base_url+'asset/img/bg-default.jpg';
				} else {
					var sampul = base_url+'asset/img/upload_img_talent_bg_profile/'+foto_sampul;
				}
				if(foto_profil===""){
					var profil = base_url+'asset/img/talent-default.png';
				} else {
					var profil = base_url+'asset/img/upload_img_talent_profile/'+foto_profil;
				}
				div_talent_search += '<div class="col-md-4">';
					div_talent_search += '	<div class="bg-talent" style="height:100px">';
					div_talent_search += '<figure class="image-bg" style="background-image: url(';
					div_talent_search += "'";
					div_talent_search += sampul;
					div_talent_search += "'";
					div_talent_search += ');"></figure>';
					div_talent_search += '</div>';
					div_talent_search += '<div class="profile">';
						div_talent_search += '<div class="img-talent">';
						div_talent_search += '<figure class="image-bg" style="background-image: url(';
						div_talent_search += "'";
						div_talent_search += profil;
						div_talent_search += "'";
						div_talent_search += ');"></figure>';
						div_talent_search += '</div>';
						div_talent_search += '<div class="card">';
							div_talent_search += '<div class="card-body">';
								div_talent_search += '<div style="padding: 10px;">';
									div_talent_search += '<div class="text-center profile-attribute">';
										div_talent_search += '<a href="'+base_url+'TalentList/detail_talent/'+id_talent+'"><span>'+nama+'</span></a>';
										div_talent_search += '	<br>';
										div_talent_search += '	<span>'+umur+' Tahun</span> | ';
										div_talent_search += '<span>'+jenis_kelamin+'</span> | ';
										div_talent_search += '<span>'+status_pernikahan+'</span>';
									div_talent_search += '</div>';
									div_talent_search += '<br>';
									div_talent_search += '<div class="contact-talent">';
										div_talent_search += '<div class="text-center">';
											div_talent_search += '<span><i class="fa fa-envelope"></i>'+email+'</span> | ';
											div_talent_search += '<span><i class="fa fa-phone"></i>'+nomor_ponsel+'</span>';
											div_talent_search += '<br>';
											div_talent_search += '<span><i class="fa fa-home"></i>'+titleCase(kota)+'</span>';
										div_talent_search += '</div>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';
							div_talent_search += '</div>';
						div_talent_search += '</div>';
					div_talent_search += '</div>';
				div_talent_search += '</div>';
			}
			div_talent_search += '</div>';
			document.getElementById("talent-search").innerHTML = div_talent_search;
		},"text");
		
	}
	function titleCase(str) {
	  return str.split(' ').map(function(val){ 
		return val.charAt(0).toUpperCase() + val.substr(1).toLowerCase();
	  }).join(' ');
	}
	
	function ageYear(date){
		var d = new Date(""+date+"");
		var d2 = new Date();
		var date_now = d2.getDate();
		var date_lahir = d.getDate();
		var month_now = d2.getMonth();
		var month_lahir = d.getMonth();
		var year_now = d2.getFullYear();
		var year_lahir = d.getFullYear();
		
		if((date_now-date_lahir)<0){
			if(((month_now-1)-month_lahir)<0){
				var umur = (year_now-1)-year_lahir;    
			} else {
				var umur = year_now - year_lahir;
			}
		} else {
			if((month_now-month_lahir)<0){
				var umur = (year_now-1)-year_lahir;    
			} else {
				var umur = year_now - year_lahir;
			}
		}
		
		return umur;
	}
</script>
<!-- 
<div class="container">
	<br>
	<br>
	<a href="http://preview.uideck.com/items/mate/" target="_blank">http://preview.uideck.com/items/mate/</a>
</div> -->