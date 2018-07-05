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
    <!-- <link href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" /> -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('asset/Template Company Profile/css/bootstrap.min.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/animate.css')?>">
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/main.css?v='.rand().'')?>">    
    <link rel="stylesheet"  href="<?php echo base_url('asset/Template Company Profile/css/responsive.css')?>">

    <!-- D-Talent -->
    <link href="<?php echo base_url('asset/css/talent.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('asset/css/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    
    
    <!-- JS -->
    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js?ver=b3.0'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js?ver=b2.0'); ?>"></script>
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
            <a href="index.html" class="navbar-brand"><img class="img-fulid" src="<?php echo base_url('asset/img/logo.png'); ?>" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lnr lnr-menu"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#hero-area"><i class="fa fa-home"></i> <b>Home</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#features"><i class="fa fa-bullseye"></i> <b>Job List</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#blog"><i class="fa fa-check"></i> My CV</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing"><i class="fa fa-user"></i> <b>My Account</b></a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
           <li>
              <a class="page-scroll" href="#hero-area">Home</a>
            </li>
            <li>
              <a class="page-scroll" href="#services">Job List</a>
            </li>
            <li>
              <a class="page-scroll" href="#features">My CV</a>
            </li>
            <li>
              <a class="page-scroll" href="#portfolios">My Account</a>
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