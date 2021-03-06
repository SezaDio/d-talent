<?php
	$this->load->helper('text');
	$this->load->helper('custom');
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12" style="min-height: 510px;">
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
						<input style="height: 100%; border-color: black; background-color: white; color: black;" type="text" class="form-control" name="text" placeholder="Search education institution . . ." required id="valInstansi">
						<span class="input-group-addon" style="background-color: black; color: white;" onclick="search_talent()"><i class="fa fa-search"></i></span>
					</div>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div  id="talent-list">
			<div class="row">
				<?php foreach ($talent_list as $talent){?>
				<div class="col-md-12" style="padding-left: 30px; padding-right: 30px;">
					<div class="profile">
						<div class="row" style="background-color: white; box-shadow: 1px 5px 20px lightgrey; padding: 20px;">
							<div class="col-md-2" style="text-align: -webkit-center;">
								<div class="img-talent" style="width: 100px; height: 100px; border: 1px solid #ccc; border-radius: 55px; background-color: #fefefe; position: unset; transform: none; z-index: 10; overflow: hidden;">
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
							</div>
							<div class="col-md-3">
								<div class="profile-attribute" style="text-align: center;">
									<a href="<?php echo base_url('TalentList/detail_talent/'.$talent->id_talent)?>"><span><strong><?php echo $talent->nama; ?></strong></span> </a>
								</div>
							</div>
							<div class="col-md-1">
								<div class="profile-attribute" style="text-align: center;">
									<span><?php echo displayGender($talent->jenis_kelamin); ?></span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="profile-attribute" style="text-align: center;">
									<span><?php echo displayMaritalStatus($talent->status_pernikahan); ?></span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="profile-attribute" style="text-align: center;">
									<span><?php echo ucwords(strtolower($talent->city));?></span>
								</div>
							</div>
							<div class="col-md-2">
								<div style="margin-top: 25px; text-align: center;">
									<a href="<?php echo base_url('TalentList/detail_talent/'.$talent->id_talent)?>">
										<button type="button" class="button button1"><i class="fa fa-eye"></i> View</button>
									</a>
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
		var base_url = "<?php echo site_url(''); ?>";
		
		document.getElementById("talent-list").style.display = "none";
		document.getElementById("talent-search").style.display = "block";
		$.post('<?php echo site_url('TalentList/talent_search/'); ?>', {gender:gender,marital:marital,province:province,education:education,instansi:instansi}, function(dataTalent){
			
			var xml = parseXml(dataTalent);
			var getTalent = xml.documentElement.getElementsByTagName("talent");
			var div_talent_search = '';
			div_talent_search += '<div class="row">';
			if(getTalent.length==0)
			{	
				div_talent_search += '<div class="col-md-12" style="background-color: white; box-shadow: 1px 5px 20px lightgrey; padding: 20px;">';
					div_talent_search += '<p style="font-size: 1.5em; text-align: center;"><b>Talent not found !</b></p>';
				div_talent_search += '</div>';
			}
			else
			{
				for (var i = 0; i < getTalent.length; i++) 
				{
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
					div_talent_search += '<div class="col-md-12" style="padding-left: 30px; padding-right: 30px;">';
						div_talent_search += '<div class="profile">';
							div_talent_search += '<div class="row" style="background-color: white; box-shadow: 1px 5px 20px lightgrey; padding: 20px;">';
								
								div_talent_search += '<div class="col-md-2" style="text-align: -webkit-center;">';
									div_talent_search += '<div class="img-talent" style="width: 100px; height: 100px; border: 1px solid #ccc; border-radius: 55px; background-color: #fefefe; position: unset; transform: none; z-index: 10; overflow: hidden;">';
										div_talent_search += '<figure class="image-bg" style="background-image: url(';
											div_talent_search += "'";
											div_talent_search += profil;
											div_talent_search += "'";
										div_talent_search += ');"></figure>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';

								div_talent_search += '<div class="col-md-3">';
									div_talent_search += '<div class="profile-attribute" style="text-align: center;">';
										div_talent_search += '<a href="'+base_url+'TalentList/detail_talent/'+id_talent+'"><span>'+nama+'</span></a>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';

								div_talent_search += '<div class="col-md-1">';
									div_talent_search += '<div class="profile-attribute" style="text-align: center;">';
										div_talent_search += '<span>'+jenis_kelamin+'</span>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';

								div_talent_search += '<div class="col-md-2">';
									div_talent_search += '<div class="profile-attribute" style="text-align: center;">';
										div_talent_search += '<span>'+status_pernikahan+'</span>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';

								div_talent_search += '<div class="col-md-2">';
									div_talent_search += '<div class="profile-attribute" style="text-align: center;">';
										div_talent_search += '<span>'+titleCase(kota)+'</span>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';

								div_talent_search += '<div class="col-md-2">';
									div_talent_search += '<div style="margin-top: 25px; text-align: center;">';
										div_talent_search += '<a href="'+base_url+'TalentList/detail_talent/'+id_talent+'">';
											div_talent_search += '<button type="button" class="button button1"><i class="fa fa-eye"></i> View</button>';
										div_talent_search += '</a>';
									div_talent_search += '</div>';
								div_talent_search += '</div>';

							div_talent_search += '</div>';

							div_talent_search += '<div class="col-md-2">';
								div_talent_search += '<div style="margin-top: 25px; text-align: center;">';
									div_talent_search += '<a href="'+base_url+'TalentList/detail_talent/'+id_talent+'">';
										div_talent_search += '<button type="button" class="button button1"><i class="fa fa-eye"></i> View</button>';
									div_talent_search += '</a>';
								div_talent_search += '</div>';
							div_talent_search += '</div>';

						div_talent_search += '</div>';
					div_talent_search += '</div>';
				}
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