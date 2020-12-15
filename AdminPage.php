<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

 <script src="UserList.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="header.css">	
  <link rel="stylesheet" href="ExamList.css"> 
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Francois+One&display=swap" rel="stylesheet">
 
</head>
<body>
<?php include 'header.php';?>

<!-- Left Sidebar -->
<div class ="sidenav">
  <a href=#><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>
  <a class = " sideMenu" href="Dashboard.php">Dashboard</a>
  <a class="active sideMenu" href="AdminPage.php">User List</a>
 </div>

<!-- Content -->

<div class = "content">
  <h1 class="thicker">User List</h1>

<div class = "QuestionBox">
    <h3>Modify a User</h3>
   <div class = "qForm">
   <form>
             <input type="text" id ="ID" name ="ID">
             <input type="button" type="button" class="btn btn-info btn-small" onclick="showST()" value ="Check this userID" >
        <br>
        <div id="sList"></div><br><br>

            <input type="button" type="button" class="btn btn-danger btn-small" onclick="deleteST()" value ="Delete this user" >
            <div id="qList"></div><br><br>
        </form>   
     <form id = "modifyUser" action="modifyUser.php" method="post">
      <h4><b>Add or Update Records</b></h4>
      <table width = "80%">
                <tr><td><label for ="UID">*User ID:</label></td>
                 <td><input type="text" id="UID" name="UID" style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="FN">*First Name:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="FN" name="FN"style="width: 50vw;" /></td></tr>
                 <tr><td> <label for ="LN">*Last Name:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="LN" name="LN"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="NN">Nick Name:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="NN" name="NN"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="EM">*Email:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="EM" name="EM"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="PW">*Password:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="PW" name="PW"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="COU">Course:</label></td>
                 <td>   <input type="text" placeholder="Course (important for teacher)" class="textboxSignUp" id="COU" name="COU" style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="GEN">Gender:</label></td>
                  <td>   <select name="GEN" id="GEN">
                    <option value="M">M</option>
                  <option value="F">F</option></td></tr>
                 <tr><td> <label for ="BD">Birthday:</label></td>
                 <td>   <input type="date" placeholder="Birthday (important for student)" class="textboxSignUp" id="BD" name="BD" style="width: 200px;"/></td></tr>
              </table>
              <br>
       <input type="button" type="button" class="btn btn-info btn-small" onclick="addST()" value ="Add or Update Record" >
     </form>
       
    </div>
  </div>

  <div class = "QuestionBox">
    <h3>Complete List</h3>
   <div class = "qForm">
   <?php

        include "UserList.php";
      ?>
    </div>
  </div>

</div>

</body> 
</html>