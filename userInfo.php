
   <?php
        include "connect_database.php";
        $userID = $_GET['q'];
        $userQuery= "SELECT * FROM users WHERE userID =$userID";

            $result = mysqli_query($connect, $userQuery);
              if (!$result) {
            die("Could not successfully run query.");
            }
              if (mysqli_num_rows($result) == 0) {
            print "No users registered";
            }

            else { 
            if ($userID < 50000)
            {  
                print "<br><table id = 'examListTbl' border='1' style =\"width: 100%;\">";
                print "<tr><th>userID</th><th>User Name</th><th>Roles</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Picture Link</th><th>Gender</th><th>Birthday</th></tr>";
                while( $row = mysqli_fetch_assoc($result) ){
                  print "<tr><td>". $row['userID']. "</td><td>" .$row['firstName']." ".$row['lastName']. "</td><td>" . $row['roles']."</td><td>" . $row['password']."</td><td>" . 
                  $row['nickname']."</td><td>" . $row['email']."</td><td>" . $row['profilepic']."</td><td>" . $row['gender']."</td><td>" . $row['birthday']."</td></tr>";    
                }
                print "</table>";
            }
             else{
                print "<br><table id = 'examListTbl' border='1'style =\"width: 100%;\">";
                print "<tr><th>userID</th><th>User Name</th><th>Roles</th><th>Password</th><th>Email</th><th>Profile Picture Link</th><th>Gender</th><th>Course</th></tr>";
                while( $row = mysqli_fetch_assoc($result) ){
                  print "<tr><td>". $row['userID']. "</td><td>" .$row['firstName']." ".$row['lastName']. "</td><td>" . $row['roles']."</td><td>" . $row['password']."</td><td>" .  $row['email']."</td><td>" . $row['profilepic']."</td><td>" . $row['gender']."</td><td>" . $row['course']."</td></tr>";    
                }
                print "</table>";
             }   
          }

            mysqli_close($connect);   // close the connection
      ?>