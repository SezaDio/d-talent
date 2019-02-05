			</div>
			<!-- ./ card-body -->
		</div>
		<!-- ./ card -->
	</div>


	<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script type="text/javascript">
		$(function () {
			// hide hint page
			$('.btn-start').click(function() {
				$('.hint-wrapper').hide();
				$('.test-wrapper').show();
			});
			
			// pagination
			var page = 1;
			
			// 2 item per page + 1 instruction page
			var total_page = "<?php echo ceil($total_records / 2) ?>";

			// if prev clicked
			$('.prev').click(function() {
				if (page != 1) {
					$('.page-'+page).hide();
					page--;
					$('.page-'+page).show();
				}
				else{
					// show hint page
					$('.test-wrapper').hide();
					$('.hint-wrapper').show();
				}
				// hide submit btn
				if ($('.btn-submit').length > 0) {
					$('.btn-submit').hide();
					$('.next').show();
				}

				// show page number to user
				$('#page-text').text(page);

			});

			// if next clicked
			$('.next').click(function() {
				// var old_page = page;

				if (page != total_page) {
					$('.page-'+page).hide();
					page++;
					$('.page-'+page).show();
				}
				// submit btn
				if (page == total_page) {
					$('.next').hide();
					$('.btn-submit').show();
				}

				// show page number to user
				$('#page-text').text(page);

			});

			// check radio buttons
			$('.btn-submit').click(function(e) {
				var question_no = 0;
				var page = 1;
				$('.radio-validation').each(function(){
					question_no++;
					// define page if 2 question per page
					page = Math.ceil(question_no / 2);
					if($(this).find('input[type="radio"]:checked').length == 0) {
						e.preventDefault();
				    	alert("Question number "+ question_no +" on Page "+ page +" is not filled");
				    	return false;
					}
				});
			});
        });
	</script>
</body>
</html>