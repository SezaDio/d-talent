<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>D-Talent | Dashboard</title>
        
        <!-- load bootsrap -->
        <link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        
        <!-- Ionicons -->
        <link href="<?php echo base_url('asset/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />
        
        <!-- Theme style -->
        <link href="<?php echo base_url('asset/css/style.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- DataTables CSS --> 
        <link href="<?php echo base_url('asset/css/jquery.dataTables.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- daterange picker -->
        <link href="<?php echo base_url('asset/css/daterangepicker/daterangepicker-bs3.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url('asset/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js?ver=b3.0'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js?ver=b2.0'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-ui.min.js?ver=b2.0'); ?>"></script>
    <style>
	/*css modal*/
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 2; /* Sit on top */
			left: 0;
			top: 0;
			margin: auto;
			width: 100%;
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.6) /* Black w/ opacity */
		}
		
		/* Modal Content/Box */
		.modal-content {
			background-color: #fefefe;
			margin: 8% auto; /* 15% from the top and centered */
			padding: 20px;
			border: 1px solid #888;
			width: 80%; /* Could be more or less, depending on screen size */
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s
		}
        .modal-dialog{
            width: 800px;
        }
        /* handling anomaly bootstrap modal */
        .modal-backdrop.in{
            display: none;
        }

	</style>    
    </head>
    
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header style="position: fixed;" class="header">
            <a href="<?php echo site_url('AdminDashboard/index');?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Administrator
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('nama_admin');?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url('asset/upload_img_admin/'.$this->session->userdata('path_foto')); ?>" class="img-circle" alt="User Image">
                                    <p>
                                        Administrator
                                        
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('Account/logout');?>" class="btn btn-danger btn-sm">Keluar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <!-- load for form validation -->
        <?php
            $this->load->library('form_validation');
        ?>