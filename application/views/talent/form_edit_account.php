<div class="container">
	

	<div class="cv col-md-8 col-md-offset-2" style="min-height: 50vh;">
		<div class="card" style="box-shadow: 1px 5px 20px lightgrey;">
			<h3 class="page-title" style="margin-bottom: unset; text-align: center; padding-top: 20px;"><?php echo $page_title; ?></h3>
			<form action="<?php echo site_url('talent/account/update'); ?>" method="post">
				<hr style="margin-bottom: 15px; border: solid 1px black;">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}
               	?>

				<div class="form-group">
					<label>Name *</label>
					<input type="text" name="nama" class="form-control" required value="<?php echo $talent->nama;?>">
				</div>

				<div class="form-group">
					<label>Email *</label>
					<input type="text" name="email" class="form-control" required  value="<?php echo $talent->email;?>">
				</div>

				<div class="form-group">
					<label>Phone *</label>
					<input type="text" name="nomor_ponsel" class="form-control" required  value="<?php echo $talent->nomor_ponsel;?>">
				</div>

				<div class="form-group">
					<label>Gender *</label>
					<select class="form-control" name="jenis_kelamin" required>
						<option value="1" <?php echo $talent->jenis_kelamin==1 ? 'selected' : ''; ?> >Male</option>
						<option value="0" <?php echo $talent->jenis_kelamin==0 ? 'selected' : ''; ?> >Female</option>
					</select>
				</div>

				<div class="form-group">
					<label>Birth of Date *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" class="form-control datepicker" name="tanggal_lahir" required value="<?php echo $talent->tanggal_lahir;?>">
					</div>
				</div>

				<div class="form-group">
					<label>Province *</label>
					<select name="id_provinsi" onchange="ajax_post();" placeholder="Provinsi" class="form-control" id="lokasi_provinsi" required>
                        <option value="All">--Select Province--</option>
                        <?php
                            foreach ($lokasiProvinsi as $key=>$provinsi) 
                            {
                        ?>
                            	<option value="<?php echo $key; ?>" <?php echo $talent->id_provinsi==$key ? 'selected' : ''; ?> >
                            		<?php echo $provinsi['lokasi_nama']; ?>
                            	</option>
                        <?php
                            }
                        ?>
                    </select>
				</div>

				<div class="form-group">
					<label>City *</label>
					<select name="id_kota" placeholder="Kota" required class="form-control" id="lokasi_kota" required>
                        <option value="All">--Select City--</option>
                        <?php
                            foreach ($lokasiKabupatenKota as $key=>$kota) 
                            {
                                echo '<option value="'.$key.'"'. ($talent->id_kota==$key ? 'selected' : '') .'>'.$kota['lokasi_nama'].'</option>';   
                            }
                        ?>
                    </select>
				</div>

				<div class="form-group">
					<label>Marital Status *</label>
					<select class="form-control" name="status_pernikahan" required>
						<option value="0" <?php echo $talent->status_pernikahan==0 ? 'selected' : ''; ?> >Married</option>
						<option value="1" <?php echo $talent->status_pernikahan==1 ? 'selected' : ''; ?> >Unmarried</option>
					</select>
				</div>

				<br>
				<a href="#!" class="text-link" data-toggle="modal" data-target=".modal-form">
					<label>Change Password</label>
				</a>
				<br>
				<br>
				<div class="form-group">
					<div class="col-md-4 col-md-offset-2">
						<input type="submit" value="Save" class="button button1">
					</div>
					<div class="col-md-4">
						<a href="<?php echo site_url('talent'); ?>" class="button button2">Back to My CV</a>
					</div>
				</div>

			</form>
		</div>
	</div>

</div>

<!-- modal form -->
<div class="modal fade modal-form" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?php echo site_url('talent/password/update'); ?>" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Change Password</h4>
				</div>
				<div class="modal-body">
						<div class="form-group">
							<label>Old Password *</label>
							<input type="password" name="old_password" class="form-control" required>
						</div>

						<div class="form-group">
							<label>New Password *</label>
							<input type="text" name="new_password" class="form-control" required>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-default" data-dismiss="modal">Cancel</button>
					<input type="submit" value="Simpan" class="btn btn-outline-black">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	$(function () {
        // datepicker render
        $('.datepicker').datepicker({
        	format: 'yyyy-mm-dd'
        });

    });

    // get cities
	function ajax_post() {
		var id_provinsi = document.getElementById("lokasi_provinsi").value;

		$.ajax({
			url: '<?php echo site_url("AccountTalent/lokasi_kabupaten_kota");?>',	
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
</script>