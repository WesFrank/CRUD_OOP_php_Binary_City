<?php

    // Report all errors except E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);

    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {

        // redirect user
        header("location: index.php?selector=empty&validator=empty");

    } else {
        
        // Check if selector in URL is proper hexa-decimal format
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {

            // do nothing

        } else {

            // redirect user
            header("location: index.php?erro=selector=format&validator=format");

        }
        
    }

    // Continue processing account activation

    // Require appropriate classes in appropriate order
    include "../core/classes/dbh/dbh-model.classes.php";
    include "../core/classes/signup/signup-viewer.classes.php";
    include "../core/classes/signup/signup-controller.classes.php";

    // Instatiate SignupController class
    $reset = new SignupController();

    // Running error Hanlers
    $reset->ActivateUser($selector, $validator);

    echo "<script> location.href='../login.php?account=active'; </script>";

?>