<?php
    session_start();
    $userID = intval($_SESSION['userID']);
	$id = "'".$intuserID."'";
	$firstName = "'".$_POST["FN"]."'";
	$lastName = "'".$_POST["LN"]."'";
	$nickName = "'".$_POST["NN"]."'";
	$email = "'".$_POST["EM"]."'";
    $password = "'".$_POST["PW"]."'";

    $statusMsg = '';

	$targetDir = "uploads/";
	$fileName = basename($_FILES["file"]["name"]);
	$targetFilePath = $targetDir . $fileName;
	$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $profilepic = "'".$_POST["PP"]."'";
   
	if ($userID < 60000)
	{
		$course = "\"\"";
	}
	else{
		$course = "'".$_POST["COU"]."'";
	}
	$gender = "'".$_POST["GEN"]."'";
	$birthday = "'".$_POST["BD"]."'";
	

	if ($userID < 60000)
	{
		$roles = "'"."student"."'";
	}
	else if($userID < 90000 && $userID > 59999)
	{
		$roles = "'"."teacher"."'";
	}
	else{
		$roles = "'"."admin"."'";
	}


	include "connect_database.php";

	if(!empty($_FILES["file"]["name"]))
	{
		 $allowTypes = array('jpg','png','jpeg','gif','pdf');
    	if(in_array($fileType, $allowTypes)){
   			if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
   			{
					$query = "REPLACE INTO users (userID, roles, firstName, lastName, password, nickname, email, profilepic, gender, birthday, course) VALUES
					($userID, $roles, $firstName, $lastName, $password, $nickName, $email,'".$fileName."',$gender,$birthday,$course)";
						$result = mysqli_query($connect, $query);
	              if (!$result) {
	            die("Could not successfully run query.". mysqli_error($connect));
	            }
	        }
	    }
    }
    else
    {
		$query = "REPLACE INTO users (userID, roles, firstName, lastName, password, nickname, email, profilepic, gender, birthday, course) VALUES
		($userID, $roles, $firstName, $lastName, $password, $nickName, $email,'default.png',$gender,$birthday,$course)";
		$result = mysqli_query($connect, $query);
	              if (!$result) {
	            die("Could not successfully run query.". mysqli_error($connect));
	            }
    }

    
    header("Location: AfterModify.php");
    
?>