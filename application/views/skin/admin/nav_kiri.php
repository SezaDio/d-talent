<aside style="position: fixed;" class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="<?php echo site_url('AdminDashboard/index');?>">
                                 <i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

						<li>
                            <a href="<?php echo site_url('KelolaSlider/index'); ?>">
                                <i class="glyphicon glyphicon-picture"></i> <span> Kelola Slider </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('KelolaPesan/index'); ?>">
                                <i class="glyphicon glyphicon-envelope"></i> <span> Kelola Pesan </span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('KelolaTestimoni/index'); ?>">
                                <i class="glyphicon glyphicon-star"></i> <span> Kelola Testimoni </span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-th-list"></i> <span>Kelola Tes Online</span>
                                <i class="glyphicon glyphicon-menu-right pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('admin/test-softskill'); ?>"><i class="glyphicon glyphicon-minus"></i> Tes Softskill</a></li>
                                <li><a href="<?php echo site_url('admin/test-character'); ?>"><i class="glyphicon glyphicon-minus"></i> Tes Karakter</a></li>
                                <li><a href="<?php echo site_url('admin/test-work-attitude'); ?>"><i class="glyphicon glyphicon-minus"></i> Tes Work Attitude</a></li>
                                <li><a href="<?php echo site_url('admin/test-passion-interest'); ?>"><i class="glyphicon glyphicon-minus"></i> Tes Minat dan Bakat</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-th-list"></i> <span>Company & Talent</span>
                                <i class="glyphicon glyphicon-menu-right pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url('KelolaCompanyTalent/company_list'); ?>"><i class="glyphicon glyphicon-minus"></i> List Company Member</a></li>
                                <li><a href="<?php echo site_url('KelolaCompanyTalent/talent_list'); ?>"><i class="glyphicon glyphicon-minus"></i> List Talent Member</a></li>
                            </ul>
                        </li>

                        
                        <li class="treeview">
                            <a href="#">
								<i class="glyphicon glyphicon-user"></i> <span>Lowongan & Pendaftar</span>
								<i class="glyphicon glyphicon-menu-right pull-right"></i>
							</a> 
							<ul class="treeview-menu">
                                <li><a href="<?php //echo site_url('KelolaMember/index'); ?>"><i class="glyphicon glyphicon-minus"></i> List Lowongan Kerja</a></li>
                                <li><a href="<?php //echo site_url('KelolaMember/validasi_member'); ?>"><i class="glyphicon glyphicon-minus"></i> List Pendaftar Kerja</a></li>
                            </ul>
                        </li> 
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>