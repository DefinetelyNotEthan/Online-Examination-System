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

	<link rel="stylesheet" href="header.css">	
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">

</head>
<body onload="showCheckedExam()">
<?php include 'header.php';?>

<!-- Left Sidebar -->
<div class ="sidenav">
	<a href="#"><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>
	    <a class = "sideMenu" href="Dashboard.php">Dashboard</a>
	    <a class = "sideMenu" href="Student-take-exam.php">Take Exam</a>
 		<a class="active sideMenu" href="Student-view-result.php">View Results</a>
 </div>

<!-- Content -->

<div class = "content">
  <h1 class="thicker">Show Exams' Results</h1>
  <div class = "QuestionBox">
    <h3>Checked Exam List</h3>
   <div class = "qForm">
   <?php

        include "connect_database.php";
        $userID = $_SESSION['userID'];
        $userQuery= "SELECT *
		             FROM exam
		             INNER JOIN grade
					 ON exam.examID=grade.examID
					 WHERE exam.checked = 'YES'AND grade.userID = $userID";

            $result = mysqli_query($connect, $userQuery);
              if (!$result) {
            die("Could not successfully run query.");
            }
              if (mysqli_num_rows($result) == 0) {
            print "You dont have any exam checked";
            }

            else { 
            print "<table class = \"examListTbl \" border='1' style =\"width: 100%;\">";
            print "<tr><th>Exam ID</th><th>Exam Name</th><th>Exam Date</th><th>Start Time</th><th>End Time</th></tr>";
            while( $row = mysqli_fetch_assoc($result) ){
              print "<tr><td>". $row['examID']. "</td><td>" .$row['examName']. "</td><td>" . $row['examDate'] . "</td><td>" . $row['startTime']. "</td><td>" .$row['endTime']."</td></tr>";    
            }
            print "</table>";       
          }

            mysqli_close($connect);   // close the connection
      ?>
    </div>
  </div>
  <form action="Student-view-exam-validation.php" method="POST" style=" bottom:15px;" id ="takeExam">
			<div>
				<br>
				<h1 class="thicker">Please enter the exam ID and view the result: </h1>
				<INPUT TYPE = "Text"  NAME = "examID" placeholder="ExamID" id="ExamID" style="position:relative; bottom:15px;">
				<input type="button" class="btn btn-info btn-large" style="position:relative;bottom:17px;" value="View The Exam Result" onclick="submitExamID()">
			</div>
			</form>	
			<script src="Student-takeExamValidation.js"></script>
</body> 
</html>