<?php

  session_start();

  if (isset($_SESSION['useruid'])) {

    // Do nothing
    
    $username = $_SESSION['useruid'];
    
  }

?>

<!DOCTYPE html>

<html lang="en">

    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Profile</title>
    
    </head>
    
    <style>
        
        .button {
            font: bold 11px Arial;
            text-decoration: none;
            background-color: #EEEEEE;
            color: #333333;
            padding: 3px 6px 3px 6px;
            border: 1px solid black;
            border-radius: 3px;
        }
        
    </style>

    <body>
        
        <form method="post" action="includes/process.inc.php">
            
            <p> Enter a new Client: </p>
            
            <input type="text" placeholder="Name" name="Name" required/>
            
            <input type="text" placeholder="Surame" name="Surname" required/>
            
            <input type="text" placeholder="Email" name="Email" required/>
            
            <input type="number" min="0" placeholder="# Linked Contacts" name="number_of_linked_contacts" required/>
            
            <button type="submit" value="submit" name="submit">Submit</button>
        
        </form>
        
        <br>
        <br>

        <p> Existing Clients: </p>
        
        <?php
        
            include "includes/view_client_data.inc.php";
        
        ?>
        
    </body>
    
<html>