<?php $pageTitle = "Settings" ?>

<?php require("includes/header.php") ?>
<?php include("includes/form_handlers/settings_handler.php") ?>

<link rel='stylesheet' href='assets/css/settings.css'>
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






<div class='underNav'>&nbsp;</div>
<div class=''>
    <!-- Row -->
    <div class="row no-gutters">
        <!-- Sidebar -->
        <div class="col-md-3">
            <!-- <div class="sidebar bg-secondary position-sticky shadow">
                <div class="row no-gutters">

                    <div class="col-12">

                    </div>

                </div>
            </div> -->
        </div>
        <!-- End Sidebar -->
        <!-- Main -->
        <div class="col-md-9">
            <div class="card shadow m-3">
                <div class="card-header"><h4>Account Settings</h4></div>
                <div class="card-body">



                    <?php
                        echo "<img src='" . $user['profile_pic'] ."' id='small_profile_pics'>";
                    ?>
                    <br>
                    <a href="upload.php">Upload new profile picture</a> <br><br>
                    Modify the values and click 'Update Details'
                    <hr>
                    <?php
                        $user_data_query = mysqli_query($con, "SELECT first_name, last_name, email FROM users WHERE username='$userLoggedIn'");
                        $row = mysqli_fetch_array($user_data_query);

                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $email = $row['email'];
                    ?>
                    <form action="settings.php" method="POST">
                        First Name: <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>
                        Last Name: <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>
                        Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
                        <?php echo $message??""; ?>
                        <input type="submit" name="update_details" id="save_details" value="Update Details"><br>
                    </form>
                    <hr>
                    <h4>Change Password</h4>
                    <form action="settings.php" method="POST">
                        Old Password: <input type="password" name="old_password" ><br>
                        New Password: <input type="password" name="new_password_1" ><br>
                        New Password Again: <input type="password" name="new_password_2" ><br>
                        <?php echo $password_message??""; ?>
                        <input type="submit" name="update_password" id="save_details" value="Update Password"><br>
                    </form>
                    <hr>
                    <h4>Close Account</h4>
                    <form action="settings.php" method="POST">
                        <input type="submit" name="close_account" id="close_account" value="Close Account">
                    </form>





                </div>
            </div>
        </div>
        <!--End Main -->
    </div>
    <!-- End Row -->
</div>



<!-- Footer -->
<?php require("includes/footer.php") ?>
<script src='assets/js/profile.js'></script>


</body>
</html>
<?php ob_end_flush() ?>