<?php  

    include __DIR__ . "/functions.php";

    getDataToDB(
        "
        SELECT `status`, `price`
        FROM `pagamenti`
        ");

    
