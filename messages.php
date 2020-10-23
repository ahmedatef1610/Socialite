<?php $pageTitle = "Messages" ?>
<?php require("includes/header.php") ?>

<link rel='stylesheet' href='assets/css/messages.css'>
<script>
    for (let i of document.getElementsByTagName("link")) {
        if(i.href.search('bootstrap_3') != -1){
            let linkTag = document.createElement('link');
            linkTag.rel = 'stylesheet';
            linkTag.href = 'assets/css/profile.css';
            document.head.appendChild(linkTag);
        }
    }
</script>
</head>
<body>
<!-- Navigation -->
<?php require("includes/navigation.php") ?>

<?php

    $message_obj = new Message($con, $userLoggedIn);

    if(isset($_GET['u'])){
        $user_to = $_GET['u'];
    }
    else {
        $user_to = $message_obj->getMostRecentUser();
        if($user_to == false){
            $user_to = 'new';
        }
    }

    if($user_to != "new"){
        $user_to_obj = new User($con, $user_to);
    }

    if(isset($_POST['post_message'])) {
        if(isset($_POST['message_body'])) {
            $body = mysqli_real_escape_string($con, $_POST['message_body']);
            $date = date("Y-m-d h:i:s A");
            $message_obj->sendMessage($user_to, $body, $date);
        }
    }

?>
<div class='underNav'>&nbsp;</div>
<div class=''>
    <!-- Row -->
    <div class="row no-gutters">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar bg-secondary position-sticky shadow">
                <div class="row no-gutters">

                    <div class="col-12">
                        <div class="card shadow m-3">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <a href="<?php echo "$userLoggedIn"?>"><img src="<?php echo $user['profile_pic'] ?>" class="card-img" alt="<?php echo $user['username'] ?>"></a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <a class="text-decoration-none" href="<?php echo "$userLoggedIn"?>">
                                            <h5 class="card-text m-0"><?php echo "{$user['first_name']} {$user['last_name']}" ?></h5>
                                        </a>
                                        <p class="card-text m-0">Posts: <?php echo $user['num_posts'] ?>
                                        <p class="card-text m-0">Likes: <span class="userLoginLike"><?php echo $user['num_likes'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="user_details column" id="conversations">
                            <h4 class="text-center">Conversations</h4>
                            <div class="loaded_conversations">
                                <?php echo $message_obj->getConvos(); ?>
                            </div>
                            <br>
                            <div class="text-center mb-3">
                                <a href="messages.php?u=new" class="btn btn-primary">New Message</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Main -->
        <div class="col-md-9">
            <div class="card shadow m-3">
                <div class="card-header">Main</div>
                <div class="card-body">
                    
                    <?php  
                        if($user_to != "new"):
                            echo "<h4>You and <a href='$user_to'>" . $user_to_obj->getFirstAndLastName() . "</a></h4><hr>";
                            echo "<div class='loaded_messages mb-3 clearfix' id='scroll_messages'>";
                                echo $message_obj->getMessages($user_to);
                            echo "</div><hr>";
                        else:
                            echo "<h4>New Message</h4><hr>";
                        endif;
                    ?>
                    <div class="message_post">
                        <form action="" method="POST">
                            <?php
                                if($user_to == "new"):
                            ?> 
                                <p>Select the friend you would like to message</p>
                                <label for="search_text_input">To:</label>
                                <input class="form-control" type='text' onkeyup='getUsers(this.value, "<?php echo $userLoggedIn; ?>")' name='q' placeholder='Name' autocomplete='off' id='search_text_input'>
                                <div class='results'></div>
                            <?php
                                else:
                            ?>
                                <textarea rows='3' class='form-control' name='message_body' id='message_textarea' placeholder='Write your message ...'></textarea>
                                <input type='submit' name='post_message' class='info btn btn-primary btn-block mt-3' id='message_submit' value='Send'>
                            <?php
                                endif;
                            ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--End Main -->
    </div>
    <!-- End Row -->
</div>



<!-- Footer -->
<?php require("includes/footer.php") ?>
<script src='assets/js/comment.js'></script>
<script src='assets/js/like.js'></script>
<script src='assets/js/delete_post.js'></script>

<script src='assets/js/profile.js'></script>
<script src='assets/js/profile_post.js'></script>

<script src='assets/js/messages.js'></script>

<script>
    let userLoggedIn = '<?php echo $userLoggedIn; ?>';
    let profileUsername = '<?php echo $username; ?>';
    $(document).ready(function () {
        $("#loading").show();
		//Original ajax request for loading first posts 
		$.ajax({
			url: "includes/handlers/ajax_load_profile_posts.php",
			type: "POST",
			data: "page=1&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
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
                url: "includes/handlers/ajax_load_profile_posts.php",
                type: "POST",
                data: "page=" + page + "&userLoggedIn=" + userLoggedIn + "&profileUsername=" + profileUsername,
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



</body>
</html>
<?php ob_end_flush() ?>