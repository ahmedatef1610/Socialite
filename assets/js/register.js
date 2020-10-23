$(document).ready(function () {
  //On click signup, hide login and show registration form
  $(".signup_select").click(function () {
    $(".login").slideUp("slow", function () {
      $(".signup").slideDown("slow");
    });
  });
  //On click login, hide registration and show login form
  $(".login_select").click(function () {
    $(".signup").slideUp("slow", function () {
      $(".login").slideDown("slow");
    });
  });
});

// $(document).ready(function () {
//     $('.signupForm input').keyup(function () {  
// 		validate($(this), patterns[this.name]);  
// 	});
// 	$('.register_button').click(function(){
// 		let vaildArr = [];
// 		$.each($('.signupForm input'), function (indexInArray, valueOfElement) { 
// 			vaildArr.push($(this).hasClass('is-valid')? 1 : 0);
// 		});
// 		if(vaildArr.reduce((num,item) => num + item ) == 6){
// 			console.log("yes");
// 			$('.signupForm').submit();
// 		}else{
// 			console.log("no");
// 			$('.signupForm').submit(function (e) {e.preventDefault();});
// 		}
// 	});

// });
// /*******************************************************************/
// var patterns = {
//     reg_fname: /^[a-zA-Z]{2,255}$/,
//     reg_lname: /^[a-zA-Z]{2,255}$/,
//     reg_email: /^([\w.-]+)@([a-zA-Z]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
//     reg_email2: /^([\w.-]+)@([a-zA-Z]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
//     reg_password: /^[a-z-A-Z0-9@-_]{5,255}$/,
//     reg_password2: /^[a-z-A-Z0-9@-_]{5,255}$/,
// };
// /*******************************************************************/
// function validate(input, regex) {
//     if (regex.test(input.val())) {
//         input.addClass('is-valid').removeClass('is-invalid');
//     } else if (input.val() == '') {
//         input.removeClass('is-invalid is-valid');
//     } else {
//         input.addClass('is-invalid').removeClass('is-valid');
//     }
// }
