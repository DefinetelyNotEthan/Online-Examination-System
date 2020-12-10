  <?php
  		session_start();
        include "connect_database.php";
        $examID = $_GET['q'];
       	$_SESSION['examID'] = $examID;
        $grade = 0;

        $userQuery= "SELECT userID FROM answer WHERE examID = $examID GROUP BY userID";
        $user = mysqli_query($connect, $userQuery);
        while( $rowUser = mysqli_fetch_assoc($user) )
        {
          $userSearch = $rowUser['userID'];
          $examQuery= "SELECT * FROM answer WHERE examID = $examID AND userID = $userSearch";

              $result = mysqli_query($connect, $examQuery);
                if (!$result) {
              die("Could not successfully run query.");
              }
                if (mysqli_num_rows($result) == 0) {
              print "No answer yet";
              }

              else { 
              while( $row = mysqli_fetch_assoc($result) ){
                $questionNum = $row['questionNum'];
                $examID = $row['examID'];
                $answerQuery =  "SELECT * FROM question WHERE questionNum = $questionNum AND examID =$examID";
                $answer = mysqli_query($connect, $answerQuery);
                while( $row1 = mysqli_fetch_assoc($answer) )
                {
                  if ($row1['answer'] == $row['userAnswer'])
                  {
                    $grade += $row1['points'];
                  }

                }
              }   
            }
            $sql2 = "INSERT INTO grade (examID, userID, grade) VALUES ('$examID','$userSearch','$grade')";
                $add1 = mysqli_query($connect, $sql2);
                if (!$add1) {
                die('Invalid query: ' . mysqli_error($connect));
                  }
            $grade = 0;
        }

          $displayQuery= "SELECT * FROM grade,users WHERE examID = $examID AND grade.userID = users.userID";

            $result3 = mysqli_query($connect, $displayQuery);
              if (!$result3) {
            die('Invalid query: ' . mysqli_error($connect));
            }
              if (mysqli_num_rows($result3) == 0) {
            print "No answer yet";
            }

            else { 
            print "<table id = \"examGradeTbl\" border='1'>";
            print "<tr><th>UserID</th><th>Student Name</th><th>Grade</th></tr>";
            while( $row3 = mysqli_fetch_assoc($result3) ){
              print "<tr><td>". $row3['userID']. "</td><td>" . $row3['firstName'] . " " . $row3['lastName']. "</td><td>" .$row3['grade']. "</td></tr>";    
            }
            print "</table>";       
          }

          $sql5 = "UPDATE exam SET checked = 'YES' WHERE examID = $examID;";
          $add5 = mysqli_query($connect, $sql5);
           if (!$add5) {
           die('Invalid query: ' . mysqli_error($connect));
          }

            mysqli_close($connect);   // close the connection
?>