<?php
include("../../config/config.php");
include("../../includes/classes/User.php");

$query = $_POST['query'];
$userLoggedIn = $_POST['userLoggedIn'];

$names = explode(" ", $query);

//If query contains an underscore, assume user is searching for usernames
if(strpos($query, '_') !== false) {
	$usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '$query%' AND user_closed='no' LIMIT 8");
}
//If there are two words, assume they are first and last names respectively
else if(count($names) == 2){
	$usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '$names[0]%' AND last_name LIKE '$names[1]%') AND user_closed='no' LIMIT 8");
}
//If query has one word only, search first names or last names 
else {
	$usersReturnedQuery = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '$names[0]%' OR last_name LIKE '$names[0]%') AND user_closed='no' LIMIT 8");
}

    
$mutual_friends = "";
if($query != ""){

	while($row = mysqli_fetch_array($usersReturnedQuery)) {
		$user = new User($con, $userLoggedIn);
		if($row['username'] != $userLoggedIn){
			$mutual_friends = $user->getMutualFriends($row['username']) . " friends in common";
        }
		else{
			$mutual_friends == "";
        } 

        $mutual_friends = $mutual_friends??"";

		echo "
            <div class='card bg-info shadow m-1'>
                <div class='row no-gutters'>
                    <div class='col-4'>
                        <a href='{$row['username']}'>
                            <img src='{$row['profile_pic']}' class='card-img' alt='{$row['username']}'>
                        </a>
                    </div>
                    <div class='col-8'>
                        <div class='card-body py-1'>
                            <a class='text-decoration-none' href='{$row['username']}'>
                                <h5 class='card-text m-0'>{$row['first_name']} {$row['last_name']}</h5>
                            </a>
                            <p class='card-text m-0 text-muted'>$mutual_friends</p>
                        </div>
                    </div>
                </div>
            </div>
            ";

	}

}

?>