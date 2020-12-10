<!DOCTYPE html>
<html>
<head>
	<title>HTML Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <script src="showExam.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="header.css">	
  <link rel="stylesheet" href="ExamList.css"> 
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">

</head>
<body onload="showExam()">
<?php include 'header.php';?>

<!-- Left Sidebar -->
<div class ="sidenav">
	<a href="#"><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>

	  	<a class = "sideMenu" href="Dashboard.php">Dashboard</a>
 		 <a class="sideMenu" href="TeacherMakeExam.php">Create Exam</a>
  		<a class = "active sideMenu" href= "Examlist.php">Exam List</a>
  		<a class = "sideMenu" href="CheckExam.php">Check Exam</a>
  		<a class = "sideMenu" href="ViewResult.php">View Result</a>
 </div>

<!-- Content -->

<div class = "content">
  <h1 class="thicker">View Exsisting Exam</h1>
    <div class = "QuestionBox">
    <h3>Exam List</h3>
    <div class = "qForm">
    <?php

        include "connect_database.php";
        $userID = $_SESSION['userID'];
        $userQuery= "SELECT * FROM exam WHERE userID = $userID";

            $result = mysqli_query($connect, $userQuery);
              if (!$result) {
            die("Could not successfully run query.");
            }
              if (mysqli_num_rows($result) == 0) {
            print "You dont have any exam";
            }

            else { 
            print "<table id = \"examListTbl\" border='1'>";
            print "<tr><th>Exam ID</th><th>Exam Name</th><th>Exam Date</th><th>Start Time</th><th>End Time</th><th>Total Question</th></tr>";
            while( $row = mysqli_fetch_assoc($result) ){
              print "<tr><td>". $row['examID']. "</td><td>" .$row['examName']. "</td><td>" . $row['examDate'] . "</td><td>" . $row['startTime']. "</td><td>" .$row['endTime']. "</td><td>" .
              $row['qNum']."</td></tr>";    
            }
            print "</table>";       
          }

            mysqli_close($connect);   // close the connection
      ?>
    </div>
    </div>
    <div class = "QuestionBox">
      <h3>View the questions of an exam</h3>
      <div class = "qForm">
        <form action="deleteExam.php">
            <select id="examID_select" name="examID_select">
            </select>
             <input type="button" name="nextNumber" type="button" class="btn btn-info btn-small" onclick="showQ()" value ="Choose this Exam" >
        <br>
      <div id="qList"></div><br><br>
      <input type="button" name="nextNumber" type="button" class="btn btn-info btn-small btn-danger" onclick="submit()" value ="Delete this exam" >
      </form>
    </div>
    </div>
    <div class = "QuestionBox">
      <h3>Edit or Add this Question</h3>
          <div class = "qForm">
            <form action = "editExamList.php" method = "post" id="addQForm">
            <label for ="qNum">Question Number</label>
              <input type="number" id="qNum" name="qNum">
            <br>
            <label for="question">Question</label>
              <input type="text" id="question" name="question" style="width: 95%;"><br>
            <table style="width: 40%">
            <tr> <td>
              <label for="Qtype">Question Type:</label>
                <select name="Qtype" id="Qtype" onchange="qType()">
                   <option value="MCQ">Multiple Choice</option>
                   <option value="T/F">True or False</option>
                   <option value="short">Short Answer</option>
                </select> </td>
              <td><label for="marks">Marks:</label>
                 <input type="number" id="marks" name="marks"></td></tr>
              </table>
              <div id ="options">
              <p>Choices</p>
              <table id = "choices" style="width: 90%">
              <colgroup>
                    <col span="1" style="width: 2%;">
                     <col span="1" style="width: 98%;">
                  </colgroup>
                <tr>
                    <td>(a)</td>
                    <td> <input type="text" id="optionA" name="optionA" style="width: 95%;"></td>
                  </tr>
                <tr>
                    <td>(b)</td>
                    <td> <input type="text" id="optionB" name="optionB" style="width: 95%;"></td>
                  </tr>
                <tr>
                    <td>(c)</td>
                    <td> <input type="text" id="optionC" name="optionC" style="width: 95%;"></td>
                  </tr>
                <tr>
                    <td>(d)</td>
                    <td> <input type="text" id="optionD" name="optionD" style="width: 95%;"></td>
                  </tr>
              </table>
              <label for="correctAns">Correct Answer:</label>
                <select name="correctAns" id="correctAns">
                   <option value="A">A</option>
                     <option value="B">B</option>
                   <option value="C">C</option>
                   <option value="D">D</option>
                </select>
              </div>
              <input type="button" name="nextNumber" type="button" class="btn btn-info btn-large" onclick="errorCheck()" value ="Edit or Add" >
            </form>
          </div>
    </div>
</body> 
</html>