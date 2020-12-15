<?php
session_start();
// connect to the database
include_once 'connect_database.php';
if (isset($_POST['loginID']) && isset($_POST['FN']) && isset($_POST['LN'])
&& isset($_POST['NN']) && isset($_POST['EM']) && isset($_POST['PW'])
&& isset($_POST['COU']) && isset($_POST['GEN']) && isset($_POST['BD'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $loginID = validate($_POST['loginID']);
    $FN = validate($_POST['FN']);
    $LN = validate($_POST['LN']);
    $NN = validate($_POST['NN']);
    $EM = validate($_POST['EM']);
    $PW = validate($_POST['PW']);
    $COU = validate($_POST['COU']);
    $GEN = validate($_POST['GEN']);
    $BD = validate($_POST['BD']);
    $PP = "default.png";

    if($loginID>=10000 && $loginID<60000){
        $role = "student"; 
    }else if($loginID>=60000 && $loginID<90000){
        $role = "teacher";
    }else{
        $role = "admin";
    }



    if($loginID>=10000 && $loginID<60000){
        if($GEN=="M"){
            $GEN = "Male";
        }else{
            $GEN = "Female";
        }
    


    /*
    echo $loginID;
    echo $FN;
    echo $LN;
    echo $NN;
    echo $EM;
    echo $PW;
    echo $COU;
    echo $GEN;
    echo $BD;
    echo $role;
    */
   
    $sql = "SELECT * 
            FROM users WHERE userID = '$loginID'";
    $result = mysqli_query($connect,$sql); 
    if (mysqli_num_rows($result)>0){
        header("Location: registration_fail.php");
        exit();
    }else{
        $sql2 = "INSERT INTO users(userID, roles, firstName, lastName, password,
                 nickname, email,profilepic, gender, birthday, course) 
                 VALUES('$loginID','$role','$FN','$LN','$PW','$NN','$EM', '$PP',
                 '$GEN','$BD','$COU')";
                 $result2 = mysqli_query($connect,$sql2); 
                 if($result2){
                   header("Location: registration_succeed.php");
                   exit();  
                 }else{
                   header("Location: registration_error.php");
                   exit();  
                 }
                   
    }
    
}
}
?>