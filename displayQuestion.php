  <?php
  		session_start();
        include "connect_database.php";
        $examID = $_GET['q'];
       	$_SESSION['examID'] = $examID;
        $userQuery= "SELECT * FROM question WHERE examID = $examID";

            $result = mysqli_query($connect, $userQuery);
              if (!$result) {
            die("Could not successfully run query.");
            }
              if (mysqli_num_rows($result) == 0) {
            print "You dont have any exam";
            }

            else { 
            print "<table id = \"examListTbl\" border='1'>";
            print "<tr><th>Question Number</th><th>Type</th><th>Question</th><th>Answer</th></th><th>Marks</th></th><th>Option A</th><th>Option B</th><th>Option C</th><th>Option D</th></tr>";
            while( $row = mysqli_fetch_assoc($result) ){
              print "<tr><td>". $row['questionNum']. "</td><td>" . $row['Type'] . "</td><td>" . $row['question']. "</td><td>" .$row['answer']. "</td><td>" .$row['points']. "</td><td>" .$row['option1']. "</td><td>" .$row['option2']. "</td><td>" .$row['option3']. "</td><td>" .$row['option4']."</td></tr>";    
            }
            print "</table>";       
          }

            mysqli_close($connect);   // close the connection
?>