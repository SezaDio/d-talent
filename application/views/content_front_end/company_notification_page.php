<?php
	$this->load->helper('custom');
?>
<div class="row notification">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<br>
		<div class="col-md-12" style="background-color: whitesmoke;">
			
			<div class="col-md-12">
				<br>
				<!--Show Job Notifications list-->
				<div class="row">
                    <table class="table table-striped table-hover data-table">
                    	<thead>
                    		<tr>
                    			<th>No</th>
                    			<th>Foto Talent</th>
                    			<th>Nama Talent</th>
                    			<th>Kontak Talent</th>
                    			<th>Keterangan</th>
                    			<th>Status</th>
                    			<th>Tanggal</th>
                    		</tr>
                    	</thead>

                    	<tbody>
                    	<?php
                    		foreach ($job_notifications as $key => $notification) {
                    	?>
                    		<tr>
                    			<td>1</td>
                    			<td>
                    				<figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $notification->foto_profil;?>');"></figure>
                    			</td>
                    			<td><?php echo $notification->nama; ?></td>
                    			<td>
                    				<?php
                    					echo $notification->email; 
                    					echo '<br>';
                    					echo $notification->nomor_ponsel;
                    				?>
                    			</td>
                    			<td>
                    				<?php
                    					echo displayGender($notification->jenis_kelamin);
                    					echo '<br>';
                    					echo displayMaritalStatus($notification->status_pernikahan);
                    					echo '<br>';
                    					echo countAge($notification->tanggal_lahir) . ' tahun';
                    				?>
                    				<!-- Laki-laki <br> Belum menikah <br> 24 tahun -->
                    			</td>
                    			<td><?php echo displayNotificatioonStatus($notification->notification_status); ?></td>
                    			<td><?php echo displayDate($notification->notification_date); ?></td>
                    		</tr>
                    	<?php
                    		}
                    	?>
                    	</tbody>
                    </table>
				</div>

				<br>
			</div>

		</div>
	</div>

	<div class="col-lg-1"></div>
</div>
<br>
<br>
<br>

<script type="text/javascript">
	$(function () {
		
    });
</script>