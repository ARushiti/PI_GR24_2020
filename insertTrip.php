<?php
    include 'connect.php';
    $result["message"] = "";

    $place = $_POST["place"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $description = $_POST["description"];

    if($place==""){
        $result["message"] = "Place must be filled!";
    }else if($start==""){
        $result["message"] = "Start must be filled!";
    }else if($end==""){
        $result["message"] = "End must be filled!";
    }else if($description==""){
        $result["message"] = "Description must be filled!";
    }else{
        $queryResult = $connect->query("INSERT INTO trip 
        VALUES (null,'".$place."','".$start."','".$end."','".$description."')");

        if($queryResult){
            $result["message"] = "Successfully added new trip!";
        }else{
            $result["message"] = "Failed added new trip!";
        }
    }

    echo json_encode($result);