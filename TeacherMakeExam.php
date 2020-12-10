<!DOCTYPE html>
<html>
<head>
	<title>HTML Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script src="makeExam.js"> </script>
<link rel="stylesheet" href="TeacherMakeExam.css">
	<link rel="stylesheet" href="header.css">	
  
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">

</head>
<body onload="disableConfirm()">

<!-- Page Header -->

<?php include 'header.php';?>
<!-- Left Sidebar -->
<div class ="sidenav">
	<a href="#"><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>

	  	<a class = "sideMenu" href="Dashboard.php">Dashboard</a>
 		<a class="active sideMenu" href="TeacherMakeExam.php">Create Exam</a>
  		<a class = "sideMenu" href= "Examlist.php">Exam List</a>
  		<a class = "sideMenu" href="CheckExam.php">Check Exam</a>
  		<a class = "sideMenu" href="ViewResult.php">View Result</a>
 </div>

	
<!-- Page Body -->
<div class = "content">
	<h1 class="thicker">Create an Exam for your Students</h1>
	<div class="contbox">
		<h2><b>Exam details</b></h2>
		<div class = "qForm">
		<form action = "addExam.php" method = "post" id = "examDetails">	
			<table style="width: 80%">
				<colgroup>
		       		<col span="1" style="width: 15%;">
		      		 <col span="1" style="width: 85%;">
		    	</colgroup>
					 <tr>
					    <td>Exam ID:</td>
					    <td> <input type="text" id="examID" name="examID" style="width: 90%;" value = "ID is DATE+COURSE. eg: 310120203001"></td>
					  </tr>
					  <tr>
					    <td>Exam's name:</td>
					    <td> <input type="text" id="examName" name="examName" style="width: 90%";></td>
					  </tr>
					  <tr>
					    <td>Exam's date:</td>
					    <td><input type="date" id="examDate" name="examDate"></td>
					  </tr>
					  <tr>
					    <td>Starting Time:</td>
					    <td><input type="time" id="startTime" name="startTime"></td>
					  </tr>
					   <tr>
					    <td>Ending Time:</td>
					    <td><input type="time" id="endTime" name="endTime"></td>
					  </tr>
					  <tr>
					    <td>Number of Questions:</td>
					    <td> <input type="number" id="numOfQuestion" name="numOfQuestion"></td>
					  </tr>
			</table>
			<div>
				<br>
				<input type="button" name="errorCheckBtn" id = "errorCheckBtn" type="button" class="btn btn-info btn-large" onclick="errorCheck()" value ="Check Info">
				<br><br>
				<div id="searchResult"></div>
			<input type="button" name="createExamBtn" id = "createExamBtn" type="button" class="btn btn-info btn-large" onclick="addExam()" value ="Create Exam">
			</div>
			</form>

		</div>
	</div>

	</div>
</body> 
</html>