<!DOCTYPE html>

<html lang="en">

    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="assets/css/style.password_reset_request.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

        <title> Password Reset Request </title>

    </head>

    <body>

        <div class="form-wrap">

            <div class="tabs">
                <h3 class="reset-password-tab"><a class="active" href="#signup-tab-content">Reset Password</a></h3>
            </div><!--.tabs-->

            <div class="tabs-content">

                <div id="reset-password-tab" class="active">
                    
                    <form class="reset=password-form" action="includes/password_reset_request.inc.php" method="post" required>
                        <input name="users_email" type="email" class="input" id="users_email" autocomplete="off" placeholder="Email">
                        <button name="submit" type="submit" class="button" value="reset"> Reset </button>
                    </form><!--.login-form-->
                    
                    <div class="help-text">
                        <p>Alternatively, contact</p>
                        <p><a href="contact.php?email=technical">Technical Support</a></p>
                    </div><!--.help-text-->

                </div><!--.signup-tab-content-->

            </div><!--.tabs-content-->

        </div><!--.form-wrap-->

    </body>

</html>