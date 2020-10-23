$(".loaded_messages").niceScroll({cursorborder:'none',cursoropacitymin: 1,background:"rgba(50,50,50,0.3)",});
/**********************************************************************/
$(document).ready(function () {
    $("#scroll_messages")[0].scrollTop = $("#scroll_messages")[0].scrollHeight;
});
/**********************************************************************/
function getUsers(value, user) {
	$.post("includes/handlers/ajax_friend_search.php", {query:value, userLoggedIn:user}, function(data) {
		$(".results").html(data);
	});
}