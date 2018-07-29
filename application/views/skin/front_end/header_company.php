<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>D-Talent Beta</title>

    <!-- Bootstrap CSS -->
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
    <link href="<?php echo base_url('asset/css/company-member.css'); ?>" rel="stylesheet" type="text/css" />
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    
	
	<style>
      @media only screen and (max-width: 340px) {
        #company-button,
        #jobseeker-button{
          margin-bottom: 15px;
        }
      }
		/* Extra small devices (phones, 600px and down) */
			@media only screen and (max-width: 600px) {
				.big-slider {display: none;}
				.small-slider {display: block;}
			}
		/* Medium devices (landscape tablets, 768px and up) */
			@media only screen and (min-width: 768px) {
				.small-slider {display: none;}
			} 
		
		/* Large devices (laptops/desktops, 992px and up) */
			@media only screen and (min-width: 992px) {
				.small-slider {display: none;}
			}

      .sprite-bg{
        width: 220px;
        height: 62px;
        background-position: 0px 0px;
        background-repeat: no-repeat;
      }
      .menu-bg .navbar-brand{
        margin-top: 5px;
      }
      .menu-bg .sprite-bg{
        background-position: 0px -62px;
      }
      .navbar .nav-link{
        color: #fff !important;
      }
      .navbar .nav-link.active,
      .navbar .nav-link:hover{
          color: #333 !important;
          background: #fff;
      }
      .menu-bg.navbar .nav-link{
        color: #333 !important;
      }
      .menu-bg.navbar .nav-link.active,
      .menu-bg.navbar .nav-link:hover{
          color: #fff !important;
          background: #333;
      }

      .back-to-top i{
        background-color: #fff;
        color: #000;
        font-weight: bold;
        border: 1px solid #000;
      }

	</style>
	
  </head>
  <body>

    <!-- Header Section Start -->
    <header id="hero-area" data-stellar-background-ratio="0.5">    
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
              <!-- <img class="img-fulid" src="<?php echo base_url('asset/img/logo1.png')?>" alt=""> -->
              <figure class="sprite-bg" style="background-image: url('<?php echo base_url('asset/img/logo-sprite.png')?>');"></figure>
            </a>
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
                <a class="nav-link page-scroll" href="#features"><i class="fa fa-bullseye"></i> <b>Mission</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#blog"><i class="fa fa-check"></i> <b>Benefit</b></a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link page-scroll" href="#portfolios">Works</a>
              </li>-->
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing"><i class="fa fa-users"></i> <b>Membership</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#testimonial"><i class="fa fa-star"></i> <b>Testimonial</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact"><i class="fa fa-envelope"></i> <b>Contact</b></a>
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
              <a class="page-scroll" href="#features">Mission</a>
            </li>
            <li>
              <a class="page-scroll" href="#blog">Benefit</a>
            </li>
            <li>
              <a class="page-scroll" href="#pricing">Membership</a>
            </li>
            <li>
              <a class="page-scroll" href="#testimonial">Testimonial</a>
            </li>
            <li>
              <a class="page-scroll" href="#contact">Contact</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

      </nav>
      
    <!-- Header Section End --> 