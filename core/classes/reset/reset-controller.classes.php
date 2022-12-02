<?php

    // Signup Controller

    // controller class extends to viewer (since viewerclass extends to model calss) class to store input provided by user

    class ResetController extends ResetViewer {

        // Properties
        private $users_email;

        // Methods
        public function ResetRequestUser($users_email) {

            $this->users_email = $users_email;

            // Create Token to verify correct user in Database
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $validator = bin2hex($token);

            $tokenSecure = password_hash($token, PASSWORD_DEFAULT);

            $domain = "https://lambda.joburg/";
            // $domain = "localhost/Lambda/40_Lambda/";

            $url = $domain."password_reset.php?selector=".$selector."&validator=".$validator;

            // Current date and time in seconds (since 1970) plus one hour from now
            $expires = date("U") + 1800;

            if ($this->emptyInput() == false) {

                header("location: ../index.php?request=reset?input=empty");
                exit();

            }

            if ($this->invalidEmail() == false) {

                header("location: ../index.php?request=reset?error=email");
                exit();

            }

            $this->setResetRequestUser($this->users_email, $selector, $tokenSecure, $expires, $url);

        }

        private $selector;
        private $validator;
        private $password;
        private $password_repeat;

        public function ResetUser($selector, $validator, $password, $password_repeat) {

            $this->selector = $selector;
            $this->validator = $validator;
            $this->password = $password;
            $this->password_repeat = $password_repeat;

            if ($this->pwdMatch() == false) {

                header("location: ../index.php?reset=password?error=match");
                exit();

            }

            if ($this->emptyPasswords() == false) {

                header("location: ../index.php?reset=password?error=empty");
                exit();

            }

            if ($this->passwordStrength() == false) {

                header("location: ../index.php?reset=password?error=strength");
                exit();

            }

            $this->setResetUser($this->selector, $this->validator, $this->password, $this->password_repeat);

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

        public function pwdMatch() {

            $result;

            if ($this->password !== $this->password_repeat) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function emptyPasswords() {

            $result;

            if (empty($this->password) || empty($this->password_repeat)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }


        public function passwordStrength() {

            $result;

            if (!preg_match("@[a-z]@", $this->password) || !preg_match("@[A-Z]@", $this->password) || !preg_match('@[0-9]@', $this->password) || !preg_match('@[#?!\\@$%^&*-]@', $this->password)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }
    }

?>