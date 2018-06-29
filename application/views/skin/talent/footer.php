	</div>
	<!-- ./talent-page -->

	<footer></footer>

    <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.min.js?ver=b3.0'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js?ver=b2.0'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/js/datepicker/bootstrap-datepicker.js'); ?>"></script>

    <script type="text/javascript">
    	$(function () {
    		/* cv work */
            $('.datepicker').datepicker({
            	format: 'yyyy-mm',
            	minViewMode: 'months',
            	maxViewMode: 'decades',
            });
            // validate cv work start & end date
            $('form').on('submit', function(e) {
            	var work_start  = $('input[name="work_start"]').val();
            	var work_end 	= $('input[name="work_end"]').val();
            	
            	// console.log(work_start);
            	// console.log(work_end);

            	$('#date-error').text('');	// delete message
            	if (work_end != '' && work_end < work_start) {
            		e.preventDefault();
            		$('#date-error').text('Tanggal akhir tidak boleh lebih kecil dari tanggal awal');
            		// scroll
					$('html, body').animate({
				        scrollTop: $("input[name=work_end]").offset().top - 35
				    }, 200);
            	}
            });
    		/* ./cv work */
        });
    </script>
</body>
</html>