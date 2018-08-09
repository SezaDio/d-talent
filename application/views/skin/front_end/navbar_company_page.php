    <header style="z-index: 9999;" id="hero-area" data-stellar-background-ratio="0.5">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg scrolling-navbar indigo" style="position: fixed; background: white; box-shadow: 5px 5px 5px lightgrey; width:100%;">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header" style="height: 85px;">
            <!--Gambar Logo Company-->
            <a href="<?php echo site_url('CompanyProfile'); ?>" class="navbar-brand">
              <img style="margin-top: 5px;" class="img-fulid" src="<?php echo base_url('asset/img/logo1.png')?>" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lnr lnr-menu"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('CompanyMember/updates_page'); ?>"><i class="fa fa-newspaper"></i> <b>Updates</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('CompanyMember/overview_page'); ?>"><i class="fa fa-eye"></i> <b>Overview</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('CompanyMember/jobs_page'); ?>"><i class="fa fa-briefcase"></i> <b>Jobs</b></a>
              </li>
			  <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('talent-list'); ?>"><i class="fa fa-user"></i> <b>Talent</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="<?php echo site_url('company/notification'); ?>"><i class="fa fa-bell"></i> <b>Notification</b></a>
              </li>
              <li class="nav-item treeview dropdown" role="presentation" style="border-left: solid 1px black;">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">
                  <i class="fa fa-cog"></i> <b>Admin Tools <i class="fa fa-chevron-down"></i></b>
                </a>
                <div class="dropdown-menu" style="margin-left: 10px;">
                  <ul>
                    <li class="dropdown-item"><a href="<?php echo site_url('CompanyMember/index'); ?>" style="color: black;">Member View</a></li>
                    <li class="dropdown-item"><a href="<?php echo site_url('CompanyMember/editPassword'); ?>" style="color: black;">Ubah Password</a></li>
                    <li class="dropdown-item"><a href="<?php echo site_url('AccountCompany/logout_company'); ?>" style="color: black;">Log Out</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
           <li>
              <a class="page-scroll" href="<?php echo site_url('CompanyMember/updates_page'); ?>">Updates</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('CompanyMember/overview_page'); ?>">Overview</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('CompanyMember/jobs_page'); ?>">Jobs</a>
            </li>
			<li>
              <a class="page-scroll" href="<?php echo site_url('talent-list'); ?>">Talent</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('company/notification'); ?>">Notification</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('CompanyMember/index'); ?>">Member View</a>
            </li>
            <li>
              <a class="page-scroll" href="<?php echo site_url('AccountCompany/logout_company'); ?>">Log Out</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

      </nav>
      <div class="container">
        <div class="row">
          
        </div>
      </div>
      <br><br><br><br>
    </header>
    <br><br>

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
