<div class="container">
	<div class="row">
		<div class="col-lg-1"></div>
		
		<div class="col-lg-10">
			<div class="row" style="background: whitesmoke; padding: 20px;">
				<div class="col-md-12">
					<form role="form" enctype="multipart/form-data" action="<?php //echo site_url('KelolaTestimoni/tambah_testimoni_check/');?>" method="POST">
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class='box-body pad'>
										<textarea style="padding: 20px; width: 100%;" placeholder="Share Your Updates, Article, Idea, or Activity . . ." required id="karakter" name="deskripsi" rows="5"><?php 
				                                //if (isset($dataTestimoni['deskripsi']))
				                                //{
				                                    //echo htmlspecialchars($dataTestimoni['deskripsi']);
				                                //} 
				                        ?></textarea>
				                        <br>                                 
									</div>
				                </div>
							</div>
						</div>

						<!--Button Post-->
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-3" style="float: right;">
									<button type="submit" class="button button1"><i class="fa fa-paper-plane"></i> Post</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<br>
			<div class="row" style="background: whitesmoke; padding: 20px;">
				<div class="col-md-12">
					<strong style="font-size: 1.5em;">Recent Updates</strong>
					<hr style="border: solid 1px black;">
				</div>

				<div class="col-md-12" style="background: white; padding: 20px;">
					<div class="row">
						<div class="col-md-2" style="padding-left: 20px;">
							<img style="width: 100%; height: 100px;" class="img-fulid" src="<?php echo base_url('asset/img/upload_img_slider/empty.png')?>" alt="">
						</div>
						<div class="col-md-6" style="padding: 5px; margin-left: 20px;">
							<strong style="font-size: 1.5em;">PT Dash Indo Persada</strong>
							<p style="font-size: 1.1em; font-family: sans-serif;">Human Resource Development</p>
							<strong style="color: gray;"> Waktu Publish</strong>
						</div>
						<div class="col-md-3" >
							<button style="width: 130px; float: right;" type="submit" class="button button1"><i class="fa fa-edit"></i> Edit</button>
						</div>
					</div>
					<hr style="border: solid 1px lightgray">
					<div class="row" style="padding: 20px;">
						<div class="col-md-12" style="background: whitesmoke; padding: 10px;">
							Konten
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-1"></div>	
	</div>
	<br><br>
</div>
