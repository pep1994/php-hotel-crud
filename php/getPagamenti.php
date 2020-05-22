<?php  

    header('Content-Type: application/json');

    $conn = new mysqli('localhost', 'root', 'root', 'Hotel2');

    if ($conn -> connect_errno) {
        echo "error: " . $conn -> connect_errno;
        return;
    }

    $result = $conn -> query("
    SELECT `status`, `price`
    FROM `pagamenti`
    ");

    if ($result -> num_rows < 1) {
        echo "risultato non trovato";
        return;
    }

    $res = [];

    while ($row = $result -> fetch_assoc()) {
        // print_r($row);
        $res [] = $row;
        
    }

    $conn -> close();

    echo json_encode($res);