<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Kelola Slider
                    </h1>
					
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashboard"></i>Slider</li>
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
										
										<!--Tambah Slider-->
										<a href="<?php echo site_url('KelolaSlider/tambah_slider_check/');?>">
                                            <button type="submit" name="submit" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah Slider</button>
                                        </a>
                                    </div>
                                    <br>
									<div class="form-group"  id="headers">
                                        <!--Tab header event-->
										<div class="row">
											<?php foreach($listSlider as $item){ ?>
												<div class="col-md-4" style="text-align: center">
													<div class="well" style="padding:10px">
											
														<input onclick="publish(<?php echo $item['id_slider']?>)" type="checkbox" name="slider" id="slider<?php echo $item['id_slider']?>" value="<?php echo $item['id_slider']?>" <?php if($item['status']==1){?>checked="checked"<?php } ?>>
														<br>  
														<img style="border: black solid 2px;" height="250px" width="100%" alt="" src="<?php echo base_url('asset/img/upload_img_slider/'.$item['path_gambar']); ?>"/>
														
														<br><br>
														<?php echo $item['judul_slider']; ?>
														<br><br>

														<!-- Tombol lihat detail -->
														<a href="<?php echo site_url('KelolaSlider/edit_slider/'.$item['id_slider']);?>"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil" ></i> Edit</button></a>
														
														<!-- Tombol Hapus -->
														<a href="<?php echo site_url('KelolaSlider/delete_slider/'.$item['id_slider']);?>"><button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button></a>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
									
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->


            
			<script type="text/javascript">

				function publish(idSlider){
					var check = document.getElementById("slider"+idSlider).checked;
						if(check)
						{
							$.ajax({
							url: 'publish_slider',
							type: 'POST',
							data: {idSlider:idSlider},
							success: function(){
										alert('Slider berhasil di publish');
										location.reload();
									},
							error: function(){
										alert('Slider gagal di publish');
									}
							});
						} 
						else
						{
							$.ajax({
							url: 'unpublish_slider',
							type: 'POST',
							data: {idSlider:idSlider},
							success: function(){
										alert('Slider berhasil di unpublish');
										location.reload();
									},
							error: function(){
										alert('Slider gagal di unpublish');
									}
							});
							
						}
				}
			
				function publish2(idSlider){
					var check = document.getElementById("slider"+idSlider).checked;
						if(check){
							$.ajax({
							url: 'unpublish_slider',
							type: 'POST',
							data: {idSlider:idSlider},
							success: function(){
										alert('Slider berhasil di unpublish');
										location.reload();
									},
							error: function(){
										alert('Slider gagal di unpublish');
									}
							});
						} else{
							$.ajax({
							url: 'publish_slider',
							type: 'POST',
							data: {idSlider:idSlider},
							success: function(){
										alert('Slider berhasil di publish');
										location.reload();
									},
							error: function(){
										alert('Slider gagal di publish');
									}
							});
							
						}
				}
				  function parseXml(str) {
					  if (window.ActiveXObject) {
						var doc = new ActiveXObject('Microsoft.XMLDOM');
						doc.loadXML(str);
						return doc;
					  } else if (window.DOMParser) {
						return (new DOMParser).parseFromString(str, 'text/xml');
					  }
					}

				function cariHeader() {
						var kata=document.getElementById("kata_kunci").value;
						$.post('<?php echo site_url('KelolaHeader/cari_header/'); ?>'+kata, function(dataHeader){
						
							var xml = parseXml(dataHeader);
							var getHeader = xml.documentElement.getElementsByTagName("header");
							
							/*if(getKata.length==0){
							
								document.getElementById("hasil").style.display = "none";
								document.getElementById("notFound").style.display = "block";
								document.getElementById("kata").innerHTML = kata;
							}
							else {
							document.getElementById("notFound").style.display = "none";
							document.getElementById("hasil").style.display = "block";*/
							document.getElementById("headers").style.display = "none";
							document.getElementById("hasil_search").style.display = "block";
							var divhasil='';
							
							for (var i = 0; i < getHeader.length; i++) {
							  
							  var id_header = getHeader[i].getAttribute("id_header");
							  var nama_header = getHeader[i].getAttribute("nama_header");
							  var jenis_header = getHeader[i].getAttribute("jenis_header");
							  var id_event = getHeader[i].getAttribute("id_event");
							  var status = getHeader[i].getAttribute("status");
							  var path_gambar = getHeader[i].getAttribute("path_gambar");
							  var ischeck='';
							  if (status==1) {
								ischeck += 'checked="checked"';
							  }
							  var getUrl = window.location;
							  var baseUrl = getUrl .protocol + "//" + getUrl.host;
							  
							  
							  divhasil += '<div class="col-md-4" style="text-align: center">';
							  divhasil += '<div class="well" style="padding:10px">';
							  divhasil += '<input onclick="publish2('+id_header+')" type="checkbox" name="header" id="header'+id_header+'" value="'+id_header+'" '+ischeck+'>';
							  divhasil += '<img height="100%" width="100%" alt="" src="'+baseUrl+'/asset/upload_img_header/'+path_gambar+'">';
							  divhasil += '<br/>'+nama_header+'<br/>';
							  divhasil += '<a href="'+baseUrl+'/KelolaHeader/edit_header/'+id_header+'"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil" ></i> Edit</button></a>';
							  divhasil += '<a href="'+baseUrl+'/KelolaHeader/delete_header/'+id_header+'"><button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash" ></i> Hapus</button></a>';
							  
							  
							  divhasil += "</div></div>";
							  
							  //document.getElementById("arti").innerHTML = "<b>"+jawa+"</b> yang berarti <b>"+indonesia+"</b>";
							  //document.getElementById("deskripsikata").innerHTML = "<strong>"+deskripsi_jawa+"</strong>";
							}
							document.getElementById("hasil_search").innerHTML = divhasil;
							//}
						},"text");
				}
				
				function lihatSemua(){
					document.getElementById("headers").style.display = "block";
					document.getElementById("hasil_search").style.display = "none";
				}
			</script>