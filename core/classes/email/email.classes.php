<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    class Email {
        
        // Email Class Variable/Properties
        protected $recipient_email_address;
        protected $subject;
        protected $body;

        //  Environment File Variable/Properties
        protected $email_username;
        protected $email_password;
        protected $email_server;
        
        public function __construct($recipient_email_address, $subject, $body, $fromName, $fromEmail, $replyToName, $replyToEmail) {
            
            // dotenv Environment stuff happens here

            // Use dotenv package in vendor
            require_once __DIR__ . '../../../../vendor/autoload.php';
            
            // Get dotenv file variables
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            
            // Specify dotenv variables required in this document
            $dotenv->required(['EMAIL_HOST', 'EMAIL_USER', 'EMAIL_PASSWORD']);
            
            // Set database connection variables
            $emailServer = $_ENV["EMAIL_HOST"];
            $emailUser = $_ENV["EMAIL_USER"];
            $emailPassword = $_ENV["EMAIL_PASSWORD"];

            // Map properties to dotenv variables
            $this->email_username = (string) $emailUser;
            $this->email_password = (string) $emailPassword;
            $this->email_server = (string) $emailServer;

            // PHPMailer Stuff happens here            
            ob_start();
            require_once('../vendor/autoload.php');
            $result = ob_get_contents();
            ob_end_clean();
            
            require '../vendor/phpmailer/phpmailer/src/Exception.php';
            require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
            require '../vendor/phpmailer/phpmailer/src/SMTP.php';
            
            $mail = new PHPMailer(true);
            
            // Server settings
            $mail->SMTPDebug = true; // Enable Debug
            $mail->isSMTP(); // Send using SMTP
            
            // Set the SMTP Host Server through which to Send Emails
            $mail->Host = $emailServer;
            
            $mail->SMTPAuth = true;
            
            $mail->Username = $emailUser;
            $mail->Password = $emailPassword;
            
            // Enable SSL encryption
            $mail->SMTPSecure = "ssl";
            
            $mail->Port = 465;
            
            // From
            $from_name = (string) $fromName;
            $from_email = (string) $fromEmail;
            $mail->SetFrom($from_email, $from_name);

            // To
            $reply_to_name = (string) $replyToName;
            $reply_to_email = (string) $replyToEmail;
            $mail->clearReplyTos();
            $mail->addReplyTo($reply_to_email, $reply_to_name);

            // Headers
            $headers = 'From: ' . $from_email . "\r\n";
            $headers .= 'Reply-To: ' . $reply_to_email . "\r\n";
                        
            $this->recipient_email_address = $recipient_email_address;
            
            $mail->addAddress($recipient_email_address);            
            
            $this->body = $body;
            $this->subject = $subject;
            
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            
            $mail->send();

        }
        
    }

?>