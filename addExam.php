<?php
	// Connect to db
	session_start();
	include 'connect_database.php';
	if(!$connect) {
	die("Connection failed: " . mysqli_connect_error());
	}

	$ID = $_SESSION['userID'];
	$examID = $_POST["examID"];
	$_SESSION['examID'] = $examID;      
	$examName = $_POST["examName"];
	$examDate = $_POST["examDate"];
	$startTime = $_POST["startTime"];
	$endTime = $_POST["endTime"];
	$numOfQuestion = $_POST["numOfQuestion"];

	$sql1 = "DELETE FROM exam WHERE (userID = $ID AND examID = $examID)";
	$del1 = mysqli_query($connect, $sql1);
	if (!$del1) {
    die('Invalid query: ' . mysqli_error($connect));}

	$sql2 = "INSERT INTO exam (userID, examID, examName, examDate, startTime, endTime, qNum, checked) VALUES ('$ID', '$examID', '$examName', '$examDate','$startTime','$endTime','$numOfQuestion', 'NO')";
	$add1 = mysqli_query($connect, $sql2);
	if (!$add1) {
    die('Invalid query: ' . mysqli_error($connect));
	}

	mysqli_close($connect); 

	$_SESSION['qNum'] = 1;
	header("Location: TeacherMakeExamQ.php");

?>
