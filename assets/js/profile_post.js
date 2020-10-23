$(document).ready(function (e) {

  $(this).keyup(function (e) { 
    if(e.which == 27){
      $("#post_form").modal("hide");
    }
  });


  //Button for profile post
  $("#submit_profile_post").click(function () {
    $.ajax({
      type: "POST",
      url: "includes/handlers/ajax_submit_profile_post.php",
      data: $("form.profile_post").serialize(),
      success: function (msg) {
        console.log(msg);
        $("#post_form").modal("hide");
        location.reload();
      },
      error: function () {
        console.log("Failure");
      },
    });
  });


});
