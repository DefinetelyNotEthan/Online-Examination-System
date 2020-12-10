<?php

	session_start();
	include "connect_database.php";
	
	$connect = mysqli_connect($server, $user, $pw, $db);
	if(!$connect) {
	die("Connection failed: " . mysqli_connect_error());}
	$ID = $_SESSION['userID'];

	$userQuery= "SELECT examID FROM exam WHERE userID = $ID";
	$result = mysqli_query($connect, $userQuery);
	if (!$result) {
    die('Invalid query: ' . mysqli_error($connect));
	}


	while( $row = mysqli_fetch_assoc($result) ){
		print ("<option value = \"".$row['examID']."\">".$row['examID']."</option>");
	}


	mysqli_close($connect);

	?>