<?php   

    include __DIR__ . "/functions.php";

    getDataToDB(
        "
        SELECT `status`, SUM(price) AS 'sum'
        FROM `pagamenti`
        GROUP BY `status`
        ");
    