<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Tambah Ngerti Rak?
                    </h1>
					<div id="instafeed"></div>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Ngerti Rak?</a></li>
                        <li class="active">Tambah Ngerti Rak?</li>
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
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#karakter').keyup(function(){
                                            var len = this.value.length;
                                            if(len >= 200)
                                            {
                                                this.value = this.value.substring(0, 200);
                                            }
                                            $('#hitung').text(200 - len);
                                        }); 
                                    });
                                </script>
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('KelolaWow/tambah_wow_check/');?>" method="POST">
                                    <div class="box-body">
                                        <div style="margin-top:10px; margin-bottom:30px">
                                            <?php if($this->session->flashdata('msg_gagal')!=''){?>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <?php echo $this->session->flashdata('msg_gagal');?> 
                                                </div>
                                            <?php }?>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Kategori   :</label><br>
                                            <select name="kategori" required class="form-control" id="kategori">
                                                <option value="">--Pilih Kategori Ngerti Rak?--</option>
                                                <?php
                                                    foreach ($kategori_wow as $key=>$kategori) 
                                                    {
                                                        if ($key==$dataWow['kategori_wow']){
                                                            echo '<option value="'.$key.'" selected>'.$kategori.'</option>';
                                                        }
                                                        else
                                                        {
                                                            echo '<option value="'.$key.'">'.$kategori.'</option>';   
                                                        }
                                                    }
                                                ?>
                                            </select></br>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Ngerti Rak?   :</label>
                                            <input type="text" required name="judul_wow" class="form-control" id="exampleInputEmail1" value="<?php 
                                                    if (isset($dataWow['judul_wow']))
                                                    {
                                                        echo htmlspecialchars($dataWow['judul_wow']);
                                                    }
                                            ?>">
                                            
                                        </div>
										
										<div class="form-group">
											<div class='box-header'>
												 <label>Deskripsi Ngerti Rak? :</label>
											</div>
											<div class='box-body pad'>
                                                <b><p style="color:red;">* Panjang maksimal untuk isi ngerti rak maksimal 200 karakter</p></b>
												<textarea required id="karakter" name="deskripsi_wow" rows="10" cols="80"><?php 
                                                        if (isset($dataWow['deskripsi']))
                                                        {
                                                            echo htmlspecialchars($dataWow['deskripsi']);
                                                        }
                                                    ?></textarea>
                                                <br>
                                                <strong style="color: red;" id='hitung'>200</strong> Karakter Tersisa                                 
											</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Unggah File Gambar :</label>
                                            <div class="input-group">
                                                <input class="form" type="file" name="filefoto" required >
                                            </div>
											<b><p style="color:red;">File diizinkan: jpg, jpeg, dan png (Max 2Mb)</p></b>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" value="1" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->

                        <div class="col-md-2"></div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->



            