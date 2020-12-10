<?php
	// Connect to db
	session_start();
	include 'connect_database.php';
	if(!$connect) {
	die("Connection failed: " . mysqli_connect_error());
	}	

	$qNum = $_POST['qNum'];
	$examID = $_SESSION['examID'];  
	$Type = $_POST["Qtype"];
	$question = $_POST["question"];
	$answer = $_POST["correctAns"];
	$points = $_POST["marks"];
	if($Type=="MCQ"){
		$option1 = $_POST["optionA"];
		$option2 = $_POST["optionB"];
		$option3 = $_POST["optionC"];
		$option4 = $_POST["optionD"];
	}
	else
	{
		$option1 = "";
		$option2 = "";
		$option3 = "";
		$option4 = "";
	}

	$sql1 = "DELETE FROM question WHERE (questionNum = $qNum AND examID = $examID)";
	$del1 = mysqli_query($connect, $sql1);

	$sql2 = "INSERT INTO question (questionNum, examID, Type, question, answer, points, option1, option2, option3, option4) VALUES ('$qNum', '$examID', '$Type', '$question','$answer', '$points', '$option1', '$option2', '$option3', '$option4')";
	$add1 = mysqli_query($connect, $sql2);

	mysqli_close($connect); 
	$_SESSION['qNum']++;

	header("Location: ExamList.php");
?>