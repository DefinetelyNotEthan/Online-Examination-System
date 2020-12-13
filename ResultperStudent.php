  <?php 
	 session_start();
    include "connect_database.php";
    $userID = $_GET['q'];
    $examID = 	$_SESSION['examID'];

  	$displayQuery= "SELECT * FROM ((grade INNER JOIN answer ON grade.userID = answer.userID AND grade.examID = answer.examID) INNER JOIN question ON answer.examID = question.examID AND answer.questionNum = question.questionNum) WHERE answer.userID = $userID AND question.examID = $examID GROUP BY answer.questionNum";
  		$result3 = mysqli_query($connect, $displayQuery);
              if (!$result3) {
            die('Invalid query: ' . mysqli_error($connect));
            }
              if (mysqli_num_rows($result3) == 0) {
            print "This user didn't do the exam";
            }

            else { 
            print "<h4>Result for the following exam.</h4>";
            print "<table class = \"examGradeTbl\" border='1'>";
            print "<tr><th>Question Number</th><th>Question</th><th>Student's Answer</th><th>Correct Answer</th><th>Result</th><th>Possible Mark</th></tr>";
            while( $row3 = mysqli_fetch_assoc($result3) ){
              print "<tr><td>". $row3['questionNum']. "</td><td>" . $row3['question'] . "</td><td> " . $row3['userAnswer']. "</td><td>" .$row3['answer']."</td><td>" .$row3['result']. "</td><td>" .$row3['points']."</td></tr>";    
            }
            print "</table>";  
        }

  	?>