<?php

    if (isset($_GET['client'])) {
        
        $client_name = $_GET['client'];

        // Instatiate classes here
    
        include "../core/classes/dbh/dbh-model.classes.php";
        include "../core/classes/profile/profile-viewer.classes.php";
        
        $delete = new ProfileViewer();
        
        $delete->deleteClient($client_name);
        
        header("location: ../index.php?client=deleted");
        
    }

?>