<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow border-bottom border-danger fixed-top" style="border-bottom-width: 5px !important; z-index: 9999 !important; ">

    <a class="navbar-brand" href="index.php">Socialite <img width="45" src="assets/upload/icon.png" alt=""></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">


        <div class=" my-5 my-md-2 mx-auto search">

            <form class="form-inline" action="search.php" method="GET" name="search_form">
                <div class="input-group">
                    <input 
                        id="search_text_input"
                        class="form-control" 
                        type="text" 
                        onkeyup="getLiveSearchUsers(this.value, '<?php echo $userLoggedIn; ?>')" 
                        name="q" 
                        placeholder="Search..." 
                        autocomplete="off" 
                    >
                    
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                    </div>

                </div>
            </form>

            <div class="search_results border-info"></div>
            <div class="search_results_footer_empty"></div>
        </div>

        <ul class="navbar-nav my-md-2 ml-auto">
            <li class="nav-item <?php echo ($pageTitle == 'Profile')?'active':''; ?>">
                <a class="nav-link" href="<?php echo $user['username']?>"><?php echo $user['first_name']?></a>
            </li>
            <li class="nav-item <?php echo ($pageTitle == 'Home')?'active':''; ?>">
                <a class="nav-link" href="index.php"><i class="fas fa-home fa-lg"></i> <span class="d-inline-block d-md-none">Home</span></a>
            </li>
            <!-------------------------------------------------------------------->
            <li class="nav-item px-md-2 dropdown <?php echo ($pageTitle == 'Messages')?'active':''; ?>" id="myDropdown" >
                <?php
                    //Unread messages 
                    $messages = new Message($con, $userLoggedIn);
                    $num_messages = $messages->getUnreadNumber();
                ?>
                <?php
                    if($num_messages>0){
                        echo "<span class='badge badge-primary' id='unreadMsg'>$num_messages</span>";
                    }
                ?>
                <a class="m-0 px-0 btn btn-link " href="messages.php">
                    <i class="fas fa-envelope fa-lg"></i> 
                    <span class="d-inline-block d-md-none">Messages</span>
                </a>
                <a class="m-0 px-0 btn btn-link dropdown-toggle dropdown-toggle-split" href="#" data-toggle="dropdown" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown_data_window"></div>
                <input type="hidden" id="dropdown_data_type" value=""/>
            </li>
            <!-------------------------------------------------------------------->
            <li class="nav-item px-md-2 dropdown <?php echo ($pageTitle == 'Notifications')?'active':''; ?>" id="myDropdown" >
                <?php
                    //Unread Notification 
                    $notification = new Notification($con, $userLoggedIn);
                    $num_notifications = $notification->getUnreadNumber();
                    ?>
                <?php
                    if($num_notifications>0){
                        echo "<span class='badge badge-primary' id='unreadNotification'>$num_notifications</span>";
                    }
                ?>
                <a class="m-0 px-0 btn btn-link " href="#">
                    <i class="fas fa-bell fa-lg"></i> 
                    <span class="d-inline-block d-md-none">Notifications</span>
                </a>
                <a class="m-0 px-0 btn btn-link dropdown-toggle dropdown-toggle-split" href="#" data-toggle="dropdown" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown_data_window"></div>
                <input type="hidden" id="dropdown_data_type" value=""/>
            </li>
            <!-------------------------------------------------------------------->
            <li class="nav-item position-relative">
                <?php
                    $user_obj = new User($con, $userLoggedIn);
                    $num_requests = $user_obj->getNumberOfFriendRequests();
                    ?>
                <?php
                    if($num_requests>0){
                        echo "<span class='badge badge-primary' id='num_requests'>$num_requests</span>";
                    }
                ?>
                <a class="nav-link" href="requests.php"><i class="fas fa-users fa-lg"></i> <span class="d-inline-block d-md-none">Friends</span></a>
            </li>
            <!-------------------------------------------------------------------->
            <li class="nav-item dropdown <?php echo ($pageTitle == 'Settings')?'active':''; ?>">
                <a class="m-0 px-0 btn btn-link " href="settings.php">
                    <i class="fas fa-cog fa-lg"></i> <span class="d-inline-block d-md-none">Settings</span>
                </a>
                <a class="m-0 px-0 btn btn-link dropdown-toggle dropdown-toggle-split" href="#" data-toggle="dropdown" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'notification')">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <!-------------------------------------------------------------------->
            <li class="nav-item">
                <a class="nav-link" href="includes/handlers/logout.php"><i class="fad fa-sign-out fa-lg"></i> <span class="d-inline-block d-md-none">Logout</span></a>
            </li>
        </ul>
        
    </div>


</nav>




