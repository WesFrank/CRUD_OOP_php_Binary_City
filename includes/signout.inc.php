<?php

    // php logic to destroy session variables and redirect user to index page

    session_start(); 
    
    session_unset();

    session_destroy();

    header("location: ../index.php?session=destroyed");

?>