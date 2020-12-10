<?php
	// Connect to db
	session_start();
	include 'connect_database.php';
	if(!$connect) {
	die("Connection failed: " . mysqli_connect_error());
	}	

	$_SESSION['qNum']--;

	header("Location: TeacherMakeExamQ.php");

?>