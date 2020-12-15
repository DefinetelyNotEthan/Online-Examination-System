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
 		<a class="active sideMenu" href="Student-view-result.php">View Results</a>
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
                    INNER JOIN grade
                    ON exam.examID=grade.examID
                    WHERE exam.checked = 'YES'AND grade.userID = $userID AND exam.examID = $examID";
             $result = mysqli_query($connect,$userQuery);

       if($result){
                  if (mysqli_num_rows($result)===1){ 
                    print "<h1 class=\"thicker\">Your result for this exam</h1>"; 
                    $userQuery2= "SELECT *
                    FROM grade
                    WHERE examID=$examID AND userID = $userID";
                    $result2 = mysqli_query($connect,$userQuery2);
                    if($result2){
                    print "<table class = \"examListTbl \" border='1' style =\"width: 100%;\">";
                    print "<tr><th> Exam ID</th><th> Your ID</th><th> Your Grade</th><th> Your Submit time</th></tr>";
                    while( $row = mysqli_fetch_assoc($result2) ){
                    print "<tr><td>". $row['examID']. "</td><td>" .$row['userID']. "</td><td>" . $row['grade'] . "</td><td>" . $row['submitTime']."</td></tr>";   
                    }
                     print "</table>"; 
                     print "</br>";
                     print "<br><h4><b>Exam Statistic</b></h4>";
                     print "<table class = \"examGradeTbl\" style =\"width: 25%;\">";
            
                   $MAXQuery= "SELECT MAX(grade) as MaxGrade FROM grade WHERE examID = $examID";
            
                        $resultMAX = mysqli_query($connect, $MAXQuery);
                          if (!$resultMAX) {
                        die('Invalid query: ' . mysqli_error($connect));
                        }
                        $rowMax = mysqli_fetch_assoc($resultMAX);
                        print "<tr><td><p>The Maximum score is:</td><td> " . $rowMax['MaxGrade']."</p></td></tr>";
            
                $MINQuery= "SELECT MIN(grade) as MINGrade FROM grade WHERE examID = $examID";
            
                        $resultMIN = mysqli_query($connect, $MINQuery);
                          if (!$resultMIN) {
                        die('Invalid query: ' . mysqli_error($connect));
                        }
                        $rowMIN = mysqli_fetch_assoc($resultMIN);
                        print "<tr><td><p>The Minimum score is:</td><td>  " . $rowMIN['MINGrade']."</p></td></tr>";
            
                 $AVGQuery= "SELECT AVG(grade) as AVGGrade FROM grade WHERE examID = $examID";
            
                        $resultAVG = mysqli_query($connect, $AVGQuery);
                          if (!$resultAVG) {
                        die('Invalid query: ' . mysqli_error($connect));
                        }
                        $rowAVG = mysqli_fetch_assoc($resultAVG);
                        $avg = $rowAVG['AVGGrade'];
                        $favg = number_format ($avg,2);
                        print "<tr><td><p>The Average score is:</td><td>  " .$favg ."</p></td></tr>";
            
                 $arr = array();
                 $i=0;
            
                $MedianQuery= "SELECT grade FROM grade WHERE examID = $examID";
                        $resultMedian = mysqli_query($connect, $MedianQuery);
                          if (!$resultMedian) {
                        die('Invalid query: ' . mysqli_error($connect));
                        }
                        while ($rowMedian = mysqli_fetch_assoc($resultMedian))
                        {
                            $arr[$i] = $rowMedian['grade'];
                            $i++;
                        }
                $count = count($arr); //total numbers in array
                $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
                if($count % 2) { // odd number, middle is the median
                    $median = $arr[$middleval];
                } else { // even number, calculate avg of 2 medians
                    $low = $arr[$middleval];
                    $high = $arr[$middleval+1];
                    $median = (($low+$high)/2);
                }
                print "<tr><td><p>The median is:</td><td>  " .$median."</p></td></tr></table>";
                print "<br><h4><b>Statistic per Question</b></h4>";
                print "<table class = \"examGradeTbl\" border='1' style =\"width: 95%;\">";
                print "<tr><th>Question Number</th><th>Question</th><th>Your Answer</th><th>Correct Answer</th><th>Result</th><th>Points for this Q</th><th>Correct Answer Percentage(%)</th><th>Average Points</th></tr>";
                $qNumQuery= "SELECT questionNum, question, answer,points FROM question WHERE examID = $examID GROUP BY questionNum";
                $resultqNum = mysqli_query($connect, $qNumQuery);
                 if (!$qNumQuery) {
                  die('Invalid query: ' . mysqli_error($connect));
                 }
                   while ($rowqNum = mysqli_fetch_assoc($resultqNum))
                  {
            	$qNum =$rowqNum['questionNum'];
                $question = $rowqNum['question'];
                $answer = $rowqNum['answer'];
                $QPoint = $rowqNum['points'];

                $AnswerQuery= "SELECT userAnswer,result FROM answer WHERE examID = $examID AND userID = $userID AND questionNum = $qNum GROUP BY questionNum";
                $resultAnswer = mysqli_query($connect, $AnswerQuery);
                  if (!$AnswerQuery) {
                die('Invalid query: ' . mysqli_error($connect));
                }
                $rowAnswer = mysqli_fetch_assoc($resultAnswer);
		        $UserResult =  $rowAnswer['result'];  
                $userAnswer = $rowAnswer['userAnswer'];
            

                  
            		$UserQuery= "SELECT COUNT(userID) as StudentNum FROM answer WHERE examID = $examID GROUP BY questionNum";
		            $resultUser = mysqli_query($connect, $UserQuery);
		              if (!$UserQuery) {
		            die('Invalid query: ' . mysqli_error($connect));
		            }
		            $rowUser = mysqli_fetch_assoc($resultUser);
		            $totalStudent = $rowUser['StudentNum'];

		            $MarkQuery= "SELECT points FROM question WHERE examID = $examID AND questionNum = $qNum";
		            $resultMark = mysqli_query($connect, $MarkQuery);
		              if (!$MarkQuery) {
		            die('Invalid query: ' . mysqli_error($connect));
		            }
		            $rowMark = mysqli_fetch_assoc($resultMark);
		            $points = $rowMark['points'];

		            $resultQuery= "SELECT COUNT(result) as CorrectCount FROM answer WHERE examID = $examID AND questionNum = $qNum AND result = 'Correct'";
		            $result = mysqli_query($connect, $resultQuery);
		              if (!$resultQuery) {
		            die('Invalid query: ' . mysqli_error($connect));
		            }
		            $row = mysqli_fetch_assoc($result);
		            $totalCorrect = $row['CorrectCount'];

		            $avgC =($totalCorrect/$totalStudent)*100;
		            $avgPQ = ($totalCorrect*$points)/$totalStudent;

                    print "<tr><td>".$qNum."</td><td>" . $question . "</td><td>" . $userAnswer . "</td><td>" . $answer . "</td>
                    </td><td>" . $UserResult . "</td><td>" . $QPoint . "</td><td>" .$avgC. "</td><td>" .$avgPQ."</td></tr>";
               
            }

            print "</table>";
            print "</br>";
            print "<button onclick=\"history.go(-1);\" class=\"btn btn-info btn-large\">Back To Previous Page</button> ";
            print "</br>";
            print "</br>";
            
                    }
                    ?>
                     
                    

        <?php   }else if (mysqli_num_rows($result)===0){
                    print "<h1 class=\"thicker\">Sorry, the exam ID you entered is invalid!</h1>";
                    print "<h1 class=\"thicker\">Please input a valid exam ID!</h1> ";
                    print "<button onclick=\"history.go(-1);\" class=\"btn btn-info btn-large\">Back </button>";
                   }
                }
         
       
      
       
        
   
?>
	</div>	
</body> 
</html>