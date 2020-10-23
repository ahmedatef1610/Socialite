$(".loaded_messages").niceScroll({cursorborder:'none'});    
/**********************************************************************/
$(document).ready(function () {
	$("#scroll_messages")[0].scrollTop = $("#scroll_messages")[0].scrollHeight;

	$(`#myTab a[href='#message']`).on('shown.bs.tab', function() {
		$("#scroll_messages")[0].scrollTop = $("#scroll_messages")[0].scrollHeight;
        $(".loaded_messages").css("overflow-y","auto");
        $(".loaded_messages").niceScroll({cursorborder:'none'});    
    });

    setInterval(()=>{
        $(".loaded_messages").niceScroll({cursorborder:'none'});
    },500);
});
/**********************************************************************/
function getUsers(value, user) {
	$.post("includes/handlers/ajax_friend_search.php", {query:value, userLoggedIn:user}, function(data) {
		$(".results").html(data);
	});
}
