<?php

    // Instatiate Classes Here
    
    include "core/classes/dbh/dbh-model.classes.php";
    include "core/classes/profile/profile-viewer.classes.php";
    
    $client = new ProfileViewer;
    
    $client->getClientAZ();

?>