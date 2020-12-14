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

	  	<a class = "sideMenu" href="Student-take-exam.php">Take Exam</a>
 		<a class="sideMenu" href="Student-view-result.php">View Results</a>
 </div>

<!-- Page Body -->
<div class = "content">
	<h1 class="thicker">You Have completed the Exam!</h1>
    
<?php
error_reporting(0);

$userID = intval($_SESSION['userID']);
$examID = $_SESSION['examID'];
echo "Exam ID: ".$_SESSION['examID'];
echo '<br>';
echo "User ID: ".$_SESSION['userID'];
echo '<br>';

include_once 'connect_database.php';

if(isset($_POST['click']))
{
    date_default_timezone_set('Asia/Taipei');
    $date_clicked = date('H:i:s');;
    echo "Submitted time: " . $date_clicked . "<br>";
}

$blank = " ";
include_once 'connect_database.php';
$sql2 = "INSERT INTO grade (examID, userID, grade, submitTime)
            VALUES ('$examID', '$userID','$blank', '$date_clicked' )";
            $result2 = mysqli_query($connect,$sql2);
            if($result2){
                echo "Submitted status: You have successfully submitted, Please wait for the teacher to check!";
              }else{
                echo "Ooops! There is a problem!";
              }


if (!empty($_POST['quizcheck'])){

    $selected = $_POST['quizcheck'];


    $count="SELECT *
                    FROM question
                    WHERE examID = $examID";
            $result = mysqli_query($connect,$count);
            $rowcount=mysqli_num_rows($result);
    for($i=1 ; $i<=$rowcount ; $i++ ){
    $userAnswer = $selected[$i];
    
    $sql = "INSERT INTO answer (questionNum, examID, userID, userAnswer)
            VALUES ('$i', '$examID', '$userID', '$userAnswer' )";
            $result = mysqli_query($connect,$sql);
}

}


?>	
	</div>	
</body> 
</html>



