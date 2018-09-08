			</div>
			<!-- ./ card-body -->
		</div>
		<!-- ./ card -->
	</div>

	<script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script type="text/javascript">
		$(function () {
			// pagination
			var page = 1;
			
			// 2 item per page + 1 instruction page
			var total_page = "<?php echo ($total_records / 2) ?>";
			// var total_page = "<?php echo (1 + ($total_records / 2)) ?>";

			// if number page clicked
			/*$('.pagination .page-number').click(function() {
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

				// show page number to user
				$('#page-text').text(page);
			});*/

			// if prev clicked
			$('.prev').click(function() {
				if (page != 1) {
					$('.page-'+page).hide();
					page--;
					$('.page-'+page).show();
				}
				// hide submit btn
				if ($('.btn-submit-wrapper').length > 0) {
					$('.btn-submit-wrapper').hide();
				}

				// show page number to user
				$('#page-text').text(page);

				// display only 5 page
				// var new_int;
				// var old_int = page;

				/*if (page % 5 == 0) {
					for (var i = 1; i <= 5; i++) {
						$('.number-'+old_int).css('display', 'inline');
						old_int = page - i;
						
						new_int = page + i;
						$('.number-'+new_int).hide();
					}
				}*/
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
					$('.btn-submit-wrapper').show();
				}
				/*else{
					$('.btn-submit-wrapper').hide();
				}*/

				// show page number to user
				$('#page-text').text(page);

				// display only 5 page
				/*var new_int = page;
				var old_int;

				if (page % 5 == 1) {
					for (var i = 1; i <= 5; i++) {
						old_int = page - i;
						$('.number-'+old_int).hide();

						$('.number-'+new_int).css('display', 'inline');
						new_int = page + i;
					}
				}*/
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