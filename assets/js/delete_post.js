
/**************************************************/
$(document).ready(function () {

    $(".posts_area").on('click','.deleteButton',function (e) { 
        e.preventDefault();
        let postId = $(this).data('postid');

        bootbox.confirm({
            title : "",
            message : "Are you sure you want to delete this post?",
            callback : function(result) {
                if(result){
                    $.ajax({
                        type: "POST",
                        url: "includes/handlers/delete_post.php",
                        data: `postId=${postId}&result=${result}`,
                        success: function (data) {
                            //console.log('success');
                            console.log(data);
                        },
                        error: function (data) {
                            console.log('error');
                        },
                    });
                    console.log(result);
                    location.reload();
                }
            },
            centerVertical: true ,
            scrollable: true ,
            backdrop: true ,
        });

    });

});
/**********************************************************************/