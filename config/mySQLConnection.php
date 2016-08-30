<?php
if ($_SERVER['HTTP_HOST'] == 'localhost'){
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "takeyourleave";


	$conn = mysqli_connect($hostname, $username, $password, $database);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
}else{
	$hostname = "ap-cdbr-azure-southeast-b.cloudapp.net";
	$username = "b9b628f925527f";
	$password = "a95e14b1";
	$database = "takeyourleave";


	$conn = mysqli_connect($hostname, $username, $password, $database);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
}
	
?>