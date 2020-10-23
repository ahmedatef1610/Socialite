<?php  
    include("../../config/config.php");
    include("../classes/User.php");

    $query = $_POST['query'];
    $userLoggedIn = $_POST['userLoggedIn'];

    $names = explode(" ", $query);

    if(strpos($query, "_") !== false) {
        $usersReturned = mysqli_query($con, "SELECT * FROM users WHERE username LIKE '$query%' AND user_closed='no' ");
    }
    else if(count($names) == 2) {
        $usersReturned = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '%$names[0]%' AND last_name LIKE '%$names[1]%') AND user_closed='no' ");
    }
    else {
        $usersReturned = mysqli_query($con, "SELECT * FROM users WHERE (first_name LIKE '%$names[0]%' OR last_name LIKE '%$names[0]%') AND user_closed='no' ");
    }


    if($query != "") {
        while($row = mysqli_fetch_array($usersReturned)) {
            $user = new User($con, $userLoggedIn);
            if($row['username'] != $userLoggedIn) {
                $mutual_friends = $user->getMutualFriends($row['username']) . " friends in common";
            }
            else {
                $mutual_friends = "";
            }
            if($user->isFriend($row['username'])) {
                echo "
                <div class='card shadow m-3'>
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
                                <p class='card-text m-0 '><a href='messages.php?u={$row['username']}'>Go To Messages </a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                    
                ";
            }
        }
    }

?>