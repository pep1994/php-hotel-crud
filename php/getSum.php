<?php   

    header('Content-Type: application/json');

    $conn = new mysqli('localhost', 'root', 'root', 'Hotel2');

    if ($conn -> connect_errno) {
        echo $conn -> connect_errno;
        return;
    }

    $result = $conn -> query("
        SELECT `status`, SUM(price) AS 'sum'
        FROM `pagamenti`
        GROUP BY `status`
    ");

    if ($result -> num_rows < 1) {
        echo "risultato non trovato";
        return;
    }

    $res = [];

    while ($row = $result -> fetch_assoc()) {
        
        $res[] = $row;
    }


    $conn -> close();

    echo json_encode($res);