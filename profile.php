<?php 
    date_default_timezone_set('Africa/Cairo');
    $con = mysqli_connect( '127.0.0.1:3325', 'root', '', 'social' );
    //Connection variable
    if ( mysqli_connect_errno() ) {
        echo 'Failed to connect: ' . mysqli_connect_error();
    }
   mysqli_query( $con, "SET time_zone = '+02:00'" );
?>
<?php require("includes/classes/User.php") ?>
<?php require("includes/classes/Post.php") ?>
<?php require("includes/classes/Message.php") ?>
<?php require("includes/classes/Notification.php") ?>

<?php
    if(isset($_GET['profile_username'])){
        $profileUsername = $_GET['profile_username'];
        $profileUser = new User($con,$profileUsername);
        $profileName = $profileUser->getFirstAndLastName();
    }
    ?>
<?php $pageTitle = "$profileName - Profile" ?>

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

<?php $message_obj = new Message($con,$userLoggedIn); ?>
<?php  
    if(isset($_GET['profile_username'])){
        $username = $_GET['profile_username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
        $user_array = mysqli_fetch_array($user_details_query);
        $num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
    }

    if(isset($_POST['remove_friend'])) {
        $user = new User($con, $userLoggedIn);
        $user->removeFriend($username);
    }
    else if(isset($_POST['add_friend'])) {
        $user = new User($con, $userLoggedIn);
        $user->sendRequest($username);
    }
    else if(isset($_POST['remove_request'])) {
        $user = new User($con, $userLoggedIn);
        $user->removeRequest($username);
    }
    else if(isset($_POST['respond_request'])) {
        header("Location: requests.php");
    }
    if(isset($_POST['post_message'])) {
        if(isset($_POST['message_body'])) {
          $body = mysqli_real_escape_string($con, $_POST['message_body']);
          $date = date("Y-m-d h:i:s A");
          $message_obj->sendMessage($username, $body, $date);
        }
      
        echo "
        <script> 
                $(document).ready(function () {
                    $(`#myTab a[href='#message']`).tab('show')
                });
        </script>";
    }

?>
<?php 
    // if($_SERVER['REQUEST_METHOD']!='GET'){
    //     echo "<script>location.href='$username'</script>";
    // }
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
                        <div class="w-50 mx-auto mt-3 rounded-circle overflow-hidden">
                            <img src="<?php echo $user_array['profile_pic'] ?>" class="w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center mt-3">
                            <?php echo  $user_array['first_name'] . " ".$user_array['last_name']; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="list-group p-3">
                            <li class="list-group-item"><?php echo "Posts: " . $user_array['num_posts']; ?></li>
                            <li class="list-group-item"><?php echo "Likes: " . $user_array['num_likes']; ?></li>
                            <li class="list-group-item"><?php echo "Friends: " . $num_friends ?></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="px-3 py-0">
                            <form action="<?php echo $username ?>" method="POST">
                                <?php 

                                    $profile_user_obj = new User($con, $username); 
                                    if($profile_user_obj->isClosed()) {
                                        header("Location: user_closed.php");
                                    }

                                    $logged_in_user_obj = new User($con, $userLoggedIn); 

                                    if($userLoggedIn != $username) {
                                        if($logged_in_user_obj->isFriend($username)) {
                                            echo '<input type="submit" name="remove_friend" class="btn btn-block btn-danger" value="Remove Friend">';
                                        }
                                        else if ($logged_in_user_obj->didReceiveRequest($username)) {
                                            echo '<input type="submit" name="respond_request" class="btn btn-block btn-warning" value="Respond to Request">';
                                        }
                                        else if ($logged_in_user_obj->didSendRequest($username)) {
                                            echo '<input type="submit" name="remove_request" class="btn btn-block btn-warning" value="Remove Request">';
                                        }
                                        else {
                                            echo '<input type="submit" name="add_friend" class="btn btn-block btn-success" value="Add Friend">';
                                        }
                                    }
                                ?>
                            </form>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-block btn-primary my-3" data-toggle="modal" data-target="#post_form">
                                Post Something 
                            </button>
                            <?php  
                                if($userLoggedIn != $username) {
                                    echo '<div class="profile_info_bottom">';
                                    echo $logged_in_user_obj->getMutualFriends($username) . " Mutual Friends";
                                    echo '</div>';
                                }
                            ?>
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
                <div class="card-body p-xs-1">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="message-tab" data-toggle="tab" href="#message">Message</a>
                        </li>
                    </ul>

                    <div class="tab-content p-3" id="myTabContent">

                        <div class="tab-pane fade show active" id="home">
                            <div class="posts_area"></div>
                            <img id="loading" src="assets/images/icons/loading.gif">
                        </div>



                        <div class="tab-pane fade" id="message">
                            <?php  
                                echo "<h4>You and <a href='$username'>" . $profile_user_obj->getFirstAndLastName() . "</a></h4><hr>";
                                echo "<div class='loaded_messages mb-3 clearfix profile' id='scroll_messages'>";
                                    echo $message_obj->getMessages($username);
                                echo "</div><hr>";
                            ?>
                            <div class="message_post">
                                <form action="" method="POST">
                                    <textarea rows='3' class='form-control' name='message_body' id='message_textarea' placeholder='Write your message ...'></textarea>
                                    <input type='submit' name='post_message' class='info btn btn-primary btn-block mt-3' id='message_submit' value='Send'>
                                </form>
                            </div>
                            <script>
                                var div = document.getElementById("scroll_messages");
                                div.scrollTop = div.scrollHeight;
                            </script>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--End Main -->
    </div>
    <!-- End Row -->
</div>

<!-- Modal -->
<div class="modal fade" id="post_form" style="z-index: 10000 !important;">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="postModalLabel">Post something!</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <p>This will appear on the user's profile page and also their news feed for your friends to see!</p>
                <form id="profile_post" class="profile_post" action="" method="POST">
                    <div class="form-group">
                        <textarea class="form-control" name="post_body" rows="3" placeholder="post Something"></textarea>
                    </div>
                    <input type="hidden" name="user_from" value="<?php echo $userLoggedIn; ?>">
                    <input type="hidden" name="user_to" value="<?php echo $username; ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" name="post_button" id="submit_profile_post">Post</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require("includes/footer.php") ?>


<script src='assets/js/comment.js'></script>
<script src='assets/js/like.js'></script>
<script src='assets/js/delete_post.js'></script>

<script src='assets/js/profile.js'></script>
<script src='assets/js/profile_post.js'></script>

<script src='assets/js/messages_profile.js'></script>


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