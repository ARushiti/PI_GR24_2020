<?php
$connect = new mysqli("localhost","root","","yourtrips");
	if(!$connect){
    echo "Cannot connect to Server!";
    exit();
	}
?>