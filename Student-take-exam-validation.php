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
        <a class = "sideMenu" href="Dashboard.php">Dashboard</a>
	  	<a class = "sideMenu" href="Student-take-exam.php">Take Exam</a>
 		<a class="sideMenu" href="Student-view-result.php">View Results</a>
 </div>

<!-- Page Body -->
<div class = "content">

    
<?php


// connect to the database
include_once 'connect_database.php';
$userID = intval($_SESSION['userID']);
$examID = $_POST['examID'];

       $userQuery= "SELECT *
		     FROM exam 
             WHERE examID = $examID";
             $result = mysqli_query($connect,$userQuery);
 if($result){
        if (mysqli_num_rows($result)===1){ 

             $userQuery1= "SELECT *
		     FROM grade 
             WHERE examID = $examID AND userID = $userID";
             $result1 = mysqli_query($connect,$userQuery1);
             if($result1){
             if (mysqli_num_rows($result1)===1){ ?>
                     <h1 class="thicker">You have already taken this exam!</h1> 
                     <h1 class="thicker">Please check if you have other exams!</h1> 
                     <button onclick="history.go(-1);" class="btn btn-info btn-large">Back </button>
                    <?php } else {
                     $examID = $_POST['examID'];
                     $_SESSION['examID'] = $examID;
                    header("Location:Student-answerQ.php");
                    exit();
                    }
             }
            
       }else { 
        print "<h1 class=\"thicker\">Sorry, the exam ID you entered is invalid!</h1>";
        print "<h1 class=\"thicker\">Please input a valid exam ID!</h1> ";
        print "<button onclick=\"history.go(-1);\" class=\"btn btn-info btn-large\">Back </button>";
           }
}
?>
	</div>	
</body> 
</html>













