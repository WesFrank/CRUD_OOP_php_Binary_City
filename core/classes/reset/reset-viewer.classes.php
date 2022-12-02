<?php

    // Viewer class

    // gets data from database by extending to model class and returns to user

    class ResetViewer extends DbhModel {

        protected function setResetRequestUser($email, $selector, $tokenSecure, $expires, $url) {

            // Check if user exists
            $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE users_email = ?;");

            if (!$stmt->execute(array($email))) {

                $stmt = null;
                header("location: ../index.php?stmt=fail");
                exit();

            }

            if ($stmt->rowCount() == 0) {

                $stmt = null;
                header("location: ../index.php?user=none");
                exit();

            }

            // Continue processing request
            $stmt = $this->connect()->prepare("UPDATE Users SET pwdResetSelector = ?, pwdResetToken = ?, pwdResetExpires = ? WHERE users_email=?;");

            if (!$stmt->execute(array($selector, $tokenSecure, $expires, $email))) {
                
                $stmt = null;
                header("location: ../index.php?error=update");
                exit();

            }

            // Send Signup Email to User
            include "../core/classes/email/email.classes.php";

            $subject = "Reset Password";

            // The content in variable $body may only be text or html
            $body = "<h3> Reset Password </h3>";
            $body .= "<p> You have requested to reset your password. Follow the link below: </p>";
            $body .= "<br>";
            $body .= "<a href=".$url."> ".$url." </a>";

            $fromName = "Reset Password";
            $fromEmail = "reset-password@mathmonkey.joburg";
            $replyToName = "Technical";
            $replyToEmail = "technical@mathmonkey.joburg";

            new Email($email, $subject, $body, $fromName, $fromEmail, $replyToName, $replyToEmail);
            
        }

        protected function setResetUser($selector, $validator, $password, $password_repeat) {

            $currentDate = date("U");

            // Continue processing request
            $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE pwdResetSelector=? AND pwdResetExpires >=?;");

            if (!$stmt->execute(array($selector, $currentDate))) {
                
                $stmt = null;
                header("location: ../index.php?error=reset");
                exit();

            }

            if ($stmt->rowCount() == 0) {

                $stmt = null;
                header("location: ../index.php?reset=fail");
                exit();

            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $pwdResetToken = $result[0]["pwdResetToken"];
                        
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $pwdResetToken);

            if ($tokenCheck === false) {

                $stmt = null;
                header("location: ../index.php?reset=hacker");
                exit();

            }
            
            if ($tokenCheck === true) {

                // Update the Password in the database
                $tokenEmail = $result[0]["users_email"];

                $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE users_email=?;");

                if (!$stmt->execute(array($tokenEmail))) {
                
                    $stmt = null;
                    header("location: ../index.php?token=email");
                    exit();
    
                }

                if ($stmt->rowCount() == 0) {

                    $stmt = null;
                    header("location: ../index.php?reset=none");
                    exit();
    
                }

                // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // $pwdResetToken = $result[0]["pwdResetToken"];

                $stmt = $this->connect()->prepare("UPDATE Users SET users_pwd = ? WHERE users_email = ?;");

                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                if (!$stmt->execute(array($hashedPwd, $tokenEmail))) {
                
                    $stmt = null;
                    header("location: ../index.php?update=fail");
                    exit();
    
                }

            }

        }

    }

?>