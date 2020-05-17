<?php 
include 'connect.php';

$tripID = $_POST["tripID"];
$result = array();

$queryResult = $connect->query("SELECT * FROM trip WHERE tripID=".$tripID);
$fetchData = $queryResult->fetch_assoc();
$result = $fetchData;

echo json_encode($result);