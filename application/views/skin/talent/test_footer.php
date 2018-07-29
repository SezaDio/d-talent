	<br>
	<footer style="position: inherit;">
		<div class="container">
	        <div class="row">
	        	<div class="col-md-12" style="text-align: center;">
					<div class="copyright">
		              <p>&copy; D-Talent - 2018</p>
		            </div>
	        	</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script type="text/javascript">
		$(function () {
			// pagination
			var page = 1;
			
			// 2 item per page + 1 instruction page
			var total_page = <?php echo (1 + ($total_records / 2)); ?>

			// if number page clicked
			$('.pagination .page-number').click(function() {
				$('.page-'+page).hide();
				page = $(this).text();
				$('.page-'+page).show();
				// submit btn
				if (page == total_page) {
					$('.btn-submit-wrapper').show();
				}
				else{
					$('.btn-submit-wrapper').hide();
				}
			});

			// if prev clicked
			$('.prev').click(function() {
				if (page != 1) {
					$('.page-'+page).hide();
					page--;
					$('.page-'+page).show();
				}
				// submit btn
				if ($('.btn-submit-wrapper').length > 0) {
					$('.btn-submit-wrapper').hide();
				}
			});

			// if next clicked
			$('.next').click(function() {
				if (page != total_page) {
					$('.page-'+page).hide();
					page++;
					$('.page-'+page).show();
				}
				// submit btn
				if (page == total_page) {
					$('.btn-submit-wrapper').show();
				}
				else{
					$('.btn-submit-wrapper').hide();
				}
			});

			// check radio buttons
			$('.btn-submit').click(function(e) {
				$('.radio-validation').each(function(){
					if($(this).find('input[type="radio"]:checked').length == 0) {
						e.preventDefault();
				    	alert("Semua pertanyaan harus diisi");
				    	return false;
					}
				});
			});
        });
	</script>
</body>
</html>