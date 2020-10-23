<?php $pageTitle = "Settings" ?>

<?php require("includes/header.php") ?>

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

<?php

    if(isset($_POST['cancel'])) {
        header("Location: settings.php");
    }

    if(isset($_POST['close_account'])) {
        $close_query = mysqli_query($con, "UPDATE users SET user_closed='yes' WHERE username='$userLoggedIn'");
        session_destroy();
        header("Location: register.php");
    }



?>




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
                <div class="card-header"><h4>Close Account</h4></div>
                <div class="card-body">

                    Are you sure you want to close your account?<br><br>
                    Closing your account will hide your profile and all your activity from other users.<br><br>
                    You can re-open your account at any time by simply logging in.<br><br>

                    <form action="close_account.php" method="POST">
                        <input type="submit" name="close_account" id="close_account" value="Yes! Close it!">
                        <input type="submit" name="cancel" id="update_details" value="No way!">
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