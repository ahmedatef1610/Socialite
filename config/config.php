<?php
    ob_start();
    session_start();
    date_default_timezone_set('Africa/Cairo');
    $con = mysqli_connect( '127.0.0.1:3325', 'root', '', 'social' );
    //Connection variable
    if ( mysqli_connect_errno() ) {
        echo 'Failed to connect: ' . mysqli_connect_error();
    }
   mysqli_query( $con, "SET time_zone = '+02:00'" );

?>