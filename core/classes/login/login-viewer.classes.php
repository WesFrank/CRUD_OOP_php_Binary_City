<?php

    // Viewer class

    // controller class extends to viewer (since viewerclass extends to model calss) class to store input provided by user

    class LoginViewer extends DbhModel {

        protected function getUser($uid, $pwd) {

            $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE users_uid = ? OR users_email = ?;");

            if (!$stmt->execute(array($uid, $uid))) {
                
                $stmt = null;
                header("location: ../login.php?login_error=sql_select_users");
                exit();

            }

            if ($stmt->rowCount() == 0) {

                $stmt = null;
                header("location: ../login.php?login_error=user_not_exists");
                exit();

            }

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $AccAct = $result[0]['AccAct'];

            if ($AccAct == 0) {

                $stmt = null;
                header("location: ../login.php?login_error=activation_required");
                exit();

            }

            $pwdHashed = $result[0]['users_pwd'];
            
            $checkPwd = password_verify($pwd, $pwdHashed);

            if ($checkPwd == false) {

                $stmt = null;
                header("location: ../login.php?login_error=incorrect_password");
                exit();

            } else if ($checkPwd == true) {

                $stmt = $this->connect()->prepare("SELECT * FROM Users WHERE users_uid = ? OR users_email = ?;");

                if (!$stmt->execute(array($uid, $uid))) {
                
                    $stmt = null;
                    header("location: ../login.php?login_error=sql_select_password");
                    exit();
    
                }

                if ($stmt->rowCount() == 0) {

                    $stmt = null;
                    header("location: ../login.php?login_error=no_password");
                    exit();
    
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();

                $_SESSION['userid'] = $user[0]["users_id"];
                $_SESSION['useruid'] = $user[0]["users_uid"];

                $stmt = null;

            }

        }

    }

?>