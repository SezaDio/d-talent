<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Lowongan & Pendaftar
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">List Job Vacancy</li>
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
                                    
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-list">
                                            <thead>
                                                <tr>
                                                    <th class="title-center" style="width: 10px; font-size:1em; text-align:center;">No.</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Job Title</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Job Type</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Job Category</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Date Start</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Date End</th>
                                                    <th class="title-center" style="width: 150px; font-size:1em; text-align:center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1; 
                                                    foreach($listVacancy as $item)
                                                    { ?>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                                <?php echo $i;?>
                                                            </td>
                                                            <td><?php echo $item['job_title'] ?></td>
                                                            <td><?php echo $item['job_type'] ?></td>
                                                            <td><?php echo $item['job_category'] ?></td>
                                                            <td><?php echo $item['job_date_start'] ?></td>
                                                            <td><?php echo $item['job_date_end'] ?></td>
                                                            <td align="center">
                                                                <!-- Tombol Hapus -->
                                                                <button onclick="delete_vacancy_ajax(<?php echo $item['id_job']; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
                                                            </td>
                                                        </tr>
                                                  <?php $i++;
                                                         } ?>
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
                function delete_vacancy_ajax(id_job)
                {
                    if (confirm("Anda yakin ingin menghapus data Job Vacancy ini ?"))
                    {;
                        $.ajax({
                            url: 'delete_list_vacancy',
                            type: 'POST',
                            data: {id_job:id_job},
                            success: function(){
                                        alert('Delete data Job Vacancy berhasil');
                                        location.reload();
                                    },
                            error: function(){
                                        alert('Delete data Job Vacancy gagal');
                                    }
                        });
                    }
                    else
                    {
                        alert(id_produk + "Gagal dihapus");
                    }
                }
            </script>


            