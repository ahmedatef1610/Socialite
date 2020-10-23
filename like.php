<?php require( 'config/config.php' ) ?>
<?php require( 'includes/classes/User.php' ) ?>
<?php require( 'includes/classes/Post.php' ) ?>
<?php require("includes/classes/Message.php") ?>
<?php require("includes/classes/Notification.php") ?>

<?php
	if ( isset( $_SESSION['username'] ) ) {
		$userLoggedIn = $_SESSION['username'];
		$user_details_query = mysqli_query( $con, "SELECT * FROM users WHERE username='$userLoggedIn'" );
        $user = mysqli_fetch_array( $user_details_query );
	} else {
		header( 'Location: register.php' );
		exit();
	}
?>

<?php
    //check user login 
    if ( isset( $_POST['checkUserLogin'] ) ) {
        echo 'logged';
        exit();
    }
    
    //get likes for user Logged in
    if ( isset( $_POST['getLikesForUserLoggedIn'] ) ) {
        echo $user['num_likes'];
        exit();
    }
    
	//Get id of post
	if(isset($_REQUEST['postId'])) {
		$post_id = $_REQUEST['postId'];
    }
    
    $date_added = date( 'Y-m-d h:i:s A' );

    $get_likes = mysqli_query($con, "SELECT likes, added_by FROM posts WHERE id='$post_id'");
    $row = mysqli_fetch_array($get_likes);
    $total_likes = $row['likes']; 
    $user_liked = $row['added_by'];
    
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user_liked'");
    $row = mysqli_fetch_array($user_details_query);
    $total_user_likes = $row['num_likes'];
    
    
    //get likes for post
    if ( isset( $_POST['getLikes'] ) ) {
        echo $total_likes;
    }

	//Check for previous likes
    if ( isset( $_POST['checkLikes'] ) ) {
        $check_query = mysqli_query($con, "SELECT * FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
        $num_rows = mysqli_num_rows($check_query);
        if($num_rows > 0) {
            echo "unlike";
        }
        else{
            echo "like";
        }
    }
    //add like for post
    if ( isset( $_POST['addLike'] ) ) {
        $total_likes++;
        $query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
        $total_user_likes++;
        $user_likes = mysqli_query($con, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
        $insert_user = mysqli_query($con, "INSERT INTO likes VALUES('', '$userLoggedIn', '$post_id','$date_added')");
        
        
		//Insert Notification
		if($user_liked != $userLoggedIn) {
			$notification = new Notification($con, $userLoggedIn);
			$notification->insertNotification($post_id, $user_liked, "like");
		}

        echo "done add";
        //Insert Notification
    }
    //remove like for post
    if ( isset( $_POST['removeLike'] ) ) {
        $total_likes--;
        $query = mysqli_query($con, "UPDATE posts SET likes='$total_likes' WHERE id='$post_id'");
        $total_user_likes--;
        $user_likes = mysqli_query($con, "UPDATE users SET num_likes='$total_user_likes' WHERE username='$user_liked'");
        $insert_user = mysqli_query($con, "DELETE FROM likes WHERE username='$userLoggedIn' AND post_id='$post_id'");
        echo "done delete";
    }

?>






<?php ob_end_flush() ?>