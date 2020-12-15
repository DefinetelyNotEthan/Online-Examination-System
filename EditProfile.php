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
  <?php
  if (intval($_SESSION['userID'])>59999){
    if(intval($_SESSION['userID'])<90000)
    	{echo "<a href=\"#\"><img src=\"polyuLogo.png\" alt= \"polyulogo\" class=\"rounded-circle\" id=\"polyulogo\"> </a>\"";
    	echo "<a class = \"sideMenu\" href=\"Dashboard.php\">Dashboard</a>";
      echo "<a class=\"sideMenu\" href=\"TeacherMakeExam.php\">Create Exam</a>";
      echo "<a class = \"sideMenu\" href= \"Examlist.php\">Exam List</a>";
      echo "<a class = \"sideMenu\" href=\"CheckExam.php\">Check Exam</a>";
      echo "<a class = \"sideMenu\" href=\"ViewResult.php\">View Result</a>";}
    else{
      echo "<a href=\"#\"><img src=\"polyuLogo.png\" alt= \"polyulogo\" class=\"rounded-circle\" id=\"polyulogo\"> </a>\"";
      echo "<a class = \" sideMenu\" href=\"Dashboard.php\">Dashboard</a>";
      echo "<a class=\"sideMenu\" href=\"AdminPage.php\">User List</a>";
      }
    }
    else {
      echo "<a href=\"#\"><img src=\"polyuLogo.png\" alt= \"polyulogo\" class=\"rounded-circle\" id=\"polyulogo\"> </a>\"";
      echo "<a class = \" sideMenu\" href=\"Dashboard.php\">Dashboard</a>";
      echo "<a class=\"sideMenu\" href=\"Student-take-exam.php\">Take an Exam</a>";
      echo "<a class=\"sideMenu\" href=\"Student-view-result.php\">View Results</a>";
    }
  ?>
 </div>

  <div class = "content">
  <h1 class="thicker"> HI,  <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></h1>
  <div class = "QuestionBox">

    <?php
  if (intval($_SESSION['userID'])>59999){
    if(intval($_SESSION['userID'])<90000)
      {    ?>
          
      <form id = "modifyUser" action="ModifyProfile.php" method="post">
      <h4><b>Edit Your Profile</b></h4>
      <table width = "80%">
                <tr><td><label for ="UID">*User ID:</label></td>
                 <td><?php echo $_SESSION['userID'] ?></td></tr>
                 <tr><td> <label for ="FN">*First Name:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="FN" name="FN"style="width: 50vw;" /></td></tr>
                 <tr><td> <label for ="LN">*Last Name:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="LN" name="LN"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="NN">*Nick Name:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="NN" name="NN"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="EM">*Email:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="EM" name="EM"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="PW">*Password:</label></td>
                 <td>   <input type="text" class="textboxSignUp" id="PW" name="PW"style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="COU">*Course:</label></td>
                 <td>   <input type="text" placeholder="Course (important for teacher)" class="textboxSignUp" id="COU" name="COU" style="width: 50vw;"/></td></tr>
                 <tr><td> <label for ="PP">Choose a profile pic:</label></td>
                   <td>   <select name="PP" id="P">
                      <option value="cerys_blundell.jpg">Pic 1</option>
                      <option value="denzel.jpg">Pic 2</option>
                      <option value="dulcie_luna.jpg">Pic 3</option>
                      <option value="enrique.jpg">Pic 4</option>
                      <option value="griffin.jpg">Pic 5</option>
                      <option value="jasleen_wood.jpg">Pic 6</option>
                 
                 
              </table>
              <br>
       <input type="button" type="button" class="btn btn-info btn-small" onclick="addTEA()" value ="Update Your Profile" >
     </form>
    
    <?php
    }
    else{ ?>
        <form id = "modifyUser" action="ModifyProfile.php" method="post">
        <h4><b>Edit Your Profile</b></h4>
        <table width = "80%">
                  <tr><td><label>*User ID:</label></td>
                   <td><?php echo $_SESSION['userID'] ?></td></tr>
                   <tr><td> <label for ="FN">*First Name:</label></td>
                   <td>   <input type="text" class="textboxSignUp" id="FN" name="FN"style="width: 50vw;" /></td></tr>
                   <tr><td> <label for ="LN">*Last Name:</label></td>
                   <td>   <input type="text" class="textboxSignUp" id="LN" name="LN"style="width: 50vw;"/></td></tr>
                   <tr><td> <label for ="NN">*Nick Name:</label></td>
                   <td>   <input type="text" class="textboxSignUp" id="NN" name="NN"style="width: 50vw;"/></td></tr>
                   <tr><td> <label for ="EM">*Email:</label></td>
                   <td>   <input type="text" class="textboxSignUp" id="EM" name="EM"style="width: 50vw;"/></td></tr>
                   <tr><td> <label for ="PW">*Password:</label></td>
                   <td>   <input type="text" class="textboxSignUp" id="PW" name="PW"style="width: 50vw;"/></td></tr>   
                   <tr><td> <label for ="PP">Choose a profile pic:</label></td>
                   <td>   <select name="PP" id="P">
                      <option value="cerys_blundell.jpg">Pic 1</option>
                      <option value="denzel.jpg">Pic 2</option>
                      <option value="dulcie_luna.jpg">Pic 3</option>
                      <option value="enrique.jpg">Pic 4</option>
                      <option value="griffin.jpg">Pic 5</option>
                      <option value="jasleen_wood.jpg">Pic 6</option>   
                </table>
                <br>
         <input type="button" type="button" class="btn btn-info btn-small" onclick="addAD()" value ="Update Your Profile" >
       </form>
       <?php
      }
    }
    else { ?>
        <form id = "modifyUser" action="ModifyProfile.php" method="post">
        <h4><b>Edit Your Profile</b></h4>
        <table width = "80%">
                  <tr><td><label for ="UID">*User ID:</label></td>
                   <td><?php echo $_SESSION['userID'] ?></td></tr>
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
                   <tr><td> <label for ="GEN">Gender:</label></td>
                    <td>   <select name="GEN" id="GEN">
                      <option value="M">M</option>
                    <option value="F">F</option></td></tr>
                   <tr><td> <label for ="BD">Birthday:</label></td>
                   <td>   <input type="date" placeholder="Birthday (important for student)" class="textboxSignUp" id="BD" name="BD" style="width: 200px;"/></td></tr>
                   <tr><td> <label for ="PP">Choose a profile pic:</label></td>
                   <td>   <select name="PP" id="P">
                      <option value="cerys_blundell.jpg">Pic 1</option>
                      <option value="denzel.jpg">Pic 2</option>
                      <option value="dulcie_luna.jpg">Pic 3</option>
                      <option value="enrique.jpg">Pic 4</option>
                      <option value="griffin.jpg">Pic 5</option>
                      <option value="jasleen_wood.jpg">Pic 6</option>
                </table>
                <br>
         <input type="button" type="button" class="btn btn-info btn-small" onclick="addSTU()" value ="Update Your Profile" >
       </form>
       <?php
    }

?>

  </div>

  
</body> 
<script src="CheckModifyST.js"></script>
<script src="CheckModifyTEA.js"></script>

</html>
