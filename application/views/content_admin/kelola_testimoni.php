<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Kelola Testimoni
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>Kelola Testimoni</li>
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
										<?php if($this->session->flashdata('msg_berhasil')!=''){?>
                                            <div class="alert alert-success alert-dismissable">
                                                <i class="glyphicon glyphicon-ok"></i>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <?php echo $this->session->flashdata('msg_berhasil');?> 
                                            </div>
                                        <?php }?>
										<a href="<?php echo site_url('KelolaTestimoni/tambah_testimoni_check/');?>">
                                            <button type="submit" name="submit" class="btn btn-info"><i class="glyphicon glyphicon-plus" ></i> Tambah Testimoni</button>
                                        </a>
									</div>
                                    <div class="form-group">
                                        <table class="table table-striped table-bordered table-hover dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">No.</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Nama</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Job</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Tanggal Publish</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Aksi</th>           
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($listTestimoni as $item)
                                                    { ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $item['id_testimoni'] ?></td>
                                                            <td><?php echo $item['nama_testimoni'] ?></td>
                                                            <td><?php echo $item['job'] ?></td>
                                                            <td><?php echo $item['tanggal_posting'] ?></td>
                                                            <td align="center">
                                                                <!-- Tombol edit testimoni -->
                                                                <a href="<?php echo site_url('KelolaTestimoni/edit_testimoni/'.$item['id_testimoni']);?>"><button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil" ></i> Edit </button></a>

                                                                <!-- Tombol Hapus -->
                                                                <button onclick="delete_testimoni_ajax(<?php echo $item['id_testimoni']; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
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
                function delete_testimoni_ajax(id_testimoni)
                {
                    if (confirm("Anda yakin ingin menghapus testimoni ini ?"))
                    {;
                        $.ajax({
                            url: '../KelolaTestimoni/delete_testimoni',
                            type: 'POST',
                            data: {id_testimoni:id_testimoni},
                            success: function(){
                                        alert('Delete testimoni berhasil');
                                        location.reload();
                                    },
                            error: function(){
                                        alert('Delete opo gagal');
                                    }
                        });
                    }
                    else
                    {
                        alert(id_produk + "Gagal dihapus");
                    }
                }
            </script>