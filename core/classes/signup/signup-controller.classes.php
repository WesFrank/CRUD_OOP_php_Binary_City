<?php

    // Signup Controller

    // controller class extends to viewer (since viewerclass extends to model calss) class to store input provided by user

    class SignupController extends SignupViewer {

        // Properties
        private $uid;
        private $pwd;
        private $pwdrepeat;
        private $email;

        // Methods        
        public function signupUser($uid, $pwd, $pwdrepeat, $email) {

            $this->uid = $uid;
            $this->pwd = $pwd;
            $this->pwdrepeat = $pwdrepeat;
            $this->email = $email;

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

                header("location: ../signup.php?signup_error=empty_input");
                exit();

            }

            if ($this->invalidUid() == false) {

                header("location: ../signup.php?signup_error=invalid_username");
                exit();

            }

            if ($this->invalidEmail() == false) {

                header("location: ../signup.php?signup_error=invalid_email");
                exit();

            }

            if ($this->pwdMatch() == false) {

                header("location: ../signup.php?signup_error=password_not_match");
                exit();

            }

            if ($this->uidTakenCheck() == false) {

                header("location: ../signup.php?signup_error=user_exists");
                exit();

            }

            if ($this->passwordStrength() == false) {

                header("location: ../signup.php?signup_error=password_strength");
                exit();

            }

            $this->setUser($this->uid, $this->pwd, $this->email, $selector, $tokenSecure, $expires, $url);

        }

        public function ActivateUser($selector, $validator) {

            // Some Properties required for the methods here

            $this->selector = $selector;
            $this->validator = $validator;

            if ($this->emptyURL() == false) {

                header("location: ../index.php?account=inactive?selector&validator");
                exit();

            }

            $this->ActivateAccount($this->selector, $this->validator);

        }

        // Signup error handling

        public function emptyInput() {

            $result;

            if (empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        // Password Strength
        public function passwordStrength() {

            $result;

            if (!preg_match("@[a-z]@", $this->pwd) || !preg_match("@[A-Z]@", $this->pwd) || !preg_match('@[0-9]@', $this->pwd) || !preg_match('@[#?!\\@$%^&*-]@', $this->pwd)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function invalidUid() {

            $result;

            if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function invalidEmail() {

            $result;

            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function pwdMatch() {

            $result;

            if ($this->pwd !== $this->pwdrepeat) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function uidTakenCheck() {

            $result;

            if (!$this->checkUser($this->uid, $this->email)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function emptyURL() {

            $result;

            if (empty($this->selector) || empty($this->validator)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

    }

?>