<?php

if (isset($_POST['submit'])) {
    
    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    // Require appropriate classes in appropriate order
    include "../core/classes/dbh/dbh-model.classes.php";
    include "../core/classes/reset/reset-viewer.classes.php";
    include "../core/classes/reset/reset-controller.classes.php";

    // Instatiate SignupController class
    $reset = new ResetController();

    // Running error Hanlers
    $reset->ResetUser($selector, $validator, $password, $password_repeat);

    echo "<script> location.href='../login.php?reset=confirmed'; </script>";

} else {

    header("location: ../index.php");
    exit();

}

?>