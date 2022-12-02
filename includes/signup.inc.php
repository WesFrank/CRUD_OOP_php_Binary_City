<?php

    if (isset($_POST['submit'])) {

        // Grab data from form
        $username = $_POST['username'];
        $password = $_POST['signup_password'];
        $password_repeat = $_POST['signup_password_repeat'];
        $email = $_POST['email'];
        
        // Require appropriate classes in appropriate order
        include "../core/classes/dbh/dbh-model.classes.php";
        include "../core/classes/signup/signup-viewer.classes.php";
        include "../core/classes/signup/signup-controller.classes.php";

        // Instatiate SignupController class
        $signup = new SignupController();

        // Running error Hanlers
        $signup->signupUser($username, $password, $password_repeat, $email);

        echo "<script> location.href='../index.php?activation=pending'; </script>";

        exit();

    } else {

        header("location: ../index.php");

    }

?>