<?php

    // Viewer class

    // gets data from database by extending to model class and returns to user

    class SignupViewer extends DbhModel {

        protected function checkUser($uid, $email) {

            $stmt = $this->connect()->prepare('SELECT users_uid FROM Users WHERE users_uid = ? OR users_email = ?;');

            if (!$stmt->execute(array($uid, $email))) {
                
                $stmt = null;
                header("location: ../index.php?signup_error=sql_select_users");
                exit();

            }

            $resultCheck;

            if ($stmt->rowCount() > 0) {

                $resultCheck = false;

            } else {

                $resultCheck = true;

            }

            return $resultCheck;

        }

        protected function setUser($uid, $pwd, $email, $selector, $tokenSecure, $expires, $url) {

            $stmt = $this->connect()->prepare("INSERT INTO Users (users_uid, users_pwd, users_email, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUE (?, ?, ?, ?, ?, ?);");

            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            if (!$stmt->execute(array($uid, $hashedPwd, $email, $selector, $tokenSecure, $expires))) {
                
                $stmt = null;
                header("location: ../index.php?signup_error=sql_insert_users");
                exit();

            }

            // Send Signup Email to User
            include "../core/classes/email/email.classes.php";

            $subject = "Account Activation";

            // The content in variable $body may only be text or html
            $body = "<h3> Account Activation </h3>";
            $body .= "<p> To activate your account, click on the link below: </p>";
            $body .= "<br>";
            $body .= "<a href=".$url."> ".$url." </a>";

            $fromName = "Account Activation";
            $fromEmail = "account-activation@lambda.joburg";
            $replyToName = "Technical";
            $replyToEmail = "technical@lambda.joburg";

            new Email($email, $subject, $body, $fromName, $fromEmail, $replyToName, $replyToEmail);

        }

        protected function activateAccount($selector, $validator) {

            // This function/method should update the 0 value in the column AccAct of the users table to 1 by using the token an validator provided from the GET method in the URL

            // The rest of the code here should be the same as the code for resetting passwords by checking the database for the selector and expiry

            // Continue processing request
            $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE pwdResetSelector=?");

            if (!$stmt->execute(array($selector))) {
                
                $stmt = null;
                header("location: ../index.php?signup_error=account_select_users");
                exit();

            }

            if ($stmt->rowCount() == 0) {

                $stmt = null;
                header("location: ../index.php?signup_error=account_row_count");
                exit();

            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pwdResetToken = $result[0]["pwdResetToken"];
                        
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $pwdResetToken);

            if ($tokenCheck === false) {

                $stmt = null;
                header("location: ../index.php?signup_error=token");
                exit();

            }
            
            if ($tokenCheck === true) {

                // Continue processing request to activate account
                // Switch value from 0 to 1 in the AccAct column of users table

                $tokenEmail = $result[0]["users_email"];

                $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE users_email=?;");

                if (!$stmt->execute(array($tokenEmail))) {
                
                    $stmt = null;
                    header("location: ../index.php?signup_error=activation_select_users");
                    exit();
    
                }

                if ($stmt->rowCount() == 0) {

                    $stmt = null;
                    header("location: ../index.php?signup_error=activation_row_count");
                    exit();
    
                }

                // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // $pwdResetToken = $result[0]["pwdResetToken"];

                $stmt = $this->connect()->prepare("UPDATE Users SET AccAct = ? WHERE users_email = ?;");

                if (!$stmt->execute(array(1, $tokenEmail))) {
                
                    $stmt = null;
                    header("location: ../index.php?signup_error=activation_update");
                    exit();
    
                }

            }

        }

    }

?>