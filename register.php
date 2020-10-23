<?php
    require("config/config.php");
    require("includes/form_handlers/register_handler.php");
    require("includes/form_handlers/login_handler.php");	
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='assets/upload/icon.png' type='image/x-icon'>
    <link rel='stylesheet' href='assets/css/layout/all.min.css'>
    <link rel='stylesheet' href='assets/css/layout/bootstrap_3.min.css'>
    <link rel='stylesheet' href='assets/css/register.css'>
    <title>Register - Socialite</title>
</head>

<body>

    <div class='container p-5 mb-5'>
        <h1 class="text-center">Welcome to Socialite <i class="fad fa-user-plus"></i> </h1>
    </div>


    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-10 col-lg-10 mx-auto">
                    <div class="login_box">
                        <?php echo $errors["login_error"]??"" ?>
                        <form class="myForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="log_email" placeholder="Email" value="<?php echo $_SESSION['log_email'] ?? '' ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="log_password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-block" name="login_button">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <a  class="signup_select btn btn-link">Need and Account? Register here!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="signup">
        <div class="container">
            <div class="row">
                <div class="col-10 col-lg-10 mx-auto">
                    <div class="signup_box">
                        <?php // echo date("Y/m/d h:i:s A") ?>
                        <?php  echo $errors["register_done"]??"" ?>
                        <form class="signupForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="reg_fname" placeholder="First Name" value="<?php echo $_SESSION['reg_fname'] ?? '' ?>" required>
                                <small class='form-text text-muted'><?php echo $errors['fname']??"" ?></small>
                                <!-- <div class="invalid-feedback">Your first name must be between 2 and 255 characters</div> -->
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="reg_lname" placeholder="Last Name" value="<?php echo $_SESSION['reg_lname'] ?? '' ?>" required>
                                <small class='form-text text-muted'><?php echo $errors['lname']??"" ?></small>
                                <!-- <div class="invalid-feedback">Your last name must be between 2 and 255 characters</div> -->
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="reg_email" placeholder="Email" value="<?php echo $_SESSION['reg_email'] ?? '' ?>" required>
                                <!-- <div class="invalid-feedback">Enter a valid email</div> -->
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="reg_email2" placeholder="Confirm Email" value="<?php echo $_SESSION['reg_email2'] ?? '' ?>" required>
                                <small class='form-text text-muted'><?php echo $errors['email']??"" ?></small>
                                <div class="invalid-feedback">Enter a valid email</div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="reg_password" placeholder="Password" required>
                                <!-- <div class="invalid-feedback">Your password must be between 5 and 255 characters</div>
                                <div class="invalid-feedback">Your password can only contain english characters or numbers or @-_</div> -->
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="reg_password2" placeholder="Confirm Password" required>
                                <small class='form-text text-muted'><?php echo $errors['password']??"" ?></small>
                                <!-- <div class="invalid-feedback">Your password must be between 5 and 255 characters</div>
                                <div class="invalid-feedback">Your password can only contain english characters or numbers or @-_</div> -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="register_button">Register</button>
                            </div>
                            <div class="form-group text-center">
                                <a class="login_select btn btn-link">Already have an account? Login here!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='assets/js/layout/jquery.min.js'></script>
    <script src='assets/js/layout/popper.min.js'></script>
    <script src='assets/js/layout/bootstrap.min.js'></script>
    <script src='assets/js/app.js'></script>
    <script src='assets/js/register.js'></script>
    <?php
        if(isset($_POST['register_button'])) {
            echo '
                <script>
                    $(document).ready(function() {
                        $(".login").hide();
                        $(".signup").show();
                    });
                </script>
            ';
        }
    ?>
</body>

</html>
<?php ob_end_flush() ?>