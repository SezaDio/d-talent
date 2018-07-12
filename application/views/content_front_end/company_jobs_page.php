<?php
	// $this->load->helper('text');
	$this->load->helper('custom');
?>
<div class="row">
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<br>
		<div class="col-md-12" style="background-color: whitesmoke;">
			<div class="row">
				<!--Jobs Caategory section-->
				<div class="col-md-12" style="padding-top: 13px;">
					<div class="row">
						<div class="col-md-2" style="text-align: center; padding: 5px;">
							<div class="dropdown">
								<button class="button button1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Job Category
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="height: 300px; overflow: auto;">
									<?php
                                        foreach ($job_category as $key=>$category) 
                                        {
                                          
                                            echo '<p class="dropdown-item" value="'.$key.'">'.$category.'</p>';   
                                        }
                                    ?>
								</div>
							</div>
						</div>
						<div class="col-md-2" style="text-align: center; padding: 5px;">
							<a href="<?php echo site_url('CompanyMember/add_jobs_page'); ?>">
								<button class="button button2" type="button">
									<i class="fa fa-plus"></i> Add Job
								</button>
							</a>
						</div>
						<div class="col-md-5"></div>
						<div class="col-md-3" style="text-align: center; padding: 5px;">
							<div class="input-group">
								<span class="input-group-addon" style="background-color: black; color: white;"><i class="fa fa-search"></i></span>
								<input style=" border-color: black; background-color: white; color: black;" type="text" class="form-control" name="email" placeholder="Search Job . . ." required>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr style="border: solid 1px lightgray;">
			<div class="col-md-12">
				<!--Show Jobs list-->
				<div class="row">
				<?php
					if($company_jobs != null) {
						foreach ($company_jobs as $job):
				?>
					<div class="col-md-6" style="border-left: solid 4px black; margin-bottom: 15px; padding-left: 0">
						<div class="col-md-12" style="background-color: white;">
							<div style="padding-top: 10px;  padding-bottom: 10px;">
								<a href="<?php echo site_url('company/job-vacancy/detail/') . $job->id_job;?>">
									<strong style="padding-top: 5px; font-size: 1.3em;"><?php echo $job->job_title; ?></strong>
								</a>
							</div>
							<div class="row">
								<div class="col-md-8">
									<small style="font-size: 1em;"><b><?php echo $company_name; ?></b></small>
									<p style="font-size: 1em;">
									<?php
										echo capitalizeEachWord($job->city) .", ". $job->province
									?>
									</p>
								</div>
								<div class="col-md-4" style="height: 65px;">
									<div style="padding: 5px; text-align: center; border-radius: 5px; border: solid 1px black; background-color: black; opacity: 0.8; color: white;">
										<small><b>Batas Pendaftaran</b></small>
										<hr style="border: solid 1px lightgray; margin-top: 0px; margin-bottom: 0px;">
										<small style="font-size: 1em;">
											<?php echo displayApplyDate($job->job_date_start, $job->job_date_end); ?>
										</small>
									</div>
								</div>
							</div>
							<hr style="border: solid 1px lightgray; margin-top: 0px;">
							<div class="row" style="padding-bottom: 10px;">
								<div class="col-md-6">
									<small style="font-size: 1em;">Category : </small>
									<span class="badge badge-dark">
										<?php echo $job_category[$job->job_category]; ?>
									</span>
								</div>
								<div class="col-md-6">
									<small>Total Applicant : </small>
									<span class="badge badge-dark">1000</span>
								</div>
							</div>
							<div class="hover-show-div" style="right: 15px; top: 12px;">
								<a href="<?php echo site_url('company/job-vacancy/edit/') . $job->id_job;?>">
									<span class="badge badge-primary"><strong><i class="fa fa-pen"></i> Edit</strong></span>
								</a>

								<a href="#!" class="badge badge-danger" data-toggle="modal" data-target=".modal-delete" data-id="<?php echo $job->id_job;?>">
									<i class="fa fa-trash"></i> Delete
								</a>
							</div>
						</div>
					</div>
				<?php
						endforeach;
					}
				?>

				</div>
			</div>
			<br>
		</div>
	</div>

	<div class="col-lg-1"></div>
</div>
<br>


<!-- modal delete -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Lowongan Kerja</h4>
			</div>
			<div class="modal-body">
				<p>Apakah Anda yakin?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="button button2" data-dismiss="modal">Cancel</button>
				<a class="button button3">Delete</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	// delete job
	$('.modal-delete').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var delete_target = button.data('id');
		var route = "<?php echo site_url('company/job-vacancy/delete/');?>" + delete_target;
        $(this).find('a').attr('href', route);
    });
</script>