<?php $pageTitle = "Home" ?>
<?php require("includes/header.php") ?>


<?php
    if (isset($_POST['post'])) {
        $uploadOk = 1;
        $imageName = $_FILES['fileToUpload']['name']??"";
        $errorMessage = "";
    
        if($imageName != "") {
            $targetDir = "assets/images/posts/";
            $imageName = $targetDir . uniqid() . basename($imageName);
            $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);
    
            if($_FILES['fileToUpload']['size'] > 10000000) {
                $errorMessage = "Sorry your file is too large";
                $uploadOk = 0;
            }
    
            if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
                $errorMessage = "Sorry, only jpeg, jpg and png files are allowed";
                $uploadOk = 0;
            }
    
            if($uploadOk) {
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $imageName)) {
                    //image uploaded okay
                }
                else {
                    //image did not upload
                    $uploadOk = 0;
                }
            }
    
        }
    
        if($uploadOk) {
            $post = new Post($con, $userLoggedIn);
            $post->submitPost($_POST['post_text'], 'none', $imageName);
        }
        else {
            echo "<div style='text-align:center;' class='alert alert-danger'>
                    $errorMessage
                </div>";
        }
    }
?>

</head>
<body>
<!-- Navigation -->
<?php require("includes/navigation.php") ?>

<div class='underNav'>&nbsp;</div>

<div class=''>
    <!-- Row -->
    <div class="row no-gutters">
        <!-- Sidebar -->
        <div class="col-md-3 order-1 order-md-1">
            <div class="sticky-top">

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

                <div class="card shadow m-3">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="card-body">
                                <h4>Popular</h4>
                                <div class="trends">
                                    <?php 
                                    $query = mysqli_query($con, "SELECT * FROM trends ORDER BY hits DESC LIMIT 9");

                                    foreach ($query as $row) {
                                        
                                        $word = $row['title'];
                                        $word_dot = strlen($word) >= 14 ? "..." : "";

                                        $trimmed_word = str_split($word, 14);
                                        $trimmed_word = $trimmed_word[0];

                                        echo "<div style'padding: 1px'>";
                                        echo $trimmed_word . $word_dot;
                                        echo "<br></div><br>";


                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Sidebar -->
        <!-- Main -->
        <div class="col-md-9 order-2 order-md-2">
            <!-- <h1 class="text-center py-5">Socialite</h1> -->
            <div class="card shadow m-3 ">
                <div class="card-header">
                    <form class="" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                        <div class=" mb-3">
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div class="form-group  mb-sm-0 mr-sm-3 flex-grow-1">
                                <textarea class="form-control" name="post_text" id="post_text" rows="3" placeholder="Got something to say?" required></textarea>
                            </div>
                            <button class="btn btn-primary align-self-stretch px-4 btn-xs-block" name="post" id="post_button" type="submit">Post <i class="fad fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
                <div class="posts_area"></div>
                <div class="text-center">
                    <img id="loading" src="assets/images/icons/loading.gif">
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


</body>
</html>
<?php ob_end_flush() ?>