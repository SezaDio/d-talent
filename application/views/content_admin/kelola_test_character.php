<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top: 45px;">
        <h1>
           Tes Karakter
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Kelola Tes Online</li>
            <li class="active"><i class="fa fa-dashboard"></i>Tes Karakter</li>
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

							<a href="#!" class="btn btn-info" data-toggle="modal" data-target=".modal-add">
                                <i class="glyphicon glyphicon-plus" ></i> Tambah Soal
                            </a>
						</div>
                        <div class="form-group">
                            <table class="table table-striped table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th class="title-center" style="font-size:1em; text-align:center;">No</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Soal</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Pilihan A</th>
                                        <th class="title-center" style="font-size:1em; text-align:center;">Pilihan B</th>
                                        <th class="title-center" style="font-size:1em; text-align:center; width: 130px;">Aksi</th>           
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($test_character as $key => $test)
                                        { ?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $key+1 ?></td>
                                                <td><?php echo $test->question ?></td>
                                                <td><?php echo $test->option_a ?></td>
                                                <td><?php echo $test->option_b ?></td>
                                                <td align="center">
                                                    <!-- Tombol edit testimoni -->
                                                    <a href="<?php echo site_url('admin/test-character/edit/'.$test->id_test_character);?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil" ></i> Edit </a>

                                                    <!-- Tombol Hapus -->
                                                    <button onclick="delete_item(<?php echo $test->id_test_character; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
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

<!-- modal add -->
<div class="modal fade modal-add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" action="<?php echo site_url('admin/test-character/store');?>" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Soal</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Soal :</label>
                        <input type="text" required name="question" class="form-control" value="<?php echo set_value('question'); ?>">
                        <strong style="color: red;">200</strong> Karakter Tersisa
                    </div>

                    <div class="form-group">
                        <label>Pilihan A :</label>
                        <input type="text" required name="option_a" class="form-control" value="<?php echo set_value('option_a'); ?>">
                        <strong style="color: red;">200</strong> Karakter Tersisa
                    </div>

                    <div class="form-group">
                        <label>Pilihan B :</label>
                        <input type="text" required name="option_b" class="form-control" value="<?php echo set_value('option_b'); ?>">
                        <strong style="color: red;">200</strong> Karakter Tersisa
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    $(document).ready(function(){

        function count_char(element) {
            // count input value's length
            var len = $(element).val().length;
            // remove chars if > length
            if(len >= 100) {
                $(element).value = $(element).value.substring(0, 100);
            }
            // update the rest of chars
            $(element).next().text(100 - len);
        }
        // count chars
        $('.modal .form-control').keyup(function(){
            count_char(this);
        });
    });

    // delete test
    function delete_item(id_test_character) {
        if (confirm("Apakah Anda yakin?")) {
            var linkURL = "<?php echo site_url('admin/test-character/delete/'); ?>" + id_test_character;
            // redirect to delete function
            window.location.href = linkURL;
        }
    }
</script>