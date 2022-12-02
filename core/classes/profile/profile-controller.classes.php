<?php

    // Signup Controller

    // controller class extends to viewer (since viewerclass extends to model calss) class to store input provided by user

    class ProfileController extends ProfileViewer {

        // Properties
        private $uid;
        private $Name;
        private $Surname;
        private $Email;
        private $Code;
        private $number_of_linked_contacts;

        // Methods        
        public function storeClient($uid, $Name, $Surname, $Email, $Code, $number_of_linked_contacts) {

            $this->uid = $uid;
            $this->Name = $Name;
            $this->Surname = $Surname;
            $this->Email = $Email;
            $this->Code = $Code;
            $this->number_of_linked_contacts = $number_of_linked_contacts;

            if ($this->emptyInput() == false) {

                header("location: ../index.php?client_error=empty_input");
                exit();

            }

            if ($this->invalidInput() == false) {

                header("location: ../index.php?client_error=invalid_input");
                exit();

            }
            
            if ($this->invalidEmail() == false) {

                header("location: ../index.php?client_error=invalid_email");
                exit();

            }

            if ($this->checkClient($this->Name) == false) {
            
                header("location: ../index.php?client_error=client_exists");
                exit();
                
            }
            
            $this->setClient($this->Name, $this->Surname, $this->Email, $this->Code, $number_of_linked_contacts, $this->uid);

        }

        // Signup error handling

        public function emptyInput() {

            $result;

            if (empty($this->Name) || empty($this->Surname) || empty($this->Email)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

        public function invalidInput() {

            $result;

            if (!preg_match("/^[a-zA-Z0-9]*$/", $this->Name) || !preg_match("/^[a-zA-Z0-9]*$/", $this->Surname)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }
        
        public function invalidEmail() {

            $result;

            if (!filter_var($this->Email, FILTER_VALIDATE_EMAIL)) {
                
                $result = false;

            } else {

                $result= true;

            }

            return $result;

        }

    }

?>