<?php

    // login Controller

    // controller class extends to viewer (since viewerclass extends to model calss) class to store input provided by user

    class LoginController extends LoginViewer {

        // Properties

        private $uid;
        private $pwd;

        // Methods

        public function loginUser($uid, $pwd) {

            $this->uid = $uid;
            $this->pwd = $pwd;

            if ($this->emptyInput() == false) {

                header("location: ../login.php?login_error=empty_input");
                exit();

            }

            $this->getUser($this->uid, $this->pwd);

        }

        // Signup error handling

        public function emptyInput() {

            $result;

            if (empty($this->uid) || empty($this->pwd)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

    }

?>