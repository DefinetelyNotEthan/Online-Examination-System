<?php

$server = "localhost";
$user = "wbip";
$pw = "wbip123";
$db = "exam_platform";

$connect = mysqli_connect($server,$user,$pw,$db);
if(!$connect){
    die("Connection failed: ".mysqli_connect_error());
}
?>