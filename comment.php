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
	//add Comment for post
	if ( isset( $_POST['addComment'] ) ) {
		$post_id = $_POST['postId'];
		$user_query = mysqli_query( $con, "SELECT added_by, user_to FROM posts WHERE id='$post_id'" );
		$row = mysqli_fetch_array( $user_query );
		$posted_to = $row['added_by'];
		if ( isset( $_POST['postId'] ) ) {
			$post_body = $_POST['postBody'];
			$post_body = mysqli_escape_string( $con, $post_body );
			$date_time_now = date( 'Y-m-d h:i:s A' );
			$insert_post = mysqli_query( $con, "INSERT INTO comments VALUES ('', '$post_body', '$userLoggedIn', '$posted_to', '$date_time_now', 'no', '$post_id')" );
			
			if($posted_to != $userLoggedIn) {
				$notification = new Notification($con, $userLoggedIn);
				$notification->insertNotification($post_id, $posted_to, "comment");
			}

			if($posted_to != 'none' && $posted_to != $userLoggedIn) {
				$notification = new Notification($con, $userLoggedIn);
				$notification->insertNotification($post_id, $posted_to, "profile_comment");
			}

			$get_commenters = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id'");
			$notified_users = array();
			while($row = mysqli_fetch_array($get_commenters)) {
	
				if($row['posted_by'] != $posted_to && $row['posted_by'] != $posted_to 
					&& $row['posted_by'] != $userLoggedIn && !in_array($row['posted_by'], $notified_users)) {
	
					$notification = new Notification($con, $userLoggedIn);
					$notification->insertNotification($post_id, $row['posted_by'], "comment_non_owner");
	
					array_push($notified_users, $row['posted_by']);
				}
	
			}
			
			echo "<p class='res m-0 p-0'>Comment Posted!</p>";
		}
	}
?>


<?php
	//Get Comments of post
	if ( isset( $_REQUEST['getComments'] ) ) {
		$post_id = $_REQUEST['postId'];
		$get_comments = mysqli_query($con,"SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY id ASC");
		$count = mysqli_num_rows($get_comments);
		if($count != 0) {
			while($comment = mysqli_fetch_array($get_comments)) {
			
				$comment_body = $comment['post_body'];
				$posted_by = $comment['posted_by'];
				$posted_to = $comment['posted_to'];
				$date_added = $comment['date_added'];
				$removed = $comment['removed'];
				
				//Timeframe
				$start_date = new DateTime($date_added); //Time of post
				$date_time_now = date( 'Y-m-d h:i:s A' );
				$end_date = new DateTime($date_time_now); //Current time
				$interval = $start_date->diff($end_date); //Difference between dates 

				if($interval->y >= 1) {
					if($interval->y == 1) {
						$time_message = $interval->y . " year ago"; //1 year ago
					}
					else  {
						$time_message = $interval->y . " years ago"; //1+ year ago
					}
				}
				else if ($interval-> m >= 1) {
					if($interval->d == 0) {
						$days = " ago";
					}
					else if($interval->d == 1) {
						$days = $interval->d . " day ago";
					}
					else {
						$days = $interval->d . " days ago";
					}

					if($interval->m == 1) {
						$time_message = $interval->m . " month ". $days;
					}
					else {
						$time_message = $interval->m . " months ". $days;
					}
				}
				else if($interval->d >= 1) {
					if($interval->d == 1) {
						$time_message = "Yesterday";
					}
					else {
						$time_message = $interval->d . " days ago";
					}
				}
				else if($interval->h >= 1) {
					if($interval->h == 1) {
						$time_message = $interval->h . " hour ago";
					}
					else {
						$time_message = $interval->h . " hours ago";
					}
				}
				else if($interval->i >= 1) {
					if($interval->i == 1) {
						$time_message = $interval->i . " minute ago";
					}
					else {
						$time_message = $interval->i . " minutes ago";
					}
				}
				else {
					if($interval->s < 30) {
						$time_message = "Just now";
					}
					else {
						$time_message = $interval->s . " seconds ago";
					}
				}
				//end Timeframe

				$user_obj = new User($con, $posted_by);
?>
	<div class="card mb-3">
		<div class="row no-gutters">
			<div class="col-3">
				<a href="<?php echo $posted_by ?>"><img class="card-img w-100" src="<?php echo $user_obj->getProfilePic() ?>" title="<?php echo $posted_by ?>"></a>
			</div>
			<div class="col-9">
				<div class="card-body">
					<h5 class="card-title m-0 d-sm-flex justify-content-between">
						<div>
							<a href='<?php echo $posted_by ?>'><?php echo $user_obj->getFirstAndLastName() ?></a>
						</div>
						<div>
							<small class='text-muted'><?php echo $time_message ?></small>
						</div>
					</h5>
					<p class="card-text"><?php echo $comment_body ?></p>
				</div>
			</div>
		</div>
	</div>
<?php
			} //end while
		} //end if
		else {
			echo "<center>No Comments to Show!</center>";
		}
	}
?>

<?php
	//Get Comments Numbers of post
	if(isset($_REQUEST['getCommentsNum'])){
		$post_id = $_REQUEST['postId'];
		$comments_check = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id'");
		$comments_check_num = mysqli_num_rows($comments_check);
		echo $comments_check_num;
	}
?>



<?php ob_end_flush() ?>