<!DOCTYPE html>
<html>
<head>
	<title>HTML Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="CheckExam.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="header.css">	
  <link rel="stylesheet" href="ExamList.css"> 
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">

</head>
<body onload="uncheckExam()">
<?php include 'header.php';?>

<!-- Left Sidebar -->
<div class ="sidenav">
	<a href="#"><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>

	  	<a class = "sideMenu" href="Dashboard.php">Dashboard</a>
 		<a class="sideMenu" href="TeacherMakeExam.php">Create Exam</a>
  		<a class = "sideMenu" href= "Examlist.php">Exam List</a>
  		<a class = "active sideMenu" href="CheckExam.php">Check Exam</a>
  		<a class = "sideMenu" href="ViewResult.php">View Result</a>
 </div>

<!-- Content -->

<div class = "content">
  <h1 class="thicker">Evaluate Exams' Result</h1>
  <div class = "QuestionBox">
    <h3>Unchecked Exam List</h3>
   <div class = "qForm">
   <?php

        include "connect_database.php";
        $userID = $_SESSION['userID'];
        $userQuery= "SELECT * FROM exam WHERE userID = $userID and checked = 'NO'";

            $result = mysqli_query($connect, $userQuery);
              if (!$result) {
            die("Could not successfully run query.");
            }
              if (mysqli_num_rows($result) == 0) {
            print "You dont have any unchecked exam";
            }

            else { 
            print "<table id = \"examListTbl\" border='1'style =\"width: 100%;\">";
            print "<tr><th>Exam ID</th><th>Exam Name</th><th>Exam Date</th><th>Start Time</th><th>End Time</th></tr>";
            while( $row = mysqli_fetch_assoc($result) ){
              print "<tr><td>". $row['examID']. "</td><td>" .$row['examName']. "</td><td>" . $row['examDate'] . "</td><td>" . $row['startTime']. "</td><td>" .$row['endTime'] .
             "</td></tr>";    
            }
            print "</table>";       
          }

            mysqli_close($connect);   // close the connection
      ?>
    </div>
  </div>
    <div class = "QuestionBox">
      <h3>Check an Exam</h3>
      <div class = "qForm">
        <form action="checkExam.php">
            <select id="uncheckedExamID_select" name="uncheckedExamID_select">
            </select>
             <input type="button" type="button" class="btn btn-info btn-small" onclick="showQ()" value ="Check this Exam" >
        <br>
      <div id="qList"></div><br><br>
      </form>
    </div>
    </div>

</body> 
</html>