<?php

    // Viewer class

    // gets data from database by extending to model class and returns to user

    class ProfileViewer extends DbhModel {

        protected function checkClient($Name) {

            $stmt = $this->connect()->prepare('SELECT * FROM Client WHERE client_name = ?;');

            if (!$stmt->execute(array($Name))) {
                
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

        protected function setClient($Name, $Surname, $Email, $Code, $number_of_linked_contacts,$uid) {

            $stmt = $this->connect()->prepare("INSERT INTO Client (client_name, client_surname, client_email, client_code, number_of_linked_contacts, last_changed_by_username) VALUE (?, ?, ?, ?, ?, ?);");

            if (!$stmt->execute(array($Name, $Surname, $Email, $Code, $number_of_linked_contacts, $uid))) {
                
                $stmt = null;
                header("location: ../index.php?capture_error=sql_insert_client");
                exit();

            }

        }
        
        public function getClientAZ() {
            
            $sql = "SELECT * FROM Client ORDER BY client_name";
            
            $stmt = $this->connect()->query($sql);
            
            if (!$stmt) {
                
                header("location: ../index.php?error=clients_fetch");
                exit();
                
            }
            
            if ($stmt->rowCount() > 0) {
                
                while ($row = $stmt->fetch()) {
                    
                    echo "<input placeholder=". $row['client_name'] ."></input>" . "&nbsp;" . "<input placeholder=". $row['client_surname'] . "&nbsp;" ."></input>" . "&nbsp;" . "<input placeholder=". $row['client_email'] . "&nbsp;" ."></input>" . "<input placeholder=". $row['client_code'] ."></input>" . "&nbsp;" . "<input placeholder=".$row['number_of_linked_contacts']."></input>" . "&nbsp;" . "&nbsp;" . "<a href=includes/delete_client.inc.php?client=". $row['client_name'] ." class='button'> Delete </a>" . "<br><br>";
                    
                }
                
            } else {
                
                echo "No contact(s) found";
                
            }

        }
        
        public function deleteClient($Name) {

            $stmt = $this->connect()->prepare('DELETE FROM Client WHERE client_name = ?;');

            if (!$stmt->execute(array($Name))) {
                
                $stmt = null;
                header("location: ../index.php?client_delete=error");
                exit();

            }

        }

    }

?>