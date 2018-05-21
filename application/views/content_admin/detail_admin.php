<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Detail Admin
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>Administator Control</li>
                        <li class="active">Detail Admin</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div>
                            <div class="col-md-1">
                            </div><!--/.col (left) -->

                            <div class="col-md-10">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <!--Mulai Tampilkan Data Table-->
                                    <div class="box-body" style="align-content: center; min-height: 450px;">
                                        
                                            <!--Gambar Admin-->
                                            <div class="col-sm-4" style="padding-top: 20px; text-align: center;">
                                                <div style="height:250px; width: 250px">
                                                    <img style="border: solid currentColor; height:100%" src="<?php echo base_url('asset/upload_img_admin/'.$id_admin->path_foto); ?>">
                                                </div>
                                            </div>

                                            <!--Detail Admin-->
                                            <div class="col-sm-8" style="padding-top: 20px;">
                                                <div >
                                                    <div>
                                                        <table class="table">
                                                            
                                                            <tr>
                                                                <td style="width:25%;"><label>Username</label></td>
                                                                <td style="width:1%;"><label>:</label></td>
                                                                <td><label> <?php echo $id_admin->username;?> </label></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div> 
												<div >
                                                    <div >
                                                        <table class="table">
                                                            
                                                            <tr>
                                                                <td style="width:25%;"><label>Nama</label></td>
                                                                <td style="width:1%;"><label>:</label></td>
                                                                <td><label> <?php echo $id_admin->nama_admin;?> </label></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div> 
												<div >
                                                    <div>
                                                        <table class="table">
                                                            
                                                            <tr>
                                                                <td style="width:25%;"><label>Email</label></td>
                                                                <td style="width:1%;"><label>:</label></td>
                                                                <td><label> <?php echo $id_admin->email;?> </label></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div> 
												<div >
                                                    <div>
                                                        <table class="table">
                                                            
                                                            <tr>
                                                                <td style="width:25%;"><label>Telfon</label></td>
                                                                <td style="width:1%;"><label>:</label></td>
                                                                <td><label> <?php echo $id_admin->telfon;?> </label></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div> 
												<div >
                                                    <div>
                                                        <table class="table">
                                                            
                                                            <tr>
                                                                <td style="width:25%;"><label>Status Admin</label></td>
                                                                <td style="width:1%;"><label>:</label></td>
                                                                <td><label> <?php echo $id_admin->status_admin;?> </label></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div> 
												
                                            </div>
                                            <div style="padding-left: 330px; padding-right: 20px; text-align: justify;">
                                                <p></p>
                                            </div>                                  
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!--/.col (left) -->
                            <div class="col-md-4" style="padding-left: 155px; position: absolute; margin-top: 390px;">
                                    <!-- Tombol kembali -->
									<a href="<?php echo site_url('KelolaAdmin');?>"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-arrow-left" ></i> Kembali</button></a>
                                    <!-- Tombol Edit -->
                                    <a href="<?php echo site_url('KelolaAdmin/edit_admin/'.$id_admin->id_admin);?>"><button id="edit-button-admin" type="submit" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil" ></i> Edit</button></a>
									<!-- Tombol Hapus -->
									<a href="<?php echo site_url('KelolaAdmin/delete_detail_admin/'.$id_admin->id_admin);?>"><button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button></a>
                            </div>
                            
                            
                            <div class="col-md-1">
                            </div><!--/.col (left) -->
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->