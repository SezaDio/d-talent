<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top: 45px;">
        <h1>
           Edit Soal
        </h1>
		<div id="instafeed"></div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Tes Online</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Tes Minat dan Bakat</a></li>
            <li class="active">Edit Soal</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('admin/test-passion-interest/update/') . $test->id_test_passion;?>" method="POST">
                        <div class="box-body">
                            <div style="margin-top:10px; margin-bottom:30px">
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
                            </div>
							
                            <div>
                                <div class="form-group">
                                    <label>Kategori :</label>
                                    <select name="category" class="form-control" required>
                                        <option value="Realistis" <?php echo $test->category=='Realistis'? 'selected' : ''; ?> >Realistis</option>
                                        <option value="Investigasi" <?php echo $test->category=='Investigasi'? 'selected' : ''; ?> >Investigasi</option>
                                        <option value="Artistik" <?php echo $test->category=='Artistik'? 'selected' : ''; ?> >Artistik</option>
                                        <option value="Sosial" <?php echo $test->category=='Sosial'? 'selected' : ''; ?> >Sosial</option>
                                        <option value="Enterpreuner" <?php echo $test->category=='Enterpreuner'? 'selected' : ''; ?> >Enterpreuner</option>
                                        <option value="Konvensional" <?php echo $test->category=='Konvensional'? 'selected' : ''; ?> >Konvensional</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pernyataan :</label>
                                    <input type="text" required name="statement" class="form-control" value="<?php echo $test->statement;?>">
                                    <strong style="color: red;">75</strong> Karakter Tersisa
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                            <a href="<?php echo site_url('admin/test-passion-interest');?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </form>

                    <br>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->


<script type="text/javascript">
    $(document).ready(function(){
        function count_char(element) {
            // count input value's length
            var len = $(element).val().length;
            // remove chars if > length
            if(len >= 75) {
                $(element).value = $(element).value.substring(0, 75);
            }
            // update the rest of chars
            $(element).next().text(75 - len);
        }

        $('input.form-control').keyup(function(){
            count_char(this);
        });

        // after load page
        $('input.form-control').each(function(){
            count_char(this);
        }); 
    });
</script>