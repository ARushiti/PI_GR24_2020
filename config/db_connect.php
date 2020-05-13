<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'Albina', 'test1234', 'go_trip');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>
