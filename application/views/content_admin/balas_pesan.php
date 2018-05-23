<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Balas Pesan
                    </h1>
                    <ol class="breadcrumb">
                        <li>Kelola Message</li>
                        <li class="active">Balas Pesan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div>
                            <div class="col-md-1"></div><!--/.col (left) -->

                            <div class="col-md-10">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <!--Mulai Tampilkan Data Table-->
                                    <div class="box-body" style="align-content: center; min-height: 450px;">
                                        
                                        <!--Detail Produk-->
                                        <div class="col-sm-12" style="padding-top: 20px;">
                                            <table class="table">
                                                <tr>
                                                    <td style="width: 100px;"><label>Pengirim</label></td>
                                                    <td style="width: 20px;"><label>:</label></td>
                                                    <td><?php echo $pesan->nama_lengkap;?></td>
                                                </tr>
                                                <tr>
                                                    <td><label>E-Mail</label></td>
                                                    <td><label>:</label></td>
                                                    <td><?php echo $pesan->email;?></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Subject</label></td>
                                                    <td><label>:</label></td>
                                                    <td><?php echo $pesan->subject;?></td>
                                                </tr>
                                                <tr>
                                                    <td><label>No. Telepon</label></td>
                                                    <td><label>:</label></td>
                                                    <td><?php echo $pesan->telepon;?></td>
                                                </tr>
                                            </table>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            
                                                            <textarea class="form-control" rows="8" placeholder="<?php echo htmlspecialchars($pesan->pesan);?>" readonly></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                       
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!--/.col (left) -->
                            <div class="col-md-1">
                            </div><!--/.col (left) -->
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->

                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <form role="form" enctype="multipart/form-data" action="<?php echo site_url('FrontControl_ContactUs/kirim_pesan/');?>" method="POST">
                            <div class="col-md-1"></div><!--/.col (left) -->

                            <div class="col-md-10">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <!--Mulai Tampilkan Data Table-->
                                    <div class="box-body" style="align-content: center; min-height: 450px;">
                                        <?php 
                                            $tanggal = strtotime($pesan->tgl_pesan);
                                            $tanggal_pesan = date('d-M-y, H:i', $tanggal);
                                        ?>
                                        <!--Detail Produk-->
                                        <div class="col-sm-12" style="padding-top: 20px;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <textarea required id="editor_wow" name="isi_pesan" rows="20" cols="80">
                                                                <blockquote>
                                                                    <p> <small>Pada <?php echo $tanggal_pesan; ?></small>, <strong><?php echo $pesan->nama_lengkap; ?></strong> mengirim pesan : <br>
                                                                        <?php echo htmlspecialchars($pesan->pesan);?>
                                                                    </p>
                                                                </blockquote>
                                                                <p></p>
                                                            </textarea>                                    
                                                        </div>
                                                        <input type="hidden" name="email" value="<?php echo $pesan->email; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                       
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!--/.col (left) -->
                            
                            <div class="col-md-4" style="padding-left: 155px; position: absolute; margin-top: 390px;">
                                <!-- Tombol kembali -->
                                <a href="<?php echo site_url('FrontControl_ContactUs/kelola_message');?>"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-arrow-left" ></i> Kembali</button></a>

                                <!-- Tombol Kirim -->
                                <button id="edit-button-produk" type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-send" ></i> Kirim</button>

                                <!-- Tombol Hapus -->
                                <button onclick="delete_pesan_ajax(<?php echo $pesan->id_pesan; ?>)" id="delete-button-wow" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button>
                            </div>
                            <div class="col-md-1">
                            </div><!--/.col (left) -->
                        </form>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->