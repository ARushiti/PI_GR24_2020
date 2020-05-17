<?php
    include 'connect.php';

    $result["message"] = "";

    $tripID = $_POST["tripID"];
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
        $queryResult = $connect->query("UPDATE trip SET
        place = ".$place.", start=".$start.", end=".$end." , description = ".$description." 
        WHERE tripID=".$tripID."");

}
        if($queryResult){
            $result["message"] = "Successfully added new trip!";
        }else{
            $result["message"] = "Failed added new trip!";
        }