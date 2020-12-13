<?php 
	 session_start();
    include "connect_database.php";
    $examID = $_GET['q'];
    $_SESSION['examID'] = $examID;

	$displayQuery= "SELECT * FROM grade,users WHERE examID = $examID AND grade.userID = users.userID";

            $result3 = mysqli_query($connect, $displayQuery);
              if (!$result3) {
            die('Invalid query: ' . mysqli_error($connect));
            }
              if (mysqli_num_rows($result3) == 0) {
            print "No answer yet";
            }

            else { 
            print "<p>Result for the following exam.</p>";
            print "<table id = \"examGradeTbl\" border='1'>";
            print "<tr><th>UserID</th><th>Student Name</th><th>Grade</th></tr>";
            while( $row3 = mysqli_fetch_assoc($result3) ){
              print "<tr><td>". $row3['userID']. "</td><td>" . $row3['firstName'] . " " . $row3['lastName']. "</td><td>" .$row3['grade']. "</td></tr>";    
            }
            print "</table>";  
        }


   	$MAXQuery= "SELECT MAX(grade) as MaxGrade FROM grade WHERE examID = $examID";

            $resultMAX = mysqli_query($connect, $MAXQuery);
              if (!$resultMAX) {
            die('Invalid query: ' . mysqli_error($connect));
            }
            $rowMax = mysqli_fetch_assoc($resultMAX);
            print "<p>The Maximum score is: " . $rowMax['MaxGrade']."</p>";

    $MINQuery= "SELECT MIN(grade) as MINGrade FROM grade WHERE examID = $examID";

            $resultMIN = mysqli_query($connect, $MINQuery);
              if (!$resultMIN) {
            die('Invalid query: ' . mysqli_error($connect));
            }
            $rowMIN = mysqli_fetch_assoc($resultMIN);
            print "<p>The Minimum score is: " . $rowMIN['MINGrade']."</p>";

     $AVGQuery= "SELECT AVG(grade) as AVGGrade FROM grade WHERE examID = $examID";

            $resultAVG = mysqli_query($connect, $AVGQuery);
              if (!$resultAVG) {
            die('Invalid query: ' . mysqli_error($connect));
            }
            $rowAVG = mysqli_fetch_assoc($resultAVG);
            $avg = $rowAVG['AVGGrade'];
            $favg = number_format ($avg,2);
            print "<p>The Average score is: " .$favg ."</p>";

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
    print "<p>The median is: " .$median."</p>";



 ?>