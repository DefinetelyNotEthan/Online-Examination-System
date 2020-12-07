	<!DOCTYPE html>
<html>
<head>
	<title>HTML Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script type="text/javascript">
		
		function qType(){
		var str = document.getElementById("Qtype").value;
		var url = "QuestionType.php";
		$.post(url,{contentVar:str},function(data){
			$("#options").html(data).show();
			});
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="TeacherMakeExam.css">
	<link rel="stylesheet" href="header.css">	
  
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">



</head>
<body>

<?php
	// Connect to db
	//include 'mysqlconnect.php';
	//$connect = mysqli_connect($server, $user, $pw, "exam_platform");
	//if(!$connect) {
	//	die("Connection failed: " . mysqli_connect_error());
	//}

	//$sql1 = "INSERT INTO personnel (userID, examID, examName, examDate, startTime, endTime, qNum) VALUES ('$ID', '$FName', '$LName', '$title','$hWage')";
	//$add1 = mysqli_query($connect, $sql1);

	//mysqli_close($connect); 
?>

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
 <div class = "content">
<h2><b>Add Questions</b></h2>

		<div class = "QuestionBox">
			<div id="qNum"><h5> Question 1</h5> </div>
			<div class = "qForm">
			<p>Question</p>
			
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
			<br>
			<button id = "previousNumber" type="button" class="btn btn-info btn-large" onclick="PrevQ()">Previous Number</button>
			<button id = "nextNumber" type="button" class="btn btn-info btn-large" onclick="addQ()">Next Number</button>
			</div>
		</div>
	</div>
	</body> 
</html>