<?php

	$userID = $_POST['UID'];
	$intuserID = intval($userID );
	$id = "'".$intuserID."'";
	$firstName = "'".$_POST["FN"]."'";
	$lastName = "'".$_POST["LN"]."'";
	$nickName = "'".$_POST["NN"]."'";
	$email = "'".$_POST["EM"]."'";
	$password = "'".$_POST["PW"]."'";
	if ($intuserID < 60000)
	{
		$course = "\"\"";
	}
	else{
		$course = "'".$_POST["COU"]."'";
	}
	$gender = "'".$_POST["GEN"]."'";
	$birthday = "'".$_POST["BD"]."'";
	$profilepic = "'"."default.png"."'";

	if ($intuserID < 60000)
	{
		$roles = "'"."student"."'";
	}
	else if($intuserID < 90000 && $intuserID > 59999)
	{
		$roles = "'"."teacher"."'";
	}
	else{
		$roles = "'"."admin"."'";
	}


	include "connect_database.php";

	$query = "REPLACE INTO users (userID, roles, firstName, lastName, password, nickname, email, profilepic, gender, birthday, course) VALUES
		($intuserID, $roles, $firstName, $lastName, $password, $nickName, $email,$profilepic,$gender,$birthday,$course)";
	$result = mysqli_query($connect, $query);
              if (!$result) {
            die("Could not successfully run query.". mysqli_error($connect));
            }

    header("Location: AdminPage.php");
?>