	</div>
	<!-- ./talent-page -->

	
    <!-- Footer Section Start -->
    <footer>          
      <div class="container">
        <div class="row">
          <!-- Footer Links -->
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <!-- <ul class="footer-links">
              <li>
                <a href="#">Homepage</a>
              </li>
              <li>
                <a href="#">Services</a>
              </li>
              <li>
                <a href="#">About Us</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul> -->
          </div>
          <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="copyright">
              <p>&copy; D-Talent - 2018</p>
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
    
    <script type="text/javascript">
    	$(function () {
    		/* toast */
		    // display notification if message not null
		    if ($('.toast').children().length > 0) {
		        $('.toast').animate({
		            'opacity': 1,
		            'right': "30px"
		        }, 300).animate({ 'right': "15px" }, 400);

		        // close notification by time
		        setTimeout(close_pop_up, 7000);
		    }
		    // close notification function
		    function close_pop_up(){
		        var width = $('.toast').width();
		        $('.toast').animate({
		            'opacity': 0,
		            'right': -width
		        }, 300, function(){
		            $('.toast').remove();
		        });
		    }

		    // close notification
		    $('.toast .close').click(close_pop_up);

		    // remove notification when clicked out of target
		    $(document).click(function(e) {
		        var pop_up = $('.toast');
		        if (!pop_up.is(e.target)) {
		            close_pop_up();
		        }
		    });
    		/* ./toast */
        });
    </script>

    <!-- Template JS. -->
    <!-- moved to header -->
    <!-- <script src="<?php echo base_url('asset/Template Company Profile/js/jquery-min.js')?>"></script>  -->
   
    <script src="<?php echo base_url('asset/Template Company Profile/js/popper.min.js')?>"></script>
    <!-- <script src="<?php echo base_url('asset/Template Company Profile/js/bootstrap.min.js')?>"></script> -->
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
</body>
</html>