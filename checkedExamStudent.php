<?php

	session_start();
	include "connect_database.php";
	$examID = 	$_SESSION['examID'];

	$connect = mysqli_connect($server, $user, $pw, $db);
	if(!$connect) {
	die("Connection failed: " . mysqli_connect_error());}

	$userQuery= "SELECT userID FROM users";
	$result = mysqli_query($connect, $userQuery);
	if (!$result) {
    die('Invalid query: ' . mysqli_error($connect));
	}


	while( $row = mysqli_fetch_assoc($result) ){
		print ("<option value = \"".$row['userID']."\">".$row['userID']."</option>");
	}


	mysqli_close($connect);

	?>