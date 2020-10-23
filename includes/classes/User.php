<?php

    class User {
        private $user;
        private $con;

        public function __construct( $con, $user ) {
            $this->con = $con;
            $user_details_query = mysqli_query( $con, "SELECT * FROM users WHERE username='$user'" );
            if(mysqli_num_rows(($user_details_query))>0){
                $this->user = mysqli_fetch_array( $user_details_query );
            }else{
                header("Location: index.php");
            }
        }

        //1
        public function getUsername() {
            return $this->user['username'];
        }
        //2
        public function getNumPosts() {
            $username = $this->user['username'];
            $query = mysqli_query( $this->con, "SELECT num_posts FROM users WHERE username='$username'" );
            $row = mysqli_fetch_array( $query );
            return $row['num_posts'];
        }
        //3
        public function getFirstAndLastName() {
            $username = $this->user['username'];
            $query = mysqli_query( $this->con, "SELECT first_name, last_name FROM users WHERE username='$username'" );
            $row = mysqli_fetch_array( $query );
            return $row['first_name'] . ' ' . $row['last_name'];
        }
        //4
        public function isClosed() {
            $username = $this->user['username'];
            $query = mysqli_query($this->con, "SELECT user_closed FROM users WHERE username='$username'");
            $row = mysqli_fetch_array($query);
            if($row['user_closed'] == 'yes'){ return true;}
            else {return false;}
        }
        //5
        public function isFriend($username_to_check) {
            $usernameComma = "," . $username_to_check . ",";
            if((strstr($this->user['friend_array'], $usernameComma) || $username_to_check == $this->user['username'])) {
                return true;
            }
            else {
                return false;
            }
        }
        //6
        public function getProfilePic() {
            $username = $this->user['username'];
            $query = mysqli_query($this->con, "SELECT profile_pic FROM users WHERE username='$username'");
            $row = mysqli_fetch_array($query);
            return $row['profile_pic'];
        }
        //7
        public function didReceiveRequest($user_from) {
            $user_to = $this->user['username'];
            $check_request_query = mysqli_query($this->con, "SELECT * FROM friend_requests WHERE user_to='$user_to' AND user_from='$user_from'");
            if(mysqli_num_rows($check_request_query) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        //8
        public function didSendRequest($user_to) {
            $user_from = $this->user['username'];
            $check_request_query = mysqli_query($this->con, "SELECT * FROM friend_requests WHERE user_to='$user_to' AND user_from='$user_from'");
            if(mysqli_num_rows($check_request_query) > 0) {
                return true;
            }
            else {
                return false;
            }
        }
        //9
        public function removeFriend($user_to_remove) {
            $logged_in_user = $this->user['username'];
    
            $query = mysqli_query($this->con, "SELECT friend_array FROM users WHERE username='$user_to_remove'");
            $row = mysqli_fetch_array($query);
            $friend_array_username = $row['friend_array'];
    
            $new_friend_array = str_replace($user_to_remove . ",", "", $this->user['friend_array']);
            $remove_friend = mysqli_query($this->con, "UPDATE users SET friend_array='$new_friend_array' WHERE username='$logged_in_user'");
    
            $new_friend_array = str_replace($this->user['username'] . ",", "", $friend_array_username);
            $remove_friend = mysqli_query($this->con, "UPDATE users SET friend_array='$new_friend_array' WHERE username='$user_to_remove'");
        }
        //10
        public function sendRequest($user_to) {
            $date_added = date( 'Y-m-d h:i:s A' );
            $user_from = $this->user['username'];
            $query = mysqli_query($this->con, "INSERT INTO friend_requests VALUES('', '$user_to', '$user_from','$date_added')");
        }
        //11
        public function removeRequest($user_to) {
            $user_from = $this->user['username'];
            $query = mysqli_query($this->con, "DELETE FROM friend_requests WHERE user_from='$user_from' AND user_to='$user_to'");
        }
        //12
        public function getFriendArray() {
            $username = $this->user['username'];
            $query = mysqli_query($this->con, "SELECT friend_array FROM users WHERE username='$username'");
            $row = mysqli_fetch_array($query);
            return $row['friend_array'];
        }
        //13
        public function getMutualFriends($user_to_check) {
            $mutualFriends = 0;
            $user_array = $this->user['friend_array'];
            $user_array_explode = explode(",", $user_array);
    
            $query = mysqli_query($this->con, "SELECT friend_array FROM users WHERE username='$user_to_check'");
            $row = mysqli_fetch_array($query);
            $user_to_check_array = $row['friend_array'];
            $user_to_check_array_explode = explode(",", $user_to_check_array);
    
            foreach($user_array_explode as $i) {
                foreach($user_to_check_array_explode as $j) {
                    if($i == $j && $i != "") {
                        $mutualFriends++;
                    }
                }
            }
            return $mutualFriends;
        }
        //14
        public function getNumberOfFriendRequests() {
            $username = $this->user['username'];
            $query = mysqli_query($this->con, "SELECT * FROM friend_requests WHERE user_to='$username'");
            return mysqli_num_rows($query);
        }
        //15
    }

?>