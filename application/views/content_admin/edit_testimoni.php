<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Edit Testimoni
                    </h1>
					<div id="instafeed"></div>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Testimoni</a></li>
                        <li class="active">Edit Testimoni</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        

                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div style="margin-top:10px; margin-bottom:30px">
                                    <?php if($this->session->flashdata('msg_gagal')!=''){?>
                                        <div class="alert alert-danger alert-dismissable">
                                            <i class="glyphicon glyphicon-remove"></i>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <?php echo $this->session->flashdata('msg_gagal');?> 
                                        </div>
                                    <?php }?>
                                </div>
                                <!-- form start -->
								
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('KelolaTestimoni/edit_testimoni/'.$idTestimoni);?>" method="POST">
                                    <div class="box-body">
										
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama :</label>
                                            <input type="text" required name="nama_testimoni" class="form-control" value="<?php echo htmlspecialchars($dataTestimoni['nama_testimoni']); ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Job :</label>
                                            <input type="text" required name="job" class="form-control" value="<?php echo htmlspecialchars($dataTestimoni['job']); ?>">
                                        </div>
										
										<div class="form-group">
											<div class='box-header'>
												 <label>Deskripsi :</label>
											</div>
											
											<textarea required id="editor_wow" name="deskripsi" rows="10" cols="150">
											    <?php echo htmlspecialchars($dataTestimoni['deskripsi']); ?>
											</textarea>                                    
											
                                        </div>

                                        <div class='box-header'>
                                            <label>Foto Testimoni:</label>
                                        </div>

                                        <div class='box-header'>   
                                            <?php
                                                if (empty($dataTestimoni['path_gambar']))
                                                {
                                                    echo '<img style="height: 250px; padding: 4px; max-width:250px; border: solid 1px black" src="'.base_url('asset/img/empty.png').'"/>';
                                                }
                                                else
                                                {
                                                    echo '<img style="height: 250px; padding: 4px; max-width:250px; border: solid 1px black" src="'.base_url('asset/img/upload_img_testimoni/'.$dataTestimoni['path_gambar']).'"/>';
                                                }
                                            ?>             
                                            
                                        </div>
                                        
                                        <label class='box-header' style="color: blue;" id="ganti">Ganti Foto ?</label><br>
                                        <div class="ganti_gambar">
                                            <input class="form" type="file" name="filefoto" >
											<b><p style="color:red;">File diizinkan: jpg, jpeg, dan png (Max 2Mb)</p></b>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <input type="hidden" name="id_testimoni" value="<?php echo $idTestimoni; ?>">
                                    <div class="box-footer">
                                        <button type="submit" name="save" value="1" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                                        <a href="<?php echo site_url('KelolaTestimoni/');?>"><button type="button" name="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->

                        <div class="col-md-2"></div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->