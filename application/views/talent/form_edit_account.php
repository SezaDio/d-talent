<div class="container">
	<h3 class="page-title"><?php echo $page_title; ?></h3>

	<div class="cv col-md-8 col-md-offset-2" style="min-height: 45.5vh;">
		<div class="card">
			<form action="<?php echo site_url('talent/account/update'); ?>" method="post">
				<?php
                	if (validation_errors() != "") {
	                	echo '<div class="alert alert-danger alert-dismissable">';
	                	echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						echo validation_errors();
						echo '</div>';
                	}
               	?>

				<div class="form-group">
					<label>Nama *</label>
					<input type="text" name="name" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Email *</label>
					<input type="text" name="email" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Telepon *</label>
					<input type="text" name="phone" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Tanggal Lahir *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" class="form-control datepicker" name="birthday" required value="">
					</div>
				</div>

				<div class="form-group">
					<label>Lokasi Provinsi *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<select name="provinsi" onchange="ajax_post();" placeholder="Provinsi" required class="form-control" id="lokasi_provinsi" required>
                            <option value="All">--Pilih Lokasi Provinsi--</option>
                            <?php
                                foreach ($lokasiProvinsi as $key=>$provinsi) 
                                {
                                  
                                    echo '<option value="'.$key.'">'.$provinsi['lokasi_nama'].'</option>';   
                                }
                            ?>
                        </select>
					</div>
				</div>

				<div class="form-group">
					<label>Lokasi Kota *</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
						<select name="kota" placeholder="Kota" required class="form-control" id="lokasi_kota" required>
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

				<div class="form-group">
					<label>Password *</label>
					<input type="password" name="password" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Konfirmasi Password *</label>
					<input type="password" name="confirm_password" class="form-control" required>
				</div>

				<br>
				<div class="form-group">
					<div class="col-md-4 col-md-offset-2">
						<a href="<?php echo site_url('talent'); ?>" class="button button2">Kembali</a>
					</div>
					<div class="col-md-4">
						<input type="submit" value="Simpan" class="button button1" style="margin-left: 15px;">
					</div>
				</div>

			</form>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(function () {
        // datepicker render
        $('.datepicker').datepicker({
        	format: 'yyyy-mm-dd'
        });
    });
</script>