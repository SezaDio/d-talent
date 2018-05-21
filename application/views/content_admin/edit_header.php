<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Edit Header
                    </h1>
					<div id="instafeed"></div>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Header</a></li>
                        <li class="active">Edit Header</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" onload="checkJenisHeader()">
                    <div class="row">
                        <!-- left column -->
                        

                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">

                                <!-- form start -->	
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('KelolaHeader/edit_header/'.$idHeader);?>" method="POST">
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
                                            <label for="exampleInputEmail1">Nama Header :</label>
                                            <input type="text" required name="nama_header" class="form-control" id="exampleInputEmail1" value="<?php echo htmlspecialchars($dataHeader['nama_header']); ?>">
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputEmail1">Jenis Header  :</label>
                                            <div class="radio">
                                                <label>
                                                    <input style="opacity: 1;" type="radio" name="jenis_header" value=1 required id="event" onclick="pilihEvent()" <?php if($dataHeader['jenis_header']==1) {?>checked="checked"<?php  }?>>
                                                     Event
                                                </label>
                                                <label>
                                                    <input style="opacity: 1;" type="radio" name="jenis_header" value=0 required id="nonevent" onclick="pilihNonevent()" <?php if($dataHeader['jenis_header']==0){ ?>checked="checked"<?php } ?>>
                                                     Non-Event
                                                </label>
                                            </div>
                                        </div>
										
										<div class="form-group" id="divevent" <?php if($dataHeader['jenis_header']==0){?>style="display:none"<?php } ?>>
                                            <label for="exampleInputEmail1">Pilih Event  :</label>
                                            
											<select name="event">
												<option value="10|10|3">--Event--</option>
												<?php foreach($event as $item){ ?>
													<option value="<?php echo $item['id_coming']?>" <?php if($dataHeader['id_event']==$item['id_coming']){?> selected="selected" <?php } ?>><?php echo $item['nama_coming']?></option>
												<?php } ?>
											</select>
                                            
                                        </div>
										
                                        <div class='box-header'>
                                            <label>Content Header :</label>
                                        </div>

                                        <div class='box-header'>                
                                            <img style="height: 250px; padding: 4px; max-width:250px; border: solid 1px black" src="<?php echo base_url('asset/upload_img_header/'.$dataHeader['path_gambar']); ?>"/>
                                        </div>
                                        
                                        <label class='box-header' style="color: blue;" id="ganti">Ganti Gambar ?</label><br>
                                        <div class="ganti_gambar">
                                            <input class="form" type="file" name="filefoto" >
											<b><p style="color:red;">File diizinkan: jpg, jpeg, dan png (Max 2Mb)</p></b>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <input type="hidden" name="id_header" value="<?php echo $idHeader; ?>">
                                    <div class="box-footer">
                                        <button type="submit" name="save" value="1" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan</button>
                                       <a href="<?php echo site_url('KelolaHeader/');?>"><button type="button" name="submit" class="btn btn-danger">Batal</button>
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