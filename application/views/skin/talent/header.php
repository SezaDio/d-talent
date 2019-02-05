<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">

	  <title><?php echo $page_title; ?></title>
    <!-- D-Talent -->
    <link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
	 <link href="<?php echo base_url('asset/css/datepicker/datepicker3.css'); ?>" rel="stylesheet"/>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('asset/Template Company Profile/css/bootstrap.min.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/font-awesome.min.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/line-icons.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/owl.carousel.css?v='.rand().'')?>">    
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/owl.theme.css?v='.rand().'')?>">    
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/nivo-lightbox.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/magnific-popup.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/slicknav.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/animate.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/main.css?v='.rand().'')?>">    
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/responsive.css')?>">
	<link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/full-slider.css?v='.rand().'')?>">

    <!-- D-Talent -->
    <link href="<?php echo base_url('asset/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('asset/css/talent.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('asset/css/talent-responsive.css'); ?>" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    
    
    <!-- Template JS. -->
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery-min.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/bootstrap.min.js')?>"></script>
    
    <!-- JS -->
    <!-- <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-3.2.0.min.js'); ?>"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js?ver=b2.0'); ?>"></script> -->
	<script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap-select.min.js'); ?>"></script>

</head>
<body>
    <!-- Header Section Start -->
    <header data-stellar-background-ratio="0.5">    
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a href="<?php echo site_url('CompanyProfile'); ?>" class="navbar-brand"><img class="img-fulid" src="<?php echo base_url('asset/img/logo1.png'); ?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lnr lnr-menu"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('talent');?>"><i class="fa fa-clipboard-check"></i> <b>My CV</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('JobVacancy/job_list');?>"><i class="fa fa-list-ul"></i> <b>Job List</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('talent/account/edit');?>"><i class="fa fa-user"></i> <b>My Account</b></a>
              </li>

              <li class="nav-item treeview dropdown" role="presentation">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">
                  <i class="fa fa-file-alt"></i> <b>Tes Online</b> <i class="fa fa-chevron-down"></i>
                </a>
                <div class="dropdown-menu" style="margin-left: 10px;">
                  <ul>
                    <li class="dropdown-item"><a href="<?php echo site_url('talent/test-character'); ?>" >Tes Karakter</a></li>
                    <li class="dropdown-item"><a href="<?php echo site_url('talent/test-soft-skill'); ?>" >Tes Soft Skill</a></li>
                    <li class="dropdown-item"><a href="<?php echo site_url('talent/test-work-attitude'); ?>" >Tes Work Attitude</a></li>
                    <li class="dropdown-item"><a href="<?php echo site_url('talent/test-passion'); ?>" >Tes Minat dan Bakat</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('talent/courses');?>"><i class="fa fa-user"></i> <b>My Courses</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('talent/logout');?>"><i class="fa fa-sign-out-alt"></i> <b>Logout</b></a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent');?>">My CV</a>
            </li>
            <li>
              <a class="page-scroll" href="#services">Job List</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/account/edit');?>">My Account</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/test-character');?>">Tes Karakter</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/');?>">Tes Soft Skill</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/');?>">Tes Work Attitude</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/test-passion');?>">Tes Minat dan Bakat</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/courses');?>">My Courses</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('talent/logout');?>">Logout</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->
      </nav>
    
	</header>
    <!-- Header Section End --> 

	<!-- Toast Message -->
	<?php
		$this->load->library('form_validation');
	?>
	<div class="toast">
		<!-- Cek error -->
		<?php
	    	if($this->session->has_userdata('msg_error')) {
		?>
		    <div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Error!</h4>
				<?php echo $this->session->msg_error; ?>
			</div>
	  	<?php
	  		}
		?>

		<!-- Cek success -->
		<?php
	    	if($this->session->has_userdata('msg_success')) {
	    ?>
	        <div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-check"></i> Success!</h4>
	            <?php echo $this->session->msg_success; ?> 
	        </div>
	  	<?php
	  		}
		?>
	</div>
	<!-- ./Toast Message -->

	<div class="talent-page">