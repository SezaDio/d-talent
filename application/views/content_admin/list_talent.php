<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Company & Talent
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">List Talent</li>
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
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Foto Profil</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Nama</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">E-Mail</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Nomor Ponsel</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Tanggal Lahir</th>
                                                    <th class="title-center" style="font-size:1em; text-align:center;">Membership</th>
                                                    <th class="title-center" style="width: 150px; font-size:1em; text-align:center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $i = 1; 
                                                    foreach($listTalent as $item)
                                                    { ?>
                                                        <tr>
                                                            <td style="text-align: center;">
                                                                <?php echo $i;?>
                                                            </td>
                                                            <td>
                                                                <figure class="image-bg" style="background-size: cover; background-position: center; width: 100%; height: 150px; background-repeat: no-repeat; background-image: url('<?php echo base_url('asset/img/upload_img_talent_profile/').$item['foto_profil'];?>');"></figure>
                                                            </td>
                                                            <td><?php echo $item['nama'] ?></td>
                                                            <td><?php echo $item['email'] ?></td>
                                                            <td><?php echo $item['nomor_ponsel'] ?></td>
                                                            <td><?php echo $item['tanggal_lahir'] ?></td>
                                                            <td>
                                                                <?php 
                                                                    if ($item['membership'] == 1) 
                                                                    {
                                                                        echo "Free";
                                                                    }
                                                                    elseif ($item['membership'] == 2) 
                                                                    {
                                                                        echo "Bronze";
                                                                    }
                                                                    elseif ($item['membership'] == 3)
                                                                    {
                                                                        echo "Silver";
                                                                    }
                                                                    elseif ($item['membership'] == 4)
                                                                    {
                                                                        echo "Gold";
                                                                    }
                                                                    elseif ($item['membership'] == 5)
                                                                    {
                                                                        echo "Platinum";
                                                                    }
                                                                ?>    
                                                            </td>
                                                            <td align="center">
                                                                <!-- Tombol Hapus -->
                                                                <button onclick="delete_talent_ajax(<?php echo $item['id_talent']; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
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
                function delete_talent_ajax(id_talent)
                {
                    if (confirm("Anda yakin ingin menghapus data Talent ini ?"))
                    {;
                        $.ajax({
                            url: 'delete_talent_member',
                            type: 'POST',
                            data: {id_talent:id_talent},
                            success: function(){
                                        alert('Delete data Talent berhasil');
                                        location.reload();
                                    },
                            error: function(){
                                        alert('Delete data Talent gagal');
                                    }
                        });
                    }
                    else
                    {
                        alert(id_produk + "Gagal dihapus");
                    }
                }
            </script>


            