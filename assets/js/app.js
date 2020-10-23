$(".sticky-top").niceScroll({cursorborder:'none'});

// $("body").niceScroll({
//     cursorborder:'none',
//     cursorcolor: "#222",
//     cursorwidth: "7px",  
//     background:"rgba(20,20,20,0.3)",
//     cursoropacitymin: 1,
//     zindex: 10000000,
// });
/**********************************************************************/
$(document).ready(function () {

    //console.log($( "nav.navbar" ).outerHeight());
    $( ".underNav" ).height($( "nav.navbar" ).outerHeight());

    $( ".sticky-top" ).height($(window).height() - ($( "nav.navbar" ).outerHeight()+16));
    $( ".sticky-top" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});

    if($(window).width()<768){
        $( ".sticky-top" ).height($(".sticky-top .card").height());
        $( ".sticky-top" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});
    }
});

$( window ).resize(function() {
    if($(window).width()<768){
        $( ".sticky-top" ).height($(".sticky-top .card").height());
        $( ".sticky-top" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});
    }
    else{
        $( ".sticky-top" ).height($(window).height() - ($( "nav.navbar" ).outerHeight()+16));
        $( ".sticky-top" ).css({"top" : `${$( "nav.navbar" ).outerHeight()}px`});
    }
});
/**********************************************************************/
$("#myDropdown .dropdown-menu").niceScroll({cursorborder:'none'});
function getDropdownData(user, type) {

	if(!$(".dropdown_data_window").hasClass("show")) {
		var pageName;

		if(type == 'notification') {
			pageName = "ajax_load_notifications.php";
            $("#unreadNotification").remove();
		}
		else if (type == 'message') {
			pageName = "ajax_load_messages.php";
            $("#unreadMsg").remove();
		}

		var ajaxreq = $.ajax({
			url: "includes/handlers/" + pageName,
			type: "POST",
			data: "page=1&userLoggedIn=" + user,
			cache: false,

			success: function(response) {
                //console.log(response);
				$(".dropdown_data_window").html(response);
				$("#dropdown_data_type").val(type);
			}

		});

	}
	else {
		$(".dropdown_data_window").html("");
	}

}
/**********************************************************************/
$(document).click(function(e){

	if(e.target.class != "search_results" && e.target.id != "search_text_input") {

		$(".search_results").html("");
		$('.search_results_footer').html("");
		$('.search_results_footer').toggleClass("search_results_footer_empty");
		$('.search_results_footer').toggleClass("search_results_footer");
	}
});

$(document).ready(function () {
	$("#search_text_input").focus(function (e) {
		e.preventDefault();
		$(".search").addClass("flex-grow-1");
	});
	$("#search_text_input").blur(function (e) {
		e.preventDefault();
		$(".search").removeClass("flex-grow-1");
	});



});

function getLiveSearchUsers(value,user) {
	$.post("includes/handlers/ajax_search.php", {query:value, userLoggedIn: user}, function(data) {

		if($(".search_results_footer_empty")[0]) {
			$(".search_results_footer_empty").toggleClass("search_results_footer");
			$(".search_results_footer_empty").toggleClass("search_results_footer_empty");
		}

		$('.search_results').html(data);
		$('.search_results_footer').html("<a href='search.php?q=" + value + "'>See All Results</a>");

		if(data == "") {
			$('.search_results_footer').html("");
			$('.search_results_footer').toggleClass("search_results_footer_empty");
			$('.search_results_footer').toggleClass("search_results_footer");
		}

		$(".search_results_footer").css( "top" , $(".search_results").outerHeight()+38);
	});

}
/**********************************************************************/