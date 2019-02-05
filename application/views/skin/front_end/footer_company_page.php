
    <!-- Footer Section Start -->
    <footer style="background-image: url(<?php echo base_url('asset/img/footer-bg-2.png')?>)">          
      <div class="container">
        <div class="row">
          <!-- Footer Links -->
          <div class="col-lg-12" style="text-align: center; color: white;" >
            
              <p>All copyrights reserved &copy; 2018 - Designed & Developed by IT Team D-Talent</p>
            
          </div>  
        </div>
      </div>
    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lnr lnr-arrow-up"></i>
    </a>
     

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/popper.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.mixitup.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/nivo-lightbox.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/owl.carousel.js')?>"></script>  
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.stellar.min.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.nav.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/scrolling-nav.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.easing.min.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/smoothscroll.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.slicknav.js')?>"></script>     
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/wow.js')?>"></script>   
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.vide.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.counterup.min.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/jquery.magnific-popup.min.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/waypoints.min.js')?>"></script>    
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/form-validator.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/contact-form-script.js?v='.rand().'')?>"></script>   
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/js/main.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/Template Company Profile/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- summernote -->
    <script type="text/javascript" src="<?php echo base_url('asset/plugins/summernote/dist/summernote-bs4.js')?>"></script>
    <!-- DataTables --> 
    <script src="<?php echo base_url('asset/js/jquery.dataTables.js?ver=b1.0'); ?>" type="text/javascript"></script>
  
    <script type="text/javascript">
    //summernote init

    $('#summernote').summernote({
        placeholder: 'Describe the job description, requirement, etc . . .',
        tabsize: 2,
        height: 150
    });

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

        /* notification page */
        // data table
        $('.data-table').DataTable();

      });      
    </script>

  </body>
</html>