<?php

    // Signup Controller

    // controller class extends to viewer (since viewerclass extends to model calss) class to store input provided by user

    class ActivateController extends ActivateViewer {

        // Properties
        private $users_email;

        // Methods
        public function ActivateRequestUser($users_email) {

            $this->users_email = $users_email;

            // Create Token to verify correct user in Database
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $validator = bin2hex($token);

            $tokenSecure = password_hash($token, PASSWORD_DEFAULT);

            $domain = "https://lambda.joburg/";
            // $domain = "localhost/Lambda/40_Lambda/";

            $url = $domain."includes/activate_account.inc.php?selector=".$selector."&validator=".$validator;

            // Current date and time in seconds (since 1970) plus one hour from now
            $expires = date("U") + 1800;

            if ($this->emptyInput() == false) {

                header("location: ../index.php?input=empty");
                exit();

            }

            if ($this->invalidEmail() == false) {

                header("location: ../index.php?email=invalid");
                exit();

            }

            $this->setActivateRequestUser($this->users_email, $selector, $tokenSecure, $expires, $url);

        }

        // Signup error handling

        public function emptyInput() {

            $result;

            if (empty($this->users_email)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function invalidEmail() {

            $result;

            if (!filter_var($this->users_email, FILTER_VALIDATE_EMAIL)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

    }

?>