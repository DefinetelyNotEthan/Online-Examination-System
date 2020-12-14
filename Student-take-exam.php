
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
<body>
<?php include 'header.php';?>

<!-- Left Sidebar -->
<div class ="sidenav">
	<a href="#"><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>

	  	<a class = "active sideMenu" href="Student-take-exam.php">Take Exam</a>
 		<a class="sideMenu" href="Student-view-result.php">View Results</a>
 </div>

 <?php
 session_start();
 include_once 'connect_database.php';

 $examQuery= "SELECT *
		     FROM exam ";
             $result = mysqli_query($connect,$examQuery);
			 
			 $rowcount=mysqli_num_rows($result);


			 /*
             $examID = $row['examID'];
             $examName = $row['examName'];
             $examDate = $row['examDate'];
             $startTime = $row['startTime'];
             $endTime = $row['endTime'];
			 $qNum = $row['qNum'];
			 */
?>





<!-- Page Body -->
<div class = "content">
	<h1 class="thicker">START YOUR EXAM</h1>
	<?php 
	for($i=1 ; $i<=$rowcount ; $i++){
	while($row = mysqli_fetch_assoc($result)){  
		?>
	<div class="contbox">
		<h2><b>EXAM INFOMATION</b></h2>
		<div class = "qForm">

		
			<table style="width: 80%">
				<colgroup>
		       		<col span="1" style="width: 15%;">
		      		 <col span="1" style="width: 85%;">
		    	</colgroup>
					 <tr>
					    <td>Exam ID:</td>
					    <td><?php echo $row['examID']; ?></td>
					  </tr>
					  <tr>
					    <td>Exam's name:</td>
					    <td><?php echo $row['examName'] ?></td>
					  </tr>
					  <tr>
					    <td>Exam's date:</td>
					    <td><?php echo $row['examDate']; ?></td>
					  </tr>
					  <tr>
					    <td>Starting Time:</td>
					    <td><?php echo $row['startTime'] ?></td>
					  </tr>
					   <tr>
					    <td>Ending Time:</td>
					    <td><?php echo $row['endTime']; ?></td>
					  </tr>
					  <tr>
					    <td>Number of Questions:</td>
					    <td><?php echo $row['qNum'] ?></td>
					  </tr>
            </table>

		</div>
	</div>
	<?php }
	}
	 ?>

<form action="Student-take-exam-validation.php" method="post" style=" bottom:15px;">
			<div>
				<br>
				<h1 class="thicker">Please enter the exam ID you want to take: </h1>
				<INPUT TYPE = "Text"  NAME = "examID" placeholder="ExamID" id="ExamID" style="position:relative; bottom:15px;">
				<button type="submit" class="btn btn-info btn-large" style="position:relative;bottom:17px;"
				onclick="return submitExamID()" >Start The Exam</button>
			</div>
			</form>	
	</div>


	
<?php include 'footer.php';?>
<script src="Student-takeExamValidation.js"></script>
</body> 
</html>
