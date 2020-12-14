
<?php include 'header.php';?>

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


<!-- Left Sidebar -->
<div class ="sidenav">
  <?php
  if (intval($_SESSION['userID'])>49999){
    if(intval($_SESSION['userID'])<90000)
    	{echo "<a href=\"#\"><img src=\"polyuLogo.png\" alt= \"polyulogo\" class=\"rounded-circle\" id=\"polyulogo\"> </a>\"";
    	echo "<a class = \"active sideMenu\" href=\"Dashboard.php\">Dashboard</a>";
      echo "<a class=\"sideMenu\" href=\"TeacherMakeExam.php\">Create Exam</a>";
      echo "<a class = \"sideMenu\" href= \"Examlist.php\">Exam List</a>";
      echo "<a class = \"sideMenu\" href=\"CheckExam.php\">Check Exam</a>";
      echo "<a class = \"sideMenu\" href=\"ViewResult.php\">View Result</a>";}
    else{
      echo "<a href=\"#\"><img src=\"polyuLogo.png\" alt= \"polyulogo\" class=\"rounded-circle\" id=\"polyulogo\"> </a>\"";
      echo "<a class = \"active sideMenu\" href=\"Dashboard.php\">Dashboard</a>";
      echo "<a class=\"sideMenu\" href=\"AdminPage.php\">User List</a>";
      }
    }
    else {
      echo "<a href=\"#\"><img src=\"polyuLogo.png\" alt= \"polyulogo\" class=\"rounded-circle\" id=\"polyulogo\"> </a>\"";
      echo "<a class = \"active sideMenu\" href=\"Dashboard.php\">Dashboard</a>";
      echo "<a class=\"sideMenu\" href=\"#\">Take an Exam</a>";
      echo "<a class=\"sideMenu\" href=\"#\">View Results</a>";
    }
  ?>
 </div>

  <div class = "content">
  <h1 class="thicker"> HI,  <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></h1>
    <?php
  if (intval($_SESSION['userID'])>49999){
    if(intval($_SESSION['userID'])<90000)
      {echo "<ul><li> <p>Click Create Exam to add a new exam.</p></li>";
      echo "<li> <p>Click Exam List to see all of your Exams.</p></li>";
      echo "<li> <p>Click Check Exam to check unchecked exams.</p></li>";
      echo "<li> <p>Click View Results to see the statiscs of your exams</p></li>";
      echo "<li> <p>Go to the right upper corner to log out or edit profile</p></li></ul>";}
    else{
      echo "<ul><li> <p>Click User list to view users and modify the list</p></li>";
      echo "<li> <p>Go to the right upper corner to log out or edit profile</p></li></ul>";
      }
    }
    else {
      echo "<ul><li> <p>Click Take an Exam to start an Exam. The exam can only be started affter its corresponding starting time and can't no longer be started after its due date</p></li>";
      echo "<li> <p>Click View Results to analyze your performance. Grades will only be released after Teacher approval.</p></li>";
      echo "<li> <p>Go to the right upper corner to log out or edit profile</p></li></ul>";
    }
  ?>

  
  </div>
</body> 


</html>

