<?php
    include 'connect.php';
    $queryResult = $connect->query("SELECT * FROM trip");
    $result = array();
    while($fetchData = $queryResult->fetch_assoc()){
        $result[] = $fetchData;
    }
    echo json_encode($result);