
    <!-- Footer Section Start -->
    <footer>          
      <div class="container">
        <div class="row">
          <!-- Footer Links -->
          <div class="col-lg-12" >
            <div style="color: white; text-align: center;">
              <p>All copyrights reserved &copy; 2018 - Designed & Developed by IT Team D-Talent</p>
            </div>
          </div>  
        </div>
      </div>
    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lnr lnr-arrow-up"></i>
    </a>
    
    <div id="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>     

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery-min.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.mixitup.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/nivo-lightbox.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/owl.carousel.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.stellar.min.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.nav.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/scrolling-nav.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.easing.min.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/smoothscroll.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.slicknav.js')?>"></script>     
    <script src="<?php echo base_url('asset/Template Company Profile/js/wow.js')?>"></script>   
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.vide.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.counterup.min.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/jquery.magnific-popup.min.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/waypoints.min.js')?>"></script>    
    <script src="<?php echo base_url('asset/Template Company Profile/js/form-validator.min.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/js/contact-form-script.js')?>"></script>   
    <script src="<?php echo base_url('asset/Template Company Profile/js/main.js')?>"></script>
    <script src="<?php echo base_url('asset/Template Company Profile/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <script type="text/javascript">

          $("#jobseeker-membership-content").hide();

          $("#company-button").click(function(){
            $("#jobseeker-membership-content").hide();
            $("#company-membership-content").show();
          });

          $("#jobseeker-button").click(function(){
            $("#jobseeker-membership-content").show();
            $("#company-membership-content").hide();
          });

          $(document).ready(function() {
            $("#owl-demo").owlCarousel({
              items : 3,
              loop : true,
              autoplay : true,
              lazyLoad : true,
              autoplayTimeout:3000,
              navigation : true,
              navigationText :  false,
              pagination : false,
            });
          });
    </script>  

  </body>
</html>