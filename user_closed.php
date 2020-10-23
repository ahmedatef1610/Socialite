<?php $pageTitle = "user closed" ?>
<?php require("includes/header.php") ?>



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

        </div>
        <!-- End Sidebar -->
        <!-- Main -->
        <div class="col-md-9">
            <div class="card shadow m-3">
                <div class="card-body">
                    <h4>User Closed</h4>
                    This account is Closed
                    <?php //echo $_SERVER['HTTP_REFERER'] ?>
                    <a href="index.php">Click here to go back</a>
                </div>
            </div>
        </div>
        <!--End Main -->
    </div>
    <!-- End Row -->
</div>
<!-- Footer -->
<?php require("includes/footer.php") ?>
</body>
</html>
<?php ob_end_flush() ?>