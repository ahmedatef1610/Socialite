<?php $pageTitle = "Request" ?>
<?php require("includes/header.php") ?>


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



?>


<div class='underNav'>&nbsp;</div>
<div class=''>
    <!-- Row -->
    <div class="row no-gutters">
        <!-- Sidebar -->
        <!-- <div class="col-md-3">
            <div class="sidebar bg-secondary position-sticky shadow">

            </div>
        </div> -->
        <!-- End Sidebar -->
        <!-- Main -->
        <div class="col-md-9 offset-md-3">
            <div class="card shadow m-3">
                <div class="card-header">Friend Requests</div>
                <div class="card-body p-0">
                    <?php  
                        $query = mysqli_query($con, "SELECT * FROM friend_requests WHERE user_to='$userLoggedIn'");
                        if(mysqli_num_rows($query) == 0)
                            echo "<div class='p-3'>You have no friend requests at this time!</div>";
                        else {
                            while($row = mysqli_fetch_array($query)) {
                                echo "<div class='px-3 py-2'>";
                                $user_from = $row['user_from'];
                                $user_from_obj = new User($con, $user_from);

                                echo "<div class='mb-2'>
                                {$user_from_obj->getFirstAndLastName()} sent you a friend request!
                                </div>";

                                $user_from_friend_array = $user_from_obj->getFriendArray();

                                if(isset($_POST['accept_request' . $user_from ])) {
                                    $add_friend_query = mysqli_query($con, "UPDATE users SET friend_array=CONCAT(friend_array, '$user_from,') WHERE username='$userLoggedIn'");
                                    $add_friend_query = mysqli_query($con, "UPDATE users SET friend_array=CONCAT(friend_array, '$userLoggedIn,') WHERE username='$user_from'");

                                    $delete_query = mysqli_query($con, "DELETE FROM friend_requests WHERE user_to='$userLoggedIn' AND user_from='$user_from'");
                                    echo "You are now friends!";
                                    header("Location: requests.php");
                                }

                                if(isset($_POST['ignore_request' . $user_from ])) {
                                    $delete_query = mysqli_query($con, "DELETE FROM friend_requests WHERE user_to='$userLoggedIn' AND user_from='$user_from'");
                                    echo "Request ignored!";
                                    header("Location: requests.php");
                                }
                    ?>
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                    <button type="submit" name="accept_request<?php echo $user_from; ?>" id="accept_button" class="btn btn-success btn-sm">Accept <i class="fad fa-lg fa-user-check"></i></button>
                                    <button type="submit" name="ignore_request<?php echo $user_from; ?>" id="ignore_button" class="btn btn-danger btn-sm">Ignore <i class="fad fa-lg fa-user-times"></i></button>
                                </form>
                    <?php
                                echo "</div>";
                                echo "<hr>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--End Main -->
    </div>
    <!-- End Row -->
</div>
<!-- Footer -->
<?php require("includes/footer.php") ?>
<script src='assets/js/profile.js'></script>
</body>
</html>
<?php ob_end_flush() ?>