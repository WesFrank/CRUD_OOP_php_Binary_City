<?php

    // Report all errors except E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);

    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {

        // redirect user
        header("location: index.php?error=selector&validator");

    } else {
        
        // Check if selector in URL is proper hexa-decimal format
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

            // do nothing

        } else {

            // redirect user
            header("location: index.php?error=hacker");

        }
        
    }

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="assets/css/style.password_reset_request.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

        <title> Password Reset </title>

    </head>

    <body>

        <div class="form-wrap">

            <div class="tabs">
                <h3 class="reset-password-tab"><a class="active" href="#signup-tab-content">Reset Password</a></h3>
            </div><!--.tabs-->

            <div class="tabs-content">

                <div id="reset-password-tab" class="active">
                    
                    <form class="reset=password-form" action="includes/password_reset.inc.php" method="post" required>
                        
                        <input name="selector" type="hidden" value="<?php echo $selector ?>" />
                        <input name="validator" type="hidden" value="<?php echo $validator ?>" />

                        <input name="password" type="password" class="input" id="password" autocomplete="off" placeholder="Password">
                        <input name="password_repeat" type="password" class="input" id="password_repeat" autocomplete="off" placeholder="Password Repeat">

                        <button name="submit" type="submit" class="button" value="Signup"> Reset </button>
                        
                    </form><!--.login-form-->
                    
                    <div class="help-text">
                        <p>Alternatively, contact</p>
                        <p><a href="contact.php?email=technical_support">Technical Support</a></p>
                    </div><!--.help-text-->

                </div><!--.signup-tab-content-->

            </div><!--.tabs-content-->

        </div><!--.form-wrap-->

    </body>

</html>