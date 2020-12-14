<?php
session_start();
// connect to the database
include_once 'connect_database.php';

if (isset($_POST['userID']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $userID = validate($_POST['userID']);
    $password = validate($_POST['password']);

    if (empty($userID)){
        header("Location: loginPage.php?error=User ID is required");
        exit();
    }else if(empty($password)){
        header("Location: loginPage.php?error=Password is required");
        exit();
    }else{
        $userQuery= "SELECT *
		     FROM users 
             WHERE password = '$password' AND userID = '$userID'";
             $result = mysqli_query($connect,$userQuery);
        
             if (mysqli_num_rows($result)===1){
                 $row = mysqli_fetch_assoc($result);
                 if($row['userID']===$userID && $row['password']===$password){
                     $_SESSION['userID'] = $row['userID'];
                     $_SESSION['firstName'] = $row['firstName'];
                     $_SESSION['lastName'] = $row['lastName'];
                     echo $_SESSION['firstName'];

                     if($_SESSION['userID']>=10000 && $_SESSION['userID']<60000){
                        header("Location: Student-take-exam.php");
                     }else if($_SESSION['userID']>=60000 && $_SESSION['userID']<90000){
                    
                     header("Location: Dashboard.php");
                     }

                     exit();
                     
                 }
                
                 else{
                    header("Location: loginPage.php?error=Incorrect ID or Password");
                    exit();
                 }
                 
             }

             else{
                header("Location: loginPage.php?error=Incorrect ID or Password");
                exit();
             }
             
    }
}

else{
    header("Location: loginPage.php");
    exit();
}





?>