function checkLike(postId) {
    $.ajax({
        type: "POST",
        url: "like.php",
        data: `checkLikes=&postId=${postId}`,
        success: function (data) {
            //console.log('success');
            if(data.trim() =='like'){
                $(`.likeAction${postId}`).html(`<i class="fas fa-thumbs-up"></i>`);
                $(`.likeBtn${postId}`).toggleClass(`btn-success btn-warning`);
            }
            else if(data.trim() =='unlike'){
                $(`.likeAction${postId}`).html(`<i class="fas fa-thumbs-down"></i>`);
                $(`.likeBtn${postId}`).toggleClass(`btn-success btn-warning`);
            }
            $(`.likeAction${postId}`).data('action',data);
        },
        error: function (data) {
            console.log('error');
        },
    });
}
function getLikesForUserLoggedIn() {
    $.ajax({
        type: "POST",
        url: "like.php",
        data: `getLikesForUserLoggedIn=`,
        success: function (data) {
            // console.log('success');
            // console.log(data);
            $(`.userLoginLike`).html(data);
        },
        error: function (data) {
            console.log('error');
        },
    });
}
function getLikes(postId) {
    $.ajax({
        type: "POST",
        url: "like.php",
        data: `getLikes=&postId=${postId}`,
        success: function (data) {
            // console.log('success');
            // console.log(data);
            $(`.likesNum${postId}`).html(data);
        },
        error: function (data) {
            console.log('error');
        },
    });
}
function addLike(postId) {
    $.ajax({
        type: "POST",
        url: "like.php",
        data: `addLike=&postId=${postId}`,
        success: function (data) {
            // console.log('success');
            // console.log(data);
            checkLike(postId);
            getLikes(postId);
            getLikesForUserLoggedIn();
        },
        error: function (data) {
            console.log('error');
        },
    });
}
function removeLike(postId) {
    $.ajax({
        type: "POST",
        url: "like.php",
        data: `removeLike=&postId=${postId}`,
        success: function (data) {
            // console.log('success');
            // console.log(data);
            checkLike(postId);
            getLikes(postId);
            getLikesForUserLoggedIn();
        },
        error: function (data) {
            console.log('error');
        },
    });
}
async function checkUserLogin(){
    try {
        let flag = false;
        let data = await $.ajax({type: "POST",url: "like.php",data: `checkUserLogin=`});
        if(data.search('logged')!=-1){
            flag = true;
        }
      return flag
    } catch (error) {
        throw new Error(error);
    }
}
/**************************************************/
$(document).ready(function () {


    $(".posts_area,.main").on('click','.likeBtn',function (e) { 

        e.preventDefault();
        let postId = $(this).data('postid');

        checkUserLogin()
        .then((flag)=>{
            if(flag){
                if($(`.likeAction${postId}`).data('action').trim() == "like"){
                    addLike(postId);
                }
                else if($(`.likeAction${postId}`).data('action').trim() == "unlike"){
                    removeLike(postId);
                }
            }else{
                location.href = 'register.php';
            }
        })
        .catch((error)=>{
            console.log(error);
        })

    });



});
/**********************************************************************/
