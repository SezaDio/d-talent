<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="margin-top: 45px;">
                    <h1>
                       Dashboard
                    </h1>
					<div id="instafeed"></div>
                    <ol class="breadcrumb">
                        <li class="active"><a href="#"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php //echo $jum_pesan; ?>
                                        1000
                                    </h3>
                                    <p>
                                        Job Vacancy
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </div>
                                <a href="<?php echo site_url('FrontControl_ContactUs/kelola_message'); ?>" class="small-box-footer">
                                    More info <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php //echo $jum_approve_event;?>
                                        1000
                                    </h3>
                                    <p>
                                        Company Member
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </div>
                                <a href="<?php echo site_url('KelolaComing/index'); ?>" class="small-box-footer">
                                    More info <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php //echo $jum_pending_event;?>
                                        1000
                                    </h3>
                                    <p>
                                        Talent Member
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-hourglass"></i>
                                </div>
                                <a href="<?php echo site_url('KelolaComing/validasi_coming'); ?>" class="small-box-footer">
                                    More info <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php //echo $jum_pending_pepak;?>
                                        1000
                                    </h3>
                                    <p>
                                        Message
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </div>
                                <a href="<?php echo site_url('KelolaPepak/validasi_pepak'); ?>" class="small-box-footer">
                                    More info <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="glyphicon glyphicon-stats"></i>
                                    <h3 class="box-title">Statistik Company Member</h3>
                                </div>
                                <div class="box-body">
                                    <!-- panggil grafik ocit -->
                                    <div id="container" class="chart" style="min-width: 400px; height: 360px; margin: 0 auto">
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section>

                        <section class="col-lg-6 connectedSortable">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="glyphicon glyphicon-stats"></i>
                                    <h3 class="box-title">Statistik Talent Member</h3>
                                </div>
                                <div class="box-body">
                                    <!-- panggil grafik ocit -->
                                    <div id="container" class="chart" style="min-width: 400px; height: 360px; margin: 0 auto">
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->

            <script type="text/javascript">
                var data_member_url = "<?php //echo site_url('AdminDashboard/get_data_jumlah_member'); ?>";
            </script>
            
            <script src="<?php echo base_url('asset/js/highcharts.js?ver=b1.0'); ?>"></script>
            <script src="<?php echo base_url('asset/js/exporting.js?ver=b1.0'); ?>"></script>
            <script src="<?php echo base_url('asset/js/grafik_tahun.js?ver=b1.0'); ?>"></script>