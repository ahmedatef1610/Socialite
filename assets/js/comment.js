function showAlert(data) {
    $('.commentsNotification').append(data);
    setTimeout(function () {
        $('.res').slideUp(1000, function () {
            $('.res').remove();
        });
    }, 3000);
}
function refreshCommentsNum(postId) {
    $.ajax({
        type: "POST",
        url: "comment.php",
        data: `getCommentsNum=&postId=${postId}`,
        success: function (data) {
            //console.log('success');
            //console.log(data);
            $(`.commentsNum${postId}`).html(data);
        },
        error: function (data) {
            console.log('error');
        },
    });
}
function refreshComments(postId) {
    $.ajax({
        type: "POST",
        url: "comment.php",
        data: `getComments=&postId=${postId}`,
        success: function (data) {
            //console.log('success');
            //console.log(data);
            $(`.comments${postId}`).html(data);

            $(`.comments${postId}`).niceScroll({cursorborder:'none'});
            $(`.comments${postId}`).height( $(`.comments${postId} .card`).outerHeight()*1.5 );
            resizeHeightOfComment(postId)
        },
        error: function (data) {
            console.log('error');
        },
    });
}
function resizeHeightOfComment(postId) {
    $( window ).resize(function() {
        $(`.comments${postId}`).height( $(`.comments${postId} .card`).outerHeight()*1.5 );
    })
}
/**************************************************/
$(document).ready(function () {

    $(".posts_area,.main").on('click','.toggleComment',function (e) { 
        e.preventDefault();
        let commentBlock = $(this).data('comment');
        $('.'+commentBlock).slideToggle();
        //console.log(commentBlock);
        let postId = $(this).data('postid');
        refreshComments(postId);
        
        $(`.comments${postId}`).niceScroll({cursorborder:'none'});
        $(`.comments${postId}`).height( $(`.comments${postId} .card`).outerHeight()*1.5 );
    });

    $('.posts_area,.main').on('submit','.commentForm',function (e) { 
        e.preventDefault();

        let fields = e.target.elements;
        // console.log(fields);
        // console.log(fields.postBody);
        // console.log($(this).serialize());

        $.ajax({
            type: "POST",
            url: "comment.php",
            data: $(this).serialize(),
            success: function (data) {
                //console.log('success');
                if(data.search('Comment Posted!')!=-1){
                    showAlert(data);
                    fields.postBody.value='';
                    refreshCommentsNum(fields.postId.value);
                    refreshComments(fields.postId.value);
                } else{
                    location.href = 'register.php'
                }
            },
            error: function (data) {
                console.log('error');
            },
        });
    });

});
/**********************************************************************/
