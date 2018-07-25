<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top: 45px;">
        <h1>
           Tes Work Attitude
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Kelola Tes Online</li>
            <li class="active"><i class="fa fa-dashboard"></i> Tes Work Attitude</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
				
                    <!--Mulai Tampilkan Data Table-->
                    <div class="box-body">
						<div style="margin-top:10px; margin-bottom:30px">
							<?php if($this->session->flashdata('msg_success')!=''){?>
                                <div class="alert alert-success alert-dismissable">
                                    <i class="glyphicon glyphicon-ok"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->session->flashdata('msg_success');?> 
                                </div>
                            <?php }?>
                            <?php if($this->session->flashdata('msg_error')!=''){?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="glyphicon glyphicon-remove"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo $this->session->flashdata('msg_error');?> 
                                </div>
                            <?php }?>

                            <?php if(validation_errors()!=''){?>
                                <div class="alert alert-danger alert-dismissable">
                                    <i class="glyphicon glyphicon-remove"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <?php echo validation_errors();?> 
                                </div>
                            <?php }?>

                            <a href="<?php echo site_url('admin/test-work-attitude/create'); ?>" class="btn btn-info">
                                <i class="glyphicon glyphicon-plus" ></i> Tambah Soal
                            </a>
						</div>
                        <div class="form-group">
                            <table class="table table-striped table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th class="title-center" style="font-size:1em; text-align:center;">No</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Pernyataan</th>
                                        <th class="title-center" style="font-size:1em; text-align:center; width: 130px;">Aksi</th>           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($test_work_attitude as $key => $test)
                                        { ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $key+1 ?></td>
                                                <td><?php echo $test->statement ?></td>
                                                <td align="center">
                                                    <!-- Tombol edit -->
                                                    <a href="<?php echo site_url('admin/test-work-attitude/edit/'.$test->id_test_work_attitude);?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil" ></i> Edit </a>

                                                    <!-- Tombol Hapus -->
                                                    <button onclick="delete_item(<?php echo $test->id_test_work_attitude; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->

                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

<script type="text/javascript">
    // delete test
    function delete_item(id_test_work_attitude) {
        if (confirm("Apakah Anda yakin?")) {
            var linkURL = "<?php echo site_url('admin/test-work-attitude/delete/'); ?>" + id_test_work_attitude;
            // redirect to delete function
            window.location.href = linkURL;
        }
    }
</script>