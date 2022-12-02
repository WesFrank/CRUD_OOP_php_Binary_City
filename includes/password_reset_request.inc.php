<?php

    ini_set("error_reporting", E_ALL);
    error_reporting(2);

    if (isset($_POST['submit'])) {
        
        // Process information
        $users_email = $_POST['users_email'];

        // Require appropriate classes in appropriate order
        include "../core/classes/dbh/dbh-model.classes.php";
        include "../core/classes/reset/reset-viewer.classes.php";
        include "../core/classes/reset/reset-controller.classes.php";

        // Instatiate SignupController class
        $reset = new ResetController();

        // Running error Hanlers
        $reset->ResetRequestUser($users_email);

        echo "<script> location.href='../index.php?reset=pending?email=sent'; </script>";

    } else {

        header("location: ../index.php");

    }

?>
