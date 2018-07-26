<style type="text/css">
    .card{
        margin: 10px;
        padding: 15px 50px 0px 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
        position: relative;
    }
    .card .btn-danger{
        position: absolute;
        top: 5px;
        right: 5px;
    }
</style>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="margin-top: 45px;">
        <h1>
           Tambah Soal
        </h1>
		<div id="instafeed"></div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Tes Online</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Tes Minat dan Bakat</a></li>
            <li class="active">Tambah Soal</li>
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
                    <form role="form" action="<?php echo site_url('admin/test-passion-interest/store');?>" method="POST">
                        <div class="box-body">
                            <div style="margin-top:10px; margin-bottom:30px">
                                <?php if($this->session->flashdata('msg_error')!=''){?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <i class="glyphicon glyphicon-remove"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo $this->session->flashdata('msg_error');?> 
                                    </div>
                                <?php }?>
                            </div>
							
                            <div class="card">
                                <div class="form-group">
                                    <label>Kategori :</label>
                                    <select name="category[]" class="form-control" required>
                                        <option value="Realistis">Realistis</option>
                                        <option value="Investigasi">Investigasi</option>
                                        <option value="Artistik">Artistik</option>
                                        <option value="Sosial">Sosial</option>
                                        <option value="Enterpreuner">Enterpreuner</option>
                                        <option value="Konvensional">Konvensional</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pernyataan :</label>
                                    <input type="text" required name="statement[]" class="form-control">
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="button" class="btn btn-success add"><i class="glyphicon glyphicon-plus"></i> Tambah Form</button>
                            
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                            
                            <a href="<?php echo site_url('admin/test-passion-interest');?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->


<script type="text/javascript">
    $(document).ready(function(){
        // add form
        $('.add').click(function() {
            $('form .box-body').append('<div class="card">'+
                    '<button type="button" class="btn btn-sm btn-danger delete"><i class="glyphicon glyphicon-trash"></i></button>'+
                    '<div class="form-group">'+
                        '<label>Kategori :</label>'+
                        '<select name="category[]" class="form-control" required>'+
                            '<option value="Realistis">Realistis</option>'+
                            '<option value="Investigasi">Investigasi</option>'+
                            '<option value="Artistik">Artistik</option>'+
                            '<option value="Sosial">Sosial</option>'+
                            '<option value="Enterpreuner">Enterpreuner</option>'+
                            '<option value="Konvensional">Konvensional</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Pernyataan :</label>'+
                        '<input type="text" required name="statement[]" class="form-control">'+
                    '</div>'+
                '</div>');
        });

        // delete form
        $('.box-body').on('click', '.delete', function(){
            $(this).parent().remove();
        });

    });
</script>