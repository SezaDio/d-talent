	</div>
	<!-- ./talent-page -->

	<footer></footer>

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
</body>
</html>