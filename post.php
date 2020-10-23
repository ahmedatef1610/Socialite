<?php $pageTitle = "Post" ?>
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
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else {
        $id = 0;
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

                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Main -->
        <div class="col-md-9 ">
            <div class="card shadow m-3 main">
                <div class="card-header">Main</div>
                <div class="card-body p-xs-1">
                    <div class="posts_area2">
                        <?php 
                            $post = new Post($con, $userLoggedIn);
                            $post->getSinglePost($id);
                        ?>
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


</body>
</html>
<?php ob_end_flush() ?>