<?php

    // Viewer class

    // gets data from database by extending to model class and returns to user

    class ActivateViewer extends DbhModel {

        protected function setActivateRequestUser($email, $selector, $tokenSecure, $expires, $url) {

            // Check if user exists
            $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE users_email = ?;");

            if (!$stmt->execute(array($email))) {

                $stmt = null;
                header("location: ../index.php?activation=failed?error=select");
                exit();

            }

            if ($stmt->rowCount() == 0) {

                $stmt = null;
                header("location: ../index.php?activation=failed?error=count");
                exit();

            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $AccAct = $result[0]["AccAct"];

            if ($AccAct == 1) {

                $stmt = null;
                header("location: ../index.php?account=active");
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

            $subject = "Account Activation";

            // The content in variable $body may only be text or html
            $body = "<h3> Account Activation </h3>";
            $body .= "<p> To activate your account, click the link below: </p>";
            $body .= "<br>";
            $body .= "<a href=".$url."> ".$url." </a>";
            $body .= "<p> Unactivated accounts are removed periodically. </p>";

            $fromName = "Account Activation";
            $fromEmail = "activate-account@mathmonkey.joburg";
            $replyToName = "Technical";
            $replyToEmail = "technical@mathmonkey.joburg";

            new Email($email, $subject, $body, $fromName, $fromEmail, $replyToName, $replyToEmail);
            
        }

    }

?>