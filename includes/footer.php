<script src='assets/js/layout/jquery.min.js'></script>
<script src='assets/js/layout/jquery.nicescroll.min.js'></script>
<script src='assets/js/layout/popper.min.js'></script>
<script src='assets/js/layout/bootstrap.min.js'></script>
<script src='assets/js/layout/bootbox.all.min.js'></script>
<script src='assets/js/layout/jquery.Jcrop.js'></script>
<script src='assets/js/layout/jcrop_bits.js'></script>
<script src='assets/js/app.js'></script>

<script>
	let userLoggedIn2 = '<?php echo $userLoggedIn; ?>';
	$(document).ready(function() {
		$('.dropdown_data_window').scroll(function() {
			let inner_height = $('.dropdown_data_window').innerHeight(); //Div containing data
			let scroll_top = $('.dropdown_data_window').scrollTop();
			let page = $('.dropdown_data_window').find('.nextPageDropdownData').val();
			let noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();
			if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {
                
                let pageName; //Holds name of page to send ajax request to
				let type = $('#dropdown_data_type').val();
                if(type == 'notification')
                {
					pageName = "ajax_load_notifications.php";
                }
				else if(type = 'message'){
					pageName = "ajax_load_messages.php"
                }
				let ajaxReq = $.ajax({
					url: "includes/handlers/" + pageName,
					type: "POST",
					data: "page=" + page + "&userLoggedIn=" + userLoggedIn2,
					cache:false,
					success: function(response) {
						$('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage 
						$('.dropdown_data_window').find('.noMoreDropdownData').remove(); //Removes current .nextpage 
						$('.dropdown_data_window').append(response);
					}
				});

			} //End if 

			return false;

		}); //End (window).scroll(function())
	});
</script>

<script>
    let userLoggedIn = '<?php echo $userLoggedIn; ?>';
    $(document).ready(function () {
        $("#loading").show();
		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/handlers/ajax_load_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn,
			cache:false,
			success: function(data) {
				$('#loading').hide();
				$('.posts_area').html(data);
                loadWhenScroll();
			}
        });

        loadWhenScroll();
        $(window).scroll(function() {
            loadWhenScroll();
		});

    });

    function loadWhenScroll() {
        let height = $('.posts_area').height(); //Div containing posts
        let scroll_top = $(this).scrollTop();

        let page = $('.posts_area').find('.nextPage').val();
        let noMorePosts = $('.posts_area').find('.noMorePosts').val();

        if ((document.body.scrollHeight <= scroll_top + window.innerHeight +2) && noMorePosts == 'false') {
            $('#loading').show();
            $.ajax({
                url: "includes/handlers/ajax_load_posts.php",
                type: "POST",
                data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                cache:false,

                success: function(response) {
                    $('.posts_area').find('.nextPage').remove(); //Removes current .nextPage 
                    $('.posts_area').find('.noMorePosts').remove(); //Removes current .nextPage 
                    $('#loading').hide();
                    $('.posts_area').append(response);
                    loadWhenScroll();
                }
            });

        }
    }
</script>