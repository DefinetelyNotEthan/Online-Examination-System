
   <?php
        include "connect_database.php";
        $userQuery= "SELECT * FROM users ORDER BY userID";

            $result = mysqli_query($connect, $userQuery);
              if (!$result) {
            die("Could not successfully run query.");
            }
              if (mysqli_num_rows($result) == 0) {
            print "No users registered";
            }

            else { 
            print "<table id = 'examListTbl' border='1' style =\"width: 95%;\">";
            print "<tr><th>userID</th><th>User Name</th><th>Roles</th></tr>";
            while( $row = mysqli_fetch_assoc($result) ){
              print "<tr><td>". $row['userID']. "</td><td>" .$row['firstName']." ".$row['lastName']. "</td><td>" . 
              $row['roles']."</td></tr>";    
            }
            print "</table>";       
          }

            mysqli_close($connect);   // close the connection
      ?>