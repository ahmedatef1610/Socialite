<?php require( '../../config/config.php' ) ?>
<?php require( '../classes/User.php' ) ?>
<?php require( '../classes/Post.php' ) ?>


<?php
    if(isset($_POST['postId'])){
        $post_id = $_POST['postId'];
        if(isset($_POST['result'])) {
		    if($_POST['result'] == 'true'){
                $query = mysqli_query($con, "UPDATE posts SET deleted='yes' WHERE id='$post_id'");
            }
	    }
    }
?>