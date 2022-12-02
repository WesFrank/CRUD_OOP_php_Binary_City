<?php

    session_start();
    
    if (isset($_SESSION['useruid'])) {
    
        $username = $_SESSION['useruid'];
        
        if (isset($_POST['Name'])) {
            
            // Continue processing data to store in database
            
            require "functions.inc.php";
            
            $Name = $_POST['Name'];
            $Surname = $_POST['Surname'];
            $Email = $_POST['Email'];

            // Auto Generated Code to be based on the first three characters of the Client Input Name
            
            $Code = strtoupper($_POST['Name']);
            
            $i = strlen($Code);
            
            while ($i < 3) {
                
                $randomCharacter{$i} = randstr();

                $Code = $Code . $randomCharacter{$i};

                $i++;
                
            }

            $randomNumbers = randnums(2);
            
            $Code = $Code . $randomNumbers;
            
            $number_of_linked_contacts = $_POST['number_of_linked_contacts'];
            
            // instantiate php object oriented classes

            // Require appropriate classes in appropriate order
            include "../core/classes/dbh/dbh-model.classes.php";
            include "../core/classes/profile/profile-viewer.classes.php";
            include "../core/classes/profile/profile-controller.classes.php";
    
            // Instatiate ProfileController class
            $client = new ProfileController();
    
            // Running error Hanlers
            $client->storeClient($username, $Name, $Surname, $Email, $Code, $number_of_linked_contacts);
    
            echo "<script> location.href='../index.php?client=stored'; </script>";
    
            exit();
            
        } else {
            
            header("location: ../index.php");
            exit();
            
        }
        
    } else {
        
        header("location: ../index.php");
        exit();
        
    }

?>