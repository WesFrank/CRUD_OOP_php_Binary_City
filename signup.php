<?php

    // If user is logged in, this page should be inaccessible
    session_start();

    if (isset($_SESSION['useruid'])) {

        header("location: index.php");

    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="assets/css/style.login_signup.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

        <title> Signup/Login </title>

    </head>

    <body>

        <div class="form-wrap">

            <div class="tabs">
                <h3 class="signup-tab"><a class="active" href="#signup-tab-content">Signup</a></h3>
                <h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
            </div><!--.tabs-->

            <div class="tabs-content">
                
                <div id="signup-tab-content" class="active">
                    
                    <form class="signup-form" action="includes/signup.inc.php" method="post">
                        <input name="email" type="email" class="input" id="email" autocomplete="off" placeholder="Email" required>
                        <input name ="username" type="text" class="input" id="username" autocomplete="off" placeholder="Username" required>
                        <input name="signup_password" type="password" class="input" id="signup_password" autocomplete="off" placeholder="Password" required>
                        <input name="signup_password_repeat" type="password" class="input" id="signup_password_repeat" autocomplete="off" placeholder="Repeat Password" required>

                        <input name="agree_to_t_n_c" type="checkbox" class="checkbox" id="agree_to_t_n_c" required>
                        <label for="agree_to_t_n_c"> Agree to <a href="https://popia.co.za/">Terms & Conditions</a> </label>

                        <button name="submit" type="submit" class="button" value="Signup"> Signup </button>
                    </form><!--.login-form-->

                </div><!--.signup-tab-content-->

                <div id="login-tab-content">
                    
                    <form class="login-form" action="includes/login.inc.php" method="post">
                        <input name="user_login" type="text" class="input" id="user_login" autocomplete="off" placeholder="Email or Username" required>
                        <input name="login_password" type="password" class="input" id="login_password" autocomplete="off" placeholder="Password" required>
                        <button name="submit" type="submit" class="button" value="Login"> Login </button>
                    </form><!--.login-form-->
                    
                    <div class="help-text">
                        <p><a href="password_reset_request.php">Forget your Password?</a></p>
                    </div><!--.help-text-->

                </div><!--.login-tab-content-->

            </div><!--.tabs-content-->

        </div><!--.form-wrap-->

        <?php
        
            if (isset($_GET['account'])) {
                    
                if ($_GET['account'] == 'active') {

                    echo "<p style='text-align: center'> Your account has been activated </p>";

                }

            }        
        
        ?>

        <?php

            if (isset($_GET['login_error'])) {
                
                if ($_GET['login_error'] == 'sql_select_users') {

                    echo "<p style='text-align: center'> There was an SQL error (user select) </p>";

                }

                if ($_GET['login_error'] == 'user_not_exists') {

                    echo "<p style='text-align: center'> No user with that username/email exists </p>";

                }

                if ($_GET['login_error'] == 'activation_required') {

                    echo "<p style='text-align: center'> You must activate your account before trying to log in </p>";

                }

                if ($_GET['login_error'] == 'incorrect_password') {

                    echo "<p style='text-align: center'> The username/email-password combination is incorrect </p>";

                }

                if ($_GET['login_error'] == 'sql_select_password') {

                    echo "<p style='text-align: center'> There was an SQL error (password select) </p>";

                }

                if ($_GET['login_error'] == 'no_password') {

                    echo "<p style='text-align: center'> There was an SQL error (password rowcount) </p>";

                }

                if ($_GET['login_error'] == 'empty_input') {

                    echo "<p style='text-align: center'> All fields are required to log in </p>";

                }

            }

        ?>

        <?php

            if (isset($_GET['signup_error'])) {
                
                if ($_GET['signup_error'] == 'sql_select_users') {

                    echo "<p style='text-align: center'> There was an SQL error (user select) </p>";

                }

                if ($_GET['signup_error'] == 'sql_insert_users') {

                    echo "<p style='text-align: center'> There was an SQL error (users insert) </p>";

                }

                if ($_GET['signup_error'] == 'account_select_users') {

                    echo "<p style='text-align: center'> There was an SQL error (account select users) </p>";

                }

                if ($_GET['signup_error'] == 'sql_row_count') {

                    echo "<p style='text-align: center'> There was an SQL error (account row count) </p>";

                }

                if ($_GET['signup_error'] == 'token') {

                    echo "<p style='text-align: center'> There was a token error </p>";

                }

                if ($_GET['signup_error'] == 'activation_select_users') {

                    echo "<p style='text-align: center'> There was an SQL error (activation select users) </p>";

                }
                
                if ($_GET['signup_error'] == 'activation_row_count') {

                    echo "<p style='text-align: center'> There was an SQL error (activation row count) </p>";

                }

                if ($_GET['signup_error'] == 'activation_update') {

                    echo "<p style='text-align: center'> There was an SQL error (activation update) </p>";

                }

                if ($_GET['signup_error'] == 'empty_input') {

                    echo "<p style='text-align: center'> All fields are required to sign up </p>";

                }

                if ($_GET['signup_error'] == 'invalid_username') {

                    echo "<p style='text-align: center'> Invalid username </p>";

                }

                if ($_GET['signup_error'] == 'invalid_email') {

                    echo "<p style='text-align: center'> Invalid Email </p>";

                }

                if ($_GET['signup_error'] == 'password_not_match') {

                    echo "<p style='text-align: center'> Passwords don't match </p>";

                }

                if ($_GET['signup_error'] == 'user_exists') {

                    echo "<p style='text-align: center'> This username already exists </p>";

                }

                if ($_GET['signup_error'] == 'password_strength') {

                    echo "<p style='text-align: center; color: red;'> Your password is not strong enough </p>";

                    echo "<br>";

                    echo "
                    
                        <div style='width: 350px; margin-left: auto; margin-right: auto; text-align: center;'>

                            <ul style='list-style: none;'>

                                <li>Password must contain a numeral</li>
                                <li>Password must contain a capital letter</li>
                                <li>Password must contain a lowercase letter</li>
                                <li>Password must contain a special character</li>
                                <li>Password must containe at least 8 characters</li>
                            
                            </ul>

                        </div>
                    
                    ";

                    echo "<br>";
                    echo "<br>";

                }

            }

        ?>

        <!-- partial -->

        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="./assets/js/script.login_signup.js"></script>

    </body>

</html>