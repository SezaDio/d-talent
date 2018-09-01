<?php
	$this->load->helper('custom');
?>
<div class="container">
     <div class="row notification">
     	
		<div class="col-md-12" style="min-height: 380px; background-color: white; border: solid 1px lightgray; box-shadow: 1px 6px 15px lightgrey; padding: 30px;">
			<br>
			<!--Show Job Notifications list-->
			<div class="row" style="overflow-x: auto;">
               <table class="table table-striped table-hover data-table">
               	<thead>
               		<tr>
               			<th>No</th>
               			<th>Talent Photo</th>
               			<th>Talent Name</th>
               			<th>Talent Phone</th>
               			<th>Description</th>
               			<th>Status</th>
               			<th>Date</th>
               		</tr>
               	</thead>

                    <tbody>
                    	<?php
                    		foreach ($job_notifications as $key => $notification) {
                    	?>
                    		<tr>
                    			<td><?php echo $key+1; ?></td>
                    			<td>
                                   <?php
                                        if ($notification->foto_profil != "") {
                                   ?>
                                        <figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/') . $notification->foto_profil;?>');"></figure>
                                   <?php
                                        } else {
                                   ?>
                                        <figure class="image-bg" style="background-image: url('<?php echo base_url('asset/img/talent-default.png'); ?>');"></figure>
                                   <?php
                                        }
                                   ?>
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
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
</div>
<script type="text/javascript">
	$(function () {
		
    });
</script>