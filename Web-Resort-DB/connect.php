<?php			
	$servername = "localhost";
	$username = "root@localhost";
	$password = "";
	$dbname = "guestbook";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
?>