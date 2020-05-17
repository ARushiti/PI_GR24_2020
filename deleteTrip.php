<?php
	include 'connect.php';
	$tripID = $_POST["tripID"];

	$connect->query("DELETE FROM trip WHERE tripID=".$tripID);
?>