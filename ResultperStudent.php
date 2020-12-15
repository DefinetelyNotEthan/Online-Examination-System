  <?php 
	 session_start();
    include "connect_database.php";
    $userID = $_GET['q'];
    $examID = 	$_SESSION['examID'];

    $intuserID = intval($userID);
  	$displayQuery= "SELECT * FROM answer, question WHERE answer.examID = question.examID AND answer.questionNum = question.questionNum AND answer.examID=$examID AND answer.userID =  $userID";
  		$result3 = mysqli_query($connect, $displayQuery);
              if (!$result3) {
            die('Invalid query: ' . mysqli_error($connect));
            }
              if (mysqli_num_rows($result3) == 0) {
            print "This user didn't do the exam";
            }

            else { 
            print "<br><h4><b>Result for the selected exam for the selected user</b></h4>";
            print "<table class = \"examGradeTbl\" border='1'style =\"width: 95%;\">";
            print "<tr><th>Question Number</th><th>Question</th><th>Student's Answer</th><th>Correct Answer</th><th>Result</th><th>Possible Mark</th></tr>";
            while( $row3 = mysqli_fetch_assoc($result3) ){
              print "<tr><td>". $row3['questionNum']. "</td><td>" . $row3['question'] . "</td><td> " . $row3['userAnswer']. "</td><td>" .$row3['answer']."</td><td>" .$row3['result']. "</td><td>" .$row3['points']."</td></tr>";    
            }
            print "</table>";  
        }

  	?>