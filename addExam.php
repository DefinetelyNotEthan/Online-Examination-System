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

	$sql1 = "DELETE FROM exam WHERE (userID = $ID AND examID = $examID)";
	$del1 = mysqli_query($connect, $sql1);
	if (!$del1) {
    die('Invalid query: ' . mysqli_error($connect));}

    $sql3 = "DELETE FROM question WHERE examID = $examID";
	$del3 = mysqli_query($connect, $sql3);
	if (!$del3) {
    die('Invalid query: ' . mysqli_error($connect));}

    $sql4 = "DELETE FROM answer WHERE examID = $examID";
	$del4 = mysqli_query($connect, $sql4);
	if (!$del4) {
    die('Invalid query: ' . mysqli_error($connect));}

    $sql5 = "DELETE FROM grade WHERE examID = $examID";
	$del5 = mysqli_query($connect, $sql5);
	if (!$del5) {
    die('Invalid query: ' . mysqli_error($connect));}

	$sql2 = "INSERT INTO exam (userID, examID, examName, examDate, startTime, endTime, checked) VALUES ('$ID', '$examID', '$examName', '$examDate','$startTime','$endTime', 'NO')";
	$add1 = mysqli_query($connect, $sql2);
	if (!$add1) {
    die('Invalid query: ' . mysqli_error($connect));
	}

	mysqli_close($connect); 

	$_SESSION['qNum'] = 1;
	header("Location: TeacherMakeExamQ.php");

?>
