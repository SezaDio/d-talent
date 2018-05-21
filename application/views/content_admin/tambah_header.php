
<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Tambah Header
                    </h1>
					<div id="instafeed"></div>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Header</a></li>
                        <li class="active">Tambah Header</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                
                                <!-- form start -->
								
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('KelolaHeader/tambah_header_check/');?>" method="POST">
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
                                            <label for="exampleInputEmail1">Nama Header  :</label>
                                            <input type="text" required name="nama_header" class="form-control" id="exampleInputEmail1" value="<?php 
                                                    if (isset($dataHeader['nama_header']))
                                                    {
                                                        echo htmlspecialchars($dataHeader['nama_header']);
                                                    }
                                            ?>">
                                            
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Header  :</label>
                                            <div class="radio">
                                                <label>
                                                    <input style="opacity: 1;" type="radio" name="jenis_header" value=1 required id="event" onclick="pilihEvent()">
                                                     Event
                                                </label>
                                                <label>
                                                    <input style="opacity: 1;" type="radio" name="jenis_header" value=0 required id="nonevent" onclick="pilihNonevent()">
                                                     Non-Event
                                                </label>
                                            </div>
                                        </div>
										
										<div class="form-group" id="divevent" style="display:none">
                                            <label for="exampleInputEmail1">Pilih Event  :</label>
                                            
											<select name="event">
												<option value="10|10|3">--Event--</option>
												<?php foreach($event as $item){ ?>
													<option value="<?php echo $item['id_coming']?>"><?php echo $item['nama_coming']?></option>
												<?php } ?>
											</select>
                                            
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
			<script>
				function pilihEvent(){
					document.getElementById("divevent").style.display = "block";
				}
				
				function pilihNonevent(){
					document.getElementById("divevent").style.display = "none";
				}
			</script>