<div class='card shadow m-3'>
    <div class='row no-gutters'>
        <div class='col-sm-4'>
            <a href='<?php echo '$userLoggedIn'?>'><img src='<?php echo $user['profile_pic'] ?>' class='card-img' alt='<?php echo $user['username'] ?>'></a>
        </div>
        <div class='col-sm-8'>
            <div class='card-body'>
                <a class='text-decoration-none' href='<?php echo '$userLoggedIn'?>'>
                    <h5 class='card-text m-0'><?php echo '{$user['first_name']} {$user['last_name']}' ?></h5>
                </a>
                <p class='card-text m-0'>Posts: <?php echo $user['num_posts'] ?>
                <p class='card-text m-0'>Likes: <span class='userLoginLike'><?php echo $user['num_likes'] ?></span>
            </div>
        </div>
    </div>
</div>