<div class="row">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<br>
		<div class="col-md-12" style="background-color: whitesmoke;">
			<div class="row">
				<!--Jobs Caategory section-->
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4" style="text-align: center; padding: 5px;">
						<input type="text" id="valCategory2" value="">
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
						<div class="col-md-4" style="text-align: center; padding: 5px;">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pendidikan
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<p class="dropdown-item">Magister (S2)</p>
									<p class="dropdown-item">Sarjana (S1)</p>
									<p class="dropdown-item">Diploma (D3)</p>
								</div>
							</div>
						</div>
						<div class="col-md-4" style="text-align: center; padding: 5px;">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Bidang Industri
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<p class="dropdown-item">Semua Industri</p>
									<p class="dropdown-item">Arsitek</p>
									<p class="dropdown-item">Industri Kimia</p>
									<p class="dropdown-item">Elektronik</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<button class="button button1 dropdown-toggle" type="button" style="background-color: #0066ff;border:#0066ff;">
									Search
							</button>
						</div>
					</div>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div class="col-md-12">
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
			<br>
		</div>
	</div>

	<div class="col-lg-1"></div>
</div>
<br>
<script>
	function category(x) {
	  document.getElementById("valCategory").innerHTML = ""+x+"";
	  document.getElementById("valCategory2").value = ""+x+"";
	}
</script>