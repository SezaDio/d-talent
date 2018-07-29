	<!-- Navbar End -->   
	  <!--DIV SLIDER-->
      <div>   
        <div class="row">
          <div class="col-md-12">
			<div id="carouselExampleIndicators" class="carousel slide big-slider" data-ride="carousel">
				<ol class="carousel-indicators">
				  <?php $i=0;
				  foreach($listSlider as $slider){ ?>
				  <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i;?>" class="<?php if($slider['id_slider']==$frontSlider->id_slider){?>active<?php } ?>"></li>
				  <?php $i++; } ?>
				</ol>
				<div class="carousel-inner " role="listbox" >
				  <!-- Slide One - Set the background image for this slide in the line below -->
				  <?php foreach($listSlider as $slider){ ?>
				  <div class="carousel-item <?php if($slider['id_slider']==$frontSlider->id_slider){?>active<?php } ?>" style="background-image: url(<?php echo base_url('asset/img/upload_img_slider/'.$slider['path_gambar'])?>)">
					<div class="carousel-caption d-none d-md-block">
					  <h3><?php echo $slider['judul_slider'];?></h3>
					  <p><?php echo $slider['deskripsi'];?></p>
					</div>
				  </div>
				  <?php } ?>
				  
				</div>
				
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
			<div id="carouselExampleIndicators2" class="carousel slide  small-slider" data-ride="carousel">
				<ol class="carousel-indicators">
				  <?php $i=0;
				  foreach($listSlider as $slider){ ?>
				  <li data-target="#carouselExampleIndicators2" data-slide-to="<?php echo $i;?>" class="<?php if($slider['id_slider']==$frontSlider->id_slider){?>active<?php } ?>"></li>
				  <?php $i++; } ?>
				</ol>
				<div class="carousel-inner" role="listbox" >
				  <!-- Slide One - Set the background image for this slide in the line below -->
				  <?php foreach($listSlider as $slider){ ?>
				  <div class="carousel-item <?php if($slider['id_slider']==$frontSlider->id_slider){?>active<?php } ?>" style="background-image: url(<?php echo base_url('asset/img/upload_img_slider/small_'.$slider['path_gambar'])?>)">
					<div class="carousel-caption d-none d-md-block">
					  <h3><?php echo $slider['judul_slider'];?></h3>
					  <p><?php echo $slider['deskripsi'];?></p>
					</div>
				  </div>
				  <?php } ?>
				  
				</div>
				
				<a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
				  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
				  <span class="carousel-control-next-icon" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		  </div>
			
		</div> 
	  </div>        
	  <!--END DIV SLIDER-->
    </header>

    <!-- Services Section Start -->
    <section id="services" class="section" style="padding: 35px 0;">
      <div class="container">

    		<div class="row">
    		  <div class="col-md-12" style="text-align: center;">
            <div class="section-header" style="margin-top:30px">          
              <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Join With Us</h2>
              <hr class="lines wow zoomIn" data-wow-delay="0.3s">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>

          <div class="col-md-5 col-sm-6 col-xs-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.2s">
              <a href="<?php echo site_url('AccountTalent/index/'); ?>"> 
                <div class="icon" style="margin-bottom: 12px;width: 80px;height: 80px;border-radius:40px">
                  <i class="fa fa-user-tie" style="font-size: 30px;line-height: 80px;"></i>
                </div>
              </a>
              <h4>Jobseeker</h4>
              <!--<p>on recruitment, company only pay assessment cost</p>-->
              </div>
          </div> 
          <div class="col-md-5 col-sm-6 col-xs-6">
            <div class="item-boxes wow fadeInDown" data-wow-delay="0.8s">
              <a href="<?php echo site_url('AccountCompany/index/'); ?>">
                <div class="icon" style="margin-bottom: 12px;width: 80px;height: 80px;border-radius:40px">
                  <i class="fa fa-building" style="font-size: 30px;line-height: 80px;"></i>
                </div>
              </a>
              <h4>Company</h4>
              <!--<p>due to data base availability</p>-->
            </div>
          </div>

          <div class="col-md-1"></div>
        </div>

      </div>
    </section>
    <!-- Services Section End -->

    <!-- Features Section Start -->
    <section id="features" class="section" data-stellar-background-ratio="0.2">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">MISSION</h2>
          <hr class="lines">
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="container">
              <div class="row">
                 <div class="col-lg-4 col-sm-4 col-xs-12 box-item">
                    <span class="icon">
                     <i class="fa fa-money-bill-wave"></i>
                    </span>
                    <div class="text" style="margin-top: 20px;">
                      <h4 style="color: white;"><b>Cost Efficiency</b></h4><p></p>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-xs-12 box-item">
                    <span class="icon">
                      <i class="fa fa-user-tie"></i>
                    </span>
                    <div class="text" style="margin-top: 20px;">
                      <h4 style="color: white;"><b>Ready-to-work Talent</b></h4>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-4 col-xs-12 box-item">
                    <span class="icon">
                      <i class="fa fa-sync-alt"></i>
                    </span>
                    <div class="text" style="margin-top: 6px;">
                      <h4 style="color: white;"><b>Integrated Assessment and Training</b></h4>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Section End -->    

    <!-- Benefit Section -->
    <section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Benefit</h2>
          <hr class="lines">
        </div>
        
        <div class="row">

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-3" style="border: solid 1px black;">
                <p>Gambar Company</p>
              </div>
              <div class="col-md-9">
                <ul style="list-style-type: square;">
                  <li>
                    <p style="font-size: 1.2em;"><strong>Cost Eficiency </strong>on recruitment, company only pay assessment cost</p>
                    <hr class="lines">
                  </li>
                  <li>
                    <p style="font-size: 1.2em;"><strong>Time Eficiency </strong>, due to data base availability</p>
                    <hr class="lines">
                  </li>
                  <li>
                    <p style="font-size: 1.2em;"><strong>Ready-to-work talent </strong>, with basic and customized</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-3" style="border: solid 1px black;">
                <p>Gambar Jobseeker</p>
              </div>
              <div class="col-md-9">
                <ul>
                  <li>
                    <p style="font-size: 1.2em;"><strong>One-Stop-Point </strong>of job seeking</p>
                    <hr class="lines">
                  </li>
                  <li>
                    <p style="font-size: 1.2em;"><strong>Consultancy & Trainings</strong></p>
                    <hr class="lines">
                  </li>
                  <li>
                    <p style="font-size: 1.2em;"><strong>Time Eficiency </strong>with IT base recruitment</p>
                    <hr class="lines">
                  </li>
                  <li>
                    <p style="font-size: 1.2em;">Their <strong>database</strong> is <strong>open</strong> for companies</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </section>
    <!-- blog Section End -->

    <!-- Start Video promo Section -->
    <section class="video-promo section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="video-promo-content text-center">
                <h2 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Watch Our Intro video</h2>
                <p class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p>
                <a href="https://www.youtube.com/watch?v=IXoMDwh4Cq8" class="video-popup wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s"><i class="lnr lnr-film-play"></i></a>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Video Promo Section -->

    <!-- Start Pricing Table Section -->
    <div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Membership</h2>
          <hr class="lines"><br><br>
          <div class="row">
            <div class="col-md-12">
              <a id="company-button" href="javascript:void(0)" class="btn btn-common">COMPANY</a>
              <a id="jobseeker-button" href="javascript:void(0)" class="btn btn-common">JOBSEEKER</a>
            </div>
          </div>
        </div>

        <!--Harga membership company-->
        <div class="row pricing-tables" id="company-membership-content">
          <div class="col-md-4 col-sm-6 col-xs-12" style="padding-top: 10px;">
            <div class="pricing-table" style="height: 100%;">
              <div class="pricing-details">
                <h2>Free</h2>
                <span><p style="visibility: hidden;">$3.99</p></span>
                <ul>
                  <li>Free upload Company Data</li>
                  <li>Preview The Summary of Jobseeker' s database</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12" style="padding-top: 10px;">
            <div class="pricing-table" style="height: 100%;">
              <div class="pricing-details">
                <h2>Gold</h2>
                <span>$3.99</span>
                <ul>
                  <li>Free upload the Vacancy</li>
                  <li>Free Online Recruitment</li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="plan-button">
                  <!--<a href="#" class="btn btn-common">Buy Now</a>-->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12" style="padding-top: 10px;">
            <div class="pricing-table" style="height: 100%;">
              <div class="pricing-details">
                <h2>Platinum</h2>
                <span>$3.99</span>
                <ul>
                  <li>Ready-to-work talent</li>
                  <li><br></li>
                </ul>
              </div>
              <div class="col-md-12">
                <div class="plan-button">
                  <!--<a href="#" class="btn btn-common">Buy Now</a>-->
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Harga membership jobseeker-->
        <div id="jobseeker-membership-content">
          <div class="row pricing-tables">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="pricing-table" style="padding-bottom: 0px;">
                <div class="pricing-details">
                  <h2>Free Membership</h2>
                  <div class="row">
                    <div class="col-md-6" style="height: 100px;">
                      <ul style="text-align: left; padding-left: 10px;">
                        <li><i class="fa fa-check" style="color: limegreen;"></i> Free sign in</li>
                        <li><i class="fa fa-check" style="color: limegreen;"></i> Free upload CV with template form</li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <ul style="text-align: left; padding-left: 10px;">
                        <li><i class="fa fa-check" style="color: limegreen;"></i> Free online test (passion and interest)</li>
                        <li><i class="fa fa-check" style="color: limegreen;"></i> List of Vacancy</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>

          <div class="row pricing-tables">
            <div class="col-md-3 col-sm-6 col-xs-12" style="padding-top: 10px;">
              <div class="pricing-table" style="height: 100%;">
                <div class="pricing-details">
                  <h2>Bronze</h2>
                  <span>$3.99</span>
            
                    <ul>
                      <li>Online English Test</li>
                      <li>Online Academic Test</li>
                      <li>Apply online</li>
                    </ul>
                  
                </div>
                <div class="col-md-12">
                  <div class="plan-button">
                    <!--<a href="#" class="btn btn-common">Buy Now</a>-->
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" style="padding-top: 10px;">
              <div class="pricing-table" style="height: 100%;">
                <div class="pricing-details">
                  <h2>Silver</h2>
                  <span>$9.50</span>
                  
                    <ul>
                      <li>Online Character Test</li>
                      <li>Online Intelligence Test</li>
                      <li><br></li>
                    </ul>
                  
                </div>
                <div class="plan-button">
                  <!--<a href="#" class="btn btn-common">Buy Now</a>-->
                </div>
              </div>
            </div>
  		  
  		      <div class="col-md-3 col-sm-6 col-xs-12" style="padding-top: 10px;">
              <div class="pricing-table" style="height: 100%;">
                <div class="pricing-details">
                  <h2>Gold</h2>
                  <span>$9.50</span>
                  
                    <ul>
                      <li>Online Soft Skill Test</li>
                      <li>Online Management Style Test</li>
                      <li>Online Work Attitude</li>
                    </ul>
                  
                </div>
                <div class="plan-button">
                  <!--<a href="#" class="btn btn-common">Buy Now</a>-->
                </div>
              </div>
            </div>
  		  
  		      <div class="col-md-3 col-sm-6 col-xs-12" style="padding-top: 10px;">
              <div class="pricing-table" style="height: 100%;">
                <div class="pricing-details">
                  <h2>Platinum</h2>
                  <span>$9.50</span>
                 
                    <ul>
                      <li>Upload CV with PDF and Video</li>
                      <li>Online Behavioral Test</li>
                      <li>Talent Solution</li>
                    </ul>
                  </div>
                
                <div class="plan-button">
                  <!--<a href="#" class="btn btn-common">Buy Now</a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Pricing Table Section -->

    <!-- Counter Section Start -->
    <div class="counters section" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row"> 
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">   
              <div class="icon">
                <i class="lnr lnr-clock"></i>
              </div>             
              <div class="fact-count">
                <h3><span class="counter">24</span></h3>
                <h4>Working Hours</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item">   
              <div class="icon">
                <i class="lnr lnr-briefcase"></i>
              </div>            
              <div class="fact-count">
                <h3><span class="counter">699</span></h3>
                <h4>Company</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item"> 
              <div class="icon">
                <i class="lnr lnr-user"></i>
              </div>              
              <div class="fact-count">
                <h3><span class="counter">203</span></h3>
                <h4>Jobseeker</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="facts-item"> 
              <div class="icon">
                <i class="lnr lnr-heart"></i>
              </div>              
              <div class="fact-count">
                <h3><span class="counter">1689</span></h3>
                <h4>Vacancy</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Counter Section End -->

    <!-- testimonial Section Start -->
    <div id="testimonial" class="section" data-stellar-background-ratio="0.001">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <div class="touch-slider owl-carousel owl-theme">
			<?php foreach($listTestimoni as $testimoni){ ?>
              <div class="testimonial-item">
                <img src="<?php echo base_url('asset/img/upload_img_testimoni/'.$testimoni['path_gambar'])?>" alt="Client Testimonoal" />
                <div class="testimonial-text">
                  <p>
                      <?php //echo $testimoni['deskripsi'];?>
                      
                      <?php
                          $panjang = strlen($testimoni['deskripsi']);
                          if ($panjang >= 100)
                          {
                              $isi=strip_tags($testimoni['deskripsi']);
                              $isi=substr($isi,0,200);
                              echo $isi." ..."; ?>

                              <a href="<?php //$url = strtolower(str_replace(" ","-",$event['nama_coming'])); echo base_url('/'.$event['id_coming'].'?ev='.$url); ?>" class="readmore"><strong>Read More</strong></a>
                    <?php } 
                          else
                          {
                              echo $testimoni['deskripsi'];
                          }?>     
                  </p>
                  <h3><?php echo $testimoni['nama_testimoni'];?></h3>
                  <span><?php echo $testimoni['job'];?></span>
                </div>
              </div>
			<?php } ?>
              
            </div>
          </div>
        </div>        
      </div>
    </div>
    <!-- testimonial Section Start -->

    <!-- Contact Section Start -->
    <section id="contact" class="section" data-stellar-background-ratio="-0.2">      
      <div class="contact-form">
        <div class="container">
          <div class="row">     
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="contact-us">
                <h3>Contact With us</h3>
                <div class="contact-address">
                  <p>Centerville Road, DE 19808, US </p>
                  <p class="phone">Phone: <span>(0812-3921-2006)</span></p>
                  <p class="email">E-mail: <span>(company.service@d-talent.id)</span></p>
                </div>
                <div class="social-icons">
                  <ul>
                    <li class="facebook"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>     
            <div class="col-lg-6 col-sm-6 col-xs-12">
              <div class="contact-block">

                <form method="post" action="<?php echo site_url('CompanyProfile/kirim_pesan_hubungi_kami/');?>">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name" name="nama_lengkap" placeholder="Your Name" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                      </div>                                 
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" placeholder="Subject" id="message_subject" class="form-control" name="subject" required data-error="Please enter your email">
                        <div class="help-block with-errors"></div>
                      </div> 
                    </div>

                    <div class="col-md-12">
                      <div class="form-group"> 
                        <textarea class="form-control" id="message" name="pesan" placeholder="Your Message" rows="8" data-error="Write your message" required></textarea>
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="submit-button text-center">
                        <button name="submit" value="1" class="btn-contact btn-contact-common" id="submit" type="submit"><i class="fa fa-send"></i> <b>Send Message</b></button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div> 
                        <div class="clearfix"></div> 
                      </div>
                    </div>

                  </div>            
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>           
    </section>
    <!-- Contact Section End -->