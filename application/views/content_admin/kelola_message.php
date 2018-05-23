<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Kelola Pesan
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">Kelola Pesan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
							    <?php if($this->session->flashdata('msg_berhasil')!=''){?>
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="glyphicon glyphicon-ok"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo $this->session->flashdata('msg_berhasil');?> 
                                    </div>
                                <?php }?>
                                <!--Mulai Tampilkan Data Table-->
                                <div class="box-body">
                                    <div class="form-group">
                                    
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-list-faq">
                                            <thead>
                                                <tr>
                                                    <th class="title-center" style="width: 10px; font-size:1em; text-align:center;">No.</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Pengirim</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">E-Mail</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Subject</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Telepon</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Tanggal Masuk</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Status</th>
                                                    <th class="title-center" style="width: 150px; font-size:1em; text-align:center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($listPesan as $item)
                                                    { ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $item['id_pesan'] ?></td>
                                                            <td><?php echo $item['nama_lengkap'] ?></td>
                                                            <td><?php echo $item['email'] ?></td>
                                                            <td><?php echo $item['subject'] ?></td>
                                                            <td><?php echo $item['telepon'] ?></td>
                                                            <td><?php echo $item['tgl_pesan'] ?></td>
                                                            <td>
                                                                <?php 
                                                                    $statusBaca = $item['status'];
                                                                    if ($statusBaca == 0)
                                                                    {
                                                                        echo "<p style='color: red;'>Belum Dibaca</p>";
                                                                    }
                                                                    elseif ($statusBaca == 1) 
                                                                    {
                                                                        echo "<p style='color:green;'>Sudah Dibaca</p>";
                                                                    } 
                                                                ?>  
                                                            </td>
                                                            <td align="center">
                                                                <!-- Tombol reply -->
                                                                <a href="<?php echo site_url('KelolaPesan/balas_pesan/'.$item['id_pesan']);?>"><button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-send" ></i> Reply </button></a>

                                                                <!-- Tombol Hapus -->
                                                                <button onclick="delete_pesan_ajax(<?php echo $item['id_pesan']; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
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
                function delete_pesan_ajax(id_pesan)
                {
                    if (confirm("Anda yakin ingin menghapus pesan ini ?"))
                    {;
                        $.ajax({
                            url: 'delete_pesan',
                            type: 'POST',
                            data: {id_pesan:id_pesan},
                            success: function(){
                                        alert('Delete pesan berhasil');
                                        location.reload();
                                    },
                            error: function(){
                                        alert('Delete pesan gagal');
                                    }
                        });
                    }
                    else
                    {
                        alert(id_produk + "Gagal dihapus");
                    }
                }
            </script>


            