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
<body onload="ShowTime()">
<?php include 'header.php';?>

<!-- Left Sidebar -->
<div class ="sidenav">
    <a href="#"><img src="polyuLogo.png" alt= "polyulogo" class="rounded-circle" id="polyulogo"> </a>
    <script language="JavaScript">
    function ShowTime(){
　  var NowDate=new Date();
　  var h=NowDate.getHours();
　  var m=NowDate.getMinutes();
　  var s=NowDate.getSeconds();　
　  document.getElementById('showbox').innerHTML = h+':'+m+':'+s;
　  setTimeout('ShowTime()',1000);
    }
</script>
<div style="font-size:20px;position:relative;left:20%;font-weight: bold;" class="rounded-circle">Current time:</div>
<div id="showbox" style="font-size:40px;position:relative;left:20%;" class="rounded-circle"></div>


 </div>

<!-- Page Body -->
<div class = "content">
	<div class="contbox">
      
		<div class = "qForm">

        
        <?php

        $examID = $_POST['examID'];

        include_once 'connect_database.php';

            $examQuery= "SELECT *
            FROM exam 
            WHERE examID = $examID";
            $ExamResult = mysqli_query($connect,$examQuery);
            $ExamRow = mysqli_fetch_assoc($ExamResult);




            $count="SELECT *
                    FROM question
                    WHERE examID = $examID";
            $result = mysqli_query($connect,$count);
            $rowcount=mysqli_num_rows($result);
            

            date_default_timezone_set('Asia/Taipei');
            $date = date('Y-m-d H:i:s ', time());
            echo "Time: ".$date;
            $ExamDate = $ExamRow['examDate'];
            $ExamStartTime = $ExamRow['startTime'];
            $ExamEndTime = $ExamRow['endTime'];
            $takeExamDateStart = $ExamDate." ".$ExamStartTime;
            $takeExamDateEnd = $ExamDate." ".$ExamEndTime;
            echo '<br>';
            echo "Exam Starting Time: ".$takeExamDateStart;
            echo '<br>';
            echo "Exam Starting Time: ".$takeExamDateEnd;
            
            if(($date>$takeExamDateEnd) || ($date<$takeExamDateStart)){ ?>

                <h2><b>Sorry, Exam <?php echo $ExamRow['examName'];?> is not available now!</b></h2>
                <button onclick="location.href = 'Student-take-exam.php';" class="btn btn-info btn-large" >Back</button>

            <?php }else{ ?>
            
            
            
            
            <form action="Student-check-result.php" method="post">
            <h2><b>Welcome to the Exam <?php echo $ExamRow['examName'];?> !</b></h2>
            <h2><b>The end time of the exam is <?php echo $ExamRow['endTime'];?> </b></h2>
            <h2><b>Questions: </b></h2>
            

            <?php for($i=1 ; $i<=$rowcount ; $i++){
            
             $q= "SELECT *
             FROM question 
             WHERE questionNum = $i ";
             $query = mysqli_query($connect,$q);
            
            while($rows = mysqli_fetch_array($query)){
            ?>

            <div class="card">
                <h4 class="card-header"> <?php echo $rows['question'] ?> </h4>

            <?php

            $q= "SELECT *
             FROM question 
             WHERE questionNum = $i ";
             $query = mysqli_query($connect,$q);
            
            while($rows = mysqli_fetch_array($query)){
            ?>
            
            <?php if($rows['Type']=="Multiple Choice"){ ?>

            <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $rows['questionNum'];?>]" value="A">
                <?php echo $rows['option1']; ?>
            </div>
            <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $rows['questionNum'];?>]" value="B">
                <?php echo $rows['option2']; ?>
            </div>
            <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $rows['questionNum'];?>]" value="C">
                <?php echo $rows['option3']; ?>
            </div>
            <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $rows['questionNum'];?>]" value="D">
                <?php echo $rows['option4']; ?>
            </div>
        <?php }else if($rows['Type']=="T/F"){ ?>
            <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $rows['questionNum'];?>]" value="T">
                <?php echo $rows['option1']; ?>
            </div>
            <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $rows['questionNum'];?>]" value="F">
                <?php echo $rows['option2']; ?>
            </div>
        <?php }else if($rows['Type']=="short"){ ?>
            <div><textarea style="width: 100%; height: 100%;;" name="quizcheck[<?php echo $rows['questionNum'];?>]">
</textarea></div>
            <?php } ?>
   
   <?php
            }
        }
        }
        ?>



		</div>
	</div>

	</div>

    
        <input type="submit" name="submit" value="Submit" class="btn btn-info btn-large">
        
        </form>
 
        <?php } ?>
</body> 
</html>