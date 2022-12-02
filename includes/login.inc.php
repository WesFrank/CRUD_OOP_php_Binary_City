<?php

    if (isset($_POST['submit'])) {

        // Grab data from form
        $uid = $_POST['user_login'];
        $pwd = $_POST['login_password'];
        
        // Require appropriate classes in appropriate order
        include "../core/classes/dbh/dbh-model.classes.php";
        include "../core/classes/login/login-viewer.classes.php";
        include "../core/classes/login/login-controller.classes.php";

        // Instatiate LoginController class
        $login = new LoginController();

        // Running error Hanlers
        $login->loginUser($uid, $pwd);

        // Redirect to front page
        header("location: ../index.php?session=started");

    }

?>