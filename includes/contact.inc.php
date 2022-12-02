<?php

    if (isset($_POST['submit'])) {
        
        if (isset($_POST['email'])) {
            
            // check if email address is valid
            if (filter_var($_POST['my_email'], FILTER_VALIDATE_EMAIL)) {

                if (isset($_POST['subject']) && $_POST['subject'] === "account_activation" ) {
                    
                    $recipient_email_address = $_POST['my_email'];
                    
                    include "../core/classes/dbh/dbh-model.classes.php";
                    include "../core/classes/activate/activate-viewer.classes.php";
                    include "../core/classes/activate/activate-controller.classes.php";
            
                    // Instatiate SignupController class
                    $reset = new ActivateController();
            
                    // Running error Hanlers
                    $reset->ActivateRequestUser($recipient_email_address);

                    echo "<script> location.href='../index.php?activation=pending?email=sent'; </script>";
                    exit();

                }
                
                if (isset($_POST['subject']) && $_POST['subject'] !== "account_activation") {
                    
                    if (isset($_POST['subject']) && $_POST['subject'] === "vacancies") {
                        
                        // Send Signup Email to User
                        include "../core/classes/email/email.classes.php";

                        // Assign this email address to the variable below for further processing                    
                        $recipient_email_address = $_POST['my_email'];
                        
                        $subject = "Vacancies";
                        
                        $body = "<h3>Vacancies</h3>";
                        $body .= "There are currently no job vacancies at &lambda; <br><br>";
                        // $body .= "For a list of all vacancies at &lambda; please visit the link below: <br><br>";
                        // $body .= "<a href='https://lambda.joburg/vacancies.php'> https://lambda.joburg/vacancies.php </a>";
                        $body .= "<br>";
                        $body .= "<br>";
                        $body .= "Regards";

                        $fromName = "Vacancies";
                        $fromEmail = "vacancies@lambda.joburg";
                        $replyToName = "Vacancies";
                        $replyToEmail = "vacancies@lambda.joburg";

                        new Email($recipient_email_address, $subject, $body, $fromName, $fromEmail, $replyToName, $replyToEmail);

                        echo "<script> location.href='../index.php?topic=vacancies?email=sent'; </script>";
                        exit();

                    } else {

                        // Send Signup Email to User
                        include "../core/classes/email/email.classes.php";

                        // Assign this email address to the variable below for further processing                    
                        $recipient_email_address = $_POST['email'];
                        
                        $subject = "Suggestions";
                        
                        $body = $_POST['body'];

                        $fromName = $_POST['name']." ".$_POST['surname'];
                        $fromEmail = $_POST['my_email'];
                        $replyToName = $_POST['name']." ".$_POST['surname'];
                        $replyToEmail = $_POST['my_email'];

                        new Email($recipient_email_address, $subject, $body, $fromName, $fromEmail, $replyToName, $replyToEmail);

                        echo "<script> location.href='../index.php?topic=received?email=sent'; </script>";
                        exit();
                        
                    }
                    
                }
              
            } else {
                
                // Redirect user 
                echo "<script> location.href='../index.php?email=invalid'; </script>";
                exit();

            }

        }
        
    } else {
        
        echo "<script> location.href='../index.php?access=denied'; </script>";
        exit();
        
    }
    
?>